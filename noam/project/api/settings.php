<?php
// Database connection settings
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'oracle_user');
define('DB_PASSWORD', 'X?0*35^3lcp?');
define('DB_NAME', 'oracle_db');

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the 'users' table exists, create it if it doesn't
    $tableCheckQuery = "
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        mailaddress VARCHAR(255) UNIQUE NOT NULL,
        userpassword VARCHAR(255) NOT NULL
    );
    ";
    $pdo->exec($tableCheckQuery);
} catch (PDOException $e) {
    die("ERROR: Could not connect to the database. " . $e->getMessage());
}
?>