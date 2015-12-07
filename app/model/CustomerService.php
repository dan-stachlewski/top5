<?php

class CustomerService {

    private $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    function validateCustomer($customer) {
        $errors = [];
//ddd($customer);
        $customer = $this->getCustomerByUsername($customer['username']);
        if ($customer) {
            //user already exists
            $errors[] = "Either Username or Email already in the Database";
        }
        return $errors;
    }

    public function authenticateCustomer($username, $password) {
        $customer= $this->getCustomerByUsername($username);
        //ddd($customer);
        if ($customer === false) {
            return false; //username does not exist
        } else if (!password_verify($password, $customer['password'])) {
            return false; //incorrect password
        } else {
            unset($customer['password']);
            //ddd($customer);
            return $customer;
        }
    }

    public function getCustomerById($customer_id) {

        $query = "SELECT
                    customers.id AS customer_id,
                    customers.full_name,
                    customers.username,
                    customers.email,
                    customers.password
                  FROM
                    customers
                  WHERE
                    (customers.id = :customer_id ) 
              ";
        try {
            $stmnt = $this->db->prepare($query);
            $stmnt->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
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

    public function getCustomerByUsername($username) {

        $query = "SELECT
                    customers.id AS customer_id,
                    customers.username,
                    customers.full_name,
                    customers.email,
                    customers.password
                  FROM
                    customers
                  WHERE
                    (customers.username = :username ) 
                    OR
                    (customers.email = :email )
            ";
        try {
            $stmnt = $this->db->prepare($query);
            $stmnt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmnt->bindValue(':email', $username, PDO::PARAM_STR);

            $stmnt->execute();
            $result = $stmnt->fetch(PDO::FETCH_ASSOC);
            $stmnt->closeCursor();

            return $result;
        } catch (PDOException $e) {
            Database::display_db_error($e->getMessage());
            exit;
        }
    }

    public function addCustomer($customer) {
        $query = "INSERT INTO customers 
              (full_name, username, email, password) 
              VALUES 
              (:full_name, :username, :email, :password)";
        try {
            $stmnt = $this->db->prepare($query);
            $stmnt->bindValue(':full_name', $customer['full_name'], PDO::PARAM_STR);
            $stmnt->bindValue(':username', $customer['username'], PDO::PARAM_STR);
            $stmnt->bindValue(':email', $customer['email'], PDO::PARAM_STR);
            $stmnt->bindValue(':password', password_hash($customer['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
            $r = $stmnt->execute();
        } catch (PDOException $e) {

            if ($e->getCode() == 23000) {
                Database::display_db_error("DATA DUPLICATION: " . $e->getMessage());
            } else {
                Database::display_db_error($e->getMessage());
            }
        }
    }

    public function updateCustomer($customer) {
//ddd($customer);
        $query = "UPDATE
                    customers 
                  SET 
                    full_name = :full_name,
                    email = :email
                    WHERE 
                    (customers.id = :customer_id )";
        try {
            $stmnt = $this->db->prepare($query);
            $stmnt->bindValue(':full_name', $customer['full_name'], PDO::PARAM_STR);
            $stmnt->bindValue(':email', $customer['email'], PDO::PARAM_STR);
            $stmnt->bindValue(':customer_id', $customer['customer_id'], PDO::PARAM_INT);
            $r = $stmnt->execute();
        } catch (PDOException $e) {
            Database::display_db_error($e->getMessage());
        }
    }

    public function changeCustomerPassword($username, $current_password, $new_password) {
        $customer = $this->getCustomerByUsername($username);
        $errors = [];
        if (!password_verify($current_password, $customer['password'])) {
            $errors = "Current Password incorrect";
            return $errors;
        }

        $query = "UPDATE 
                    customers 
                  SET 
                    password=:password
                  WHERE 
                    (customers.id = :customer_id )";
        try {
            $stmnt = $this->db->prepare($query);

            $stmnt->bindValue(':password', password_hash($new_password, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $stmnt->bindValue(':customer_id', $customer['customer_id'], PDO::PARAM_INT);
            $stmnt->execute();
            return $errors;
        } catch (PDOException $e) {
            Database::display_db_error($e->getMessage());
        }
    }

    public function getAllCustomers($customer_id) {

        $query = "SELECT
                    customers.id AS customer_id,
                    customers.full_name,
                    customers.username,
                    customers.email,
                    customers.password,
                  FROM
                    customers
                  ORDER BY
                    customers.username
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

/*
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
*/
}
