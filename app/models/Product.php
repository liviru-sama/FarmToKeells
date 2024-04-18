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

   
    




    public function getExistingProducts() {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
        // Check for connection errors
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    
        // Query to fetch existing product names
        $this->db->query('SELECT name FROM product');
        
        // Execute the query
        if (!$this->db->execute()) {
            die("Error executing query: " . $this->db->getError());
        }
        
        // Fetch all rows from the result set
        $products = $this->db->resultSet();
    
        // Log or print the result set for debugging
        var_dump($products); // This will print the result set to the browser console or log file
        
        return $products;
    }
    
    



    // Add product to the database
    public function add_product($data){
        // Prepare SQL statement
        $image = $this->getProductImageURL($data['name']);
        $data['image'] = $image;
        $this->db->query('INSERT INTO product (name, image,type, quantity, price) VALUES (:name,:image, :type, :quantity, :price)');
    
        // Bind parameters
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':image', $data['image']);
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

    

public function edit_product($data){
    // Prepare SQL statement
    $this->db->query('UPDATE product SET type = :type, quantity = :quantity, price = :price WHERE product_id = :id');

    // Bind parameters
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':type', $data['type']);
    $this->db->bind(':quantity', $data['quantity']);
    $this->db->bind(':price', $data['price']);

    // Execute query
    if ($this->db->execute()) {
        return true; // Indicate success
    } else {
        // Display SQL error message
        echo $this->db->error(); // Assuming error() method returns the last error message
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


   // Inside your Product model class

// Inside your Product model class


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
        'Ladies Finger' => 'ladiesfinger.png',
        'Leeks' => 'leeks.png',
        'Chillie' => 'chillie.png',
        'Tomato' => 'tomato.png',
        'Potato' => 'potato.png',
        'Pumpkin' => 'pumpkin.png',
        'Beans' => 'beans.png',
        'Ginger' => 'ginger.png',
        'Corriander' => 'corriander.png',
        'Capsicum' => 'capsicum.png',
        'Broccoli' => 'broccoli.png'







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

        
    



        

      