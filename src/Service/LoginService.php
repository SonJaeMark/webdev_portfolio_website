<?php

// 1. Move require_once statements to the top of the file
require_once __DIR__ . '/../Repository/UsersRepository.php';
require_once __DIR__ . '/../Models/Users.php';

class LoginService {
    private UsersRepository $usersRepo;
    
    public function __construct(UsersRepository $usersRepo) {
        $this->usersRepo = $usersRepo;
        
        // Start the session automatically if it hasn't been started yet
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Authenticate user credentials
     */
    public function login(string $username, string $password): bool {
        $user = $this->usersRepo->getUserByUsername($username);
        
        if (!$user) {
            return false; // User not found
        }
        
        // FIX: Pass the raw, plain-text $password into password_verify. 
        // Do NOT use password_hash() on it beforehand.
        if (!password_verify($password, $user->getPassword())) {
            return false; // Invalid password
        }
        
        // Store user state in session
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $user->getUsername();
        
        return true;
    }

    /**
     * End admin session
     */
    public function logout(): void {
        // Clear session variables
        $_SESSION = [];
        
        // Destroy the session cookie if it exists
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        
        // Destroy the session
        session_destroy();
    }

    /**
     * Check if admin is logged in
     */
    public function isAuthenticated(): bool {
        return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
    }
}

// === TESTING LOGIC ===

// $db = require_once __DIR__ . '/../../config/database.php'; 
// $usersRepo = new UsersRepository($db);
// $loginService = new LoginService($usersRepo);

// // Test the login
// if ($loginService->login('admin', 'admin123')) {
//     echo "Login successful!\n";
    
//     // Test if system remembers authentication state
//     if ($loginService->isAuthenticated()) {
//         echo "User is authenticated session-wise.\n";
//     }
    
//     // Test logout
//     $loginService->logout();
//     echo "Logged out.\n";
// } else {
//     echo "Login failed. Ensure 'admin' exists and its password is securely hashed in the database.\n";
// }
