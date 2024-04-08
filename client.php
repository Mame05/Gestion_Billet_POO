<?php
require_once 'crudClient.php';

    class Client implements CRUD {

        private $bdd;
        private $nom;
        private $prenom;
        private $tel;
        private $adresse;
        private $email;

        public function __construct($bdd, $nom, $prenom, $tel, $adresse, $email) {

            $this->bdd = $bdd;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->tel = $tel;
            $this->adresse = $adresse;
            $this->email = $email;

        }

        public function getNom() {
            return $this->nom;
        }

        public function setNom($nouveauNom) {
            $this->nom = $nouveauNouveau;
        }

        public function getPrenom() {
            return $this->prenom;
        }

        public function setPrenom($nouveauPrenom) {
            $this->prenom = $nouveauPrenom;
        }

        public function getTel() {
            return $this->tel;
        }

        public function setTel($nouveauTel) {
            $this->tel = $nouveauTel;
        }

        public function getAdresse() {
            return $this->adresse;
        }

        public function setAdresse($nouveauAdresse) {
            $this->adresse = $nouveauAdresse;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($nouveauEmail) {
            $this->email = $nouveauEmail;
        }

        // Méthode d'ajout de client
        public function createClient($nom, $prenom, $tel, $adresse, $email) {

            try {

                $stmt = $this->bdd->prepare("INSERT INTO client (nom, prenom, tel, adresse, email) VALUES (:nom, :prenom, :tel, :adresse, :email)");

                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':tel', $tel);
                $stmt->bindParam(':adresse', $adresse);
                $stmt->bindParam(':email', $email);

                $stmt->execute();

                header('location: view_client.php');
                exit;

            } catch(PDOException $e) {
                die("Impossible d'insérer les données dans la base : ".$e->getMessage());
            }
        }  

        public function readClient() {

            try{

                $sth->execute("SELECT * FROM client");
                $sth->execute();

                //Récupération des résultats
                $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
                return $resultat;
            
            } catch(PDOException $e) {
                die("Impossible d'afficher les données de la base : ".$e->getMessage());
            }
        }

        public function updateClient($id, $nom, $prenom, $tel, $adresse, $email) {
            try {
                $stmt = $this->bdd->prepare("UPDATE client SET nom = :nom, prenom = :prenom, tel = :tel, adresse = :adresse, email = :email WHERE id = :id");
        
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':tel', $tel);
                $stmt->bindParam(':adresse', $adresse);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':id', $id);
        
                $stmt->execute();
        
                header('location: view_client.php');
                exit;
            } catch(PDOException $e) {
                die("Impossible de modifier les données du client : ".$e->getMessage());
            }
        }
        

        public function deleteClient($id) {

            try {
    
                $sth = $this->bdd->prepare("DELETE FROM client WHERE id = :id");
    
                $sth->bindParam(':id', $id, PDO::PARAM_INT);
                $sth->execute();
    
                header('location: view_client.php');
                exit;
    
            } catch(PDOException $e) {
                die("Impossible de supprimer le client : ".$e->getMessage());
            }
        }
    
    
    
    
    
    
    }