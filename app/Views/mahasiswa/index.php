<?php
   
    $role = session()->get('role');
    $isMhs = ($role == 'mahasiswa');

 
    $appTitle = $isMhs ? 'PORTAL MHS' : 'PORTAL APP';
    $menuDataText = $isMhs ? 'Data Teman' : 'Data Mahasiswa';
    
  
    $primaryColor = $isMhs ? '#6366f1' : '#4e73df'; 
    $activeGradient = $isMhs ? 'linear-gradient(45deg, #6366f1, #4f46e5)' : 'linear-gradient(45deg, #4e73df, #224abe)';
    $shadowColor = $isMhs ? 'rgba(99, 102, 241, 0.3)' : 'rgba(78, 115, 223, 0.3)';
    $logoIconColor = $isMhs ? '#6366f1' : '#dc3545'; 
?>
<!doctype html>
<html lang="en" id="htmlPage" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $menuDataText ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
      
        :root {
            --theme-primary: <?= $primaryColor ?>;
            --theme-gradient: <?= $activeGradient ?>;
            --theme-shadow: <?= $shadowColor ?>;
        }

        body { 
            background-color: #f4f6f9; 
            font-family: 'Segoe UI', sans-serif;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
       
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
            color: var(--theme-primary);
            transform: translateX(5px);
        }
        .nav-link-ig i { font-size: 24px; width: 32px; margin-right: 16px; transition: transform 0.2s; }
        
      
        .nav-link-ig.active { 
            font-weight: 800; 
            color: white !important; 
            background: var(--theme-gradient) !important; 
            box-shadow: 0 4px 15px var(--theme-shadow);
        }
        
        .nav-link-ig:hover i { transform: scale(1.1); }
        .nav-link-ig span { font-size: 16px; }

        .btn-primary {
            background: var(--theme-gradient);
            border: none;
        }
        .btn-primary:hover {
            background: var(--theme-primary);
        }
      
        .modal-header-theme {
            background: var(--theme-gradient) !important;
        }
        .text-theme-primary { color: var(--theme-primary) !important; }

       
        [data-bs-theme="dark"] body { background-color: #121212; color: #e0e0e0; }
        [data-bs-theme="dark"] .sidebar { background-color: #1e1e1e; box-shadow: 2px 0 20px rgba(0,0,0,0.2); border-right: 1px solid #333; }
        [data-bs-theme="dark"] .logo-app { color: #fff; }
        [data-bs-theme="dark"] .nav-link-ig { color: #b0b0b0; }
        [data-bs-theme="dark"] .nav-link-ig:hover { background-color: #2c2c2c; color: #fff; }
        [data-bs-theme="dark"] .nav-link-ig.active { background-color: #333; color: var(--theme-primary); }
        [data-bs-theme="dark"] .bg-white { background-color: #1e1e1e !important; color: #fff; }
        [data-bs-theme="dark"] .bg-light { background-color: #2c2c2c !important; color: #fff; border-color: #444 !important; }
        
     
        [data-bs-theme="dark"] .text-dark { color: #fff !important; }
        [data-bs-theme="dark"] .text-muted { color: #bdbdbd !important; }
        [data-bs-theme="dark"] .text-secondary { color: #f0f0f0 !important; } 

        [data-bs-theme="dark"] .card { border-color: #333; background-color: #1e1e1e; }
        [data-bs-theme="dark"] .table-light th { background-color: #2c2c2c; color: #fff; border-color: #444; }
        [data-bs-theme="dark"] .table { color: #e0e0e0; border-color: #444; }
        [data-bs-theme="dark"] .table-hover tbody tr:hover { color: #fff; background-color: #333; }
        [data-bs-theme="dark"] .form-control, [data-bs-theme="dark"] .form-select { background-color: #2c2c2c; border-color: #444; color: #fff; }
        [data-bs-theme="dark"] .input-group-text { background-color: #2c2c2c; border-color: #444; }
        [data-bs-theme="dark"] .input-group-text i { color: #aaa !important; }
        [data-bs-theme="dark"] .modal-content { background-color: #1e1e1e; color: #fff; border: 1px solid #333; }
        [data-bs-theme="dark"] .modal-header { border-bottom-color: #333; }
        [data-bs-theme="dark"] .modal-footer { border-top-color: #333; }
        [data-bs-theme="dark"] .page-link { background-color: #1e1e1e; border-color: #444; color: #fff; }
        [data-bs-theme="dark"] .page-item.disabled .page-link { background-color: #2c2c2c; border-color: #444; }

        @media (max-width: 768px) {
            .sidebar { width: 72px; padding: 12px; }
            .content-wrapper { margin-left: 72px; padding: 20px; }
            .nav-link-ig span, .logo-app span { display: none; }
            .logo-app { margin-bottom: 20px; padding-left: 0; justify-content: center; }
            .nav-link-ig { justify-content: center; }
            .nav-link-ig i { margin-right: 0; }
        }

       
        .foto-profil { transition: transform 0.3s ease; cursor: pointer; }
        .foto-profil:hover { transform: scale(1.5); z-index: 10; box-shadow: 0 4px 8px rgba(0,0,0,0.2); }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .card-animasi { animation: fadeInUp 0.8s cubic-bezier(0.2, 0.8, 0.2, 1); }

       
        .kop-surat { display: none; }
        @media print {
            @page { size: landscape; margin: 1cm; }
            body { background-color: white; color: black; }
            .sidebar, .btn, .input-group, footer, .modal, #themeToggleBtn { display: none !important; }
            .content-wrapper { margin: 0; padding: 0; min-height: auto; }
            .card { box-shadow: none; border: none; }
            .card-header { display: none !important; }
            .kop-surat { display: block; text-align: center; margin-bottom: 20px; border-bottom: 2px solid black; padding-bottom: 10px; }
            .table-responsive { overflow: visible; }
            table { width: 100%; border-collapse: collapse; }
            th, td { border: 1px solid black !important; padding: 8px; color: black !important; }
            th:first-child, td:first-child, th:last-child, td:last-child { display: none; }
        }
    </style>
</head>
<body>

   
    <div class="sidebar">
        <a href="/dashboard" class="logo-app">
          
            <i class="bi bi-database-fill-gear me-2" style="color: <?= $logoIconColor ?>;"></i> 
            <span><?= $appTitle ?></span>
        </a>
        
        <a href="/dashboard" class="nav-link-ig">
            <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
        </a>
        <a href="/mahasiswa" class="nav-link-ig active">
            <i class="bi bi-people-fill"></i> <span><?= $menuDataText ?></span>
        </a>
        
       
        <?php if(!$isMhs) : ?>
        <a href="/settings" class="nav-link-ig">
            <i class="bi bi-gear-fill"></i> <span>Pengaturan</span>
        </a>
        <?php endif; ?>

        <div class="nav-link-ig mt-3" onclick="toggleTheme()" id="themeToggleBtn">
            <i class="bi bi-moon-stars-fill" id="iconTheme"></i> <span id="textTheme">Mode Gelap</span>
        </div>
        <div class="mt-auto">
            <a href="/logout" class="nav-link-ig text-danger">
                <i class="bi bi-box-arrow-left"></i> <span>Logout</span>
            </a>
        </div>
    </div>

    
    <div class="content-wrapper">
        <div class="container" style="max-width: 1200px;">
            
            <div class="kop-surat">
                <h2>Laporan Data Mahasiswa</h2>
                <p>Dicetak Otomatis oleh Sistem Portal App pada <?= date('d F Y'); ?></p>
            </div>

            
            <h3 class="fw-bold mb-4 d-print-none text-dark">
                <?= $isMhs ? 'Daftar Teman Kelas' : 'Kelola Data Mahasiswa' ?>
            </h3>

            <div class="card border-0 shadow-sm rounded-4 bg-white card-animasi">
                <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center flex-wrap gap-3">
                    
                    <form action="" method="get" class="d-flex flex-grow-1 gap-2" style="max-width: 600px;">
                        <div class="input-group w-50">
                            <span class="input-group-text bg-light border-0"><i class="bi bi-funnel text-muted"></i></span>
                            <select class="form-select bg-light border-0" name="jurusan" onchange="this.form.submit()">
                                <option value="">Semua Jurusan</option>
                                <option value="Teknik Informatika" <?= ($jurusan == 'Teknik Informatika') ? 'selected' : ''; ?>>Teknik Informatika</option>
                                <option value="Sistem Informasi" <?= ($jurusan == 'Sistem Informasi') ? 'selected' : ''; ?>>Sistem Informasi</option>
                                <option value="Manajemen Bisnis" <?= ($jurusan == 'Manajemen Bisnis') ? 'selected' : ''; ?>>Manajemen Bisnis</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" class="form-control bg-light border-0" name="keyword" placeholder="Cari nama / NIM..." value="<?= $keyword; ?>">
                            <button class="btn btn-primary rounded-end" type="submit">Cari</button>
                        </div>
                    </form>
                    
                    <div class="d-flex gap-2">
                        <button onclick="window.print()" class="btn btn-secondary rounded-pill px-3 fw-bold">
                            <i class="bi bi-printer-fill me-1"></i> Cetak Laporan
                        </button>
                        
                       
                        <?php if(!$isMhs) : ?>
                        <a href="/mahasiswa/create" class="btn btn-primary rounded-pill px-4 fw-bold"><i class="bi bi-plus-lg me-1"></i> Tambah</a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Foto</th> <th>NIM</th> <th>Nama Lengkap</th> <th>Jurusan</th> <th>No. HP</th> <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($mahasiswa as $m): ?>
                                    <?php 
                                        $warnaBadge = 'bg-secondary';
                                        if($m['jurusan'] == 'Teknik Informatika') $warnaBadge = 'bg-primary';
                                        if($m['jurusan'] == 'Sistem Informasi') $warnaBadge = 'bg-success';
                                        if($m['jurusan'] == 'Manajemen Bisnis') $warnaBadge = 'bg-warning text-dark';
                                    ?>
                                <tr>
                                    <td><img src="/uploads/<?= $m['foto']; ?>" class="rounded-circle border foto-profil" width="50" height="50" style="object-fit: cover;" alt="Foto"></td>
                                    <td class="fw-bold text-secondary"><?= $m['nim']; ?></td>
                                    <td class="fw-bold"><?= $m['nama']; ?></td>
                                    <td><span class="badge <?= $warnaBadge; ?> rounded-pill px-3 py-2"><?= $m['jurusan']; ?></span></td>
                                    <td><small><?= $m['no_hp']; ?></small></td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm rounded-circle me-1" title="Detail" data-bs-toggle="modal" data-bs-target="#detailModal" data-nim="<?= $m['nim']; ?>" data-nama="<?= $m['nama']; ?>" data-jurusan="<?= $m['jurusan']; ?>" data-hp="<?= $m['no_hp']; ?>" data-foto="<?= $m['foto']; ?>"><i class="bi bi-eye-fill"></i></button>
                                        <a href="/mahasiswa/printKTM/<?= $m['id']; ?>" target="_blank" class="btn btn-info btn-sm rounded-circle text-white me-1" title="Cetak KTM"><i class="bi bi-person-badge-fill"></i></a>
                                        
                                        
                                        <?php if(!$isMhs) : ?>
                                        <a href="/mahasiswa/edit/<?= $m['id']; ?>" class="btn btn-warning btn-sm text-dark me-1 rounded-circle" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="/mahasiswa/delete/<?= $m['id']; ?>" class="btn btn-danger btn-sm btn-hapus rounded-circle" title="Hapus"><i class="bi bi-trash-fill"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-4"><?= $pager->links('mahasiswa', 'default_full') ?></div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="detailModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header modal-header-theme text-white border-0">
                    <h5 class="modal-title fw-bold"><i class="bi bi-person-lines-fill me-2"></i>Detail Mahasiswa</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4 text-center">
                    <img src="" id="modalFoto" class="rounded-circle border border-3 border-light shadow-sm mb-3" width="120" height="120" style="object-fit: cover;">
                    <h4 class="fw-bold mb-1" id="modalNama"></h4>
                    <p class="text-muted mb-3" id="modalNIM"></p>
                    <div class="d-flex justify-content-center gap-2 mb-4"><span class="badge bg-light text-primary border px-3 py-2 fs-6" id="modalJurusan"></span></div>
                    <div class="row text-start bg-light p-3 rounded-3 mx-1 dark:bg-dark">
                        <div class="col-12 text-center"><small class="text-muted text-uppercase fw-bold" style="font-size: 0.7rem;">Nomor Handphone</small><div class="fw-bold text-dark fs-5" id="modalHP"></div></div>
                    </div>
                </div>
                <div class="modal-footer border-0 justify-content-center pb-4"><button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Tutup</button></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        
        document.addEventListener('DOMContentLoaded', () => {
            const modalHeader = document.querySelector('#detailModal .modal-header');
            if (modalHeader) {
                modalHeader.classList.remove('bg-primary'); 
                modalHeader.classList.add('modal-header-theme'); 
            }
        });
        
        const detailModal = document.getElementById('detailModal')
        detailModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget
            document.getElementById('modalNama').textContent = button.getAttribute('data-nama')
            document.getElementById('modalNIM').textContent = button.getAttribute('data-nim')
            document.getElementById('modalJurusan').textContent = button.getAttribute('data-jurusan')
            document.getElementById('modalHP').textContent = button.getAttribute('data-hp')
            document.getElementById('modalFoto').src = '/uploads/' + button.getAttribute('data-foto')
        })

        const Toast = Swal.mixin({ toast: true, position: 'top-end', showConfirmButton: false, timer: 3000, timerProgressBar: true, didOpen: (toast) => { toast.addEventListener('mouseenter', Swal.stopTimer); toast.addEventListener('mouseleave', Swal.resumeTimer); } })
        <?php if (session()->getFlashdata('pesan')) : ?> Toast.fire({ icon: 'success', title: '<?= session()->getFlashdata('pesan'); ?>' }) <?php endif; ?>

        const btnHapus = document.querySelectorAll('.btn-hapus');
        btnHapus.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault(); const href = this.getAttribute('href');
                Swal.fire({ title: 'Yakin hapus data?', text: "Data tidak bisa dikembalikan!", icon: 'warning', showCancelButton: true, confirmButtonColor: '#d33', cancelButtonColor: '#3085d6', confirmButtonText: 'Ya, Hapus!', cancelButtonText: 'Batal' }).then((result) => { if (result.isConfirmed) document.location.href = href; });
            });
        });

        const html = document.getElementById('htmlPage');
        const icon = document.getElementById('iconTheme');
        const text = document.getElementById('textTheme');
        if(localStorage.getItem('theme') === 'dark') setDarkMode(true); else setDarkMode(false);

        function toggleTheme() {
            if (html.getAttribute('data-bs-theme') === 'light') { setDarkMode(true); localStorage.setItem('theme', 'dark'); } 
            else { setDarkMode(false); localStorage.setItem('theme', 'light'); }
        }

        function setDarkMode(isDark) {
            if(isDark) {
                html.setAttribute('data-bs-theme', 'dark'); icon.classList.remove('bi-moon-stars-fill'); icon.classList.add('bi-sun-fill'); icon.classList.add('text-warning'); text.innerText = "Mode Terang";
            } else {
                html.setAttribute('data-bs-theme', 'light'); icon.classList.remove('bi-sun-fill'); icon.classList.remove('text-warning'); icon.classList.add('bi-moon-stars-fill'); text.innerText = "Mode Gelap";
            }
        }
    </script>
</body>
</html>