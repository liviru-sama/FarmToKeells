<?php

class Transport extends Controller
{
    public function index(){
        $data = [
            'title' => 'Transport Dashboard'
        ];
        
        $this->view('transport/dashboard', $data);
    }

    public function pending_requests(){
        $data = [
            'title' => 'Transport Requests'
        ];

        $requests = $this->model('Request');

        $users = $this->model('User');

        $products = $this->model('Product');

        $data['activeRequests'] = $requests->getActiveRequests();

        // show($data['activeRequests']);

        foreach ($data['activeRequests'] as $request) {
            $user = $users->findUserByID($request->user_id);
            $request->user = $user->name;
            $product = $products->getProductByID($request->product_id);
            $request->product = $product->name;
        }

        $this->view('transport/pending_requests', $data);
    }

    public function cancelled_requests(){
        $data = [
            'title' => 'Transport Requests'
        ];

        $requests = $this->model('Request');

        $users = $this->model('User');

        $products = $this->model('Product');

        $data['cancelledRequests'] = $requests->getCancelledRequests();

        // show($data['activeRequests']);
        foreach ($data['cancelledRequests'] as $request) {
            $user = $users->findUserByID($request->user_id);
            $request->user = $user->name;
            $product = $products->getProductByID($request->product_id);
            $request->product = $product->name;
        }

        $this->view('transport/cancelled_requests', $data);
    }

    public function resources() {

    }
}
