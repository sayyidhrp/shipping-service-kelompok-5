# Panduan Setup - Shipping Service API

Panduan lengkap untuk setup dan menjalankan Shipping Service API.

## 📋 Requirements

Pastikan sistem Anda memiliki:

- ✅ PHP 8.0 atau lebih tinggi
- ✅ MySQL 5.7 atau lebih tinggi
- ✅ Composer (PHP Package Manager)
- ✅ Web Server (Apache/Nginx) atau PHP Built-in Server

## 🔍 Pengecekan Requirements

### 1. Cek Versi PHP
```bash
php -v
```
Output yang diharapkan:
```
PHP 8.x.x (cli) ...
```

### 2. Cek Versi MySQL
```bash
mysql --version
```

### 3. Cek Composer
```bash
composer --version
```

Jika belum terinstall, download dari: https://getcomposer.org/

## 🚀 Langkah Setup

### Step 1: Clone Repository

```bash
git clone https://github.com/sayyidhrp/shipping-service-kelompok-5.git
cd shipping-service-kelompok-5/codeigniter4-framework-e4d3702
```

### Step 2: Install Dependencies

```bash
composer install
```

Ini akan menginstall semua package yang dibutuhkan oleh CodeIgniter 4.

### Step 3: Setup Database

#### Buat Database Baru

Login ke MySQL:
```bash
mysql -u root -p
```

Buat database:
```sql
CREATE DATABASE shipping_service;
EXIT;
```

Atau jika menggunakan phpMyAdmin:
1. Buka phpMyAdmin di browser
2. Klik tab "Databases"
3. Buat database baru dengan nama: `shipping_service`
4. Collation: `utf8mb4_general_ci`

### Step 4: Konfigurasi Environment

#### Copy File Environment

File `.env` sudah tersedia di repository. Jika belum ada, copy dari template:
```bash
cp env .env
```

#### Edit Konfigurasi Database

Buka file `.env` dan sesuaikan dengan konfigurasi MySQL Anda:

```env
#--------------------------------------------------------------------
# ENVIRONMENT
#--------------------------------------------------------------------

CI_ENVIRONMENT = development

#--------------------------------------------------------------------
# APP
#--------------------------------------------------------------------

app.baseURL = 'http://localhost:8080/'

#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------

database.default.hostname = localhost
database.default.database = shipping_service
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.port = 3306
```

**Catatan:**
- Ubah `database.default.password` dengan password MySQL Anda
- Jika menggunakan port MySQL yang berbeda, ubah `database.default.port`
- Jika database berada di server lain, ubah `database.default.hostname`

### Step 5: Run Migration

Jalankan migration untuk membuat tabel database:

```bash
php spark migrate
```

Output yang diharapkan:
```
Running: 2026-01-05-043352_CreateShippingTable
Migrated: 2026-01-05-043352_CreateShippingTable
```

Untuk memeriksa apakah tabel sudah dibuat:
```bash
mysql -u root -p shipping_service -e "SHOW TABLES;"
```

### Step 6: Start Server

Jalankan development server:

```bash
php spark serve
```

Output:
```
CodeIgniter 4.x.x Development Server (http://localhost:8080) started
Press Ctrl-C to quit
```

Server sekarang berjalan di: `http://localhost:8080`

## ✅ Verifikasi Setup

### Test 1: Akses Homepage

Buka browser dan akses:
```
http://localhost:8080
```

Anda harus melihat halaman welcome CodeIgniter.

### Test 2: Test API dengan cURL

**Buat data shipping pertama:**
```bash
curl -X POST http://localhost:8080/api/shipping/create \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -d "order_id=ORD-TEST-001" \
  -d "recipient_name=Test User" \
  -d "recipient_address=Jl. Test No. 123" \
  -d "recipient_phone=081234567890" \
  -d "courier_service=JNE" \
  -d "shipping_cost=15000" \
  -d "weight=2.5"
```

**Response yang diharapkan:**
```json
{
    "status": "success",
    "message": "Shipping data created successfully",
    "data": {
        "id": 1,
        "order_id": "ORD-TEST-001",
        "recipient_name": "Test User",
        ...
    }
}
```

**Get status shipping:**
```bash
curl http://localhost:8080/api/shipping/status/ORD-TEST-001
```

## 🔧 Troubleshooting

### Problem 1: Port 8080 sudah digunakan

**Solusi:** Gunakan port lain
```bash
php spark serve --port=8081
```

### Problem 2: Database connection error

**Cek:**
- ✅ MySQL service running: `sudo service mysql status`
- ✅ Database sudah dibuat
- ✅ Username dan password benar di `.env`
- ✅ Host dan port benar

**Test koneksi:**
```bash
mysql -h localhost -u root -p shipping_service
```

### Problem 3: Migration gagal

**Solusi:** Reset migration
```bash
php spark migrate:refresh
```

### Problem 4: 404 Not Found di API endpoint

**Cek:**
- ✅ File `app/Config/Routes.php` sudah diupdate
- ✅ URL benar: `http://localhost:8080/api/shipping/create`
- ✅ Method HTTP benar (POST untuk create, GET untuk status)

### Problem 5: Validation Error

**Pastikan semua field required terisi:**
- order_id
- recipient_name
- recipient_address
- recipient_phone
- courier_service
- shipping_cost
- weight

### Problem 6: Composer install error

**Solusi:**
```bash
composer clear-cache
composer install --no-cache
```

## 🔄 Reset Database

Jika ingin mereset database (menghapus semua data):

```bash
# Rollback migration
php spark migrate:rollback

# Jalankan ulang migration
php spark migrate
```

## 📝 Konfigurasi Tambahan

### Menggunakan Apache/Nginx

Jika menggunakan Apache atau Nginx daripada PHP built-in server:

1. Set document root ke folder `public/`
2. Enable mod_rewrite (Apache)
3. Sesuaikan `app.baseURL` di `.env`

**Contoh untuk Apache:**
```
DocumentRoot /path/to/shipping-service/codeigniter4-framework-e4d3702/public
```

### Production Environment

Untuk production, ubah `.env`:
```env
CI_ENVIRONMENT = production

# Disable error display
# Set di php.ini:
display_errors = Off
```

## 📚 Next Steps

Setelah setup berhasil:

1. ✅ Baca [API Documentation](API_DOCUMENTATION.md)
2. ✅ Lihat [Database Schema](DATABASE_SCHEMA.md)
3. ✅ Test semua endpoint dengan Postman
4. ✅ Integrate dengan service lain

## 🆘 Bantuan

Jika masih ada masalah:
1. Cek log di `writable/logs/`
2. Aktifkan debug mode di `.env`
3. Buat issue di GitHub repository

---

**Setup Complete! Ready to ship! 🚀**
