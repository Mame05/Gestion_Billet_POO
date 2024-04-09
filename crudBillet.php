<?php
interface CRUD_BILLET
{
    public function createBillet($depart,$id_destination,$date_depart,$date_arrivee,$prix,$statut);
    public function readBillet();
    public function updateBillet($id,$depart,$id_destination,$date_depart,$date_arrivee,$prix,$statut);
    public function deleteBillet($id);
}
?>