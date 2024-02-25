<?php

class Product {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Add product to the database
    public function add_product($data){
        // Prepare SQL statement
        $this->db->query('INSERT INTO product (name, type, quantity, price) VALUES (:name, :type, :quantity, :price)');

        // Bind parameters
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':price', $data['price']);

        // Execute query
        if ($this->db->execute()) {
            return true; // Indicate success
        } else {
            return false; // Indicate failure
        }
    }

    // Edit product in the database
    public function edit_product($data){
        // Prepare SQL statement
        $this->db->query('UPDATE product SET name = :name, type = :type, quantity = :quantity, price = :price WHERE id = :id');

        // Bind parameters
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':price', $data['price']);

        // Execute query
        if ($this->db->execute()) {
            return true; // Indicate success
        } else {
            return false; // Indicate failure
        }
    }

    // Delete product from the database
    public function delete_product($id){
        // Prepare SQL statement
        $this->db->query('DELETE FROM product WHERE id = :id');

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

        ?>
    



        

      