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
- Melihat daftar pesanan pelanggan
- Menambah layanan baru
- Mengubah data layanan
- Menghapus layanan

---

## 📂 Struktur Project

```bash
servis-elektronik/
│
├── index.php                  # Halaman utama (beranda)
├── layanan.php               # Halaman daftar layanan
├── services.php             # Form pemesanan servis
├── about.php                # Halaman tentang kami
├── pesanan.php             # Melihat data pesanan pelanggan
├── kelola_layanan.php      # CRUD data layanan
│
├── includes/
│   ├── config.php         # Konfigurasi website
│   ├── database.php       # Koneksi database
│   ├── header.php         # Template header dan menu
│   └── footer.php         # Template footer
│
├── css/
│   └── style.css         # File styling website
│
├── js/
│   └── script.js        # Script JavaScript
│
└── db/
    └── servis_elektronik.sql   # Struktur database
