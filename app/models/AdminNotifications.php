<?php
// Inquiry model

// CCM Chat model

class AdminNotifications {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Method to fetch all chats from the database
   // Method to fetch all notifications from the database
// Method to fetch all notifications from the database
public function getAllNotifications() {
    $this->db->query('SELECT * FROM adminnotifications');
    return $this->db->resultSet();
}



}

