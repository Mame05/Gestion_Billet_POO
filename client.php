<?php
require_once 'crudClient.php';

    class Client {

        private $bdd;
        private $nom;
        private $prenom;
        private $tel;
        private $adresse;
        private $email;
    
        public function __construct($bdd,$nom,$prenom,$tel,$adresse,$email) {

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

        // La méthode d'ajout de client
        public function addClient($nom, $prenom, $tel, $adresse, $email) {

            try {

                // Je prépare la requete qui va nous permettre d'insérer des données
                $sth->prepare("INSERT INTO client (nom, prenom, tel, adresse, email) VALUES (:nom, :prenom, :tel, :adresse, :email)");

                $sth->bindParam(':nom', $nom);
                $sth->bindParam(':prenom', $prenom);
                $sth->bindParam(':tel', $tel);
                $sth->bindParam(':adresse', $adresse);
                $sth->bindParam(':email', $email);

                $sth->execute();

                header('location: veiw_client.php');
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

            try{

                $sth->prepare("UPDATE client SET nom = :nom, prenom = :prenom, tel = :tel, adresse = :adresse, email = :email");

                $sth->bindParam(':nom', $nom);
                $sth->bindParam(':prenom', $prenom);
                $sth->bindParam(':tel', $tel);
                $sth->bindParam(':adresse', $adresse);
                $sth->bindParam(':email', $email);
                $sth->bindParam(':id', $id);

                $sth->execute();

                header('location: veiw_client.php');
                exit;

            } catch(PDOException $e) {
                die("Impossible de modifier les données du client : ".$e->getMessage());
            }
        }

        public function deleteClient($id) {

            try {

                $sth->prepare("DELETE FROM client WHERE id = :id");

                $sth->bindParam(':id', $id, PDO::PARAM_INT);
                $sth->execute();

                header('location: veiw_client.php');
                exit;

            } catch(PDOException $e) {
                die("Impossible de supprimer le client : ".$e->getMessage());
            }
        }
    
    
    
    
    
    
    }