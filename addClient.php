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
</head>
<body>
    

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

