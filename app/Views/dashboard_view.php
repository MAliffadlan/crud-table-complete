<!doctype html>
<html lang="en" id="htmlPage" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        body { 
            background-color: #f4f6f9; 
            font-family: 'Segoe UI', sans-serif;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
 
        .sidebar {
            position: fixed;
            top: 0; left: 0; height: 100vh; width: 250px;
            background-color: white;
            box-shadow: 2px 0 20px rgba(0,0,0,0.05);
            padding: 24px 12px;
            display: flex; flex-direction: column; z-index: 100;
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


        .card-estetik {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            transition: all 0.3s ease;
            background-color: white;
        }
        .card-estetik:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .profile-header {
            background: white;
            padding: 8px 16px;
            border-radius: 50px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: background-color 0.3s ease;
        }
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
        [data-bs-theme="dark"] .nav-link-ig:hover { 
            background-color: #2c2c2c; 
            color: #fff; 
        }
        [data-bs-theme="dark"] .nav-link-ig.active { 
            background-color: #333; 
            color: #4e73df; 
        }
        [data-bs-theme="dark"] .card-estetik {
            background-color: #1e1e1e;
            color: #fff;
            box-shadow: none;
            border: 1px solid #333;
        }
        [data-bs-theme="dark"] .profile-header {
            background-color: #1e1e1e;
            box-shadow: none;
            border: 1px solid #333;
        }
        [data-bs-theme="dark"] .text-dark { color: #fff !important; }
        [data-bs-theme="dark"] .text-muted { color: #888 !important; }
        [data-bs-theme="dark"] h3 { color: #fff !important; }

        @media (max-width: 768px) {
            .sidebar { width: 72px; padding: 12px; }
            .content-wrapper { margin-left: 72px; padding: 20px; }
            .nav-link-ig span, .logo-app span { display: none; }
            .logo-app { margin-bottom: 20px; padding-left: 0; justify-content: center; }
            .nav-link-ig { justify-content: center; }
            .nav-link-ig i { margin-right: 0; }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="/dashboard" class="logo-app">
            <i class="bi bi-mortarboard-fill me-2 text-primary"></i> <span>FADLAN APP</span>
        </a>
        
        <a href="/dashboard" class="nav-link-ig active">
            <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
        </a>
        <a href="/mahasiswa" class="nav-link-ig">
            <i class="bi bi-people"></i> <span>Data Mahasiswa</span>
        </a>
        <a href="/settings" class="nav-link-ig">
            <i class="bi bi-gear"></i> <span>Pengaturan</span>
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
        <div class="container" style="max-width: 1000px;">
            
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div>
                    <h3 class="fw-bold mb-1" style="color: #333;">Dashboard Overview</h3>
                    <p class="text-muted mb-0">Selamat datang kembali di panel admin.</p>
                </div>
                <div class="d-flex align-items-center profile-header">
                    <i class="bi bi-person-circle fs-4 me-2 text-primary"></i>
                    <span class="fw-bold text-dark"><?= session()->get('name'); ?></span>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6 mb-3">
                    <div class="card card-estetik h-100" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white !important;">
                        <div class="card-body p-4 position-relative overflow-hidden">
                            <div class="d-flex justify-content-between align-items-center" style="position: relative; z-index: 2;">
                                <div>
                                    <h6 class="text-white-50 text-uppercase mb-2 fw-bold" style="font-size: 0.8rem;">Total Mahasiswa</h6>
                                    <h1 class="display-4 fw-bold mb-0 text-white"><?= $total_mahasiswa; ?></h1>
                                </div>
                                <div class="bg-white bg-opacity-25 p-3 rounded-circle">
                                    <i class="bi bi-people-fill fs-1 text-white"></i>
                                </div>
                            </div>
                            <i class="bi bi-people-fill position-absolute" style="font-size: 8rem; right: -20px; bottom: -30px; opacity: 0.1;"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card card-estetik h-100 border-start border-success border-5">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted text-uppercase mb-2 fw-bold" style="font-size: 0.8rem;">Status Sistem</h6>
                                    <h3 class="fw-bold text-success mb-0">Online <i class="bi bi-check-circle-fill"></i></h3>
                                    <p class="text-muted small mb-0 mt-1">Server berjalan optimal</p>
                                </div>
                                <div class="bg-success bg-opacity-10 p-3 rounded-circle">
                                    <i class="bi bi-hdd-rack-fill text-success fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-estetik mb-4">
                <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold m-0 text-dark"><i class="bi bi-pie-chart-fill text-primary me-2"></i> Statistik Jurusan</h5>
                </div>
                <div class="card-body p-4">
                    <div style="width: 100%; max-width: 500px; margin: auto;"> 
                        <canvas id="grafikJurusan"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
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
                plugins: { 
                    legend: { 
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true,
                            font: { size: 12 },
                            color: getLegendColor() 
                        }
                    } 
                },
                layout: { padding: 20 }
            }
        });
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