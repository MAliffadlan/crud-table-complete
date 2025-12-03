<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profil Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-dark text-white py-3">
                        <h5 class="mb-0 fw-bold">Pengaturan Akun</h5>
                    </div>
                    <div class="card-body p-4">

                        <?php if(session()->getFlashdata('pesan')):?>
                            <div class="alert alert-success"><?= session()->getFlashdata('pesan') ?></div>
                        <?php endif;?>

                        <form action="/profile/update" method="post">
                            
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" value="<?= $user['name']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" value="<?= $user['username']; ?>" required>
                            </div>

                            <hr>
                            <div class="alert alert-info py-2"><small>Kosongkan jika tidak ingin mengganti password.</small></div>

                            <div class="mb-3">
                                <label class="form-label">Password Baru</label>
                                <input type="password" name="password" class="form-control" placeholder="Entri password baru...">
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <a href="/dashboard" class="btn btn-secondary me-md-2">Kembali ke Dashboard</a>
                                <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>