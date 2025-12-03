<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    
    <?php $errors = session()->getFlashdata('errors'); ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold">Tambah Data Mahasiswa</h5>
                    </div>
                    <div class="card-body p-4">
                        
                        <form action="/mahasiswa/store" method="post" enctype="multipart/form-data">
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">NIM</label>
                                    
                                    <input type="text" name="nim" class="form-control <?= (isset($errors['nim'])) ? 'is-invalid' : ''; ?>" 
                                           value="<?= old('nim'); ?>" required>
                                    
                                    <div class="invalid-feedback">
                                        <?= $errors['nim'] ?? ''; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control <?= (isset($errors['nama'])) ? 'is-invalid' : ''; ?>" 
                                           value="<?= old('nama'); ?>" required>
                                    <div class="invalid-feedback">
                                        <?= $errors['nama'] ?? ''; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jurusan</label>
                                <select name="jurusan" class="form-select">
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                    <option value="Manajemen Bisnis">Manajemen Bisnis</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nomor HP</label>
                                <input type="number" name="no_hp" class="form-control" value="<?= old('no_hp'); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Upload Foto Profil</label>
                                <input type="file" name="foto" class="form-control <?= (isset($errors['foto'])) ? 'is-invalid' : ''; ?>" accept="image/*">
                                <div class="invalid-feedback">
                                    <?= $errors['foto'] ?? ''; ?>
                                </div>
                                <small class="text-muted">Format: JPG, PNG. Jika kosong akan pakai foto default.</small>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <a href="/mahasiswa" class="btn btn-secondary me-md-2">Batal</a>
                                <button type="submit" class="btn btn-primary px-4">Simpan Data</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>