<?php
    class Torders{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function create($data){
            $this->db->query('INSERT INTO torders (order_id, user_id, V_id, product_name) VALUES (:order_id, :user_id, :V_id, :product_name)');

            $this->db->bind(':order_id', $data['order_id']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':V_id', $data['V_id']);
            $this->db->bind(':product_name', $data['product']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getTorders(){
            $this->db->query('SELECT * FROM torders WHERE status > 0');

            $results = $this->db->resultSet();

            return $results;
        }

        public function getTorderByID($id){
            $this->db->query('SELECT * FROM torders WHERE order_id = :id');

            $this->db->bind(':id', $id);

            $results = $this->db->single();

            return $results;
        }

        public function statusupdate($id,$newstatus){
  
            $this->db->query('UPDATE torders SET status = :new WHERE order_id = :id');
        
            $this->db->bind(':id', $id);
            $this->db->bind(':new', $newstatus);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

    }