<?php

include_once "model/Connection.php";

/**
 * Manage the customer information
 */
class customer {

    private $id;
    private $ced;
    public $name;
    public $email;
    public $phone;

    /**
     * Initial Values
     * @param int $id
     * @param int $ced
     * @param String $name
     * @param String $email
     * @param int $phone
     */
    public function __construct($id = 0, $ced = 0, $name = "", $email = "", $phone = 0) {
        $this->id = $id;
        $this->ced = $ced;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * Return the customer's id
     * @return int
     */
    function get_id() {
        return $this->id;
    }

     /**
     * Return the customer's id
     * @return int
     */
    function get_ced() {
        return $this->ced;
    }

    /**
     * Insert into the database information for the "se" table
     * @return boolean
     */
    function insert() {
        $query = "INSERT INTO customer (ced, name,  email, phone)"
                . " VALUES ('$this->ced', '$this->name', '$this->email', '$this->phone')";
        $pdo = new Connection();
        $result = $pdo->open()->prepare($query);
        return $result->execute();
    }

    /**
     * Get a single customer from the database's table "customer" based on the id
     * @param int $id
     * @return customer (object)
     */
    
        function select($by_id = 0) {
        $query = "SELECT * FROM customer";
         if ($by_id) {
            $query .= " WHERE id = '$by_id'";
        } else {
            $query .= " WHERE email = '$this->email'";
        }
        $pdo = new Connection();
        $results = $pdo->open()->query($query);
        $row = $results->fetch();
        $customer = new customer($row['id'], $row['ced'], $row['name'], $row['email'],
                $row['phone']);
        return $customer;
    }

    function selectAll() {
        $query = "SELECT * FROM customer";
        $pdo = new Connection();
        $results = $pdo->open()->query($query); 
            $rows = [];
            foreach ($results->fetchAll() as $row) {
                $rows[] = new Customer($row['id'], $row['ced'], $row['name'], $row['email'],
                $row['phone']);
            }
            return $rows;
    }

    /**
     * Delete a customer from the database in the "customer" table, based on the customer's id
     * @param int $id
     * @return boolean
     */
    function delete($id = 0) {
        $query = "DELETE FROM customer WHERE id='{$id}'";
        $pdo = new Connection();
        $result = $pdo->open()->prepare($query);
        return $result->execute();
    }

    /**
     * Updates the information from an customer in the "customer" table based on the customer's id
     * @param String $name
     * @param String $email
     * @param int $phone
     * @return boolean
     */
    function update($ced = "", $name = "", $email = "", $phone = 0) {
        $query = "UPDATE customer SET ced='$ced', name='$name', email='$email', phone='$phone'";
        $query .= " WHERE id='$this->id'";
        $pdo = new Connection();
        $results = $pdo->open()->prepare($query);
        return $results->execute();
    }

    /**
     * Confirms if an e-mail exists in the "customer" table from the database 
     * @param  String $email
     * @return boolean
     */
    function email_exists($email = "") {
        $query = "SELECT email FROM customer WHERE email = '$email'";
        $pdo = new Connection();
        $results = $pdo->open()->query($query);
        return ($row = $results->fetch());
    }

    /**
     * Confirms if an id exists in the "customer" table from the database 
     * @param  int $id
     * @return boolean
     */
    function id_exists($id = 0) {
        $query = "SELECT id FROM customer WHERE id = '$id'";
        $pdo = new Connection();
        $results = $pdo->open()->query($query);
        return ($row = $results->fetch());
    }

}