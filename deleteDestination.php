<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    require_once "config.php"; 
    require_once 'destination.php';

    // Créer une instance de la classe Client
    $destination = new Destination($bdd, $nomVille);

    // Vérifier si un identifiant a été fourni et si l'idention est un nombre
    if (isset($_GET['id'])){
        $id = $_GET['id'];

        $destination->deleteDestination($id);
    }
?>
