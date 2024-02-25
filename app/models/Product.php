<?php
    class Product{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        //get all products
        public function getAllProducts(){
            $this->db->query('SELECT * FROM product');

            $results = $this->db->resultSet();

            return $results;
        }

        public function getProductByID($data){
            $this->db->query('SELECT * FROM product WHERE product_id = :id');

            $this->db->bind(':id', $data);

            $results = $this->db->single();

            return $results;
        }
    }