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
                                                                                                                                                                                                                                                                                                                                                                    
public function status($order_id = null)
{
    if (!$order_id) {
        return $this->respond([
            'success' => false,
            'message' => 'Order ID tidak boleh kosong'
        ], 400);
    }

    if ($order_id !== 'ORD123') {
        return $this->respond([
            'success' => false,
            'message' => 'Order ID tidak ditemukan'
        ], 404);
    }

    return $this->respond([
        'success' => true,
        'data' => [
            'order_id' => $order_id,
            'status' => 'on_delivery'
        ]
    ]);
}



}
