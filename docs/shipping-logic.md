# Shipping Logic

## Ongkir

Ongkir ditentukan secara flat sebesar Rp20.000.

Alasan penggunaan ongkir flat adalah agar sistem lebih sederhana,
mudah diuji, dan sesuai dengan scope tugas web service.

## Estimasi Pengiriman

Estimasi waktu pengiriman adalah 3–5 hari kerja.
Nilai ini bersifat statis dan digunakan untuk simulasi layanan shipping.

## Wilayah Layanan

Layanan pengiriman diasumsikan hanya mencakup wilayah dalam negeri (Indonesia).
Belum mendukung pengiriman internasional.

## Tujuan

Logika dibuat sederhana untuk kebutuhan tugas web service.

## Contoh Response Shipping

Response dari layanan shipping akan dikembalikan dalam format JSON.

Contoh:

```json
{
  "order_id": "ORD123",
  "shipping_cost": 20000,
  "estimated_days": "3-5",
  "status": "on_delivery"
}
```

## Status Pengiriman

Status pengiriman digunakan untuk menunjukkan posisi proses order.

- `pending` : Order telah dibuat dan menunggu diproses.
- `on_delivery` : Paket sedang dalam proses pengiriman.
- `delivered` : Paket telah diterima oleh penerima.

## Response Error

Jika order_id tidak ditemukan, layanan shipping akan mengembalikan response error.

Contoh response:

```json
{
  "error": true,
  "message": "Order ID tidak ditemukan"
}
```

## Asumsi Sistem

Beberapa asumsi yang digunakan dalam implementasi shipping service ini:

- Ongkir bersifat flat dan tidak dipengaruhi jarak maupun berat barang.
- Estimasi pengiriman bersifat statis dan tidak memperhitungkan hari libur.
- Sistem tidak terintegrasi dengan jasa ekspedisi nyata.
- Status pengiriman diperbarui secara manual atau simulasi.

## Pengembangan Ke Depan

Beberapa pengembangan yang dapat dilakukan di masa depan antara lain:

- Integrasi dengan API jasa ekspedisi nyata (JNE, J&T, SiCepat).
- Perhitungan ongkir berdasarkan jarak dan berat barang.
- Estimasi pengiriman yang lebih dinamis.
- Tracking pengiriman secara real-time.

## Penutup

Dokumentasi ini dibuat sebagai bagian dari tugas Web Service
untuk mensimulasikan layanan shipping sederhana.

Seluruh logika dan response disesuaikan dengan kebutuhan pembelajaran
dan dapat dikembangkan lebih lanjut di masa depan.
