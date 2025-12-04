# 🎓 Portal Mahasiswa App (CodeIgniter 4)

Aplikasi **Sistem Informasi Mahasiswa** sederhana namun powerful, dibangun menggunakan **CodeIgniter 4** dan **Bootstrap 5**. Project ini dibuat untuk memenuhi tugas mata kuliah **Web Programming**, dengan fitur lengkap mulai dari manajemen data mahasiswa, statistik dashboard, hingga cetak Kartu Tanda Mahasiswa (KTM).

>
>
> <img width="1895" height="940" alt="Screenshot 2025-12-03 141059" src="https://github.com/user-attachments/assets/6db3a36e-8477-48f2-8a6f-7da75326a676" />

>![Screenshot_3-12-2025_14859_localhost](https://github.com/user-attachments/assets/1ca3a5f6-b61e-446a-b1b0-885016d56510)
>![Screenshot_3-12-2025_14947_localhost](https://github.com/user-attachments/assets/41802458-d5a6-4e18-8e66-72b06b460711)




---

## ✨ Fitur Unggulan

- 🔐 **Authentication** — Login aman menggunakan password hashing (`password_verify`).
- 📊 **Dashboard Interaktif** — Grafik statistik jurusan (Chart.js) responsif + dark mode.
- 📝 **CRUD Lengkap** — Tambah, lihat, edit, dan hapus data mahasiswa (validasi input lengkap).
- 🖼️ **Upload Foto Mahasiswa** — Preview otomatis dengan efek zoom.
- 🔍 **Search & Pagination** — Pencarian realtime & pagination rapi.
- 🖨️ **Cetak KTM** — Generate Kartu Tanda Mahasiswa lengkap dengan QR Code otomatis.
- 🌗 **Dark Mode** — Mode gelap/terang dengan auto-save preference.
- ⚙️ **Pengaturan Admin** — Update profil admin + backup database (.sql) sekali klik.
- 🎨 **UI Modern** — Sidebar ala Instagram, responsif dan clean.
- 🔔 **Notifikasi** — Pop-up interaktif menggunakan SweetAlert2.

---

## 🛠️ Teknologi yang Digunakan

**Backend:** PHP 8.1+, CodeIgniter 4  
**Frontend:** Bootstrap 5.3, Bootstrap Icons  
**Database:** MySQL (MariaDB)  
**Libraries & APIs:**  
- Chart.js  
- SweetAlert2  
- QRServer API  
- Faker (generate data dummy)

---

## 🚀 Cara Instalasi (Localhost)

Ikuti langkah-langkah untuk menjalankan project di Laragon.

---

### 1️⃣ Clone Repository
```bash
git clone https://github.com/MAliffadlan/crud-table-complete.git
cd crud-table-complete
```
### 2️⃣ Install Dependencies
```bash
composer install
```

### 3️⃣ Konfigurasi Database

- Buat database db_portal

- Import SQL link database:https://drive.google.com/file/d/1kXU5-eucA97HpFdkvoExA9LRs0pjVEZD/view?usp=sharing

### 4️⃣ Setup File .env
```bash
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost:8080/'

database.default.hostname = localhost
database.default.database = db_portal
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```

### 6️⃣ Jalankan Server
```bash
php spark serve
http://localhost:8080
```
### 👤 Akun Admin
```bash
Username : admin
Password : admin123
```
### 📂 Struktur Folder
```bash
app/Controllers -> Backend logic
app/Views       -> UI (Bootstrap 5)
public/uploads  -> Foto mahasiswa
```

👨‍💻 Author

Dibuat dengan ❤️ oleh M Alif fadlan.
Project ini dibuat untuk keperluan tugas mata kuliah Web Programming.

Jangan lupa kasih ⭐️ (Star) jika project ini bermanfaat!
