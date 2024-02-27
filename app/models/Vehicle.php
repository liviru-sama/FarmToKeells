<?php
    class Vehicle{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function insert($data){
            $this->db->query('INSERT INTO vehicleinfo (License_no, chassis, vtype, model, capacity, D_id) VALUES (:License_no, :chassis, :vtype, :model, :capacity, :D_id)');

            $this->db->bind(':License_no', $data['License_no']);
            $this->db->bind(':chassis', $data['chassis']);
            $this->db->bind(':vtype', $data['vtype']);
            $this->db->bind(':model', $data['model']);
            $this->db->bind(':capacity', $data['capacity']);
            $this->db->bind(':D_id', $data['D_id']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getAllVehicles(){
            $this->db->query('SELECT * FROM vehicleinfo');

            $results = $this->db->resultSet();

            return $results;
        }

        public function getVehicleByID($id){
            $this->db->query('SELECT * FROM vehicleinfo WHERE V_id = :id');

            $this->db->bind(':id', $id);

            $result = $this->db->single();

            return $result;
        }


    }