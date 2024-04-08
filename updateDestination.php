<?php
require_once 'config.php';
require_once 'destination.php';


if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les données de la destination avec l'identifiant spécifié
    $stmt = $bdd->prepare("SELECT * FROM destination WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $destination = $stmt->fetch(PDO::FETCH_ASSOC);
}

if(isset($_POST['submit'])) {
    $nom_ville = $_POST['nom_ville'];

    if(!empty($nom_ville)) {
        try{
            $destination->updateDestination($id, $nom_ville);
        } catch(PDOException $e) {
            echo "Erreur lors de la modification de la destination : " . $e->getMessage();
        }
    } else {
        echo "Le champ Nom de la ville est requis.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une destination</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Ajoutez votre style CSS ici */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h1 {
            margin-bottom: 20px;
        }

        .champs {
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"], input[type="email"], input[type="tel"] {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <!-- Ceci est mon header -->
    <?php
        require 'header.php';
    ?>

    <div class="container">
        <h1>Modifier une destination</h1>
        <!-- Formulaire pour la mise à jour -->
        <!-- Remplacez les valeurs statiques par les données récupérées depuis la base de données -->
        <form action="updateDestination.php?id=<?php echo $id;?>" method="post">
            <div class="champs">
                <label for="nom_ville">Nom de la ville :</label><br>
                <input type="text" id="nom_ville" name="nom_ville" value="<?php echo $destination['nom_ville']; ?>" required>
            </div>
            <div class="champs">
                <input type="submit" value="Modifier" name="submit">
            </div>
        </form>
    </div>
    
</body>
</html>
