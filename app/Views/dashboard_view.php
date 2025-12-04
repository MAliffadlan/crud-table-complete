<!doctype html>
<html lang="en" id="htmlPage" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #858796;
            --bg-light: #f8f9fc;
            --card-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        body { 
            background-color: var(--bg-light); 
            font-family: 'Inter', sans-serif;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        h1, h2, h3, h4, h5, h6, .logo-app {
            font-family: 'Poppins', sans-serif;
        }
        
        /* Preloader Styles */
        #preloader {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: var(--bg-light);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.5s ease-out, visibility 0.5s ease-out;
        }
        .spinner-custom {
            width: 3rem; height: 3rem;
            border: 4px solid #e0e0e0;
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0; left: 0; height: 100vh; width: 250px;
            background-color: white;
            box-shadow: 2px 0 20px rgba(0,0,0,0.05);
            padding: 24px 12px;
            display: flex; flex-direction: column; z-index: 100;
            transition: background-color 0.3s ease, border 0.3s ease;
            border-right: 1px solid rgba(0,0,0,0.05);
        }

        .content-wrapper {
            margin-left: 250px; padding: 30px; min-height: 100vh;
        }

        .logo-app {
            font-size: 20px; font-weight: 700; margin-bottom: 40px; padding-left: 12px;
            display: flex; align-items: center; text-decoration: none; color: #4e73df; letter-spacing: 0.5px;
        }

        .nav-link-ig {
            display: flex; align-items: center; padding: 12px 16px;
            color: #6c757d; text-decoration: none; border-radius: 12px; margin-bottom: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            font-weight: 500;
            font-size: 0.95rem;
        }
        .nav-link-ig:hover { 
            background-color: #f8f9fc; 
            color: var(--primary-color); 
            transform: translateX(5px);
        }
        .nav-link-ig i { font-size: 20px; width: 30px; margin-right: 10px; transition: transform 0.2s; }
        
        .nav-link-ig.active { 
            font-weight: 600; 
            color: white; 
            background: linear-gradient(45deg, #4e73df, #224abe);
            box-shadow: 0 4px 15px rgba(78, 115, 223, 0.3);
        }
        .nav-link-ig.active i { color: white; }
        .nav-link-ig:hover i { transform: scale(1.1); }

        .card-estetik {
            border: none;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            background-color: white;
            overflow: hidden;
        }
        .card-estetik:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
        }

        /* Profile Dropdown Styles */
        .profile-header {
            background: white;
            padding: 6px 12px 6px 6px;
            border-radius: 50px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(0,0,0,0.05);
            cursor: pointer;
        }
        .profile-header:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transform: translateY(-1px);
        }
        .dropdown-menu-custom {
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border-radius: 15px;
            padding: 10px;
            margin-top: 10px !important;
        }
        .dropdown-item {
            border-radius: 8px;
            padding: 8px 15px;
            font-size: 0.9rem;
            transition: all 0.2s;
        }
        .dropdown-item:hover {
            background-color: #f8f9fc;
            color: var(--primary-color);
            transform: translateX(5px);
        }
        .dropdown-item.text-danger:hover {
            background-color: #fff5f5;
            color: #dc3545 !important;
        }

        /* Pulse Animation for Online Status */
        @keyframes pulse-green {
            0% { box-shadow: 0 0 0 0 rgba(25, 135, 84, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(25, 135, 84, 0); }
            100% { box-shadow: 0 0 0 0 rgba(25, 135, 84, 0); }
        }
        .status-dot {
            display: inline-block;
            width: 10px; height: 10px;
            background-color: #198754;
            border-radius: 50%;
            margin-left: 8px;
            animation: pulse-green 2s infinite;
        }

        /* Dark Mode Overrides */
        [data-bs-theme="dark"] body { background-color: #121212; color: #e0e0e0; }
        [data-bs-theme="dark"] #preloader { background-color: #121212; }
        [data-bs-theme="dark"] .sidebar { background-color: #1e1e1e; box-shadow: 2px 0 20px rgba(0,0,0,0.2); border-right: 1px solid #333; }
        [data-bs-theme="dark"] .logo-app { color: #fff; }
        [data-bs-theme="dark"] .nav-link-ig { color: #b0b0b0; }
        [data-bs-theme="dark"] .nav-link-ig:hover { background-color: #2c2c2c; color: #fff; }
        [data-bs-theme="dark"] .nav-link-ig.active { color: white; background: linear-gradient(45deg, #3751a0, #1a369c); }
        [data-bs-theme="dark"] .card-estetik { background-color: #1e1e1e; color: #fff; box-shadow: none; border: 1px solid #333; }
        [data-bs-theme="dark"] .profile-header { background-color: #1e1e1e; box-shadow: none; border: 1px solid #333; }
        [data-bs-theme="dark"] .dropdown-menu-custom { background-color: #1e1e1e; border: 1px solid #333; }
        [data-bs-theme="dark"] .dropdown-item { color: #e0e0e0; }
        [data-bs-theme="dark"] .dropdown-item:hover { background-color: #2c2c2c; color: #fff; }
        [data-bs-theme="dark"] .text-dark { color: #fff !important; }
        [data-bs-theme="dark"] .text-muted { color: #888 !important; }
        [data-bs-theme="dark"] h3 { color: #fff !important; }

        @media (max-width: 768px) {
            .sidebar { width: 80px; padding: 24px 12px; }
            .content-wrapper { margin-left: 80px; padding: 20px; }
            .nav-link-ig span, .logo-app span { display: none; }
            .logo-app { margin-bottom: 30px; padding-left: 0; justify-content: center; }
            .nav-link-ig { justify-content: center; padding: 12px; }
            .nav-link-ig i { margin-right: 0; font-size: 24px; }
        }
    </style>
</head>
<body>
    
    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner-custom"></div>
    </div>

    <div class="sidebar">
        <a href="/dashboard" class="logo-app">
            <i class="bi bi-mortarboard-fill me-2 fs-3"></i> <span>FADLAN APP</span>
        </a>
        
        <a href="/dashboard" class="nav-link-ig active">
            <i class="bi bi-grid-1x2-fill"></i> <span>Dashboard</span>
        </a>
        <a href="/mahasiswa" class="nav-link-ig">
            <i class="bi bi-people-fill"></i> <span>Data Mahasiswa</span>
        </a>
        <a href="/settings" class="nav-link-ig">
            <i class="bi bi-gear-fill"></i> <span>Pengaturan</span>
        </a>
        
        <div class="nav-link-ig mt-3" onclick="toggleTheme()" id="themeToggleBtn">
            <i class="bi bi-moon-stars-fill" id="iconTheme"></i> 
            <span id="textTheme">Mode Gelap</span>
        </div>

        <div class="mt-auto">
            <a href="/logout" class="nav-link-ig text-danger hover:bg-red-50">
                <i class="bi bi-box-arrow-right"></i> <span>Logout</span>
            </a>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="container-fluid" style="max-width: 1200px;">
            
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div>
                    <h3 class="fw-bold mb-1 text-dark" id="greetingText">Dashboard Overview</h3>
                    <p class="text-muted mb-0">Selamat datang kembali di panel admin.</p>
                </div>
                
                <!-- Profil Dropdown -->
                <div class="dropdown">
                    <div class="d-flex align-items-center profile-header" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-2 text-primary">
                            <i class="bi bi-person-fill fs-5"></i>
                        </div>
                        <div class="pe-2 d-none d-md-block">
                            <span class="fw-bold text-dark d-block" style="font-size: 0.9rem; line-height: 1;"><?= session()->get('name'); ?></span>
                            <small class="text-muted" style="font-size: 0.75rem;">Administrator</small>
                        </div>
                        <i class="bi bi-chevron-down ms-2 text-muted" style="font-size: 0.8rem;"></i>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                        <li><a class="dropdown-item" href="/settings"><i class="bi bi-gear me-2"></i> Pengaturan Akun</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="/logout"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>

            <div class="row mb-4">
                <!-- Card Total Mahasiswa -->
                <div class="col-md-6 mb-3">
                    <div class="card card-estetik h-100 position-relative overflow-hidden" style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); color: white;">
                        <div class="card-body p-4 position-relative z-1">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="text-white-50 text-uppercase fw-bold mb-1" style="font-size: 0.75rem; letter-spacing: 1px;">Total Mahasiswa</h6>
                                    <h2 class="display-5 fw-bold mb-0"><?= $total_mahasiswa; ?></h2>
                                    <span class="badge bg-white bg-opacity-25 mt-3 rounded-pill fw-normal px-3 py-1">
                                        <i class="bi bi-arrow-up-short"></i> Data Terupdate
                                    </span>
                                </div>
                                <div class="bg-white bg-opacity-25 p-3 rounded-3">
                                    <i class="bi bi-mortarboard-fill fs-2"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Dekorasi Background -->
                        <i class="bi bi-mortarboard-fill position-absolute text-white" style="font-size: 10rem; opacity: 0.1; right: -30px; bottom: -40px; transform: rotate(-15deg);"></i>
                    </div>
                </div>

                <!-- Card Status Sistem -->
                <div class="col-md-6 mb-3">
                    <div class="card card-estetik h-100 border-start border-success border-5">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted text-uppercase fw-bold mb-1" style="font-size: 0.75rem; letter-spacing: 1px;">Status Server</h6>
                                    <div class="d-flex align-items-center">
                                        <h2 class="fw-bold text-success mb-0">Online</h2>
                                        <span class="status-dot"></span>
                                    </div>
                                    <p class="text-muted small mb-0 mt-2">Semua layanan berjalan optimal.</p>
                                </div>
                                <div class="bg-success bg-opacity-10 p-3 rounded-3">
                                    <i class="bi bi-hdd-network-fill text-success fs-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-estetik mb-4">
                <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold m-0 text-dark">Statistik Jurusan</h5>
                        <small class="text-muted">Sebaran mahasiswa berdasarkan jurusan</small>
                    </div>
                    <button class="btn btn-light btn-sm rounded-circle shadow-sm"><i class="bi bi-three-dots-vertical"></i></button>
                </div>
                <div class="card-body p-4">
                    <div style="width: 100%; max-width: 450px; margin: auto;"> 
                        <canvas id="grafikJurusan"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap Bundle JS (Wajib untuk Dropdown) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Preloader Script
        window.addEventListener("load", function () {
            var preloader = document.getElementById("preloader");
            preloader.style.opacity = "0";
            setTimeout(function () {
                preloader.style.visibility = "hidden";
            }, 500);
        });

        // Greeting Script (SUDAH DI-UPDATE SESUAI REQUEST)
        const hour = new Date().getHours();
        const greetingElement = document.getElementById('greetingText');
        const userName = "<?= session()->get('name'); ?>"; // Mengambil nama dari session PHP
        
        let greeting = 'Dashboard Overview';
        if (hour < 12) greeting = 'Selamat Pagi, ' + userName + '!';
        else if (hour < 18) greeting = 'Selamat Siang, ' + userName + '!';
        else greeting = 'Selamat Malam, ' + userName + '!';
        
        greetingElement.innerText = greeting;

        // Chart Data
        const labelData = <?= $label_jurusan; ?>;
        const jumlahData = <?= $data_jumlah; ?>;
        const ctx = document.getElementById('grafikJurusan');
        
        const getLegendColor = () => {
            return document.documentElement.getAttribute('data-bs-theme') === 'dark' ? '#fff' : '#666';
        };

        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labelData,
                datasets: [{
                    label: 'Jumlah Mahasiswa',
                    data: jumlahData,
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b'],
                    borderWidth: 0,
                    hoverOffset: 15
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { 
                    legend: { 
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true,
                            font: { size: 12, family: 'Poppins' },
                            color: getLegendColor() 
                        }
                    } 
                },
                animation: {
                    duration: 2000,
                    easing: 'easeOutQuart'
                },
                layout: { padding: 20 }
            }
        });

        // Dark Mode Logic
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
                if(myChart.options.plugins.legend.labels) {
                    myChart.options.plugins.legend.labels.color = '#fff';
                    myChart.update();
                }
            } else {
                html.setAttribute('data-bs-theme', 'light');
                icon.classList.remove('bi-sun-fill');
                icon.classList.remove('text-warning');
                icon.classList.add('bi-moon-stars-fill');
                text.innerText = "Mode Gelap";
                if(myChart.options.plugins.legend.labels) {
                    myChart.options.plugins.legend.labels.color = '#666';
                    myChart.update();
                }
            }
        }
    </script>
</body>
</html>