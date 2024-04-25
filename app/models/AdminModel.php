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

public function updateResetToken($adminId, $token) {
    $this->db->query('UPDATE admin SET reset_token = :token, reset_token_expire = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE admin_id = :adminId');
    $this->db->bind(':token', $token);
    $this->db->bind(':adminId', $adminId);

    return $this->db->execute();
}

public function updatePasswordByResetToken($token, $password) {
    $this->db->query('UPDATE admin SET admin_password = :password, reset_token = NULL, reset_token_expire = NULL WHERE reset_token = :token');
    $this->db->bind(':password', $password);
    $this->db->bind(':token', $token);

    return $this->db->execute();
}

public function getAdminByEmail($email) {
    $this->db->query('SELECT * FROM admin WHERE email = :email');
    $this->db->bind(':email', $email);
    return $this->db->single();
}

public function getAdminByResetToken($token) {
    $this->db->query('SELECT * FROM admin WHERE reset_token = :token AND reset_token_expire > NOW()');
    $this->db->bind(':token', $token);
    return $this->db->single();
}

public function acceptUser($userId) {
    $this->db->query('UPDATE users SET status = :status WHERE id = :userId');
    $this->db->bind(':status', 'accepted');
    $this->db->bind(':userId', $userId);
    return $this->db->execute();
}

public function rejectUser($userId) {
    $this->db->query('UPDATE users SET status = :status WHERE id = :userId');
    $this->db->bind(':status', 'rejected');
    $this->db->bind(':userId', $userId);
    return $this->db->execute();
}



}