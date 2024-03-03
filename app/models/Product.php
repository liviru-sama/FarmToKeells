<?php

class Product {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function view_product($id){
        $this->db->query('SELECT * from product where product_id=:id');
        $this->db->bind(':id',$id);
        $data = $this->db->single();
        return $data;
    }

  


    public function getAllProducts() {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM product";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        return $result;
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
            // Check if a row was affected (if the product was successfully inserted)
            if ($this->db->rowCount() > 0) {
                // Product added successfully
                return true; // Indicate success
            } else {
                // No rows affected, meaning product wasn't added
                $_SESSION['product_exists_error'] = 'Product already exists.';
                return false; // Indicate failure
            }
        } else {
            // Query execution failed
            return false; // Indicate failure
        }
    }

    // In your Product model (Product.php)

public function findProductByName($name) {
    // Prepare SQL statement
    $this->db->query('SELECT * FROM product WHERE name = :name');
    
    // Bind parameter
    $this->db->bind(':name', $name);
    
    // Execute query
    $this->db->execute();

    // Check if any row was returned
    if ($this->db->rowCount() > 0) {
        return true; // Product with the given name already exists
    } else {
        return false; // Product with the given name does not exist
    }
}

    

    // Edit product in the database
    public function edit_product($data){
        // Prepare SQL statement
        $this->db->query('UPDATE product SET name = :name, type = :type, quantity = :quantity, price = :price WHERE product_id = :id');

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
        $this->db->query('DELETE FROM product WHERE product_id = :id');

        // Bind parameter
        $this->db->bind(':id', $id);

        // Execute query
        if ($this->db->execute()) {
            return true; // Indicate success
        } else {
            return false; // Indicate failure
        }
    }


    public function generateInventoryHistoryReport($startDate, $endDate) {
        // Implement the logic to generate the inventory history report
        // Fetch inventory history data from the database based on the given start date and end date
        // You may use SQL queries to retrieve the data or any other method based on your database schema
        // Return the fetched data or format it as required for display in the report
    
        // Example:
        // $this->db->query('SELECT * FROM inventory_history WHERE date BETWEEN :start_date AND :end_date');
        // $this->db->bind(':start_date', $startDate);
        // $this->db->bind(':end_date', $endDate);
        // $result = $this->db->resultSet();
        // return $result;
    
        // You need to replace the example SQL query with your actual query to fetch inventory history data
    }
    
}

        
    



        

      