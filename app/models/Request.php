<?php
    class Request{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function insert($data){
            $this->db->query('INSERT INTO requests (order_id, user_id,  product_name, quantity, address, startdate, enddate, notes) VALUES (:order_id, :user_id, :product_name, :quantity, :address, :startdate, :enddate, :notes)');
            
            $this->db->bind(':order_id', $data['order_id']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':product_name', $data['product_name']); // Bind product_name
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':startdate', $data['startdate']);
            $this->db->bind(':enddate', $data['enddate']);
            $this->db->bind(':notes', $data['notes']);
            
            // Execute the query
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        
        public function delete($id){
  
            $this->db->query('DELETE FROM requests WHERE req_id = :id');
        
            $this->db->bind(':id', $id);
        
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function reject($id){
  
            $this->db->query('UPDATE requests SET active = 0 WHERE req_id = :id');
        
            $this->db->bind(':id', $id);
        
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getRequestByID($data){
            $this->db->query('SELECT * FROM requests WHERE req_id = :id');

            $this->db->bind(':id', $data['req_id']);

            $results = $this->db->single();

            return $results;
        }

        public function getActiveRequests(){
            $this->db->query('SELECT * FROM requests WHERE active = 1');

            $results = $this->db->resultSet();

            return $results;
        }

        public function getCancelledRequests(){
            $this->db->query('SELECT * FROM requests WHERE active = 0');

            $results = $this->db->resultSet();

            return $results;
        }


        // Request.php (Model)
public function requestExists($order_id) {
    // Perform a database query to check if a request for the given order ID exists
    // Assuming your table name is 'requests' and the order_id column name is 'order_id'
    $this->db->query('SELECT * FROM requests WHERE order_id = :order_id');
    $this->db->bind(':order_id', $order_id);
    $this->db->execute();

    // Return true if a row exists, indicating a request exists for this order ID
    return $this->db->rowCount() > 0;
}

    }