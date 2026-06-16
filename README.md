# 🔧 Website Manajemen Servis Elektronik

Sistem ini adalah aplikasi web berbasis **PHP Native, MySQL, HTML, CSS, dan JavaScript** yang digunakan untuk mengelola layanan servis elektronik dan pemesanan dari pelanggan.

---

## 📌 Gambaran Proyek

Website ini dibuat untuk membantu usaha jasa servis elektronik dalam:
- Menampilkan daftar layanan servis
- Menerima pesanan dari pelanggan
- Mengelola data layanan
- Melihat data pesanan yang masuk

Sistem ini masih sederhana dan tidak menggunakan fitur login atau autentikasi pengguna.

---

## 🚀 Fitur Sistem

### 👤 Fitur Pengguna (Pelanggan)
- Melihat daftar layanan servis
- Melihat detail layanan (nama, deskripsi, harga, gambar)
- Mengisi form pemesanan servis

### 🛠️ Fitur Pengelola (Operator)
- Menambah layanan baru
- Mengubah data layanan
- Menghapus layanan
- Melihat data pesanan pelanggan

---

## 📂 Struktur Project + Database + Alur Sistem (MENYATU)

```bash
servis-elektronik/
│
├── index.php
│   # Halaman utama (beranda)
│   # Menampilkan layanan unggulan dari database (services)
│
├── layanan.php
│   # Menampilkan semua layanan
│   # Query: SELECT * FROM services
│
├── services.php
│   # Form pemesanan servis
│   # Input data pelanggan + service_id
│   # Simpan ke tabel orders
│
├── about.php
│   # Halaman informasi perusahaan
│
├── pesanan.php
│   # Menampilkan semua pesanan masuk
│   # JOIN: orders + services
│   # SELECT o.*, s.name, s.price FROM orders o JOIN services s
│
├── kelola_layanan.php
│   # CRUD layanan (CREATE, READ, UPDATE, DELETE)
│   # Mengelola tabel services
│
├── includes/
│   ├── config.php
│   │   # Konfigurasi website (nama, base URL, session)
│   │
│   ├── database.php
│   │   # Koneksi ke MySQL (servis_elektronik)
│   │
│   ├── header.php
│   │   # Navbar:
│   │   # Beranda - Layanan - Tentang Kami - Pesan Servis - Kelola (dropdown)
│   │   # Dropdown:
│   │   # - Tambah Layanan
│   │   # - Kelola Layanan
│   │   # - Lihat Pesanan
│   │
│   └── footer.php
│       # Footer website (kontak, alamat, dll)
│
├── css/
│   └── style.css
│       # Styling layout, card layanan, form, tabel, responsive
│
├── js/
│   └── script.js
│       # Hamburger menu + validasi form
│
└── db/
    └── servis_elektronik.sql
        # DATABASE:
        #
        # TABLE services:
        # - id, name, description, price, image_url, category, duration, created_at
        #
        # TABLE orders:
        # - id, service_id, customer_name, customer_phone,
        #   customer_email, customer_address, problem_description,
        #   order_date, status, created_at
        #
        # RELASI:
        # orders.service_id → services.id
        #
        # ALUR DATA:
        # Admin tambah layanan → services
        # Customer pilih layanan → form services.php
        # Submit → masuk orders
        # Operator lihat → pesanan.php
