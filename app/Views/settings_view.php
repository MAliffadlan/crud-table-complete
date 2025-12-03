<!doctype html>
<html lang="en" id="htmlPage" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengaturan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        body { 
            background-color: #f4f6f9; 
            font-family: 'Segoe UI', sans-serif;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        /* --- SIDEBAR --- */
        .sidebar {
            position: fixed; top: 0; left: 0; height: 100vh; width: 250px;
            background-color: white; 
            box-shadow: 2px 0 20px rgba(0,0,0,0.05);
            padding: 24px 12px; display: flex; flex-direction: column; z-index: 100;
            transition: background-color 0.3s ease, border 0.3s ease;
        }
        
        .content-wrapper { 
            margin-left: 250px; padding: 40px; min-height: 100vh; 
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
            background-color: #f0f2f5; color: #000; transform: translateX(5px);
        }
        .nav-link-ig i { font-size: 24px; width: 32px; margin-right: 16px; transition: transform 0.2s; }
        .nav-link-ig.active { 
            font-weight: 800; color: #4e73df; background-color: #eef2ff;
        }
        .nav-link-ig:hover i { transform: scale(1.1); }
        .nav-link-ig span { font-size: 16px; }

        /* --- DARK MODE CSS --- */
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
        
        /* Form Inputs Dark Mode */
        [data-bs-theme="dark"] .form-control { background-color: #2c2c2c; border-color: #444; color: #fff; }
        [data-bs-theme="dark"] .form-control::placeholder { color: #888; }
        
        /* Tabs Dark Mode */
        [data-bs-theme="dark"] .nav-tabs .nav-link.active { background-color: #1e1e1e; color: #fff; border-color: #333 #333 #1e1e1e; }
        [data-bs-theme="dark"] .nav-tabs { border-bottom-color: #333; }
        [data-bs-theme="dark"] .nav-link { color: #aaa; }
        [data-bs-theme="dark"] .nav-link:hover { color: #fff; }

        @media (max-width: 768px) {
            .sidebar { width: 72px; padding: 12px; }
            .content-wrapper { margin-left: 72px; padding: 20px; }
            .nav-link-ig span, .logo-app span { display: none; }
            .logo-app { margin-bottom: 20px; padding-left: 0; justify-content: center; }
            .nav-link-ig { justify-content: center; }
            .nav-link-ig i { margin-right: 0; }
        }
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
    <div class="sidebar">
        <a href="/dashboard" class="logo-app">
            <i class="bi bi-database-fill-gear me-2 text-danger"></i> <span>FADLAN APP</span>
        </a>
        
        <a href="/dashboard" class="nav-link-ig">
            <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
        </a>
        <a href="/mahasiswa" class="nav-link-ig">
            <i class="bi bi-people"></i> <span>Data Mahasiswa</span>
        </a>
        <a href="/settings" class="nav-link-ig active">
            <i class="bi bi-gear-fill"></i> <span>Pengaturan</span>
        </a>
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
    <div class="content-wrapper">
        <div class="container" style="max-width: 800px;">  
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold mb-0">Pengaturan Akun</h3>
                
                <div class="d-flex align-items-center bg-white px-3 py-2 rounded-pill shadow-sm">
                    <i class="bi bi-person-circle fs-4 me-2 text-secondary"></i>
                    <span class="fw-bold small text-dark"><?= $user['name']; ?></span>
                </div>
            </div>

            <?php if(session()->getFlashdata('pesan')):?>
                <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('pesan') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif;?>

            <div class="card border-0 shadow-sm rounded-4 bg-white card-animasi">
                <div class="card-header bg-white pt-3 border-bottom-0">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active fw-bold text-dark" data-bs-toggle="tab" href="#profil">Edit Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary" data-bs-toggle="tab" href="#backup">Backup Data</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body p-4">
                    <div class="tab-content">
                        
                        <div class="tab-pane fade show active" id="profil">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-light rounded-circle p-3 me-3">
                                    <i class="bi bi-person-circle fs-1 text-secondary"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0 text-dark"><?= $user['username']; ?></h5>
                                    <small class="text-muted">Administrator</small>
                                </div>
                            </div>

                            <form action="/settings/updateProfile" method="post">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control form-control-lg fs-6" value="<?= $user['name']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Username</label>
                                    <input type="text" name="username" class="form-control form-control-lg fs-6 bg-light text-muted" value="<?= $user['username']; ?>" readonly>
                                    <small class="text-muted" style="font-size: 12px;">Username tidak dapat diubah.</small>
                                </div>
                                
                                <hr class="my-4">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-danger">Ganti Password</label>
                                    <input type="password" name="password" class="form-control form-control-lg fs-6" placeholder="Kosongkan jika tidak ingin mengubah">
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg fs-6 fw-bold">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="backup">
                            <div class="text-center py-5">
                                <i class="bi bi-cloud-download text-success" style="font-size: 5rem;"></i>
                                <h4 class="fw-bold mt-3 text-dark">Backup Database</h4>
                                <p class="text-muted col-md-10 mx-auto mb-4">
                                    Unduh salinan lengkap database (.SQL) untuk keamanan data.
                                </p>
                                <a href="/settings/backupDB" class="btn btn-success px-4 py-2 fw-bold rounded-pill">
                                    <i class="bi bi-download me-2"></i> Download Backup
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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