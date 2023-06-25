<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\User;

// Check if the user is authenticated
function authenticate()
{
    if (!User::isAuthenticated()) {
        header('Location: login.php');
        exit();
    }
}
