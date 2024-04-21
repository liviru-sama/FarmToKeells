<?php
// Inquiry model

class Inquiry {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Method to store an inquiry in the database
    public function storeInquiry($data) {
        $this->db->query('INSERT INTO inquiry (user_id, username, contact_no, email, inquiry, created_at) VALUES (:user_id, :username, :contact_no, :email, :inquiry, NOW())');
        // Bind values
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':contact_no', $data['contact_no']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':inquiry', $data['inquiry']);

        // Execute query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Inquiry model method to fetch all inquiries from the database
    public function getAllInquiries() {
        $this->db->query('SELECT * FROM inquiry');
        return $this->db->resultSet();
    }

    // Inquiry model method to fetch inquiries of the current user from the database
    public function getUserInquiries($user_id) {
        $this->db->query('SELECT * FROM inquiry WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();
    }

    // Inquiry model method to update admin_reply and admin_reply_time
    public function updateAdminReply($inquiry_id, $admin_reply) {
        // Prepare SQL statement to update admin_reply and admin_reply_time
        $this->db->query('UPDATE inquiry SET admin_reply = :admin_reply, admin_reply_time = NOW() WHERE id = :inquiry_id');

        // Bind values
        $this->db->bind(':admin_reply', $admin_reply);
        $this->db->bind(':inquiry_id', $inquiry_id);

        // Execute query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Inquiry model method to fetch an inquiry by its ID
    public function getInquiryById($inquiry_id) {
        $this->db->query('SELECT * FROM inquiry WHERE id = :inquiry_id');
        $this->db->bind(':inquiry_id', $inquiry_id);

        return $this->db->single(); // Assuming single() method fetches a single row
    }
}
?>
