<?php
    class Torders{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function create($data){
            $this->db->query('INSERT INTO torders (order_id, user_id, V_id, product_name, D_id, date) VALUES (:order_id, :user_id, :V_id, :product_name, :D_id, :date)');

            $this->db->bind(':order_id', $data['order_id']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':V_id', $data['V_id']);
            $this->db->bind(':product_name', $data['product']);
            $this->db->bind(':D_id', $data['D_id']);
            $this->db->bind(':date', $data['date']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getTorders(){
            $this->db->query('SELECT * FROM torders WHERE status > 0 AND status < 4');

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

        public function getByUser($id){
            $this->db->query("SELECT *,
                CASE 
                    WHEN status = 1 THEN 'Accepted'
                    WHEN status = 2 THEN 'Out for Pickup'
                    WHEN status = 3 THEN 'Collected'
                    WHEN status = 4 THEN 'Completed'
                    ELSE 'Accepted'
                END AS status FROM torders WHERE user_id = :id;");

            $this->db->bind(':id', $id);

            $results = $this->db->resultSet();

            return $results;
        }

        public function reDriver($id,$driver){
  
            $this->db->query('UPDATE torders SET D_id = :driver WHERE order_id = :id');
        
            $this->db->bind(':id', $id);
            $this->db->bind(':driver', $driver);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function allinDate($start, $end){
            $this->db->query("SELECT COUNT(*) AS count FROM torders WHERE date >= :start AND date <= :end;");
    
            $this->db->bind(':start', $start);
            $this->db->bind(':end', $end);
    
            $results = $this->db->single();
    
            return $results;
        }
    
        public function pendinginDate($start, $end){
            $this->db->query("SELECT COUNT(*) AS count FROM torders WHERE status = 1 AND date >= :start AND date <= :end;");
    
            $this->db->bind(':start', $start);
            $this->db->bind(':end', $end);
    
            $results = $this->db->single();
    
            return $results;
        }
    
        public function pickupinDate($start, $end){
            $this->db->query("SELECT COUNT(*) AS count FROM torders WHERE status = 2 AND date >= :start AND date <= :end;");
    
            $this->db->bind(':start', $start);
            $this->db->bind(':end', $end);
    
            $results = $this->db->single();
    
            return $results;
        }
    
        public function collectedinDate($start, $end){
            $this->db->query("SELECT COUNT(*) AS count FROM torders WHERE status = 3 AND date >= :start AND date <= :end;");
    
            $this->db->bind(':start', $start);
            $this->db->bind(':end', $end);
    
            $results = $this->db->single();
    
            return $results;
        }
    
        public function completedinDate($start, $end){
            $this->db->query("SELECT COUNT(*) AS count FROM torders WHERE status = 4 AND date >= :start AND date <= :end;");
    
            $this->db->bind(':start', $start);
            $this->db->bind(':end', $end);
    
            $results = $this->db->single();
    
            return $results;
        }

        public function jobsDone($start, $end, $V_id){
            $this->db->query("SELECT COUNT(*) AS count FROM torders WHERE V_id = :V_id AND status = 4 AND date >= :start AND date <= :end;");
    
            $this->db->bind(':start', $start);
            $this->db->bind(':end', $end);
            $this->db->bind(':V_id', $V_id);
    
            $results = $this->db->single();
    
            return $results;
        }

    }