<?php
interface CRUD
{
    public function createDestination($nomVille);
    public function readDestination();
    public function updateDestination($id, $nomVille);
    public function deleteDestination($id);
}
?>
