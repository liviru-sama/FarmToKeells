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
    public function getSalesordersByPurchaseIdAndUserId($purchase_id, $user_id) {
        $this->db->query('SELECT * FROM salesorder WHERE purchase_id = :purchase_id AND user_id = :user_id');
        $this->db->bind(':purchase_id', $purchase_id);
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();
    }
    
    public function getSalesordersByUserIdAndPurchaseId($user_id, $purchase_id) {
        // Prepare SQL query to fetch sales orders based on user ID and purchase ID
        $sql = "SELECT * FROM salesorder WHERE user_id = :user_id AND purchase_id IS NULL";
        
        // Prepare the statement
        $this->db->query($sql);
        
        // Bind parameters
        $this->db->bind(':user_id', $user_id);
        
        // Execute the query
        $this->db->execute();
        
        // Return the results
        return $this->db->resultSet();
    }
    
    public function getSalesordersByUserIdAndPurchaseIdpending($user_id, $purchase_id) {
        // Prepare SQL query to fetch sales orders based on user ID and purchase ID
        $sql = "SELECT * FROM salesorder WHERE user_id = :user_id AND purchase_id IS NULL AND status = 'Pending Approval'";
        
        // Prepare the statement
        $this->db->query($sql);
        
        // Bind parameters
        $this->db->bind(':user_id', $user_id);
        
        // Execute the query
        $this->db->execute();
        
        // Return the results
        return $this->db->resultSet();
    }

    public function getSalesordersByUserIdAndPurchaseIdapproved($user_id, $purchase_id) {
        // Prepare SQL query to fetch sales orders based on user ID and purchase ID
        $sql = "SELECT * FROM salesorder WHERE user_id = :user_id AND purchase_id IS NULL AND status = 'Approved'";
        
        // Prepare the statement
        $this->db->query($sql);
        
        // Bind parameters
        $this->db->bind(':user_id', $user_id);
        
        // Execute the query
        $this->db->execute();
        
        // Return the results
        return $this->db->resultSet();
    }
    
    public function getSalesordersByUserIdAndPurchaseIdrejected($user_id, $purchase_id) {
        // Prepare SQL query to fetch sales orders based on user ID and purchase ID
        $sql = "SELECT * FROM salesorder WHERE user_id = :user_id AND purchase_id IS NULL AND status = 'Rejected'";
        
        // Prepare the statement
        $this->db->query($sql);
        
        // Bind parameters
        $this->db->bind(':user_id', $user_id);
        
        // Execute the query
        $this->db->execute();
        
        // Return the results
        return $this->db->resultSet();
    }

    public function getSalesordersByUserIdAndPurchaseIdcompleted($user_id, $purchase_id) {
        // Prepare SQL query to fetch sales orders based on user ID and purchase ID
        $sql = "SELECT * FROM salesorder WHERE user_id = :user_id AND purchase_id IS NULL AND status = 'Completed'";
        
        // Prepare the statement
        $this->db->query($sql);
        
        // Bind parameters
        $this->db->bind(':user_id', $user_id);
        
        // Execute the query
        $this->db->execute();
        
        // Return the results
        return $this->db->resultSet();
    }


    public function getSalesordersByUserIdAndPurchaseIdqualityapproved($user_id, $purchase_id) {
        // Prepare SQL query to fetch sales orders based on user ID and purchase ID
        $sql = "SELECT * FROM salesorder WHERE user_id = :user_id AND purchase_id IS NULL AND status = 'Quality Approved'";
        
        // Prepare the statement
        $this->db->query($sql);
        
        // Bind parameters
        $this->db->bind(':user_id', $user_id);
        
        // Execute the query
        $this->db->execute();
        
        // Return the results
        return $this->db->resultSet();
    }

    public function getSalesordersByUserIdAndPurchaseIdqualityrejected($user_id, $purchase_id) {
        // Prepare SQL query to fetch sales orders based on user ID and purchase ID
        $sql = "SELECT * FROM salesorder WHERE user_id = :user_id AND purchase_id IS NULL AND status = 'quality Rejected'";
        
        // Prepare the statement
        $this->db->query($sql);
        
        // Bind parameters
        $this->db->bind(':user_id', $user_id);
        
        // Execute the query
        $this->db->execute();
        
        // Return the results
        return $this->db->resultSet();
    }


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


    public function getAllSalesorderspending() {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM salesorder WHERE status = 'Pending Approval'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        return $result;
    }

    public function getAllSalesordersapproved() {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM salesorder WHERE status = 'Approved'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        return $result;
    }
    

    public function getAllSalesordersqualityapproved() {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM salesorder WHERE status = 'Quality Approved'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        return $result;
    }

    public function getAllSalesordersqualityrejected() {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM salesorder WHERE status = 'Quality Rejected'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        return $result;
    }
    

    public function getAllSalesordersrejected() {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM salesorder WHERE status = 'Rejected'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        return $result;
    }

    public function getAllSalesorderscompleted() {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM salesorder WHERE LOWER(status) = 'completed'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        return $result;
    }
    


    public function add_salesorder($data){
        // Check if purchase_id is set and not null
        if (!isset($data['purchase_id']) || $data['purchase_id'] === null) {
            return false; // Indicate failure
        }
        
        // Check if the required fields are set
        $required_fields = ['name', 'type', 'quantity', 'price', 'date', 'address'];
        foreach ($required_fields as $field) {
            if (!isset($data[$field])) {
                return false; // Indicate failure
            }
        }
        
        // Retrieve the image URL based on the product name if available
        $image = isset($data['name']) ? $this->getProductImageURL($data['name']) : null;
        
        // Prepare SQL statement
        $this->db->query('INSERT INTO salesorder (name, type, quantity, price, status, date, address, purchase_id, user_id, image) VALUES (:name, :type, :quantity, :price, :status, :date, :address, :purchase_id, :user_id, :image)');
    
        // Bind parameters
        $this->db->bind(':name', $data['name'] ?? null);
        $this->db->bind(':type', $data['type'] ?? null);
        $this->db->bind(':quantity', $data['quantity'] ?? null);
        $this->db->bind(':price', $data['price'] ?? null);
        $this->db->bind(':status', $data['status'] ?? null);
        $this->db->bind(':date', $data['date'] ?? null);
        $this->db->bind(':address', $data['address'] ?? null);
        $this->db->bind(':purchase_id', $data['purchase_id'] ?? null);
        $this->db->bind(':user_id', $data['user_id'] ?? null);
        $this->db->bind(':image', $image); // Bind the image parameter
        
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
        $this->db->query('UPDATE salesorder SET name = :name, type = :type, quantity = :quantity, price = :price, date = :date, address = :address WHERE order_id = :order_id');

        // Bind parameters
        $this->db->bind(':order_id', $data['order_id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':price', $data['price']);
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
    public function delete_salesorder($order_id){
        // Prepare SQL statement
        $this->db->query('DELETE FROM salesorder WHERE order_id = :order_id');
    
        // Bind parameter
        $this->db->bind(':order_id', $order_id);
    
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
    

  
    
        // Other methods in the Salesorder model...
    
        public function getPurchaseIdByOrderId($order_id) {
            $this->db->query('SELECT purchase_id FROM salesorder WHERE order_id = :order_id');
            $this->db->bind(':order_id', $order_id);
            $row = $this->db->single();
            return $row ? $row->purchase_id : null;
        }
    


        public function add_salesordercommon($data){
            // Check if purchase_id is set and not null
            
            // Assuming you have a method to retrieve the image URL based on the product name
            // Replace getProductImageURL with your actual method
            $image = $this->getProductImageURL($data['name']);
        
            // Prepare SQL statement
            $this->db->query('INSERT INTO salesorder (name, type, quantity, price  , date, address, user_id, image) VALUES (:name, :type, :quantity, :price,  :date, :address, :user_id, :image)');
        
            // Bind parameters
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':type', $data['type']);
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':image', $image); // Bind the image URL
        
            // Execute query
            if ($this->db->execute()) {
                return true; // Indicate success
            } else {
                return false; // Indicate failure
            }
        }
        
        // Inside your model class (e.g., Salesorder model)
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



    // Method to get sales order data
    
    
    // Method to get sales order data
    public function getSalesOrderData($orderId) {
        $this->db->query('SELECT quantity, name, user_id FROM salesorder WHERE order_id = :orderId');
        $this->db->bind(':orderId', $orderId);
        $row = $this->db->single();
        return $row;
    }


    public function getDate($id){
        $this->db->query('SELECT date FROM salesorder WHERE order_id = :id');

        $this->db->bind(':id', $id);

        $results = $this->db->single();

        return $results;
    }

    public function getQuantity($id){
        $this->db->query('SELECT quantity FROM salesorder WHERE order_id = :id');

        $this->db->bind(':id', $id);

        $results = $this->db->single();

        return $results;
    }

    public function allinDate($start, $end){
        $this->db->query("SELECT COUNT(*) AS count FROM salesorder WHERE date >= :start AND date <= :end;");

        $this->db->bind(':start', $start);
        $this->db->bind(':end', $end);

        $results = $this->db->single();

        return $results;
    }

    public function pendinginDate($start, $end){
        $this->db->query("SELECT COUNT(*) AS count FROM salesorder WHERE status = 'Pending Approval' AND date >= :start AND date <= :end;");

        $this->db->bind(':start', $start);
        $this->db->bind(':end', $end);

        $results = $this->db->single();

        return $results;
    }

    public function approvedinDate($start, $end){
        $this->db->query("SELECT COUNT(*) AS count FROM salesorder WHERE status = 'Approved' AND date >= :start AND date <= :end;");

        $this->db->bind(':start', $start);
        $this->db->bind(':end', $end);

        $results = $this->db->single();

        return $results;
    }

    public function rejectedinDate($start, $end){
        $this->db->query("SELECT COUNT(*) AS count FROM salesorder WHERE status = 'Rejected' AND date >= :start AND date <= :end;");

        $this->db->bind(':start', $start);
        $this->db->bind(':end', $end);

        $results = $this->db->single();

        return $results;
    }

    public function completedinDate($start, $end){
        $this->db->query("SELECT COUNT(*) AS count FROM salesorder WHERE status = 'Completed' AND date >= :start AND date <= :end;");

        $this->db->bind(':start', $start);
        $this->db->bind(':end', $end);

        $results = $this->db->single();

        return $results;
    }
}
    






        
    



        

      