<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'config.php';
require_once 'client.php';

// Vérifier si le formulaire a été soumis
if(isset($_POST['submit'])) {
    // Récupérer les valeurs du formulaire
    $id = $_GET['id']; // Récupérer l'ID du client à partir de l'URL
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];

    // Appeler la méthode updateClient du CRUD
    $client = new Client($bdd, null, null, null, null, null); // Créer une instance de la classe Client
    $client->updateClient($id, $nom, $prenom, $tel, $adresse, $email);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un client</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
        }

        .champs {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

        <!-- Ceci est mo header -->
        <?php
            require 'header.php';
        ?>

    <div class="container">
        <?php
            // Récupérer les données du client à mettre à jour
            if(isset($_GET['id'])) {
                $id = $_GET['id'];

                try {
                    // Préparer la requête SQL
                    $sql = "SELECT * FROM client WHERE id = :id";
                    $sth = $bdd->prepare($sql);

                    $sth->bindParam(':id', $id, PDO::PARAM_INT);
                    $sth->execute();

                    $client = $sth->fetch(PDO::FETCH_ASSOC);

                    // Vérifier si le client existe
                    if(!$client) {
                        die("Client non trouvé.");
                    }
                } catch(PDOException $e) {
                    die("Erreur lors de la récupération des données du client : " . $e->getMessage());
                }
            } else {
                die("ID du client non spécifié.");
            }
        
        
        ?>
        <form action="updateClient.php?id=<?php echo $id;?>" method="post">
            <h1>Modifier un client</h1>
            <div class="champs">
                <label for="nom">Nom :</label><br>
                <input type="text" id="nom" name="nom" value="<?php echo $client['nom']; ?>" required>
            </div>
            <div class="champs">
                <label for="prenom">Prénom :</label><br>
                <input type="text" id="prenom" name="prenom" value="<?php echo $client['prenom']; ?>" required>
            </div>
            <div class="champs">
                <label for="tel">Téléphone :</label><br>
                <input type="tel" id="tel" name="tel" value="<?php echo $client['tel']; ?>" required>
            </div>
            <div class="champs">
                <label for="adresse">Adresse :</label><br>
                <input type="text" id="adresse" name="adresse" value="<?php echo $client['adresse']; ?>" required>
            </div>
            <div class="champs">
                <label for="email">Email :</label><br>
                <input type="email" id="email" name="email" value="<?php echo $client['email']; ?>" required>
            </div>
            <div class="champs">
                <input type="submit" value="Modifier" name="submit">
            </div>
        </form>
    </div>
    
</body>
</html>
