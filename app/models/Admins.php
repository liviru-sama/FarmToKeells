<?php
class Admin
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Login Admin
    public function login($username, $password)
    {
        $this->db->query('SELECT * FROM admins WHERE admin_username = :username');
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        if ($row) {
            // Compare plaintext passwords
            if ($row->admin_password === $password) {
                return $row; // Return admin data if password matches
            }
        }
        
        return false; // Return false if admin is not found or password does not match
    }

    // Find admin by username
    public function findAdminByUsername($username)
    {
        $this->db->query('SELECT * FROM admins WHERE admin_username = :username');
        $this->db->bind(':username', $username);
        $row = $this->db->single();

        return $row ? $row : false; // Return admin data if found, otherwise return false
    }

    // Register Admin
  
}
?>
