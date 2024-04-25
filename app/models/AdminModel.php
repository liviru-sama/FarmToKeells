<?php
class AdminModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function insertAdminCredentials($adminUsername, $hashedPassword, $email) {
        // Prepare the SQL query
        $this->db->query('INSERT INTO admin (admin_username, admin_password, email) VALUES (:adminUsername, :hashedPassword, :email)');
    
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


public function isEmailExists($email) {
    $this->db->query('SELECT  admin_id FROM admin WHERE email = :email');
    $this->db->bind(':email', $email);
    $this->db->execute();

    return $this->db->rowCount() > 0;
}

// Check if the username already exists in the database
public function isUsernameExists($admin_username) {
    $this->db->query('SELECT  admin_id FROM admin WHERE admin_username = :admin_username');
    $this->db->bind(':admin_username', $admin_username);
    $this->db->execute();

    return $this->db->rowCount() > 0;
}
}