<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//inclusion du fichier de connexion
require_once "config.php"; 

// Script pour récupérer les données de la table destination
$sql_destination = "SELECT id, nom_ville FROM destination";
$stmt_destination = $bdd->query($sql_destination );
$liste_destination  = $stmt_destination ->fetchAll(PDO::FETCH_ASSOC);

//verifier si le formulaire a été soumis
if(isset($_POST['submit'])){

    //recuperation des données
    $depart = $_POST['depart'];
    $date_depart = $_POST['date_depart'];
    $date_arrivee = $_POST['date_arrivee'];
    $prix = $_POST['prix'];
    $statut = $_POST['statut'];
    // Récupérer les valeurs sélectionnées de la destination
    $id_destination = $_POST['destination'];
    

    //verifier si les champs ne sont pas vide 
    if($depart !="" && $id_destination !="" && $date_depart !="" && $date_arrivee !="" && $prix !="" && $statut !=""){
        //appel de la methode
        $billet->createBillet($depart,$id_destination,$date_depart,$date_arrivee,$prix,$statut);
    }
}
?>