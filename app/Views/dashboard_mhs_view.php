<!doctype html>
<html lang="en" id="htmlPage" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Mahasiswa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">      
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #858796;
            --bg-light: #f3f4f6;
        }

        body { 
            background-color: var(--bg-light); 
            font-family: 'Inter', sans-serif;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        h1, h2, h3, h4, h5, h6, .logo-app { font-family: 'Poppins', sans-serif; }
        
      
        .sidebar {
            position: fixed; top: 0; left: 0; height: 100vh; width: 250px;
            background-color: white; box-shadow: 2px 0 20px rgba(0,0,0,0.05);
            padding: 24px 12px; display: flex; flex-direction: column; z-index: 100;
            transition: background-color 0.3s ease, border 0.3s ease;
        }
        .content-wrapper { margin-left: 250px; padding: 30px; min-height: 100vh; }

    
        .logo-app {
            font-size: 20px; font-weight: 700; margin-bottom: 40px; padding-left: 12px;
            display: flex; align-items: center; text-decoration: none; color: var(--primary-color);
        }
        .nav-link-ig {
            display: flex; align-items: center; padding: 12px 16px; color: #6c757d;
            text-decoration: none; border-radius: 12px; margin-bottom: 8px; transition: all 0.3s ease;
        }
        .nav-link-ig:hover { background-color: #eef2ff; color: var(--primary-color); transform: translateX(5px); }
        .nav-link-ig i { font-size: 20px; width: 30px; margin-right: 10px; }
        .nav-link-ig.active { 
            background: linear-gradient(45deg, #6366f1, #4f46e5); color: white; 
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
        }
        .nav-link-ig.active i { color: white; }

        
        .card-welcome {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            border: none; border-radius: 20px; color: white;
            overflow: hidden; position: relative;
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.3);
        }
        .card-info {
            border: none; border-radius: 16px; background: white;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03); transition: transform 0.3s ease;
        }
        .card-info:hover { transform: translateY(-5px); }


        [data-bs-theme="dark"] body { background-color: #121212; color: #e0e0e0; }
        [data-bs-theme="dark"] .sidebar { background-color: #1e1e1e; border-right: 1px solid #333; }
        [data-bs-theme="dark"] .card-info { background-color: #1e1e1e; border: 1px solid #333; }
        [data-bs-theme="dark"] .logo-app { color: #fff; }
        [data-bs-theme="dark"] .text-dark { color: #fff !important; }
        [data-bs-theme="dark"] .text-muted { color: #aaa !important; }

        @media (max-width: 768px) {
            .sidebar { width: 80px; padding: 24px 12px; }
            .content-wrapper { margin-left: 80px; padding: 20px; }
            .nav-link-ig span, .logo-app span { display: none; }
            .logo-app { margin-bottom: 30px; padding-left: 0; justify-content: center; }
            .nav-link-ig { justify-content: center; padding: 12px; }
            .nav-link-ig i { margin-right: 0; }
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <a href="/dashboard" class="logo-app">
            <i class="bi bi-mortarboard-fill me-2 fs-3"></i> <span>PORTAL MHS</span>
        </a>
        
        <a href="/dashboard" class="nav-link-ig active">
            <i class="bi bi-grid-fill"></i> <span>Dashboard</span>
        </a>
        
        <a href="/mahasiswa" class="nav-link-ig">
            <i class="bi bi-people"></i> <span>Data Teman</span>
        </a>

        <div class="mt-auto">
            <a href="/logout" class="nav-link-ig text-danger">
                <i class="bi bi-box-arrow-right"></i> <span>Logout</span>
            </a>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="container-fluid" style="max-width: 1000px;">
            
       
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div>
                    <h4 class="fw-bold mb-1 text-dark">Student Area</h4>
                    <p class="text-muted mb-0">Panel khusus mahasiswa</p>
                </div>
                <div class="d-flex align-items-center gap-3">
               
                    <button class="btn btn-light rounded-circle shadow-sm" onclick="toggleTheme()">
                        <i class="bi bi-moon-stars-fill" id="iconTheme"></i>
                    </button>
                
                    <div class="d-flex align-items-center bg-white px-3 py-2 rounded-pill shadow-sm border border-light-subtle">
                        <div class="bg-indigo-100 rounded-circle p-1 me-2">
                            <i class="bi bi-person-circle fs-5 text-indigo"></i>
                        </div>
                        <span class="fw-bold text-dark small"><?= session()->get('name'); ?></span>
                    </div>
                </div>
            </div>

         
            <div class="card card-welcome mb-4 p-4">
                <div class="row align-items-center position-relative z-1">
                    <div class="col-md-8">
                        <h2 class="fw-bold mb-2">Halo, <?= session()->get('name'); ?>! 👋</h2>
                        <p class="mb-4 opacity-75">Selamat datang di Portal Akademik. Jangan lupa cek data profil kamu dan jadwal perkuliahan hari ini ya!</p>
                        <a href="/mahasiswa" class="btn btn-light text-primary fw-bold rounded-pill px-4">Cek Data Mahasiswa</a>
                    </div>
                    <div class="col-md-4 text-end d-none d-md-block">
                        <i class="bi bi-backpack4-fill" style="font-size: 8rem; opacity: 0.2;"></i>
                    </div>
                </div>
           
                <div class="position-absolute top-0 end-0 p-5 opacity-10">
                    <i class="bi bi-mortarboard-fill display-1 text-white"></i>
                </div>
            </div>

            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-info h-100 p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success bg-opacity-10 p-3 rounded-circle me-3">
                                <i class="bi bi-check-circle-fill text-success fs-4"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.7rem;">Status Akademik</small>
                                <h5 class="fw-bold mb-0 text-success">Aktif</h5>
                            </div>
                        </div>
                        <p class="text-muted small mb-0">Kamu terdaftar di Semester Ganjil 2024/2025.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card card-info h-100 p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-warning bg-opacity-10 p-3 rounded-circle me-3">
                                <i class="bi bi-star-fill text-warning fs-4"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.7rem;">Indeks Prestasi</small>
                                <h5 class="fw-bold mb-0 text-dark">3.85</h5>
                            </div>
                        </div>
                        <p class="text-muted small mb-0">Pertahankan nilaimu untuk dapat beasiswa!</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-info h-100 p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-info bg-opacity-10 p-3 rounded-circle me-3">
                                <i class="bi bi-calendar-event-fill text-info fs-4"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.7rem;">Jadwal Hari Ini</small>
                                <h5 class="fw-bold mb-0 text-dark">2 Matkul</h5>
                            </div>
                        </div>
                        <p class="text-muted small mb-0">Pemrograman Web (08.00) & Basis Data (13.00)</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const html = document.getElementById('htmlPage');
        const icon = document.getElementById('iconTheme');
        
        if(localStorage.getItem('theme') === 'dark') setDarkMode(true); else setDarkMode(false);

        function toggleTheme() {
            if (html.getAttribute('data-bs-theme') === 'light') { setDarkMode(true); localStorage.setItem('theme', 'dark'); } 
            else { setDarkMode(false); localStorage.setItem('theme', 'light'); }
        }

        function setDarkMode(isDark) {
            if(isDark) { html.setAttribute('data-bs-theme', 'dark'); icon.classList.replace('bi-moon-stars-fill', 'bi-sun-fill'); icon.classList.add('text-warning'); } 
            else { html.setAttribute('data-bs-theme', 'light'); icon.classList.replace('bi-sun-fill', 'bi-moon-stars-fill'); icon.classList.remove('text-warning'); }
        }
    </script>
</body>
</html>