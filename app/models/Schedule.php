<?php
    class Schedule{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function create($data){
            $this->db->query('INSERT INTO schedule (order_id, V_id, date, slots) VALUES (:order_id, :V_id, :date, :slots)');

            $this->db->bind(':order_id', $data['order_id']);
            $this->db->bind(':V_id', $data['V_id']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':slots', $data['slots']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getSlots($date, $vehicle){
            $this->db->query('SELECT slots FROM schedule WHERE date = :d AND V_id = :id');

            $this->db->bind(':d', $date);
            $this->db->bind(':id', $vehicle->V_id);

            $results = $this->db->resultSet();
            $slots = 0;

            foreach ($results as $row) {
                $slots += $row->slots;
            }

            return $slots;
        }

        public function getByOrder($id){
            $this->db->query('SELECT * FROM schedule WHERE order_id = :id');

            $this->db->bind(':id', $id);

            $results = $this->db->resultSet();

            return $results;
        }

    }