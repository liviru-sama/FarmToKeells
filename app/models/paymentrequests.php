<?php

class Paymentrequests {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Get all payment requests
    public function getAllPaymentRequests() {
        $this->db->query('SELECT * FROM paymentrequests');
        return $this->db->resultSet();
    }


    public function getPaymentRequestsByUserId($userId)
{
    $this->db->query('SELECT * FROM paymentrequests WHERE user_id = :userId');
    $this->db->bind(':userId', $userId);

    return $this->db->resultSet();
}

}
