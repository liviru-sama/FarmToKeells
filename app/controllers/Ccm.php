<?php
    class Ccm extends Controller{
        public function dashboard(){
            $data = [];

            $this->view('ccm/dashboard', $data);
        }

        public function view_inventory(){
            $data = [];

            $this->view('ccm/view_inventory', $data);
        }

        public function add_product(){
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                

                // Instantiate Product Model with Database dependency injection
                $productModel = new Product($this->db);
        
                // Sanitize and validate POST data
                $name = trim($_POST['name']);
                $type = trim($_POST['type']);
                $quantity = trim($_POST['quantity']);
                $price = trim($_POST['price']);
        
                // Check for required fields
                if (empty($name) || empty($type) || empty($quantity) || empty($price)) {
                    echo "Please fill in all fields.";
                    return;
                }
        
                // Attempt to add product
                $data = [
                    'name' => $name,
                    'type' => $type,
                    'quantity' => $quantity,
                    'price' => $price
                ];
        
                if ($productModel->add_product($data)) {
                    // Product added successfully
                    // Redirect to view inventory page
                    $this->redirect('ccm/view_inventory');
                    exit();
                } else {
                    // Product addition failed
                    echo "Failed to add product.";
                }
            } else {
                // If not a POST request, redirect to the add product page or show an error message
                echo "Invalid request method.";
            }
        }
        
       
    }
        
?>