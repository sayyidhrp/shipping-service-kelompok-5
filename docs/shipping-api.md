# Shipping API Documentation

## Endpoint
GET /api/shipping/status/{order_id}

## Deskripsi
Endpoint ini digunakan untuk mengecek status pengiriman berdasarkan `order_id`.

## Parameter
- `order_id` (string) : ID order pengiriman

## Response Sukses (200)
```json
{
  "success": true,
  "data": {
    "order_id": "ORD123",
    "status": "on_delivery"
  }
}
