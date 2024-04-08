<?php
require_once 'crudDestination.php'; // Inclure le fichier contenant l'interface CRUD

class Destination implements CRUD {

    private $bdd;
    private $nomVille;

    public function __construct($bdd, $nomVille) {
        $this->bdd = $bdd;
        $this->nomVille = $nomVille;
    }

    public function getNomVille() {
        return $this->nomVille;
    }

    public function setNomVille($nouveauNomVille) {
        $this->nomVille = $nouveauNomVille;
    }

    // Méthode d'ajout de destination
    public function createDestination($nomVille) {
        try {
            $stmt = $this->bdd->prepare("INSERT INTO destination (nom_ville) VALUES (:nomVille)");
            $stmt->bindParam(':nomVille', $nomVille);
            $stmt->execute();
            header('location: view_destination.php');
            exit;
        } catch(PDOException $e) {
            die("Impossible d'insérer les données dans la base : ".$e->getMessage());
        }
    }  

    public function readDestination() {
        try {
            $stmt = $this->bdd->prepare("SELECT * FROM destination");
            $stmt->execute();
            $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch(PDOException $e) {
            die("Impossible d'afficher les données de la base : ".$e->getMessage());
        }
    }

    public function updateDestination($id, $nomVille) {
        try {
            $stmt = $this->bdd->prepare("UPDATE destination SET nom_ville = :nomVille WHERE id = :id");
            $stmt->bindParam(':nomVille', $nomVille);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            header('location: view_destination.php');
            exit;
        } catch(PDOException $e) {
            die("Impossible de modifier les données de la destination : ".$e->getMessage());
        }
    }

    public function deleteDestination($id) {
        try {
            $stmt = $this->bdd->prepare("DELETE FROM destination WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            header('location: view_destination.php');
            exit;
        } catch(PDOException $e) {
            die("Impossible de supprimer la destination : ".$e->getMessage());
        }
    }
}
?>
