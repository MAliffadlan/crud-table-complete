🎓 Portal Mahasiswa App (CodeIgniter 4)

Aplikasi Sistem Informasi Mahasiswa sederhana namun powerful, dibangun menggunakan CodeIgniter 4 dan Bootstrap 5. Project ini dibuat untuk memenuhi tugas mata kuliah Web Programming, dengan fitur lengkap mulai dari manajemen data mahasiswa, statistik dashboard, hingga cetak Kartu Tanda Mahasiswa (KTM).

(Jangan lupa ganti link gambar di atas dengan screenshot asli aplikasi lu)

✨ Fitur Unggulan

Aplikasi ini memiliki berbagai fitur modern:

🔐 Authentication: Login sistem aman dengan password hashing (password_verify).

📊 Dashboard Interaktif: Grafik statistik jurusan menggunakan Chart.js yang responsif dan mendukung Dark Mode.

📝 CRUD Lengkap: Tambah, Lihat, Edit, dan Hapus data mahasiswa dengan validasi input.

🖼️ Upload Foto Mahasiswa: Fitur upload foto profil untuk data mahasiswa dengan preview otomatis (Zoom Effect).

🔍 Search & Pagination: Pencarian data realtime dan pembagian halaman (pagination) yang rapi.

🖨️ Cetak KTM: Generate Kartu Tanda Mahasiswa siap cetak, lengkap dengan QR Code otomatis.

🌗 Dark Mode: Dukungan mode gelap/terang yang nyaman di mata (Auto-save preference).

⚙️ Pengaturan Admin: Update profil admin (Nama & Password) dan Backup Database (.sql) sekali klik.

🎨 UI Modern: Tampilan Sidebar ala Instagram (Fixed Sidebar) yang bersih dan responsif.

🔔 Notifikasi: Alert interaktif menggunakan SweetAlert2.

🛠️ Teknologi yang Digunakan

Backend: PHP 8.1+, CodeIgniter 4 Framework.

Frontend: Bootstrap 5.3, Bootstrap Icons.

Database: MySQL (MariaDB).

Libraries & APIs:

Chart.js (Untuk Grafik Donat Statistik).

SweetAlert2 (Untuk Pop-up Notifikasi Keren).

QRServer API (Untuk Generate QR Code di KTM).

Faker (Untuk generate data dummy mahasiswa).

🚀 Cara Instalasi (Localhost)

Ikuti langkah-langkah ini untuk menjalankan project di komputer kamu (menggunakan Laragon/XAMPP):

1. Clone Repository

git clone [https://github.com/username-lu/portal-ci4.git](https://github.com/username-lu/portal-ci4.git)
cd portal-ci4


2. Install Dependencies

Pastikan kamu sudah menginstall Composer.

composer install


3. Konfigurasi Database

Buka SQLyog atau phpMyAdmin.

Buat database baru dengan nama db_portal.

Import file database (jika ada) atau jalankan Query SQL manual untuk membuat tabel users dan mahasiswa.

4. Setup Environment (.env)

Copy file env menjadi .env.

Buka file .env dan atur konfigurasi database:

CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080/'

database.default.hostname = localhost
database.default.database = db_portal
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi


5. Jalankan Seeder (Data Dummy)

Jika ingin mengisi data mahasiswa otomatis (contoh 13 data):

php spark db:seed MahasiswaSeeder


6. Jalankan Server

php spark serve


Buka browser dan akses: http://localhost:8080

👤 Akun Default (Login)

Gunakan akun ini untuk masuk ke dashboard pertama kali:

Username: admin

Password: admin123

📂 Struktur Folder Penting

app/Controllers - Logika Backend (Mahasiswa, Auth, Settings).

app/Views - Tampilan Frontend (Bootstrap 5).

app/Database/Seeds - Data Dummy (Faker).

public/uploads - Tempat penyimpanan foto profil mahasiswa.

📄 Lisensi

Project ini dibuat untuk tujuan pembelajaran (Educational Purpose). Silakan dikembangkan lebih lanjut!
Happy Coding! 🚀