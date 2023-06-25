<?php

namespace App;

class User
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function checkAdminUser()
    {
        $query = "SELECT COUNT(*) FROM users";
        $stmt = $this->db->query($query);
        $userCount = $stmt->fetchColumn();

        return ($userCount > 0);
    }

    public function createAdminUser()
    {
        $username = 'admin';
        $password = 'admin';

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'username' => $username,
            'password' => $hashedPassword,
        ]);
    }

    public function authenticateUser($username, $password)
    {
        $query = "SELECT password FROM users WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['username' => $username]);

        $row = $stmt->fetch();

        if ($row && password_verify($password, $row['password'])) {
            return true; // Authentication successful
        }

        return false; // Authentication failed
    }

    public function logout()
    {
        session_start();
        session_destroy();
    }

    public static function isAuthenticated()
    {
        return isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;
    }   
}
