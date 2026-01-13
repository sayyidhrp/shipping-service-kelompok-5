# Shipping API Testing

## Endpoint
GET /api/shipping/status/{order_id}

## Test Case 1 - Order Valid
Request:
GET /api/shipping/status/ORD123

Response:
```json
{
  "order_id": "ORD123",
  "status": "on_delivery"
}
