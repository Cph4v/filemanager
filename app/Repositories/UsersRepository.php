<?php

class UsersRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function add($username, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);
    }

    public function getPassword($username)
    {
        $sql = "SELECT password from users WHERE username = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':username' => $username
        ]);
        if ($stmt->rowCount() <= 0) {
            return null;
        }

        return $stmt->fetch(PDO::FETCH_ASSOC)['password'];
    }

    public function exists($username)
    {
        return $this->getPassword($username) != null;
    }

    public function changePassword($username, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = :password WHERE username = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);
    }
}
