<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Akun Baru</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        body { 
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); 
            height: 100vh; 
            display: flex; 
            align-items: center; 
            justify-content: center;
            font-family: 'Inter', sans-serif;
        }
        
        h3, h5 { font-family: 'Poppins', sans-serif; }

        .card-register { 
            border: none; 
            border-radius: 20px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.2); 
            overflow: hidden;
        }

   
        .role-selector {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .role-option-input {
            display: none; 
        }
        
        .role-card {
            flex: 1;
            border: 2px solid #e3e6f0;
            border-radius: 12px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background-color: #f8f9fc;
            color: #858796;
        }
        
        .role-card:hover {
            background-color: white;
            border-color: #4e73df;
            transform: translateY(-3px);
        }
        
        .role-card i {
            font-size: 2rem;
            display: block;
            margin-bottom: 8px;
            transition: color 0.3s;
        }
        
        /* Efek saat dipilih (Checked) */
        .role-option-input:checked + .role-card {
            border-color: #4e73df;
            background-color: #eff4ff;
            color: #4e73df;
            box-shadow: 0 4px 12px rgba(78, 115, 223, 0.2);
        }
        
        .role-option-input:checked + .role-card i {
            color: #4e73df;
            transform: scale(1.1);
        }

        .btn-primary { 
            background: linear-gradient(45deg, #4e73df, #224abe);
            border: none; 
            padding: 12px; 
            font-weight: 600; 
            border-radius: 10px;
            transition: all 0.3s;
        }
        .btn-primary:hover { 
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 115, 223, 0.4);
        }
        
        .form-control {
            border-radius: 10px;
            padding: 10px 15px;
            border: 1px solid #d1d3e2;
        }
        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card card-register p-4 bg-white">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-dark">Buat Akun Baru</h3>
                        <p class="text-muted small">Silakan lengkapi data diri Anda</p>
                    </div>
                    
                    <?php $validation = \Config\Services::validation(); ?>
                    
                    <form action="/register/process" method="post">
                        
           
                        <label class="form-label fw-bold text-dark mb-2">Daftar Sebagai:</label>
                        <div class="role-selector">

                            <input type="radio" class="role-option-input" name="role" id="role_mhs" value="mahasiswa" checked>
                            <label class="role-card" for="role_mhs">
                                <i class="bi bi-mortarboard-fill"></i>
                                <div class="fw-bold">Mahasiswa</div>
                            </label>
                            <input type="radio" class="role-option-input" name="role" id="role_admin" value="admin">
                            <label class="role-card" for="role_admin">
                                <i class="bi bi-shield-lock-fill"></i>
                                <div class="fw-bold">Admin</div>
                            </label>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" value="<?= old('name'); ?>" placeholder="Contoh: M Alif fadlan">
                            <div class="invalid-feedback"><?= $validation->getError('name'); ?></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Username</label>
                            <input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" value="<?= old('username'); ?>" placeholder="Username untuk login">
                            <div class="invalid-feedback"><?= $validation->getError('username'); ?></div>
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label small fw-bold text-secondary">Password</label>
                                <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="****">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label small fw-bold text-secondary">Konfirmasi</label>
                                <input type="password" name="confpassword" class="form-control <?= ($validation->hasError('confpassword')) ? 'is-invalid' : ''; ?>" placeholder="****">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-2">
                            Daftar Sekarang <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                        
                        <div class="text-center mt-4">
                            <small class="text-muted">Sudah punya akun? <a href="/login" class="text-decoration-none fw-bold" style="color: #4e73df;">Login disini</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>