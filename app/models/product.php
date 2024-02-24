<?php



   
    class Product {
        private $db;
    
        public function __construct(Database $db){
            $this->db = $db;
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
    }
    



        

      