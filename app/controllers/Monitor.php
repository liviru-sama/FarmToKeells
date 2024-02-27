<?php

class Monitor extends Controller
{
    public function index(){
        $data = [
            'title' => 'Transport Monitor'
        ];
        
        $this->view('monitor/dashboard', $data);
    }

    public function driverList(){
        $data = [
            'title' => 'Drivers'
        ];
        
        $this->view('monitor/driverList', $data);
    }

    public function vehicleList(){
        $data = [
            'title' => 'Vehicles'
        ];

        $vehicles = $this->model('Vehicle');

        $drivers = $this->model('Driver');
        
        $data['vehicles'] = $vehicles->getAllVehicles();

        foreach ($data['vehicles'] as $vehicle) {
            $driver = $drivers->getDriverByID($vehicle->D_id);
            $vehicle->driver = $driver->D_name;
        }

        $this->view('monitor/vehicleList', $data);
    }

    public function vehicleInfo($id){
        $data = [
            'title' => 'Vehicle Information'
        ];

        $vehicles = $this->model('Vehicle');

        $drivers = $this->model('Driver');
        
        $data['vehicle'] = $vehicles->getVehicleByID($id);

        $driver = $drivers->getDriverByID($data['vehicle']->D_id);
        $data['vehicle']->driver = $driver->D_name;

        show($data['vehicle']);
        $this->view('monitor/vehicleList', $data);
    }

    public function addVehicle(){
        $data = [
            'title' => 'Add New Vehicle'
        ];

        $Drivers = $this->model('Driver');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'License_no' => trim($_POST['License_no']),
                'chassis' => trim($_POST['chassis']),
                'vtype' => trim($_POST['vtype']),
                'model' => trim($_POST['model']),
                'capacity' => trim($_POST['capacity']),
                'D_id' => trim($_POST['D_id'])
            ];

            $data['errors'] = [
                'License_no_err' => '',
                'chassis_err' => '',
                'vtype_err' => '',
                'model_err' => '',
                'capacity_err' => '',
                'D_id_err' => ''
            ];

            $data['errors']['errnum'] = 0;

            if (empty($data['License_no'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['License_no_err'] = 'Please provide a License Number';
            }

            if (empty($data['chassis'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['chassis_err'] = 'Please provide a Chassis Number';
            }

            if (empty($data['vtype'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['vtype_err'] = 'Please provide a Vehicle Type';
            }

            if (empty($data['model'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['model_err'] = 'Please provide a Vehicle Model';
            }

            if (empty($data['capacity'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['capacity_err'] = 'Please provide Vehicle Capacity';
            }

            if (empty($data['D_id'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_id_err'] = 'Please assign a Driver';
            }


            if ($data['errors']['errnum'] > 0){

                $UnassignedDrivers = $Drivers->getUnassignedDrivers();
                
                $data['Drivers'] = $UnassignedDrivers;
                
                $this->view('Monitor/addVehicle', $data);
            } else {
                $vehicles = $this->model('Vehicle');

                if ($vehicles->insert($data)) {
                    redirect('Monitor/addVehicle');
                } else {
                    die('Something went wrong');
                }
            }

        } else {
            $data = [
                'title' => 'Add New Vehicle'
            ];

            $data['errors'] = [
                'License_no_err' => '',
                'chassis_err' => '',
                'vtype_err' => '',
                'model_err' => '',
                'capacity_err' => '',
                'D_id_err' => ''
            ];

            $UnassignedDrivers = $Drivers->getUnassignedDrivers();
            
            $data['Drivers'] = $UnassignedDrivers;
            
            $this->view('Monitor/addVehicle', $data);
        }
    }

    public function addDriver(){
        $data = [
            'title' => 'Add Driver'
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'D_name' => trim($_POST['D_name']),
                'D_email' => trim($_POST['D_email']),
                'D_contact' => trim($_POST['D_contact']),
                'D_address' => trim($_POST['D_address']),
                'DateJoined' => trim($_POST['DateJoined'])
            ];

            $data['errors'] = [
                'D_name_err' => '',
                'D_email_err' => '',
                'D_contact_err' => '',
                'D_address_err' => '',
                'DateJoined_err' => ''
            ];

            $data['errors']['errnum'] = 0;

            if (empty($data['D_name'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_name_err'] = 'Please provide a Name';
            }

            if (empty($data['D_email'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_email_err'] = 'Please provide an Email';
            }

            if (empty($data['D_contact'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_contact_err'] = 'Please provide a Contact Number';
            }

            if (empty($data['D_address'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_address_err'] = 'Please provide an Address';
            }

            if (empty($data['DateJoined'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['DateJoined_err'] = 'Please provide the Date Joined';
            }

            if ($data['errors']['errnum'] > 0){

                $this->view('Monitor/addDriver', $data);
            } else {
                $drivers = $this->model('Driver');

                if ($drivers->insert($data)) {
                    redirect('Monitor/addDriver');
                } else {
                    die('Something went wrong');
                }
            }

        } else {
            $data = [
                'title' => 'Add Driver'
            ];

            $data['errors'] = [
                'D_name_err' => '',
                'D_email_err' => '',
                'D_contact_err' => '',
                'D_address_err' => '',
                'DateJoined_err' => ''
            ];
            
            $this->view('Monitor/addDriver', $data);
        }
    }
}