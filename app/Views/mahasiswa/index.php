<!doctype html>
<html lang="en" id="htmlPage" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        body { 
            background-color: #f4f6f9; 
            font-family: 'Segoe UI', sans-serif;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        /* --- CSS SIDEBAR (Gaya IG) --- */
        .sidebar {
            position: fixed; top: 0; left: 0; height: 100vh; width: 250px;
            background-color: white; 
            box-shadow: 2px 0 20px rgba(0,0,0,0.05);
            padding: 24px 12px; display: flex; flex-direction: column; z-index: 100;
            transition: background-color 0.3s ease, border 0.3s ease;
        }
        
        .content-wrapper { 
            margin-left: 250px; 
            padding: 40px; 
            min-height: 100vh; 
        }
        
        .logo-app {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            font-size: 24px; font-weight: bold; margin-bottom: 30px; padding-left: 12px;
            display: flex; align-items: center; text-decoration: none; color: #000; letter-spacing: -0.5px;
        }

        .nav-link-ig {
            display: flex; align-items: center; padding: 12px;
            color: #555; text-decoration: none; border-radius: 10px; margin-bottom: 6px;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
        }
        .nav-link-ig:hover { 
            background-color: #f0f2f5; 
            color: #000; 
            transform: translateX(5px);
        }
        .nav-link-ig i { font-size: 24px; width: 32px; margin-right: 16px; transition: transform 0.2s; }
        
        .nav-link-ig.active { 
            font-weight: 800; 
            color: #4e73df; 
            background-color: #eef2ff;
        }
        .nav-link-ig:hover i { transform: scale(1.1); }
        .nav-link-ig span { font-size: 16px; }

        /* --- DARK MODE OVERRIDES --- */
        [data-bs-theme="dark"] body {
            background-color: #121212;
            color: #e0e0e0;
        }
        [data-bs-theme="dark"] .sidebar {
            background-color: #1e1e1e;
            box-shadow: 2px 0 20px rgba(0,0,0,0.2);
            border-right: 1px solid #333;
        }
        [data-bs-theme="dark"] .logo-app { color: #fff; }
        [data-bs-theme="dark"] .nav-link-ig { color: #b0b0b0; }
        [data-bs-theme="dark"] .nav-link-ig:hover { background-color: #2c2c2c; color: #fff; }
        [data-bs-theme="dark"] .nav-link-ig.active { background-color: #333; color: #4e73df; }
        
        /* Card & Content Dark Mode */
        [data-bs-theme="dark"] .bg-white { background-color: #1e1e1e !important; color: #fff; }
        [data-bs-theme="dark"] .bg-light { background-color: #2c2c2c !important; color: #fff; border-color: #444 !important; }
        [data-bs-theme="dark"] .text-dark { color: #fff !important; }
        [data-bs-theme="dark"] .text-muted { color: #aaa !important; }
        [data-bs-theme="dark"] .text-secondary { color: #bbb !important; }
        [data-bs-theme="dark"] .card { border-color: #333; background-color: #1e1e1e; }
        
        /* Table Dark Mode */
        [data-bs-theme="dark"] .table-light th { background-color: #2c2c2c; color: #fff; border-color: #444; }
        [data-bs-theme="dark"] .table { color: #e0e0e0; border-color: #444; }
        [data-bs-theme="dark"] .table-hover tbody tr:hover { color: #fff; background-color: #333; }
        
        /* Form Inputs Dark Mode */
        [data-bs-theme="dark"] .form-control, [data-bs-theme="dark"] .form-select { background-color: #2c2c2c; border-color: #444; color: #fff; }
        [data-bs-theme="dark"] .input-group-text { background-color: #2c2c2c; border-color: #444; }
        [data-bs-theme="dark"] .input-group-text i { color: #aaa !important; }
        
        /* Pagination Dark Mode */
        [data-bs-theme="dark"] .page-link { background-color: #1e1e1e; border-color: #444; color: #fff; }
        [data-bs-theme="dark"] .page-item.disabled .page-link { background-color: #2c2c2c; border-color: #444; }
        [data-bs-theme="dark"] .page-item.active .page-link { background-color: #0d6efd; border-color: #0d6efd; }

        @media (max-width: 768px) {
            .sidebar { width: 72px; padding: 12px; }
            .content-wrapper { margin-left: 72px; padding: 20px; }
            .nav-link-ig span, .logo-app span { display: none; }
            .logo-app { margin-bottom: 20px; padding-left: 0; justify-content: center; }
            .nav-link-ig { justify-content: center; }
            .nav-link-ig i { margin-right: 0; }
        }

        /* --- CSS KHUSUS FOTO PROFIL --- */
        .foto-profil {
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        .foto-profil:hover {
            transform: scale(1.5);
            z-index: 10;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        /* --- ANIMASI MASUK --- */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .card-animasi {
            animation: fadeInUp 0.8s cubic-bezier(0.2, 0.8, 0.2, 1);
        }
    </style>
</head>
<body>

    <!-- 1. SIDEBAR KIRI -->
    <div class="sidebar">
        <a href="/dashboard" class="logo-app">
            <!-- Logo Merah sesuai request -->
            <i class="bi bi-database-fill-gear me-2 text-danger"></i> <span>PORTAL APP</span>
        </a>
        
        <a href="/dashboard" class="nav-link-ig">
            <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
        </a>
        
        <a href="/mahasiswa" class="nav-link-ig active"> <!-- CLASS ACTIVE DISINI -->
            <i class="bi bi-people-fill"></i> <span>Data Mahasiswa</span>
        </a>
        
        <a href="/settings" class="nav-link-ig">
            <i class="bi bi-gear-fill"></i> <span>Pengaturan</span>
        </a>

        <!-- Tombol Dark Mode -->
        <div class="nav-link-ig mt-3" onclick="toggleTheme()" id="themeToggleBtn">
            <i class="bi bi-moon-stars-fill" id="iconTheme"></i> 
            <span id="textTheme">Mode Gelap</span>
        </div>

        <div class="mt-auto">
            <a href="/logout" class="nav-link-ig text-danger">
                <i class="bi bi-box-arrow-left"></i> <span>Logout</span>
            </a>
        </div>
    </div>

    <!-- 2. KONTEN UTAMA (Kanan) -->
    <div class="content-wrapper">
        <div class="container" style="max-width: 1200px;">
            
            <h3 class="fw-bold mb-4">Kelola Data Mahasiswa</h3>

            <!-- Card Utama -->
            <div class="card border-0 shadow-sm rounded-4 bg-white card-animasi">
                <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                    
                    <!-- Form Filter & Pencarian Gabungan -->
                    <form action="" method="get" class="d-flex w-75 gap-2">
                        <!-- DROPDOWN FILTER JURUSAN (BARU) -->
                        <div class="input-group w-50">
                            <span class="input-group-text bg-light border-0"><i class="bi bi-funnel text-muted"></i></span>
                            <select class="form-select bg-light border-0" name="jurusan" onchange="this.form.submit()">
                                <option value="">Pilih Jurusan</option>
                                <option value="Teknik Informatika" <?= ($jurusan == 'Teknik Informatika') ? 'selected' : ''; ?>>Teknik Informatika</option>
                                <option value="Sistem Informasi" <?= ($jurusan == 'Sistem Informasi') ? 'selected' : ''; ?>>Sistem Informasi</option>
                                <option value="Manajemen Bisnis" <?= ($jurusan == 'Manajemen Bisnis') ? 'selected' : ''; ?>>Manajemen Bisnis</option>
                            </select>
                        </div>

                        <!-- Kolom Pencarian -->
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" class="form-control bg-light border-0" name="keyword" placeholder="Cari nama / NIM..." value="<?= $keyword; ?>">
                            <button class="btn btn-primary rounded-end" type="submit">Cari</button>
                        </div>
                    </form>
                    
                    <!-- Tombol Tambah Data -->
                    <div>
                        <a href="/mahasiswa/create" class="btn btn-primary rounded-pill px-4 fw-bold">
                            <i class="bi bi-plus-lg me-1"></i> Tambah Data
                        </a>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    
                    <!-- Tabel Data -->
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="10%">Foto</th>
                                    <th width="15%">NIM</th>
                                    <th width="25%">Nama Lengkap</th>
                                    <th width="20%">Jurusan</th>
                                    <th width="15%">No. HP</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($mahasiswa as $m): ?>
                                    
                                    <!-- Logika Warna Badge -->
                                    <?php 
                                        $warnaBadge = 'bg-secondary';
                                        if($m['jurusan'] == 'Teknik Informatika') $warnaBadge = 'bg-primary';
                                        if($m['jurusan'] == 'Sistem Informasi') $warnaBadge = 'bg-success';
                                        if($m['jurusan'] == 'Manajemen Bisnis') $warnaBadge = 'bg-warning text-dark';
                                    ?>

                                <tr>
                                    <td>
                                        <!-- Foto Zoom -->
                                        <img src="/uploads/<?= $m['foto']; ?>" 
                                             class="rounded-circle border foto-profil" 
                                             width="50" height="50" 
                                             style="object-fit: cover;"
                                             alt="Foto">
                                    </td>
                                    <td class="fw-bold text-secondary"><?= $m['nim']; ?></td>
                                    <td class="fw-bold"><?= $m['nama']; ?></td>
                                    <td>
                                        <span class="badge <?= $warnaBadge; ?> rounded-pill px-3 py-2">
                                            <?= $m['jurusan']; ?>
                                        </span>
                                    </td>
                                    <td><small><?= $m['no_hp']; ?></small></td>
                                    <td>
                                        <!-- Tombol KTM (Biru Muda) -->
                                        <a href="/mahasiswa/printKTM/<?= $m['id']; ?>" target="_blank" class="btn btn-info btn-sm rounded-circle text-white me-1" title="Cetak KTM">
                                            <i class="bi bi-person-badge-fill"></i>
                                        </a>

                                        <!-- Tombol Edit (Kuning) -->
                                        <a href="/mahasiswa/edit/<?= $m['id']; ?>" class="btn btn-warning btn-sm text-dark me-1 rounded-circle" title="Edit">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        <!-- Tombol Hapus (Merah) -->
                                        <a href="/mahasiswa/delete/<?= $m['id']; ?>" 
                                           class="btn btn-danger btn-sm btn-hapus rounded-circle"
                                           title="Hapus">
                                           <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                
                                <!-- Pesan Kosong -->
                                <?php if(empty($mahasiswa)): ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-5">
                                        <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                        Belum ada data mahasiswa. Silakan tambah data baru.
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        <?= $pager->links('mahasiswa', 'default_full') ?>
                    </div>

                </div>
            </div>

            <!-- Footer -->
            <footer class="text-center text-muted py-4 mt-5 border-top">
                <small>
                    &copy; <?= date('Y'); ?> <b>Portal Mahasiswa</b>. Dibuat dengan 🔥 CodeIgniter 4 & Bootstrap 5.
                </small>
            </footer>

        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // --- KONFIGURASI TOAST (NOTIFIKASI BARU) ---
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end', // Pojok Kanan Atas
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        // Tampilkan Toast kalau ada pesan dari Controller
        <?php if (session()->getFlashdata('pesan')) : ?>
            Toast.fire({
                icon: 'success',
                title: '<?= session()->getFlashdata('pesan'); ?>'
            })
        <?php endif; ?>

        // --- Logic Hapus Data (Tetap Pop-up Konfirmasi) ---
        const btnHapus = document.querySelectorAll('.btn-hapus');
        btnHapus.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                const href = this.getAttribute('href');
                Swal.fire({
                    title: 'Yakin hapus data?',
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = href;
                    }
                });
            });
        });

        // --- Logic Dark Mode ---
        const html = document.getElementById('htmlPage');
        const icon = document.getElementById('iconTheme');
        const text = document.getElementById('textTheme');
        
        if(localStorage.getItem('theme') === 'dark') {
            setDarkMode(true);
        } else {
            setDarkMode(false);
        }

        function toggleTheme() {
            if (html.getAttribute('data-bs-theme') === 'light') {
                setDarkMode(true);
                localStorage.setItem('theme', 'dark');
            } else {
                setDarkMode(false);
                localStorage.setItem('theme', 'light');
            }
        }

        function setDarkMode(isDark) {
            if(isDark) {
                html.setAttribute('data-bs-theme', 'dark');
                icon.classList.remove('bi-moon-stars-fill');
                icon.classList.add('bi-sun-fill');
                icon.classList.add('text-warning');
                text.innerText = "Mode Terang";
            } else {
                html.setAttribute('data-bs-theme', 'light');
                icon.classList.remove('bi-sun-fill');
                icon.classList.remove('text-warning');
                icon.classList.add('bi-moon-stars-fill');
                text.innerText = "Mode Gelap";
            }
        }
    </script>
</body>
</html>