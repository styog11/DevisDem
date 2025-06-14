<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'devisdem');
define('DB_USER', 'root');

try {
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $createStatusTableSQL = "
    CREATE TABLE IF NOT EXISTS `status` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(100) NOT NULL,
        `description` varchar(255) DEFAULT NULL,
        `color` varchar(7) DEFAULT '#6c757d',
        `is_active` boolean DEFAULT true,
        `sort_order` int(11) DEFAULT 0,
        `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        UNIQUE KEY `unique_name` (`name`),
        INDEX `idx_is_active` (`is_active`),
        INDEX `idx_sort_order` (`sort_order`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
    
    $pdo->exec($createStatusTableSQL);
    
    $insertStatusSQL = "
    INSERT IGNORE INTO `status` (`id`, `name`, `description`, `color`, `sort_order`) VALUES
    (2, 'TEST', 'Statut de test', '#6c757d', 1),
    (3, 'new', 'Nouveau', '#17a2b8', 2),
    (4, 'st 01', 'Statut 01', '#28a745', 3),
    (5, 'nouveau client', 'Nouveau client', '#007bff', 4),
    (7, 'NRP', 'Ne répond pas', '#ffc107', 5),
    (8, 'devis envoyé', 'Devis envoyé au client', '#fd7e14', 6),
    (9, 'rappelé', 'Client rappelé', '#20c997', 7),
    (10, 'confirmé', 'Devis confirmé', '#28a745', 8),
    (11, 'contesté', 'Devis contesté', '#dc3545', 9)";
    
    $pdo->exec($insertStatusSQL);
    
     $createTableSQL = "
    CREATE TABLE IF NOT EXISTS `clients` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL,
        `date_devis` date NOT NULL,
        `tel` varchar(20) DEFAULT NULL,
        `email` varchar(255) DEFAULT NULL,
        `status_ids` varchar(255) DEFAULT '3',
        `date_depart_type` enum('fixed', 'flexible') DEFAULT 'flexible',
        `date_depart` date DEFAULT NULL,
        `date_depart1` date DEFAULT NULL,
        `date_arrive_type` enum('fixed', 'flexible') DEFAULT 'flexible',
        `date_arrive` date DEFAULT NULL,
        `date_arrive1` date DEFAULT NULL,
        `adress_depart` text DEFAULT NULL,
        `ville_depart` varchar(100) DEFAULT NULL,
        `adress_arrive` text DEFAULT NULL,
        `ville_arrive` varchar(100) DEFAULT NULL,
        `habitation_depart` enum('Maison', 'Appartement', 'Villa', 'Box') DEFAULT 'Maison',
        `floor_depart` varchar(10) DEFAULT NULL,
        `elevator_depart` boolean DEFAULT false,
        `habitation_arrive` enum('Maison', 'Appartement', 'Villa', 'Box') DEFAULT 'Maison',
        `floor_arrive` varchar(10) DEFAULT NULL,
        `elevator_arrive` boolean DEFAULT false,
        `volume` varchar(50) DEFAULT NULL,
        `formule` enum('Économique', 'Économique plus', 'Solo', 'Confort', 'Clé en main') DEFAULT 'Économique',
        `prix_ttc` decimal(10,2) DEFAULT NULL,
        `pourcentage_arrhes` decimal(5,2) DEFAULT NULL,
        `montant_arrhes` decimal(10,2) DEFAULT NULL,
        `observation` text DEFAULT NULL,
        `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        INDEX `idx_name` (`name`),
        INDEX `idx_date_devis` (`date_devis`),
        INDEX `idx_email` (`email`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
    
    $pdo->exec($createTableSQL);
    
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
?>