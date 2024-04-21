<?php
class AdminModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Method to insert a preferred admin username and hashed password into the ccm table
    public function insertAdminCredentials($adminUsername, $hashedPassword) {
        // Prepare the SQL query
        $this->db->query('INSERT INTO admin (admin_username, admin_password) VALUES (:adminUsername, :hashedPassword)');

        // Bind the parameters
        $this->db->bind(':adminUsername', $adminUsername);
        $this->db->bind(':hashedPassword', $hashedPassword);

        // Execute the query
        if ($this->db->execute()) {
            return true; // Insert successful
        } else {
            return false; // Insert failed
        }
    }


    public function validateLogin($adminUsername, $adminPassword)
{
    $this->db->query('SELECT * FROM admin WHERE admin_username = :adminUsername');
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


public function getPendingRegistrationRequests()
{
    $this->db->query('SELECT id as user_id, name, email FROM users WHERE status = "pending"');
    $result = $this->db->resultSet();

    if ($this->db->rowCount() > 0) {
        return $result;
    } else {
        return [];
    }
}



}
