<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ShippingController extends ResourceController
{
    public function index()
    {
        return $this->respond([
            'message' => 'Shipping API is running'
        ]);
    }

    public function status($order_id)
    {
        return $this->respond([
            'order_id' => $order_id,
            'status' => 'on_delivery'
        ]);
    }
}
