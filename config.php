<?php
session_start();
// Database Configuration
$host = 'localhost'; 
$dbName = 'prioris'; 
$username = 'root'; 
$password = ''; 

// Establish Database Connection
try {
    $db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8mb4", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
