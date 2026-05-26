<?php

require_once __DIR__ . '/../Models/Users.php';

class UsersRepository {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    /**
     * Fetch a user by their username from XAMPP MySQL database.
     */
    public function getUserByUsername(string $username): ?Users {
        $stmt = $this->db->prepare('SELECT id, username, password FROM users_tbl WHERE username = :username LIMIT 1');
        $stmt->execute(['username' => $username]);
        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        return new Users(
            (int)$row['id'],
            $row['username'],
            $row['password']
        );
    }
}

// === FIX IS HERE ===

// 1. Load the database file
$db = require_once __DIR__ . '/../../config/database.php'; 

// 2. Double-check that $db is actually a PDO object, not an integer
if (!$db instanceof PDO) {
    die("Error: config/database.php did not return a valid PDO instance.\n");
}

// 3. Pass the valid connection into the repository
$usersRepo = new UsersRepository($db);
$user = $usersRepo->getUserByUsername('admin');

if ($user) {
    echo "Username: " . $user->getUsername() . "\n";
    echo "Password: " . $user->getPassword() . "\n";
} else {
    echo "User not found.\n";
}
