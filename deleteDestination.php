<?php
    require_once "config.php"; 
    require_once 'client.php';

    // Créer une instance de la classe Client
    // $client = new Client($bdd, $nom, $prenom, $tel, $adresse, $email);

    // Vérifier si un identifiant a été fourni et si l'idention est un nombre
    if (isset($_GET['id'])){
        $id = $_GET['id'];

        $destination->deleteDestination($id);
    }
?>
