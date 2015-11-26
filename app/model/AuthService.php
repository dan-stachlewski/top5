<?php

class AuthService {

    private $db;
    
    //slim has container that globally stores objects
    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    function validateUser($user) {
        $errors = [];

        $user = $this->getUserByUname($user['user_name']);
        if ($user) {
            //user already exists
            $errors[] = "Either username or email already in the database";
        }
        return $errors;
    }

    public function authenticateUser($uname, $password) {
        $user = $this->getUserByUname($uname);

        if ($user === false) {
            return false; //username does not exist
        } else if (!password_verify($password, $user['password'])) {
            return false; //incorrect password
        } else {
            unset($user['password']);
            return $user;
        }
    }

    public function getUserById($user_id) {

        $query = "SELECT
                    users.id AS user_id,
                    users.user_name,
                    users.full_name,
                    users.email,
                    users.role_id,
                    roles.role
                  FROM
                    roles INNER JOIN
                    users On users.role_id = roles.id
                  WHERE
                    (users.id = :user_id ) 
              ";
        try {
            $stmnt = $this->db->prepare($query);
            $stmnt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmnt->execute();
            $result = $stmnt->fetch();
            $stmnt->closeCursor();
            //after hashing password cannot be retrieved
            if ($result !== false)
                unset($result['password']);
            return $result;
        } catch (PDOException $e) {
            Database::display_db_error($e->getMessage());
            exit;
        }
    }

    public function getUserByUname($uname) {

        $query = "SELECT
                    users.id AS user_id,
                    users.user_name,
                    users.full_name,
                    users.email,
                    users.password,
                    users.role_id,
                    roles.role
                  FROM
                    roles INNER JOIN
                    users On users.role_id = roles.id
                  WHERE
                    (users.user_name = :uname ) 
                    OR
                    (users.email = :email )
            ";
        try {
            $stmnt = $this->db->prepare($query);
            $stmnt->bindValue(':uname', $uname, PDO::PARAM_STR);
            $stmnt->bindValue(':email', $uname, PDO::PARAM_STR);

            $stmnt->execute();
            $result = $stmnt->fetch();
            $stmnt->closeCursor();

            return $result;
        } catch (PDOException $e) {
            Database::display_db_error($e->getMessage());
            exit;
        }
    }

    public function addUser($user) {
        $query = "INSERT INTO users 
              (user_name, full_name, email, password, role_id) 
              VALUES 
              (:uname, :full_name, :email, :password, :role_id)";
        try {
            $stmnt = $this->db->prepare($query);
            $stmnt->bindValue(':uname', $user['user_name'], PDO::PARAM_STR);
            $stmnt->bindValue(':email', $user['email'], PDO::PARAM_STR);
            $stmnt->bindValue(':password', password_hash($user['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
            $stmnt->bindValue(':full_name', $user['full_name'], PDO::PARAM_STR);
            $stmnt->bindValue(':role_id', $user['role_id'], PDO::PARAM_INT);
            $r = $stmnt->execute();
        } catch (PDOException $e) {

            if ($e->getCode() == 23000) {
                Database::display_db_error("DATA DUPLICATION: " . $e->getMessage());
            } else {
                Database::display_db_error($e->getMessage());
            }
        }
    }

    public function updateUser($user) {

        $query = "UPDATE users 
                SET full_name=:full_name,
                email=:email,
                role_id=:role_id
            WHERE 
               (users.id = :user_id )  ";
        try {
            $stmnt = $this->db->prepare($query);

            $stmnt->bindValue(':email', $user['email'], PDO::PARAM_STR);
            $stmnt->bindValue(':full_name', $user['full_name'], PDO::PARAM_STR);
            $stmnt->bindValue(':role_id', $user['role_id'], PDO::PARAM_INT);
            $stmnt->bindValue(':user_id', $user['user_id'], PDO::PARAM_INT);
            $r = $stmnt->execute();
        } catch (PDOException $e) {
            Database::display_db_error($e->getMessage());
        }
    }

    public function changeUserPassword($user_name, $current_password, $new_password) {
        $user = $this->getUserByUname($user_name);
        $errors = [];
        if (!password_verify($current_password, $user['password'])) {
            $errors = "Current Password incorrect";
            return $errors;
        }

        $query = "UPDATE users 
                SET password=:password
            WHERE 
               (users.id = :user_id )  ";
        try {
            $stmnt = $this->db->prepare($query);

            $stmnt->bindValue(':password', password_hash($new_password, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $stmnt->bindValue(':user_id', $user['user_id'], PDO::PARAM_INT);
            $stmnt->execute();
            return $errors;
        } catch (PDOException $e) {
            Database::display_db_error($e->getMessage());
        }
    }

    public function getAllUsers() {

        $query = "SELECT
                    users.id AS user_id,
                    users.user_name,
                    users.full_name,
                    users.email,
                    users.password,
                    users.role_id,
                    roles.role
                  FROM
                    roles INNER JOIN
                    users On users.role_id = roles.id
                  ORDER BY
                    users.user_name
           ";
        try {
            $stmnt = $this->db->prepare($query);
            $stmnt->execute();
            $result = $stmnt->fetchAll();
            $stmnt->closeCursor();

            return $result;
        } catch (PDOException $e) {
            Database::display_db_error($e->getMessage());
            exit;
        }
    }

    public function deleteUser($user_id) {
        $query = "DELETE
             From
                users
              Where
                (users.id = :user_id ) 
              ";
        try {
            $stmnt = $this->db->prepare($query);
            $stmnt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmnt->execute();
            $stmnt->closeCursor();
        } catch (PDOException $e) {
            Database::display_db_error($e->getMessage());
            exit;
        }
    }

    public function getRoles() {

        $query = "SELECT
                roles.id AS role_id,
                roles.role
               From
                roles
           ";
        try {
            $stmnt = $this->db->prepare($query);
            $stmnt->execute();
            $result = $stmnt->fetchAll();
            $stmnt->closeCursor();
            foreach ($result as $r) {
                $roles[$r['role_id']] = $r['role'];
            }
            return $roles;
        } catch (PDOException $e) {
            Database::display_db_error($e->getMessage());
            exit;
        }
    }

}
