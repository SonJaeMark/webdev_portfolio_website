<?php
class LoginService{

    //admin credentials
    public function login(string $username, string $password): bool{
        return true;
    }

    //end admin session
    public function logout(): void{
        return;
    }

    //check if admin is logged in
    public function isAuthenticated(): bool{
        return true;
    }
}
