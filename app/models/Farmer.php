<?php

// app/models/Farmer.php

class Farmers extends Model {
    // Fetch user data by ID
    public function getUserById($id) {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    
}
?>
