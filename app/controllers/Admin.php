<?php
    class Admin extends Controller{
        public function dashboard(){
            $data = [];

            $this->view('admin/dashboard', $data);
        }


        public function stock_overview(){
            $data = [];

            $this->view('admin/stock_overview', $data);
        }

        public function selectorder(){
            $data = [];

            $this->view('admin/selectorder', $data);
        }

        public function purchaseorder() {
            // Instantiate Purchaseorder Model
            $purchaseorderModel = new Purchaseorder();
            
            // Get all purchase orders
            $data['purchaseorders'] = $purchaseorderModel->getAllPurchaseorders();
            
            // Load the view with purchase orders data
            $this->view('admin/purchaseorder', $data);
        }
        
        public function displayPurchaseorders() {
            // Create an instance of the PurchaseModel
            $purchaseorderModel = new PurchaseorderModel();
    
            // Call the method to fetch all products
            $purchaseorders = $purchaseorderModel->getAllPurchaseorders();
    
            // Pass the fetched products to the view
            require_once('views/admin/purchaseorder');
        }
    

        public function salesorder() {
            // Instantiate Purchaseorder Model
            $salesorderModel = new Salesorder();
            
            // Get all purchase orders
            $data['salesorders'] = $salesorderModel->getAllSalesorders();
            
            // Load the view with purchase orders data
            $this->view('admin/salesorder', $data);
        }
        
        public function displaySalesorders() {
            // Create an instance of the PurchaseModel
            $salesorderModel = new SalesorderModel();
    
            // Call the method to fetch all products
            $salesorders = $salesorderModel->getAllSalesorders();
    
            // Pass the fetched products to the view
            require_once('views/admin/salesorder');
        }

        public function admin_login()
    {
        $data = [];

            $this->view('admin/admin_login', $data);// Check for POST
       
    }
    }
?>