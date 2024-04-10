<?php
    class Request{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function insert($data){
            $this->db->query('INSERT INTO requests (order_id, user_id,  product_name, quantity, startdate, enddate, notes) VALUES (:order_id, :user_id, :product_name, :quantity, :startdate, :enddate, :notes)');
            
            $this->db->bind(':order_id', $data['order_id']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':product_name', $data['product_name']); // Bind product_name
            $this->db->bind(':quantity', $data['quantity']);
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
    }