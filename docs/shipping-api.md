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

## Asumsi & Batasan

- API ini masih menggunakan data simulasi (mock), belum terhubung ke database.
- Validasi order dilakukan secara sederhana untuk kebutuhan pembelajaran.
- Status pengiriman tidak diperbarui secara real-time.
- Endpoint hanya mendukung pengecekan status pengiriman.
