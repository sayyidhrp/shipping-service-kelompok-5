<?php

namespace Tests\Feature;

use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\CIUnitTestCase;

class ShippingStatusTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function test_status_success()
    {
        $result = $this->get('/api/shipping/status/ORD123');

        $result->assertStatus(200);
        $result->assertJSONFragment([
            'success' => true,
        ]);
        $result->assertJSONFragment([
            'order_id' => 'ORD123',
            'status'   => 'on_delivery',
        ]);
    }

    public function test_status_not_found()
    {
        $result = $this->get('/api/shipping/status/ABC999');

        $result->assertStatus(404);
        $result->assertJSONFragment([
            'success' => false,
            'message' => 'Order ID tidak ditemukan',
        ]);
    }
}
