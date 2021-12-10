<?php

include_once "model/Connection.php";

/**
 * Manage the product
 */
class product {

    public $product_id;
    public $product_name;
    public $price;
    public $status;

    /**
     * Initial Values
     * @param int $product_id
     * @param string $product_name
     * @param double $price
     * @param boolean $status
     */
    public function __construct($product_id = 0, $product_name = "", $price = 0, $status = "") {
         $this->product_id = $product_id;
         $this->product_name = $product_name;
         $this->price = $price;
         $this->status = $status;
    }

    /**
     * Insert into the database information for the "product" table
     * @return boolean
     */
    function insert() {
        $query = "INSERT INTO product (product_name, price, status)"
                . " VALUES ('$this->product_name', '$this->price', '$this->status')";
        $pdo = new Connection();
        $result = $pdo->open()->prepare($query);
        return $result->execute();
    }

    public function selectAll(){
        $query = "SELECT * FROM product";
        $pdo = new Connection();
        $results = $pdo->open()->query($query);
        $rows = [];
        foreach ($results->fetchAll() as $row) {
            $rows[] = new product($row['product_id'], $row['product_name'], $row['price'], $row['status']);
        }
        return $rows;
	}

    public function select($product_id){
        $query = "SELECT * FROM product";
        $query .= " WHERE product_id = '$product_id'";
        $pdo = new Connection();
        $results = $pdo->open()->query($query);
        $row = $results->fetch();
        $product = new product($row['product_id'], $row['product_name'], $row['price'], $row['status']);
        return $product;
	}

    public function delete($product_id = 0){
		$query = "DELETE FROM product";
		$query .= " WHERE product_id = '$product_id'";
		$pdo = new Connection();
        $result = $pdo->open()->prepare($query);
        return $result->execute();			
	}

    public function update($product_name = "", $price = 0, $status = 0){	
        $query = "UPDATE product SET product_name= '$product_name', price='$price', status='$status'";
        $query .= " WHERE product_id='$this->product_id'";
        $pdo = new Connection();
        $results = $pdo->open()->prepare($query);
        return $results->execute();
	}
}