<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Inclure le fichier contenant la classe Member
require_once "config.php";
require_once "createBillet.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des billets</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="ajout">
        <div class="entete">
            <h1>Gestion de réservation des billets</h1>
        </div>
        
        <!-- Formulaire d'ajout de billet -->
        <h2>Ajouter un nouveau billet</h2>
        <form action="createBillet.php" method="POST">

            <label for="depart">Départ :</label><br>
            <input type="text" name="depart" id="depart" required><br>
            
            <label for="destination">Destination :</label><br>
            <select name="destination" id="destination" required><br>
            <option value="">Sélectionnez la destination</option>
            <!-- On utilisez PHP pour générer les options à partir des données de la table destination -->
            <?php
            foreach ($liste_destination as $destination) {
            echo "<option value=\"{$destination['id']}\">{$destination['nom_ville']}</option>";
            }
            ?>
            </select><br> 

            <label for="date_depart">Date de Départ :</label><br>
            <input type="date" name="date_depart" id="date_depart" required><br>
            
            <label for="date_arrivee">Date d'arrivée :</label><br>
            <input type="date" name="date_arrivee" id="date_arrivee" required><br>

            <label for="prix">Prix :</label><br>
            <input type="int" name="prix" id="prix" required><br>

            <label for="statut">Statut :</label><br>
            <select name="statut" id="statut" required>
                <option value="En Attente">En Attente</option>
                <option value="Confirmé">Confirmé</option>
            </select><br>
            <input type="submit" name="submit" value="Ajouter le billet">
        </form>
    </section>

    
    <section class="liste">
        <!-- Afficher les billets -->
        <h2>Liste des billets</h2>
        <table>
            <tr>
                <th>Départ</th>
                <th>Destination</th>
                <th>Date de Départ</th>
                <th>Date d'Arrivée</th>
                <th>Prix</th>
                <th>Statut</th>
                <th>Date de la Résertion</th>
                <!--<th>Nom du client</th>
                <th>Prénom du client</th>
                <th>Numéro de téléphone</th>
                <th>Adresse</th>
                <th>Email</th> -->
                <th>Action</th>
            </tr>
            <?php
            // Récupérer et afficher les billets
            
            foreach ($resultats as $billet) {
                echo "<tr>";
                echo "<td>" . $billet['depart'] . "</td>";
                echo "<td>" . $billet['nom_ville'] . "</td>";
                echo "<td>" . $billet['date_depart'] . "</td>";
                echo "<td>" . $billet['date_arrivee'] . "</td>";
                echo "<td>" . $billet['prix'] . "</td>";
                echo "<td>" . $billet['statut'] . "</td>";
                echo "<td>" . $billet['date_reservation'] . "</td>";
                //echo "<td>" . $billet['nom'] . "</td>"; 
                //echo "<td>" . $billet['prenom'] . "</td>"; 
                //echo "<td>" . $billet['tel'] . "</td>"; 
                //echo "<td>" . $billet['adresse'] . "</td>"; 
                //echo "<td>" . $billet['email'] . "</td>";  
                echo "<td><span class='btnmodifier'><a href='updateBillet.php?id=" . $billet['id'] . "' >Modifier</a></span> | <span class='btnsupprimer'><a href='deleteBillet.php?id=" . $billet['id'] . "'>Supprimer</a></span></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </section>
</body>
</html>
