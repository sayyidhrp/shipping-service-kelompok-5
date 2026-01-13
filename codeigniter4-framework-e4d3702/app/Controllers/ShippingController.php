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
}
