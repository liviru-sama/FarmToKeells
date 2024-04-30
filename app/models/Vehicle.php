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

        public function update($data){
            $this->db->query('UPDATE vehicleinfo SET License_no=:License_no, chassis=:chassis, vtype=:vtype, model=:model, capacity=:capacity, D_id=:D_id WHERE V_id = :V_id');

            $this->db->bind(':License_no', $data['License_no']);
            $this->db->bind(':chassis', $data['chassis']);
            $this->db->bind(':vtype', $data['vtype']);
            $this->db->bind(':model', $data['model']);
            $this->db->bind(':capacity', $data['capacity']);
            $this->db->bind(':D_id', $data['D_id']);
            $this->db->bind(':V_id', $data['V_id']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function delete($data){
            $this->db->query('DELETE FROM vehicleinfo WHERE V_id = :id');

            $this->db->bind(':id', $data['id']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getAllVehicles(){
            $this->db->query('SELECT * FROM vehicleinfo ORDER BY active DESC');

            $results = $this->db->resultSet();

            return $results;
        }

        public function getVehicleByID($id){
            $this->db->query('SELECT * FROM vehicleinfo WHERE V_id = :id');

            $this->db->bind(':id', $id);

            $result = $this->db->single();

            return $result;
        }

        public function quantityVehicles($quantity){
            $this->db->query('SELECT * FROM vehicleinfo WHERE capacity >= :quantity AND active = 1');

            $this->db->bind(':quantity', $quantity);

            $result = $this->db->resultSet();

            return $result;
        }

        public function setactive($id, $state){
            $this->db->query('UPDATE vehicleinfo SET active=:state WHERE V_id = :id');

            $this->db->bind(':id', $id);
            $this->db->bind(':state', $state);

            $this->db->execute();
        }

        public function getDriver($id){
            $this->db->query('SELECT D_id FROM vehicleinfo WHERE V_id = :id');

            $this->db->bind(':id', $id);

            $result = $this->db->single();

            return $result;
        }

        public function checkChassis($chassis){
            $this->db->query('SELECT COUNT(*) AS count FROM vehicleinfo WHERE chassis = :chassis');

            $this->db->bind(':chassis', $chassis);

            $result = $this->db->single();

            return $result;
        }

        public function checkLicense($license){
            $this->db->query('SELECT COUNT(*) AS count FROM vehicleinfo WHERE License_no = :license');

            $this->db->bind(':license', $license);

            $result = $this->db->single();

            return $result;
        }


    }