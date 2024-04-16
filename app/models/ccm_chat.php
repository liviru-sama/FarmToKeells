<?php
// Inquiry model

// CCM Chat model

class Ccm_Chat {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Method to fetch all chats from the database
    public function getAllChats() {
        $this->db->query('SELECT * FROM ccm_chat');
        return $this->db->resultSet();
    }

    // CCM Chat model method to add a new chat message to the database
public function addChat($inquiry) {
    // Prepare SQL statement
    $this->db->query('INSERT INTO ccm_chat (ccm_reply, created_at) VALUES (:inquiry, :created_at)');
    // Bind values
    $this->db->bind(':inquiry', $inquiry);
    $this->db->bind(':created_at', date('Y-m-d H:i:s'));
    // Execute
    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}

public function addChatadmin($admin_reply) {
    // Prepare SQL statement
    $this->db->query('INSERT INTO ccm_chat (admin_reply, admin_reply_time) VALUES (:admin_reply, :admin_reply_time)');
    // Bind values
    
$this->db->bind(':admin_reply', $admin_reply);
$this->db->bind(':admin_reply_time', date('Y-m-d H:i:s'));

    // Execute
    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}





}

