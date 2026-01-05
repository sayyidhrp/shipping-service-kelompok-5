# Database Schema Documentation

## Shipping Table

Tabel ini menyimpan informasi pengiriman barang untuk sistem marketplace.

### Struktur Tabel

| Field | Type | Null | Key | Default | Description |
|-------|------|------|-----|---------|-------------|
| id | INT(11) | NO | PRI | AUTO_INCREMENT | Primary key |
| order_id | VARCHAR(100) | NO | UNI | - | ID order yang unik |
| recipient_name | VARCHAR(255) | NO | - | - | Nama penerima |
| recipient_address | TEXT | NO | - | - | Alamat lengkap penerima |
| recipient_phone | VARCHAR(20) | NO | - | - | Nomor telepon penerima |
| courier_service | VARCHAR(50) | NO | - | - | Nama jasa kurir (JNE, J&T, SiCepat, dll) |
| shipping_cost | DECIMAL(10,2) | NO | - | - | Biaya pengiriman dalam rupiah |
| weight | DECIMAL(10,2) | NO | - | - | Berat barang dalam kg |
| status | ENUM | NO | - | 'pending' | Status pengiriman |
| tracking_number | VARCHAR(100) | YES | - | NULL | Nomor resi pengiriman |
| estimated_delivery | DATE | YES | - | NULL | Estimasi tanggal pengiriman |
| created_at | DATETIME | YES | - | NULL | Waktu pembuatan data |
| updated_at | DATETIME | YES | - | NULL | Waktu terakhir update |

### Status Values

Status pengiriman dapat berisi nilai-nilai berikut:
- `pending`: Menunggu proses
- `processing`: Sedang diproses
- `shipped`: Sudah dikirim
- `in_transit`: Dalam perjalanan
- `delivered`: Sudah diterima
- `cancelled`: Dibatalkan

### Indexes

- **PRIMARY KEY**: `id`
- **UNIQUE KEY**: `order_id`

### Migration

Untuk membuat tabel ini, jalankan migration dengan perintah:

```bash
php spark migrate
```

Untuk rollback migration:

```bash
php spark migrate:rollback
```

### Contoh Data

```sql
INSERT INTO shipping (
    order_id, 
    recipient_name, 
    recipient_address, 
    recipient_phone, 
    courier_service, 
    shipping_cost, 
    weight, 
    status, 
    tracking_number, 
    estimated_delivery
) VALUES (
    'ORD-001',
    'John Doe',
    'Jl. Merdeka No. 123, Jakarta Pusat',
    '081234567890',
    'JNE',
    15000.00,
    2.5,
    'pending',
    'TRK65E7A8B1234',
    '2026-01-10'
);
```
