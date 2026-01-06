<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ShippingController extends ResourceController
{
    public function create()
    {
        $order_id = $this->request->getPost('order_id');

        $data = [
            'order_id' => $order_id,
            'cost' => 20000,
            'estimated_days' => 3,
            'status' => 'processing'
        ];

        // nanti disambung ke model
        return $this->respond([
            'message' => 'Shipping created',
            'data' => $data
        ]);
    }
}
