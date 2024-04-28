<?php
// Inquiry model

// CCM Chat model

class FarmerNotifications {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Method to fetch all chats from the database
   // Method to fetch all notifications from the database
// Method to fetch all notifications from the database
public function getAllNotifications() {
    $this->db->query('SELECT * FROM farmernotifications');
    return $this->db->resultSet();
}

public function isRead() {
    $this->db->query('UPDATE farmernotifications SET is_read = 0');
    $this->db->execute();
}

public function unreadNotifs() {
    $this->db->query('SELECT COUNT(*) as count FROM farmernotifications WHERE is_read = 1');
    $this->db->execute();
    $count = $this->db->single()->count;
    
    return $count > 0;
}



public function getNotificationsByUserId($user_id) {
    // Prepare SQL statement to select notifications for a specific user
    $this->db->query('SELECT * FROM farmernotifications WHERE user_id = :user_id');
    $this->db->bind(':user_id', $user_id);

    // Execute the query
    $this->db->execute();

    // Fetch all notifications
    return $this->db->resultSet();
}



}

