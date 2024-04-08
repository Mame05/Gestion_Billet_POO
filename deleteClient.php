<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.php'; 
require_once 'client.php';

// Créer une instance de la classe Client
$client = new Client($bdd, $nom, $prenom, $tel, $adresse, $email);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $client->deleteClient($id);
}
?>