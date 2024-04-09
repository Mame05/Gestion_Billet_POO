<?php
//inclusion du fichier de la classe Billet
require_once "Billet.php"; 

define("SERVER", "localhost");
define("DBNAME", "Gestion_Billet_POO");
define("USER", "root");
define("PASS", "");

try {
        $bdd = new PDO("mysql:host=".SERVER.";dbname=".DBNAME,USER,PASS);
        $billet = new Billet($bdd,"Dakar","Paris","2024-04-05","2024-04-06","350000","Confirmé","2024-04-02","fatou");
        //Appel de la méthode d'affichage
        $resultats= $billet->readBillet();
        //$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur de connexion : ".$e->getMessage());
}
?>
