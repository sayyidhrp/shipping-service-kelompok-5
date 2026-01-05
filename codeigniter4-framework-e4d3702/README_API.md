# Shipping Service API - Kelompok 5

API REST untuk layanan pengiriman barang menggunakan CodeIgniter 4.

## 📋 Fitur

- ✅ Membuat data pengiriman baru
- ✅ Mengecek status pengiriman berdasarkan Order ID
- ✅ Melihat semua data pengiriman
- ✅ Update data pengiriman
- ✅ Hapus data pengiriman
- ✅ Generate tracking number otomatis
- ✅ Estimasi tanggal pengiriman otomatis
- ✅ Validasi input data
- ✅ Response format JSON

## 🛠️ Teknologi

- **Framework**: CodeIgniter 4.6.4
- **Bahasa**: PHP 8.0+
- **Database**: MySQL
- **Format API**: REST API + JSON

## 📦 Instalasi

### Prerequisites

- PHP 8.0 atau lebih tinggi
- MySQL 5.7 atau lebih tinggi
- Composer
- Web Server (Apache/Nginx)

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/sayyidhrp/shipping-service-kelompok-5.git
   cd shipping-service-kelompok-5/codeigniter4-framework-e4d3702
   ```

2. **Install Dependencies**
   ```bash
   composer install
   ```

3. **Setup Database**
   
   Buat database MySQL:
   ```sql
   CREATE DATABASE shipping_service;
   ```

4. **Konfigurasi Environment**
   
   Copy file `.env` dan sesuaikan konfigurasi database:
   ```bash
   cp env .env
   ```
   
   Edit file `.env`:
   ```env
   CI_ENVIRONMENT = development
   
   app.baseURL = 'http://localhost:8080/'
   
   database.default.hostname = localhost
   database.default.database = shipping_service
   database.default.username = root
   database.default.password = your_password
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```

5. **Run Migration**
   ```bash
   php spark migrate
   ```

6. **Start Development Server**
   ```bash
   php spark serve
   ```
   
   Server akan berjalan di: `http://localhost:8080`

## 🚀 Penggunaan

### Base URL
```
http://localhost:8080/api/shipping
```

### Endpoints Utama

1. **Create Shipping Data**
   ```
   POST /api/shipping/create
   ```

2. **Get Shipping Status by Order ID**
   ```
   GET /api/shipping/status/{order_id}
   ```

3. **Get All Shipping Data**
   ```
   GET /api/shipping
   ```

4. **Update Shipping Data**
   ```
   PUT /api/shipping/{id}
   ```

5. **Delete Shipping Data**
   ```
   DELETE /api/shipping/{id}
   ```

Untuk dokumentasi API lengkap, lihat: [API Documentation](docs/API_DOCUMENTATION.md)

## 📖 Dokumentasi

- [API Documentation](docs/API_DOCUMENTATION.md) - Dokumentasi lengkap semua endpoint API
- [Database Schema](docs/DATABASE_SCHEMA.md) - Struktur database dan field

## 🧪 Testing

### Testing dengan cURL

**Create Shipping:**
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

**Get Status:**
```bash
curl -X GET http://localhost:8080/api/shipping/status/ORD-001
```

### Testing dengan Postman

1. Import collection dari dokumentasi API
2. Set base URL: `http://localhost:8080/api/shipping`
3. Test setiap endpoint

## 📊 Database Schema

### Tabel Shipping

| Field | Type | Description |
|-------|------|-------------|
| id | INT(11) | Primary key |
| order_id | VARCHAR(100) | ID order (unique) |
| recipient_name | VARCHAR(255) | Nama penerima |
| recipient_address | TEXT | Alamat penerima |
| recipient_phone | VARCHAR(20) | No. telepon |
| courier_service | VARCHAR(50) | Jasa kurir |
| shipping_cost | DECIMAL(10,2) | Biaya kirim |
| weight | DECIMAL(10,2) | Berat (kg) |
| status | ENUM | Status pengiriman |
| tracking_number | VARCHAR(100) | Nomor resi |
| estimated_delivery | DATE | Estimasi tiba |
| created_at | DATETIME | Waktu dibuat |
| updated_at | DATETIME | Waktu update |

### Status Values
- `pending` - Menunggu proses
- `processing` - Sedang diproses
- `shipped` - Sudah dikirim
- `in_transit` - Dalam perjalanan
- `delivered` - Sudah diterima
- `cancelled` - Dibatalkan

## 🏗️ Struktur Project

```
codeigniter4-framework-e4d3702/
├── app/
│   ├── Config/
│   │   └── Routes.php          # Routing configuration
│   ├── Controllers/
│   │   └── Shipping.php        # Shipping controller
│   ├── Database/
│   │   └── Migrations/         # Database migrations
│   └── Models/
│       └── ShippingModel.php   # Shipping model
├── docs/
│   ├── API_DOCUMENTATION.md    # API documentation
│   └── DATABASE_SCHEMA.md      # Database schema
├── public/
│   └── index.php               # Entry point
├── .env                        # Environment config
└── spark                       # CLI tool
```

## 🔧 Development

### Running Migrations

**Run all migrations:**
```bash
php spark migrate
```

**Rollback last migration:**
```bash
php spark migrate:rollback
```

**Reset all migrations:**
```bash
php spark migrate:refresh
```

### Code Style

Project ini mengikuti [CodeIgniter 4 Style Guide](https://codeigniter.com/user_guide/contributing/styleguide.html).

## 🤝 Contributing

1. Fork repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request

## 📝 License

Project ini dibuat untuk keperluan pembelajaran.

## 👥 Team - Kelompok 5

Shipping Service Team

## 📞 Support

Jika ada pertanyaan atau issue, silakan buat issue di GitHub repository.

## 🔗 Links

- [CodeIgniter 4 Documentation](https://codeigniter.com/user_guide/)
- [REST API Best Practices](https://restfulapi.net/)

---

**Happy Coding! 🚀**
