<?php

class Salesorder {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getSalesordersByPurchaseId($purchase_id) {
        $this->db->query('SELECT * FROM salesorder WHERE purchase_id = :purchase_id');
        $this->db->bind(':purchase_id', $purchase_id);
        return $this->db->resultSet();
    }

    // Other methods related to sales orders...


    public function view_salesorder($id){
        $this->db->query('SELECT * from salesorder where order_id=:id');
        $this->db->bind(':id',$id);
        $data = $this->db->single();
        return $data;
    }

  


    public function getAllSalesorders() {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM salesorder";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        return $result;
    }





    public function add_salesorder($data){
        // Check if purchase_id is set and not null
        if (!isset($data['purchase_id']) || $data['purchase_id'] === null) {
            return false; // Indicate failure
        }
    
        // Prepare SQL statement
        $this->db->query('INSERT INTO salesorder (name, type, quantity, date, address, purchase_id) VALUES (:name, :type, :quantity, :date, :address, :purchase_id)');
    
        // Bind parameters
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':purchase_id', $data['purchase_id']);
    
        // Execute query
        if ($this->db->execute()) {
            return true; // Indicate success
        } else {
            return false; // Indicate failure
        }
    }
    

    // Edit product in the database
    public function edit_salesorder($data){
        // Prepare SQL statement
        $this->db->query('UPDATE salesorder SET name = :name, type = :type, quantity = :quantity, date = :date, address = :address WHERE order_id = :order_id');

        // Bind parameters
        $this->db->bind(':order_id', $data['order_id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':address', $data['address']);
       
        // Execute query
        if ($this->db->execute()) {
            return true; // Indicate success
        } else {
            return false; // Indicate failure
        }
    }

    
    // Delete product from the database
public function delete_salesorder($id){
    // Prepare SQL statement
    $this->db->query('DELETE FROM salesorder WHERE order_id = :id');

    // Bind parameter
    $this->db->bind(':id', $id);

    // Execute query
    if ($this->db->execute()) {
        return true; // Indicate success
    } else {
        return false; // Indicate failure
    }
}

public function getStatus($order_id) {
    $this->db->query('SELECT status FROM salesorder WHERE order_id = :order_id');
    $this->db->bind(':order_id', $order_id);
    $status = $this->db->single();
    return $status ? $status->status : null; // Return status if found, otherwise return null
    } 
    
    public function updateStatus($order_id, $newStatus) {
        $this->db->query('UPDATE salesorder SET status = :status WHERE order_id = :order_id');
        $this->db->bind(':status', $newStatus);
        $this->db->bind(':order_id', $order_id);
        return $this->db->execute();
    }
    







}

        
    



        

      