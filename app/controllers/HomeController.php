<?php

require_once '../models/BaseModel.php';

class HomeController extends BaseController
{
    public function index()
    {
        // Load the home view
        $this->render('home/index');
    }
}