<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "crudBillet.php";

//création de la class Billet
class Billet implements CRUD_BILLET
{
    //Proprietés privées
    private $bdd;
    private $depart;    
    private $id_destination;
    private $date_depart;
    private $date_arrivee;
    private $prix;
    private $statut;
    private $date_reservation;
    private $id_client;


    //creation de la methode construct
    public function __construct($bdd,$depart,$id_destination,$date_depart,$date_arrivee,$prix,$statut,$date_reservation,$id_client)
    {
        $this->bdd=$bdd;
        $this->depart=$depart;
        $this->id_destination=$id_destination;
        $this->date_depart=$date_depart;
        $this->date_arrivee=$date_arrivee;
        $this->prix=$prix;
        $this->statut=$statut;
        $this->date_reservation=$date_reservation;
        $this->id_client=$id_client;

    }

    //les methodes getters et setters
    public function  getDepart()
    {
        return $this->depart;
    }
    public function setDepart($nouveauDepart)
    {
        $this->depart=$nouveauDepart;
    }

    public function  getDestination()
    {
        return $this->id_destination;
    }
    public function setDestination($nouveauDestination)
    {
        $this->id_destination=$nouveauDestination;

    }

    public function  getDateDepart()
    {
        return $this->date_depart;
    }
    public function setDateDepart($nouveauDateDepart)
    {
        $this->date_depart=$nouveauDateDepart;
    }

    public function  getDateArrivee()
    {
        return $this->date_arrivee;
    }
    public function setDateArrivee($nouveauDateArrivee)
    {
        $this->date_arrivee=$nouveauDateArrivee;
    }

    public function  getPrix()
    {
        return $this->prix;
    }
    public function setPrix($nouveauPrix)
    {
        $this->prix=$nouveauPrix;
    
    }
    public function  getStatut()
    {
        return $this->statut;
    }
    public function setStatut($nouveauStatut)
    {
        $this->statut=$nouveauStatut;
    }
    public function  getDateReservation()
    {
        return $this->date_reservation;
    }
    public function setTranche_age($nouveauDateReservation)
    {
        $this->date_reservation=$nouveauDateReservation;
    }
    public function  getClient()
    {
        return $this->id_client;
    }
    public function setClient($nouveauClient)
    {
        $this->id_client=$nouveauClient;

    }


    
   
    //Methode pour ajouter des Billets
    public function createBillet($depart,$id_destination,$date_depart,$date_arrivee,$prix,$statut,$date_reservation,$id_client)
    {
        try {
            //requete pour inserer
            $sql= "INSERT INTO billet(depart,id_destination,date_depart,date_arrivee,prix,statut,date_reservation,id_client) VALUES(:depart,:destination,:date_depart,:date_arrivee,:prix,:statut,:date_reservation,:client,)";
    
               //preparation de la requete
            $stmt=$this->bdd->prepare($sql);
    
            //faire la liaison des valeurs aux paramètres
            $stmt->bindParam(':depart',$depart, PDO::PARAM_STR);
            $stmt->bindParam(':destination',$id_destination, PDO::PARAM_INT);
            $stmt->bindParam(':date_depart',$date_depart, PDO::PARAM_STR);
            $stmt->bindParam(':date_arrivee',$date_arrivee, PDO::PARAM_STR);
            $stmt->bindParam(':prix',$prix, PDO::PARAM_INT);
            $stmt->bindParam(':statut',$statut, PDO::PARAM_STR);
            $stmt->bindParam(':date_reservation',$date_reservation, PDO::PARAM_STR);
            $stmt->bindParam(':client',$id_client, PDO::PARAM_INT);
    
            //execute la requete
    
            $stmt->execute();
    
            //rediriger la page 
            header("location: index.php");
            exit();
    
    
        } catch (PDOException $e) {
            die("erreur: impossible d'inserer des données" .$e->getMessage());
        }
    }

    //Methode pour afficher les billets
    public function readBillet()
    {
        try {
            //requete sql pour selectionner tout les membres
            $sql="SELECT b.*, c.nom,prenom,tel,adresse,email, d.nom_ville FROM billet b 
            LEFT JOIN destination d ON b.id_destination = d.id 
            LEFT JOIN client c ON b.id_client = c.id";

            //preparation de la requete
            $stmt=$this->bdd->prepare($sql);

            //exécution de la requete
            $stmt->execute();

            //recuperation des resultats
            $resultats=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultats;
        } 
        catch (PDOException $e) {
            die("erreur:Impossible d'afficher les billets" .$e->getMessage());
        }
    }

    //Methode pour modifier les billets
    public function updateBillet($id,$depart,$id_destination,$date_depart,$date_arrivee,$prix,$statut,$date_reservation)
    {
        try{

            //J'écris la requete qui va me permettre de modifier un billet
            $sql = "UPDATE billet SET depart=:depart, id_destination=:destination, date_depart=:date_depart, date_arrivee=:date_arrivee, pris=:prix, statut=:statut, date_reservation=:date_reservation WHERE id=:id";

            //Je prépare la requete
            $stmt=$this->bdd->prepare($sql);

            //Je lis les valeurs aux paramètres
            $stmt->bindParam(':depart',$depart);
            $stmt->bindParam(':destination',$id_destination);
            $stmt->bindParam(':date_depart',$date_depart);
            $stmt->bindParam(':date_arrivee',$date_arrivee);
            $stmt->bindParam(':prix',$prix);
            $stmt->bindParam(':statut',$statut);
            $stmt->bindParam(':date_reservation',$date_reservation);

            //J'execute la requete
            $stmt->execute();

            //Si la modification passe
            return true;

            //Je fait une redirection vers la page index
            header('location: index.php');
            exit;

        } catch(PDOException $e) {
            die("Erreur : Impossible de modifier le billet" .$e->getMessage());
        }
    }

    //methode pour supprimer les billets
    public function deleteBillet($id)
   {
        try{
            // Préparez votre requête de suppression
           $sql = "DELETE  FROM billet WHERE id = :id";

            //Préparer la requête
            $stmt = $this->bdd->prepare($sql);

            //Faire la liaison des valeurs aux paramètres
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Exécutez la requête
            $stmt->execute();

            //rediriger la page 
            header("location: index.php");
            exit();
        } catch (PDOException $e){
            die("Identifiant invalide" .$e->getMessage());
        }
   }
}