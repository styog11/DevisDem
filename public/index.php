<?php
// Start session for mobile app state management
session_start();

// Mobile detection
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

// Set mobile context
define('IS_MOBILE', isMobile());

// Basic routing for mobile-first SPA approach
$request = $_GET['route'] ?? 'home';
$action = $_GET['action'] ?? 'index';

// Load appropriate controller
switch($request) {
    case 'home':
    default:
        require_once '../app/controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;
        
    case 'clients':
        require_once '../app/controllers/ClientController.php';
        $controller = new ClientController();
        $controller->index();
        // switch($action) {
        //     case 'create':
        //         $controller->create();
        //         break;
        //     case 'store':
        //         $controller->store();
        //         break;
        //     case 'edit':
        //         $controller->edit($_GET['id'] ?? null);
        //         break;
        //     case 'update':
        //         $controller->update($_GET['id'] ?? null);
        //         break;
        //     case 'delete':
        //         $controller->delete($_GET['id'] ?? null);
        //         break;
        //     default:
        //         $controller->index();
        //         break;
        // }
        // break;
}
?>

