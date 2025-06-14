<?php
require_once __DIR__ . '/../controllers/BaseController.php';
require_once __DIR__ . '/../models/ClientModel.php';
class HomeController extends BaseController
{
    public function index()
    {
        $client = new ClientModel();
        $allClientsCount = $client->fetch("SELECT COUNT(*) FROM clients")['COUNT(*)'];
        $newClientsCount = $client->fetch("SELECT COUNT(*) FROM clients WHERE FIND_IN_SET('3', status_ids) > 0")['COUNT(*)'];
        if ($allClientsCount == 0) {
            $roundedNewClientsCount = 0;
        } else {
            $roundedNewClientsCount = round(($newClientsCount / $allClientsCount) * 100, 2);
            $clients = $client->fetchAll("SELECT * FROM clients ORDER BY date_devis DESC LIMIT 4");
        }
        $this->render('home/index', [
            'clientCount' => $allClientsCount,
            'newClientsCount' => $newClientsCount,
            'roundedNewClientsCount' => $roundedNewClientsCount,
            'clients' => $clients ?? [],
        ]);
    }
}