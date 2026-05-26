<?php

require_once __DIR__ . '/../Models/Users.php';
class UsersRepository {
    private array $users = [];

    public function __construct() {
        // Initialize with some dummy users
        $this->users = [
            new Users(1, 'admin', 'admin123'),
            new Users(2, 'user1', 'user123'),
            new Users(3, 'user2', 'user123')
        ];
    }

    public function getUserByUsername(string $username): ?Users {
        foreach ($this->users as $user) {
            if ($user->getUsername() === $username) {
                return $user;
            }
        }
        return null; // User not found
    }
}

// use getUserByUsername to retrieve a user and password 'admin'
// $usersRepo = new UsersRepository();
// $user = $usersRepo->getUserByUsername('admin');
// if ($user) {
//     echo "Username: " . $user->getUsername() . "\n";
//     echo "Password: " . $user->getPassword() . "\n";
// } else {
//     echo "User not found.\n";
// }