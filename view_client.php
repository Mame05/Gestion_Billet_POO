<?php
require_once 'config.php';

// Récupérer les données des clients depuis la base de données
$stmt = $bdd->prepare("SELECT * FROM client");
$stmt->execute();
$resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Clients</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="containerClient">
        <div class="container-head">
            <h1>Liste des clients</h1>
            <span class="ajoutbtn">
                <a href="addClient.php">Ajouter un client</a> <!-- Corrige le lien vers la page d'ajout -->
            </span>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Afficher les données des clients dans le tableau
                foreach($resultat as $client) {
                    echo "<tr>";
                    echo "<td>" . $client['id'] . "</td>";
                    echo "<td>" . $client['nom'] . "</td>";
                    echo "<td>" . $client['prenom'] . "</td>";
                    echo "<td>" . $client['tel'] . "</td>";
                    echo "<td>" . $client['adresse'] . "</td>";
                    echo "<td>" . $client['email'] . "</td>";    
                    echo "<td>
                            <a href='updateClient.php?id=" . $client['id'] . "'><i class='fa-solid fa-pencil'></i></a> | 
                            <a href='deleteClient.php?id=" . $client['id'] . "'><i class='fa-regular fa-trash-can'></i></a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>
