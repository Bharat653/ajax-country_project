<?php

use LDAP\Result;

class database
{
    private $db;
    private $_FILES;
    function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $this->db = new PDO("mysql:host=$servername;dbname=worldtask", $username, $password);
            // set the PDO error mode to exception
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function addcountry()
    {
        $country_name = $_POST['country_name'];
        $picture = $_FILES['country_photo']['name'];
        // print_r($picture);
        // exit();
        $query = $this->db->prepare("INSERT INTO `country`( `country_name`, `country_photo`) VALUES (?,?)");
        $result =  $query->execute([$country_name, $picture]);
        // print_r($result);
        // exit();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function getcountry()
    {

        $query = $this->db->prepare("select * from country");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return 0;
        }
    }

    function addstate($data)
    {
        $query = $this->db->prepare("INSERT INTO state(country_id,state_name, state_photo) VALUES (:country_id,:state_name,:state_photo)");
        $result = $query->execute($data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function getstate()
    {
        $query = $this->db->prepare("select * from state");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return 0;
        }
    }

    function addcity($data)
    {
        $query = $this->db->prepare("INSERT INTO city(state_id,city_name, city_photo) VALUES (:state_id,:city_name,:city_photo)");
        $result = $query->execute($data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function getcity()
    {
        $query = $this->db->prepare("select * from city");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return 0;
        }
    }
    function getstateByCountryId($id)
    {
        $query = $this->db->prepare("select * from state where country_id = ?");
        $query->execute([$id]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return 0;
        }
    }
    function getcitybystate($id)
    {
        $query = $this->db->prepare("select * from city where state_id = ?");
        $query->execute([$id]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return 0;
        }
    }

    function addtask($data)
    {
        $query = $this->db->prepare("INSERT INTO `task`( `country2_id`, `state2_id`, `city2_id`) VALUES (:country_id,:state_id,:city_id) ");
        // INSERT INTO `task`(`id`, `country2_id`, `state2_id`, `city2_id`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
        $result = $query->execute($data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function countrydelete($data)
    {
        $query = $this->db->prepare("delete from country where id=:id");
        $result = $query->execute($data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function statedelete($data)
    {
        $query = $this->db->prepare("delete from state where id=:id");
        $result = $query->execute($data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function citydelete($data)
    {
        $query = $this->db->prepare("delete from city where id =:id");
        $result = $query->execute($data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function editcountry($data)
    {
        $query = $this->db->prepare("select * from country where id =:id");
        $query->execute($data);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }
    function updatecountry($data)
    {

        $query = $this->db->prepare("update country set 
        country_name = :country_name     
        where id =:id ");
        return $query->execute($data);
    }

    function editstate($data)
    {
        $query = $this->db->prepare("select * from state where id =:id");
        $query->execute($data);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }
    function updatestate($data)
    {
        $query = $this->db->prepare("update state set 
        country_id =:country_id,
        state_name = :state_name     
        where id =:id ");
        return $query->execute($data);
    }
}
$database = new Database();
