<?php
require_once __DIR__ . '/../models/BaseModel.php';
class ClientModel extends BaseModel
{
    public function getAllClients()
    {
        $sql = "SELECT * FROM clients";
        return $this->fetchAll($sql);
    }

    public function getClientById($id)
    {
        $sql = "SELECT * FROM clients WHERE id = :id";
        $params = [':id' => $id];
        return $this->fetch($sql, $params);
    }
}
?>