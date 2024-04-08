<?php
interface CRUD_CLIENT
{
    public function createClient($nom,$prenom,$tel,$adresse,$email);
    public function readClient();
    public function updateClient($id,$nom,$prenom,$tel,$adresse,$email);
    public function deleteClient($id);
}
?>