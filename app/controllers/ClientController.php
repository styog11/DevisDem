<?php
require_once __DIR__ . '/../controllers/BaseController.php';
require_once __DIR__ . '/../models/ClientModel.php';
class ClientController extends BaseController
{
    private $clientModel;

    public function __construct()
    {
        $this->clientModel = $this->loadModel('Client');
    }

    public function index()
    {
        $clients = $this->clientModel->getAllClients();
        $this->render('client/index', ['clients' => $clients]);
    }

    public function view($id)
    {
        $client = $this->clientModel->getClientById($id);
        if ($client) {
            $this->render('client/view', ['client' => $client]);
        } else {
            // Handle client not found
            header("HTTP/1.0 404 Not Found");
            echo "Client not found.";
        }
    }
}

?>