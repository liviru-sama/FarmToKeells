<?php
// Inquiry model

// CCM Chat model

class Tm_Chat {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Method to fetch all chats from the database
    public function getAllChats() {
        $this->db->query('SELECT * FROM tm_chat');
        return $this->db->resultSet();
    }

    // CCM Chat model method to add a new chat message to the database
public function addChat($inquiry) {
    date_default_timezone_set('Asia/Kolkata'); 
    $this->db->query('INSERT INTO tm_chat (tm_reply, created_at) VALUES (:inquiry, NOW())');
    // Bind values
    $this->db->bind(':inquiry', $inquiry);
    // Execute
    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}

public function addChatadmintm($admin_reply) {
    // Prepare SQL statement
    $this->db->query('INSERT INTO tm_chat (admin_reply, admin_reply_time) VALUES (:admin_reply, NOW())');
    // Bind values
    
$this->db->bind(':admin_reply', $admin_reply);

    // Execute
    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}





}

