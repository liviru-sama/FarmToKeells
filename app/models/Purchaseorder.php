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

        $image = $this->getProductImageURL($data['name']);
        
        // Add the image URL to the data array
        $data['image'] = $image;
        $this->db->query('INSERT INTO purchaseorder (name, type, quantity, date, image) VALUES (:name, :type, :quantity, :date ,:image )');

        // Bind parameters
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':image', $data['image']);

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

    
    // Purchaseorder.php (model)



    // Update purchase status by purchase order ID
    public function getPurchaseStatus($purchase_id) {
        $this->db->query('SELECT status FROM purchaseorder WHERE purchase_id = :purchase_id');
        $this->db->bind(':purchase_id', $purchase_id);
        $purchase_status = $this->db->single();
        return $purchase_status ? $purchase_status->purchase_status : null; // Return status if found, otherwise return null
    } 
    
    public function updatePurchaseStatus($purchase_id, $newpurchaseStatus) {
        $this->db->query('UPDATE purchaseorder SET purchase_status = :status WHERE purchase_id = :purchase_id');
        $this->db->bind(':status', $newpurchaseStatus);
        $this->db->bind(':purchase_id', $purchase_id);
        return $this->db->execute();
      }
      
    
      public function getProductImageURL($productName) {
        // Logic to retrieve the image URL based on the product name
        // This could involve querying your database, accessing an API, or any other means to get the image URL
        
        // For demonstration purposes, let's assume you have an array mapping product names to image URLs
        $productImageMap = [
            'Carrot' => 'carrot.png',
            'Brinjal' => 'brinjal.png',
            'Onions' => 'onion.png',
            'Cabbage' => 'cabbage.png',
            'Cucumber' => 'cucumber.png',
            'Ladies Finger' => 'ladies.png',
            'Leeks' => 'leeks.png',
            'Chillie' => 'chillie.png',
            'Tomato' => 'tomato.png'
    
    
    
    
    
            // Add more mappings as needed
        ];
    
        // Check if the product name exists in the mapping array
        if (isset($productImageMap[$productName])) {
            // Return the corresponding image URL
            return URLROOT . '/public/images/' . $productImageMap[$productName];
        } else {
            // If no image is found for the product name, you can return a default image URL or handle it accordingly
            return URLROOT . '/public/images/default.png';
        }
    }
    
    
}






        
    



        

      