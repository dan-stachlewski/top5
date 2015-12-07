<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PlacesService
 *
 * @author lectern
 */
class PlacesService {

    private $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function getAllPlaces($customer_id) {

        $query = "SELECT
                    places.id AS place_id,
                    places.name,
                    places.address,
                    places.suburb,
                    places.postcode,
                    tags.id as tag_id,
                    tags.short
                FROM
                    tags 
                INNER JOIN
                    places On places.tag_id = tags.id
                WHERE
                    places.customer_id = :id
                ";
        try {
            $stmnt = $this->db->prepare($query);
            $stmnt->bindValue(':id', $customer_id, PDO::PARAM_INT);
            $stmnt->execute();
            $result = $stmnt->fetchAll();
            $stmnt->closeCursor();

            return $result;
        } catch (PDOException $e) {
            exit;
        }
    }

    public function getTags() {

        $query = "Select
             tags.*
            From
                tags";

        try {
            $stmnt = $this->db->prepare($query);

            $stmnt->execute();
            $result = $stmnt->fetchAll();
            $stmnt->closeCursor();
            foreach ($result as $r) {
                $tags[$r['id']] = $r['short'];
            }
            return $tags;
            
            foreach ($result as $r) {
                $shorts[$r['short']] = $r['id'];
            }
            return $shorts;
        } catch (PDOException $e) {
            exit;
        }
    }
    
    public function getPlacesById($place_id) {

        $query = "SELECT
                    places.id AS place_id,
                    places.name,
                    places.address,
                    places.suburb,
                    places.postcode,
                    tags.id as tag_id,
                    tags.short
                  FROM
                    tags INNER JOIN
                    places On places.tag_id = tags.id
                  WHERE
                    (places.id = :place_id)
              ";
        try {
            $stmnt = $this->db->prepare($query);
            $stmnt->bindValue(':place_id', $place_id, PDO::PARAM_INT);
            $stmnt->execute();
            $result = $stmnt->fetch();
            $stmnt->closeCursor();
            return $result;
        } catch (PDOException $e) {
            Database::display_db_error($e->getMessage());
            exit;
        }
    }

    public function addPlace($place) {
        $query = "INSERT INTO places 
              (name, address, postcode, suburb, tag_id, customer_id) 
              VALUES 
              (:name, :address, :postcode, :suburb, :tag_id, :customer_id)";
        try {
            $stmnt = $this->db->prepare($query);
            $stmnt->bindValue(':name', $place['name'], PDO::PARAM_STR);
            $stmnt->bindValue(':address', $place['address'], PDO::PARAM_STR);
            $stmnt->bindValue(':postcode', $place['postcode'], PDO::PARAM_INT);
            $stmnt->bindValue(':suburb', $place['suburb'], PDO::PARAM_STR);
            $stmnt->bindValue(':tag_id', $place['tag_id'], PDO::PARAM_INT);
            $stmnt->bindValue(':customer_id', $place['customer_id'], PDO::PARAM_INT);
            $r = $stmnt->execute();
        } catch (PDOException $e) {

            if ($e->getCode() == 23000) {
                Database::display_db_error("DATA DUPLICATION: " . $e->getMessage());
            } else {
                Database::display_db_error($e->getMessage());
            }
        }
    }
    
    public function updatePlace($place) {
        //ddd($place);
        $query = "UPDATE
                    places 
                SET name=:name,
                    address=:address,
                    postcode=:postcode,
                    suburb=:suburb,
                    tag_id=:tag_id
                WHERE 
                    (places.id = :place_id )";
        try {
            $stmnt = $this->db->prepare($query);
            $stmnt->bindValue(':place_id', $place['place_id'], PDO::PARAM_INT);
            $stmnt->bindValue(':name', $place['name'], PDO::PARAM_STR);
            $stmnt->bindValue(':address', $place['address'], PDO::PARAM_STR);
            $stmnt->bindValue(':postcode', $place['postcode'], PDO::PARAM_STR);
            $stmnt->bindValue(':suburb', $place['suburb'], PDO::PARAM_STR);
            $stmnt->bindValue(':tag_id', $place['tag_id'], PDO::PARAM_INT);
            $r = $stmnt->execute();
        } catch (PDOException $e) {
            Database::display_db_error($e->getMessage());
        }
    }
    
    public function deletePlace($place_id) {
        $query = "DELETE
             From
                places
              Where
                (places.id = :place_id ) 
              ";
        try {
            $stmnt = $this->db->prepare($query);
            $stmnt->bindValue(':place_id', $place_id, PDO::PARAM_INT);
            $stmnt->execute();
            $stmnt->closeCursor();
        } catch (PDOException $e) {
            Database::display_db_error($e->getMessage());
            exit;
        }
    }
    
    public function searchPlaces($search) {
        $where = [];
        //ddd($search);
        if (isset($search['suburb']))
            $where[] = "places.suburb LIKE :suburb";
        if (isset($search['tag_id']))
            $where[] = "places.tag_id = :tag_id";

        //ddd(implode(' AND ', $where));
        
        $query = "Select
             places.*
            From
                places
            WHERE  " . implode(' AND ', $where);
        
        try {
            
            $stmnt = $this->db->prepare($query);
           
            if (isset($search['suburb'])) {
                $stmnt->bindValue(':suburb', $search['suburb'] . '%', PDO::PARAM_STR);
            }
            
            if (isset($search['tag_id'])) {
                $stmnt->bindValue(':tag_id', $search['tag_id'], PDO::PARAM_INT);
            }

            $stmnt->execute();
            $result = $stmnt->fetchAll(PDO::FETCH_ASSOC);
            $stmnt->closeCursor();

            return $result;
        } catch (PDOException $e) {
            exit;
        }
    }
    

}
