<?php

include_once "model/Connection.php";

/**
 * Manage the invoice_detail
 */
class invoice_detail {

    public $order_id;
    public $product_id;
    public $product_name;
    public $quantity;
    public $single_price;
    public $total_price;

    /**
     * Initial Values
     * @param int $order_id
     * @param int $product_id
     * @param string $product_name
     * @param int $quantity
     * @param double $single_price
     * @param double $total_price
     */
    public function __construct($order_id = 0, $product_id = 0, $product_name = "", $quantity = 0,
    $single_price = 0, $total_price = 0) {
         $this->order_id = $order_id;
         $this->product_id = $product_id;
         $this->product_name = $product_name;
         $this->quantity = $quantity;
         $this->single_price = $single_price;
         $this->total_price = $total_price;
    }

    /**
     * Insert into the database information for the "se" table
     * @return boolean
     */
    function insert() {
        $query = "INSERT INTO invoice_detail (order_id, product_id, product_name, quantity, single_price, total_price)"
                . " VALUES ('$this->order_id', '$this->product_id', '$this->product_name', '$this->quantity',
                 '$this->single_price', '$this->total_price')";
        $pdo = new Connection();
        $result = $pdo->open()->prepare($query);
        return $result->execute();
    }

    public function selectDetail($id){
        $query = "SELECT * FROM invoice_detail";
        $query .= " WHERE order_id = '$id'";
        $pdo = new Connection();
        $results = $pdo->open()->query($query);
        $rows = [];
        foreach ($results->fetchAll() as $row) {
            $rows[] = new invoice_detail($row['order_id'], $row['product_id'], $row['product_name'], $row['quantity']
            , $row['single_price'], $row['total_price']);
        }
        return $rows;
	}
/* 	public function delete($invoiceId){
		$query = "DELETE FROM invoice_details";
		$query .= "WHERE order_id = '$id'";
		$pdo = new Connection();
        $result = $pdo->open()->prepare($query);
        return $result->execute();			
	} */
}