<?php
class QiModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function insertAdminCredentials($adminUsername, $hashedPassword, $email) {
        // Prepare the SQL query
        $this->db->query('INSERT INTO inspector (admin_username, admin_password, email) VALUES (:adminUsername, :hashedPassword, :email)');
    
        // Bind the parameters
        $this->db->bind(':adminUsername', $adminUsername);
        $this->db->bind(':hashedPassword', $hashedPassword);
        $this->db->bind(':email', $email);
    
        // Execute the query
        if ($this->db->execute()) {
            return true; // Insert successful
        } else {
            // If there's an error, print it
            echo "Error: " . $this->db->error(); 
            return false; // Insert failed
        }
    }


    public function validateLogin($adminUsername, $adminPassword)
{
    $this->db->query('SELECT * FROM inspector WHERE admin_username = :adminUsername');
    $this->db->bind(':adminUsername', $adminUsername);
    $row = $this->db->single();

    if ($row) {
        $storedPassword = $row->admin_password;
        // Compare the user-provided password with the stored hashed password
        if (password_verify($adminPassword, $storedPassword)) {
            return $row; // Return the admin object
        }
    }
    return false; // Invalid username or password
}

}