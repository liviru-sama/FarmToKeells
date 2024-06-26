<?php
// Inquiry model

// CCM Chat model

class TmNotifications {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Method to fetch all chats from the database
   // Method to fetch all notifications from the database
// Method to fetch all notifications from the database
public function getAllNotifications() {
    $this->db->query('SELECT * FROM tmnotifications');
    return $this->db->resultSet();
}

public function isRead() {
    $this->db->query('UPDATE tmnotifications SET is_read = 0');
    $this->db->execute();
}

public function unreadNotifs() {
    $this->db->query('SELECT COUNT(*) as count FROM tmnotifications WHERE is_read = 1');
    $this->db->execute();
    $count = $this->db->single()->count;
    
    return $count > 0;
}

}

