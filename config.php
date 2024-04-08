<?php

    define("SERVER", "localhost");
    define("DBNAME", "Gestion_Billet_POO");
    define("USER", "root");
    define("PASS", "");

    try {

        $bdd = new PDO("mysql:host=".SERVER.";dbname=".DBNAME,USER,PASS);
        // $billet = new Billet($bdd);

        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Erreur de connexion : ".$e->getMessage());
    }