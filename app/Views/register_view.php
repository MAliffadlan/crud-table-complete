<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Admin Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 100vh; display: flex; align-items: center; justify-content: center; }
        .card { border: none; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.2); }
        .btn-primary { background-color: #764ba2; border: none; }
        .btn-primary:hover { background-color: #5a387e; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <h3 class="text-center mb-4 fw-bold text-secondary">DAFTAR ADMIN</h3>
                    
                    <!-- Tampilkan Error Validasi -->
                    <?php $validation = \Config\Services::validation(); ?>
                    
                    <form action="/register/process" method="post">
                        
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" value="<?= old('name'); ?>">
                            <div class="invalid-feedback"><?= $validation->getError('name'); ?></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" value="<?= old('username'); ?>">
                            <div class="invalid-feedback"><?= $validation->getError('username'); ?></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback"><?= $validation->getError('password'); ?></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" name="confpassword" class="form-control <?= ($validation->hasError('confpassword')) ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback"><?= $validation->getError('confpassword'); ?></div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2">Daftar Sekarang</button>
                        
                        <div class="text-center mt-3">
                            <small>Sudah punya akun? <a href="/login" class="text-decoration-none fw-bold">Login disini</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>