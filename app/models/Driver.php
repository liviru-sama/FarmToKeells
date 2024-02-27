<?php
    class Driver{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function insert($data){
            $this->db->query('INSERT INTO driverinfo (D_name, D_email, D_contact, D_address, DateJoined) VALUES (:D_name, :D_email, :D_contact, :D_address, :DateJoined)');

            $this->db->bind(':D_name', $data['D_name']);
            $this->db->bind(':D_email', $data['D_email']);
            $this->db->bind(':D_contact', $data['D_contact']);
            $this->db->bind(':D_address', $data['D_address']);
            $this->db->bind(':DateJoined', $data['DateJoined']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getDriverByID($data){
            $this->db->query('SELECT * FROM driverinfo WHERE D_id = :id');

            $this->db->bind(':id', $data);

            $results = $this->db->single();

            return $results;
        }

        public function getUnassignedDrivers(){
            $this->db->query('SELECT driverinfo.* FROM driverinfo LEFT JOIN vehicleinfo ON driverinfo.D_id = vehicleinfo.D_id WHERE vehicleinfo.D_id IS NULL');

            $results = $this->db->resultSet();

            return $results;
        }

    }