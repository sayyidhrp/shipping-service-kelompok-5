# API Documentation - Shipping Service

## Base URL
```
http://localhost:8080/api/shipping
```

## Endpoints

### 1. Create Shipping Data
Membuat data pengiriman baru.

**Endpoint:** `POST /api/shipping/create`

**Request Body:**
```json
{
    "order_id": "ORD-001",
    "recipient_name": "John Doe",
    "recipient_address": "Jl. Merdeka No. 123, Jakarta Pusat",
    "recipient_phone": "081234567890",
    "courier_service": "JNE",
    "shipping_cost": 15000.00,
    "weight": 2.5
}
```

**Request Fields:**
| Field | Type | Required | Description |
|-------|------|----------|-------------|
| order_id | string | Yes | ID order yang unik (max 100 chars) |
| recipient_name | string | Yes | Nama penerima (max 255 chars) |
| recipient_address | string | Yes | Alamat lengkap penerima |
| recipient_phone | string | Yes | Nomor telepon penerima (max 20 chars) |
| courier_service | string | Yes | Nama jasa kurir (max 50 chars) |
| shipping_cost | decimal | Yes | Biaya pengiriman |
| weight | decimal | Yes | Berat barang dalam kg |

**Success Response (201 Created):**
```json
{
    "status": "success",
    "message": "Shipping data created successfully",
    "data": {
        "id": 1,
        "order_id": "ORD-001",
        "recipient_name": "John Doe",
        "recipient_address": "Jl. Merdeka No. 123, Jakarta Pusat",
        "recipient_phone": "081234567890",
        "courier_service": "JNE",
        "shipping_cost": "15000.00",
        "weight": "2.50",
        "status": "pending",
        "tracking_number": "TRK65E7A8B1234",
        "estimated_delivery": "2026-01-10",
        "created_at": "2026-01-05 12:00:00",
        "updated_at": "2026-01-05 12:00:00"
    }
}
```

**Error Response (400 Bad Request):**
```json
{
    "status": 400,
    "error": 400,
    "messages": {
        "error": "Order ID already exists"
    }
}
```

**Error Response (422 Validation Error):**
```json
{
    "status": 422,
    "error": 422,
    "messages": {
        "order_id": "The order_id field is required.",
        "recipient_name": "The recipient_name field is required."
    }
}
```

---

### 2. Get Shipping Status by Order ID
Mengecek status pengiriman berdasarkan ID Order.

**Endpoint:** `GET /api/shipping/status/{order_id}`

**URL Parameters:**
| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| order_id | string | Yes | ID order yang ingin dicek |

**Example Request:**
```
GET /api/shipping/status/ORD-001
```

**Success Response (200 OK):**
```json
{
    "status": "success",
    "message": "Shipping data retrieved successfully",
    "data": {
        "id": 1,
        "order_id": "ORD-001",
        "recipient_name": "John Doe",
        "recipient_address": "Jl. Merdeka No. 123, Jakarta Pusat",
        "recipient_phone": "081234567890",
        "courier_service": "JNE",
        "shipping_cost": "15000.00",
        "weight": "2.50",
        "status": "in_transit",
        "tracking_number": "TRK65E7A8B1234",
        "estimated_delivery": "2026-01-10",
        "created_at": "2026-01-05 12:00:00",
        "updated_at": "2026-01-06 08:00:00"
    }
}
```

**Error Response (404 Not Found):**
```json
{
    "status": 404,
    "error": 404,
    "messages": {
        "error": "Shipping data not found for order ID: ORD-999"
    }
}
```

---

### 3. Get All Shipping Data
Mengambil semua data pengiriman.

**Endpoint:** `GET /api/shipping`

**Success Response (200 OK):**
```json
{
    "status": "success",
    "message": "Shipping data retrieved successfully",
    "data": [
        {
            "id": 1,
            "order_id": "ORD-001",
            "recipient_name": "John Doe",
            "recipient_address": "Jl. Merdeka No. 123, Jakarta Pusat",
            "recipient_phone": "081234567890",
            "courier_service": "JNE",
            "shipping_cost": "15000.00",
            "weight": "2.50",
            "status": "in_transit",
            "tracking_number": "TRK65E7A8B1234",
            "estimated_delivery": "2026-01-10",
            "created_at": "2026-01-05 12:00:00",
            "updated_at": "2026-01-06 08:00:00"
        },
        {
            "id": 2,
            "order_id": "ORD-002",
            "recipient_name": "Jane Smith",
            "recipient_address": "Jl. Sudirman No. 456, Jakarta Selatan",
            "recipient_phone": "081234567891",
            "courier_service": "J&T",
            "shipping_cost": "12000.00",
            "weight": "1.80",
            "status": "delivered",
            "tracking_number": "TRK65E7A8B5678",
            "estimated_delivery": "2026-01-09",
            "created_at": "2026-01-04 10:00:00",
            "updated_at": "2026-01-09 14:00:00"
        }
    ]
}
```

---

### 4. Get Shipping Data by ID
Mengambil data pengiriman berdasarkan ID internal.

**Endpoint:** `GET /api/shipping/{id}`

**URL Parameters:**
| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| id | integer | Yes | ID internal shipping |

**Example Request:**
```
GET /api/shipping/1
```

**Success Response (200 OK):**
```json
{
    "status": "success",
    "message": "Shipping data retrieved successfully",
    "data": {
        "id": 1,
        "order_id": "ORD-001",
        "recipient_name": "John Doe",
        "recipient_address": "Jl. Merdeka No. 123, Jakarta Pusat",
        "recipient_phone": "081234567890",
        "courier_service": "JNE",
        "shipping_cost": "15000.00",
        "weight": "2.50",
        "status": "in_transit",
        "tracking_number": "TRK65E7A8B1234",
        "estimated_delivery": "2026-01-10",
        "created_at": "2026-01-05 12:00:00",
        "updated_at": "2026-01-06 08:00:00"
    }
}
```

**Error Response (404 Not Found):**
```json
{
    "status": 404,
    "error": 404,
    "messages": {
        "error": "Shipping data not found"
    }
}
```

---

### 5. Update Shipping Data
Mengupdate data pengiriman yang sudah ada.

**Endpoint:** `PUT /api/shipping/{id}` atau `PATCH /api/shipping/{id}`

**URL Parameters:**
| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| id | integer | Yes | ID internal shipping |

**Request Body (JSON):**
```json
{
    "status": "delivered",
    "recipient_phone": "081234567999"
}
```

**Note:** Semua field bersifat opsional. Hanya field yang dikirim yang akan diupdate. Field `id`, `order_id`, dan `created_at` tidak dapat diupdate.

**Success Response (200 OK):**
```json
{
    "status": "success",
    "message": "Shipping data updated successfully",
    "data": {
        "id": 1,
        "order_id": "ORD-001",
        "recipient_name": "John Doe",
        "recipient_address": "Jl. Merdeka No. 123, Jakarta Pusat",
        "recipient_phone": "081234567999",
        "courier_service": "JNE",
        "shipping_cost": "15000.00",
        "weight": "2.50",
        "status": "delivered",
        "tracking_number": "TRK65E7A8B1234",
        "estimated_delivery": "2026-01-10",
        "created_at": "2026-01-05 12:00:00",
        "updated_at": "2026-01-09 16:00:00"
    }
}
```

**Error Response (404 Not Found):**
```json
{
    "status": 404,
    "error": 404,
    "messages": {
        "error": "Shipping data not found"
    }
}
```

---

### 6. Delete Shipping Data
Menghapus data pengiriman.

**Endpoint:** `DELETE /api/shipping/{id}`

**URL Parameters:**
| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| id | integer | Yes | ID internal shipping |

**Example Request:**
```
DELETE /api/shipping/1
```

**Success Response (200 OK):**
```json
{
    "status": "success",
    "message": "Shipping data deleted successfully"
}
```

**Error Response (404 Not Found):**
```json
{
    "status": 404,
    "error": 404,
    "messages": {
        "error": "Shipping data not found"
    }
}
```

---

## Status Codes

| Code | Description |
|------|-------------|
| 200 | OK - Request berhasil |
| 201 | Created - Resource berhasil dibuat |
| 400 | Bad Request - Request tidak valid |
| 404 | Not Found - Resource tidak ditemukan |
| 422 | Validation Error - Validasi gagal |
| 500 | Server Error - Kesalahan server |

---

## Testing with cURL

### Create Shipping
```bash
curl -X POST http://localhost:8080/api/shipping/create \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -d "order_id=ORD-001" \
  -d "recipient_name=John Doe" \
  -d "recipient_address=Jl. Merdeka No. 123, Jakarta Pusat" \
  -d "recipient_phone=081234567890" \
  -d "courier_service=JNE" \
  -d "shipping_cost=15000.00" \
  -d "weight=2.5"
```

### Get Shipping Status
```bash
curl -X GET http://localhost:8080/api/shipping/status/ORD-001
```

### Get All Shipping
```bash
curl -X GET http://localhost:8080/api/shipping
```

### Update Shipping
```bash
curl -X PUT http://localhost:8080/api/shipping/1 \
  -H "Content-Type: application/json" \
  -d '{"status": "delivered"}'
```

### Delete Shipping
```bash
curl -X DELETE http://localhost:8080/api/shipping/1
```

---

## Testing with Postman

1. **Import Collection**: Buat collection baru di Postman
2. **Set Base URL**: `http://localhost:8080/api/shipping`
3. **Create Request**: Buat request untuk setiap endpoint
4. **Set Headers**: Untuk POST/PUT requests, set `Content-Type: application/json`
5. **Test**: Jalankan request dan verifikasi response

---

## Notes

- Semua response menggunakan format JSON
- Tracking number dan estimated delivery secara otomatis digenerate saat create
- Status default adalah `pending` saat data dibuat
- Estimated delivery dihitung secara random antara 3-7 hari dari tanggal pembuatan
- Tracking number format: `TRK{UNIQUE_ID}{RANDOM_NUMBER}`
