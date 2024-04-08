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

// Script pour récupérer les données de la table client
$sql_client = "SELECT id, nom, prenom, tel, adresse, email FROM client";
$stmt_client = $bdd->query($sql_client);
$liste_client = $stmt_client->fetchAll(PDO::FETCH_ASSOC);


//verifier si le formulaire a été soumis
if(isset($_POST['submit'])){

    //recuperation des données
    $depart = $_POST['depart'];
    $date_depart = $_POST['date_depart'];
    $date_arrivee = $_POST['date_arrivee'];
    $prix = $_POST['prix'];
    $statut = $_POST['statut'];
    $date_reservation = $_POST['date_reservation'];
    // Récupérer les valeurs sélectionnées du destination et du client
    $id_destination = $_POST['destination'];
    $id_client = $_POST['client'];
    

    //verifier si les champs ne sont pas vide 
    if($depart !="" && $id_destination !="" && $date_depart !="" && $date_arrivee !="" && $prix !="" && $statut !="" && $date_reservation !="" && $id_client !=""){
        //appel de la methode
        $billet->createBillet($depart,$id_destination,$date_depart,$date_arrivee,$prix,$statut,$date_reservation,$id_client);
    }
}
?>