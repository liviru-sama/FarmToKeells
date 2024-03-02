<?php

class Purchaseorder {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getPurchaseorderById($purchase_id) {
        $this->db->query('SELECT * FROM purchaseorder WHERE purchase_id = :purchase_id');
        $this->db->bind(':purchase_id', $purchase_id);
        return $this->db->single();
    }

    // Other methods related to purchase orders...


    public function view_purchaseorder($id){
        $this->db->query('SELECT * from purchaseorder where purchase_id=:id');
        $this->db->bind(':id',$id);
        $data = $this->db->single();
        return $data;
    }

  


    public function getAllPurchaseorders() {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM purchaseorder";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        return $result;
    }





    // Add product to the database
    public function add_purchaseorder($data){
        // Prepare SQL statement
        $this->db->query('INSERT INTO purchaseorder (name, type, quantity, date) VALUES (:name, :type, :quantity, :date)');

        // Bind parameters
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':date', $data['date']);

        // Execute query
        if ($this->db->execute()) {
            return true; // Indicate success
        } else {
            return false; // Indicate failure
        }
    }

    // Edit product in the database
    public function edit_purchaseorder($data){
        // Prepare SQL statement
        $this->db->query('UPDATE purchaseorder SET name = :name, type = :type, quantity = :quantity, date = :date WHERE purchase_id = :id');

        // Bind parameters
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':date', $data['date']);

        // Execute query
        if ($this->db->execute()) {
            return true; // Indicate success
        } else {
            return false; // Indicate failure
        }
    }

    // Delete product from the database
    public function delete_purchaseorder($id){
        // Prepare SQL statement
        $this->db->query('DELETE FROM purchaseorder WHERE purchase_id = :id');

        // Bind parameter
        $this->db->bind(':id', $id);

        // Execute query
        if ($this->db->execute()) {
            return true; // Indicate success
        } else {
            return false; // Indicate failure
        }
    }
}

        
    



        

      