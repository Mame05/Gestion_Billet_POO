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
    <style>
        /* CSS pour la mise en forme */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .containerClient {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .container-head h1 {
            margin: 0;
        }

        .ajoutbtn a {
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .ajoutbtn a:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            background-color: #fff;
        }

        td a {
            text-decoration: none;
            color: #333;
            margin-right: 5px;
        }

        i {
            margin-right: 5px;
        }
    </style>
</head>
<body>

    <!-- Ceci est mo header -->
    <?php
        require 'header.php';
    ?>

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
