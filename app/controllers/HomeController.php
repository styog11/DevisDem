<?php
require_once __DIR__ . '/../controllers/BaseController.php';
require_once __DIR__ . '/../models/ClientModel.php';
class HomeController extends BaseController
{
    public function index()
    {
        $client = new ClientModel();
        // Load the home view
        $this->render('home/index');
    }
}