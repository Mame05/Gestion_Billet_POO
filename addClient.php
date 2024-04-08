<?php
require_once 'config.php';

if(isset($_POST['submit'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];

    if(!empty($nom) && !empty($prenom) && !empty($tel) && !empty($adresse) && !empty($email)) {

        try{

            $stmt = $bdd->prepare("INSERT INTO client (nom, prenom, tel, adresse, email) VALUES (:nom, :prenom, :tel, :adresse, :email)");

            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':tel', $tel);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':email', $email);

            $stmt->execute();

            header('location: view_client.php');
            exit;
        } catch(PDOException $e) {
            die("Erreur lors de l'ajout du client : " . $e->getMessage());
        }

    } else {
        echo "Tous les champs sont requis.";
    }
} else {
    echo "Le formulaire n'a pas été soumis.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'ajout des client</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        form {
            width: 55%;
            margin: 0 auto;
            /* background: white;
            max-width: 500px; */
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .champs {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            display: block;
            max-width: 200px;
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Ceci est mo header -->
    <?php
        require 'header.php';
    ?>

    <div class="conatiner">
        <form action="addClient.php" method="post">
            <h1>Ajouter un client</h1>
            <div class="champs">
                <label for="nom">Nom :</label><br>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="champs">
                <label for="prenom">Prénom :</label><br>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div class="champs">
                <label for="tel">Téléphone :</label><br>
                <input type="tel" id="tel" name="tel" required>
            </div>
            <div class="champs">
                <label for="adresse">Adresse :</label><br>
                <input type="text" id="adresse" name="adresse" required>
            </div>
            <div class="champs">
                <label for="email">Email :</label><br>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="champs">
                <input type="submit" value="Ajouter" name="submit">
            </div>
        </form>
    </div>
</body>
</html>

