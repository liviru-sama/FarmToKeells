<?php
// TmChat.php
class TmChat {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Method to get tm_chats from the database
    public function getTmChats() {
        $this->db->query('SELECT * FROM tm_chat');
        return $this->db->resultSet();
    }

    // Additional methods for adding, updating, or deleting chat messages if needed
    public function addTmChat($tm_reply, $tm_reply_time) {
        $this->db->query('INSERT INTO tm_chat (tm_reply, tm_reply_time) VALUES (:tm_reply, :tm_reply_time)');
        $this->db->bind(':tm_reply', $tm_reply);
        $this->db->bind(':tm_reply_time', $tm_reply_time);
        
        // Execute the query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
