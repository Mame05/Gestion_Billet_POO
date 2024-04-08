<?php
    require_once 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veiw Client</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="containerClient">
        <div class="container-head">
            <h1>Liste des clients</h1>
            <span class="ajoutbtn">
                <a href="#">Ajouter un client</a>
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
                    foreach($resultat as $client) {
                        echo "<tr>";
                        echo "<td>" . $client['id'] . "</td>";
                        echo "<td>" . $client['nom'] . "</td>";
                        echo "<td>" . $client['prenom'] . "</td>";
                        echo "<td>" . $client['tel'] . "</td>";
                        echo "<td>" . $client['adresse'] . "</td>";
                        echo "<td>" . $client['email'] . "</td>";    
                        echo "<td><i class='fa-regular fa-eye'><a href='detailClient.php?id=" . $membre['id'] . "' ></a></i> | <i class='fa-solid fa-pencil'><a href='updateClient.php?id=" . $membre['id'] . "'>Modifier</a></i> | <i class='fa-regular fa-trash-can'><a href='delete.php?id=" . $membre['id'] . "'>Supprimer</a></i></td>";
                        echo "</tr>";
                    }
                    
                
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>