<?php
    class Request{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function insert($data){
            $this->db->query('INSERT INTO requests (user_id, product_id, quantity, startdate, enddate, notes) VALUES (:user_id, :product_id, :quantity, :startdate, :enddate, :notes)');

            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':product_id', $data['product_id']);
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':startdate', $data['startdate']);
            $this->db->bind(':enddate', $data['enddate']);
            $this->db->bind(':notes', $data['notes']);

            //Execute
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