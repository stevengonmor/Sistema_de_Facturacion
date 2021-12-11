<?php

include_once "model/Connection.php";

/**
 * Manage the invoice
 */
class invoice {

    
    public $order_id;
    private $cashier_id;
    private $customer_id;
    private $customer_cedula;
    public $customer_name;
    public $customer_phone;
    public $customer_email;
    public $date;
    public $sub_total;
    public $total;
    public $tax;

    /**
     * Initial Values
     * @param int $order_id
     * @param int $cashier_id
     * @param int $customer_id
     * @param int $customer_cedula
     * @param string $customer_name
     * @param int $customer_phone
     * @param string $customer_email
     * @param int $date
     * @param double $sub_total
     * @param double $total
     * @param double $tax
     */
    public function __construct($order_id = 0, $cashier_id = 0, $customer_id = 0, $customer_cedula = "",
    $customer_name = "", $customer_phone = "",$customer_email = "", $date = 0, $sub_total = 0, $total = 0, $tax = 0) {
         $this->order_id = $order_id;
         $this->cashier_id = $cashier_id;
         $this->customer_id = $customer_id;
         $this->customer_cedula = $customer_cedula;
         $this->customer_name = $customer_name;
         $this->customer_phone = $customer_phone;
         $this->customer_email = $customer_email;
         $this->date = $date;
         $this->sub_total = $sub_total;
         $this->total = $total;
         $this->tax = $tax;
    }

    function get_last_order_id() {
        $query = "SELECT * FROM `invoice` ORDER BY order_id DESC LIMIT 1";
        $pdo = new Connection();
        $results = $pdo->open()->query($query);
        $row = $results->fetch();
        $invoice = new invoice($row['order_id'], $row['cashier_id'], $row['customer_id'], $row['customer_cedula']
         , $row['customer_name'], $row['customer_phone'], $row['customer_email'],
         $row['date'], $row['sub_total'], $row['total'], $row['tax']);
        return $invoice;
    }
    
    /**
     * Return the order's id
     * @return int
     */
    function get_order_id() {
        return $this->order_id;
    }

      /**
     * Return the customer's id
     * @return int
     */
    function get_customer_id() {
        return $this->customer_id;
    }


    function get_cashier_id() {
        return $this->cashier_id;
    }

    function get_customer_cedula() {
        return $this->customer_cedula;
    }
    /**
     * Insert into the database information for the "se" table
     * @return boolean
     */
    function insert() {
        $query = "INSERT INTO invoice (cashier_id, customer_id, customer_cedula, customer_name, customer_phone, customer_email, date, 
        sub_total, total, tax)"
                . " VALUES ('$this->cashier_id', '$this->customer_id', '$this->customer_cedula', '$this->customer_name',
                 '$this->customer_phone', '$this->customer_email', NOW(), '$this->sub_total', '$this->total', '$this->tax')";
        $pdo = new Connection();
        $result = $pdo->open()->prepare($query);
        return $result->execute();
    }

    /**
     * Get a single invoice from the database's table "invoice" based on the id
     * @param int $id
     * @return invoice (object)
     */
    function select($by_id = 0) {
        $query = "SELECT * FROM invoice";
        $query .= " WHERE order_id = '$by_id'";
        $pdo = new Connection();
        $results = $pdo->open()->query($query);
        $row = $results->fetch();
        $invoice = new invoice($row['order_id'], $row['cashier_id'], $row['customer_id'], $row['customer_cedula']
         , $row['customer_name'], $row['customer_phone'], $row['customer_email'],
         $row['date'], $row['sub_total'], $row['total'], $row['tax']);
        return $invoice;
    }

    function selectAll() {
        $query = "SELECT * FROM invoice";
        $pdo = new Connection();
        $results = $pdo->open()->query($query);
        $rows = [];
        foreach ($results->fetchAll() as $row) {
            $rows[] = new invoice($row['order_id'], $row['cashier_id'], $row['customer_id'], $row['customer_cedula']
            , $row['customer_name'], $row['customer_phone'], $row['customer_email'],
            $row['date'], $row['sub_total'], $row['total'], $row['tax']);
        }
        return $rows;
    }

    function selectReportByDate($dateInicio = 0, $dateFin = 0) {
        $query = "SELECT * FROM invoice";
        $query .= " WHERE (DATE(date) BETWEEN ";
        $query .= "'$dateInicio' AND '$dateFin')";
        // SELECT * FROM `invoice_order` WHERE (DATE(order_date) BETWEEN '2021-07-11' AND '2021-07-11')
        $pdo = new Connection();
        $results = $pdo->open()->query($query);
        $rows = [];
        foreach ($results->fetchAll() as $row) {
            $rows[] = new invoice($row['order_id'], $row['cashier_id'], $row['customer_id'], $row['customer_cedula']
            , $row['customer_name'], $row['customer_phone'], $row['customer_email'],
            $row['date'], $row['sub_total'], $row['total'], $row['tax']);
        }
        return $rows;
    }

    function selectReportByClient($customer_id) {
        $query = "SELECT * FROM invoice";
        $query .= " WHERE customer_id = '$customer_id'";   
        $pdo = new Connection();
        $results = $pdo->open()->query($query);
        $rows = [];
        foreach ($results->fetchAll() as $row) {
            $rows[] = new invoice($row['order_id'], $row['cashier_id'], $row['customer_id'], $row['customer_cedula']
            , $row['customer_name'], $row['customer_phone'], $row['customer_email'],
            $row['date'], $row['sub_total'], $row['total'], $row['tax']);
        }
        return $rows;
    }


    /**
     * Delete a invoice from the database in the "invoice" table, based on the invoice's id
     * @param int $id
     * @return boolean
     */
    function delete($order_id = 0) {
        $query = "DELETE FROM invoice WHERE order_id='{$order_id}'";
        $pdo = new Connection();
        $result = $pdo->open()->prepare($query);
        return $result->execute();
    }

    /**
     * Updates the information from an customer in the "invoice" table based on the invoice's id
     * @param String $name
     * @param String $email
     * @param int $phone
     * @return boolean
     */
    function update($id = 0, $customer_email = "") {
        $query = "UPDATE invoice SET customer_email= '$customer_email'";
        $query .= " WHERE order_id='$this->id'";
        $pdo = new Connection();
        $results = $pdo->open()->prepare($query);
        return $results->execute();
    } 
}