<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'config.php';


use App\User;

$user = new User($db);
$user->logout();

// Redirect to the login page or any other appropriate page
header('Location: login.php');
exit();

