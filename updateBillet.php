<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';

//On vérifie dabord que le formulaire est soumis
if(isset($_POST['submit'])) {

    //On recupère les valeurs dans des variables
    $id = $_GET['id'];
    $depart = $_POST['depart'];
    $date_depart = $_POST['date_depart'];
    $date_arrivee = $_POST['date_arrivee'];
    $prix = $_POST['prix'];
    $statut = $_POST['statut'];
    // Récupérer les valeurs sélectionnées de la destination 
    $id_destination = $_POST['destination'];

    //Appel à la fonction updateBillet
    $billet->updateBillet($id,$depart,$id_destination,$date_depart,$date_arrivee,$prix,$statut);

    //On fait une redirection vers indexBillet.php
    header('location: indexBillet.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un billet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="ajout">
        <h1>Réservation de billet</h1>
        <!-- Formulaire d'ajout de billet-->
            <h2>Modifier un billet</h2>
            <?php
                //requete sql pour selectionner les données d'un billet à partir de son id 
                $sql = "SELECT * FROM billet WHERE id = :id";

                //préparation de la requete
                $stmt=$bdd ->prepare($sql);

                //liaison des valeurs aux paramètres
                $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

                //execution de la requete
                if($stmt->execute()){
                    //preparation du resultat
                    $billet=$stmt->fetch(PDO::FETCH_ASSOC);
                    //recuperation des données du billet
                    $id = $billet['id'];
                    $depart = $billet['depart'];
                    $destination = $billet['id_destination'];
                    $date_depart = $billet['date_depart']; 
                    $date_arrivee = $billet['date_arrivee'];
                    $prix = $billet['prix'];
                    $statut = $billet['statut'];  
                    }else{
                        echo "Erreur lors de la recuperation des données";
                    }
        ?>

        <span class="btnretour">

            <a href="indexBillet.php">Retour</a>
        </span>
        <form action="updateBillet.php?id=<?php echo $id;?>" method="POST">
            
            <label for="depart">Départ :</label>
            <input type="text" name="depart" id="depart" value="<?php echo $depart?>"  required><br>

            <label for="destination">Destination :</label><br>
            <select name="destination" id="destination" required>
                    <option value="">Sélectionnez la destination</option>
                    <!-- On utilisez PHP pour générer les options à partir des données de la table destination -->
                <?php
                    //Script pour récupérer les données de la table destination
                    $sql_destination = "SELECT id, nom_ville FROM destination";
                    $stmt_destination = $bdd->query($sql_destination);
                    $liste_destination = $stmt_destination->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($liste_destination as $destination) {
                    echo "<option value=\"{$destination['id']}\">{$destination['nom_ville']}</option>";
                    }
                ?>
           </select><br> 
            
            <label for="date_depart">Date du Départ :</label>
            <input type="date" name="date_depart" id="date_depart" value="<?php echo $date_depart?>"  required><br>

            <label for="date_arrivee">Date de l'Arrivée :</label>
            <input type="date" name="date_arrivee" id="date_arrivee" value="<?php echo $date_arrrivee?>"  required><br>

            <label for="prix">Prix :</label>
            <input type="int" name="prix" id="prix" value="<?php echo $prix?>"  required><br>

            <label for="statut">Statut :</label>
            <select name="statut" id="statut" required>
                <option value="Confirmé" <?php if($statut == "Confirmé"){ echo "selected";}?>>Confirmé</option>
                <option value="Annulé" <?php if($statut == "Annulé"){ echo "selected";}?>>Annulé</option>
            </select><br>
            <input type="submit" name="submit" value="Modifier le billet">
        </form>
    </section>
    
</body>
</html>