<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <?php $errors = session()->getFlashdata('errors'); ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-warning py-3">
                        <h5 class="mb-0 fw-bold text-dark">Edit Data Mahasiswa</h5>
                    </div>
                    <div class="card-body p-4">
                        
                        <form action="/mahasiswa/update/<?= $mahasiswa['id']; ?>" method="post" enctype="multipart/form-data">
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">NIM</label>
                                    <input type="text" name="nim" class="form-control <?= (isset($errors['nim'])) ? 'is-invalid' : ''; ?>" 
                                           value="<?= (old('nim')) ? old('nim') : $mahasiswa['nim'] ?>" required>
                                    <div class="invalid-feedback">
                                        <?= $errors['nim'] ?? ''; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control <?= (isset($errors['nama'])) ? 'is-invalid' : ''; ?>" 
                                           value="<?= (old('nama')) ? old('nama') : $mahasiswa['nama'] ?>" required>
                                    <div class="invalid-feedback">
                                        <?= $errors['nama'] ?? ''; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jurusan</label>
                                <select name="jurusan" class="form-select">
                                    <option value="Teknik Informatika" <?= ($mahasiswa['jurusan'] == 'Teknik Informatika') ? 'selected' : ''; ?>>Teknik Informatika</option>
                                    <option value="Sistem Informasi" <?= ($mahasiswa['jurusan'] == 'Sistem Informasi') ? 'selected' : ''; ?>>Sistem Informasi</option>
                                    <option value="Manajemen Bisnis" <?= ($mahasiswa['jurusan'] == 'Manajemen Bisnis') ? 'selected' : ''; ?>>Manajemen Bisnis</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nomor HP</label>
                                <input type="number" name="no_hp" class="form-control" value="<?= (old('no_hp')) ? old('no_hp') : $mahasiswa['no_hp'] ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ganti Foto (Opsional)</label>
                                <div class="d-flex align-items-center mb-2">
                                    <img src="/uploads/<?= $mahasiswa['foto']; ?>" width="60" class="rounded me-2 border">
                                    <small class="text-muted">Foto saat ini</small>
                                </div>
                                <input type="file" name="foto" class="form-control <?= (isset($errors['foto'])) ? 'is-invalid' : ''; ?>" accept="image/*">
                                <div class="invalid-feedback">
                                    <?= $errors['foto'] ?? ''; ?>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <a href="/mahasiswa" class="btn btn-secondary me-md-2">Batal</a>
                                <button type="submit" class="btn btn-warning px-4">Update Data</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>