<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cetak KTM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #eee; font-family: Arial, sans-serif; }
        
        .ktm-card {
            width: 500px;
            height: 300px;
            background: linear-gradient(135deg, #004aad 0%, #002c66 100%);
            border-radius: 15px;
            color: white;
            padding: 20px;
            position: relative;
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
            margin: 50px auto;
            overflow: hidden;
            border: 2px solid white;
        }

        .circle-bg {
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            top: -50px;
            right: -50px;
        }

        .judul { 
            font-size: 24px; 
            font-weight: bold; 
            letter-spacing: 2px; 
            border-bottom: 2px solid #ffc107; 
            display: inline-block; 
            padding-bottom: 5px; 
            margin-bottom: 20px;
        }

        .foto-ktm {
            width: 100px;
            height: 120px;
            object-fit: cover;
            border: 3px solid white;
            border-radius: 10px;
            background: white;
        }

        .data-table td { padding: 3px 10px; font-size: 16px; }

        .logo { 
            position: absolute; 
            bottom: 20px; 
            right: 20px; 
            opacity: 0.8; 
            font-size: 12px; 
            text-align: right;
        }
        .qr-code {
            position: absolute;
            bottom: 20px;
            left: 20px;
            width: 70px; 
            height: 70px;
            background: white;
            padding: 3px;
            border-radius: 5px;
        }
        
        @media print {
            body { background: white; -webkit-print-color-adjust: exact; }
            .no-print { display: none; }
            .ktm-card { box-shadow: none; margin: 0; border: 1px solid #000; page-break-inside: avoid; }
        }
    </style>
</head>
<body>

    <div class="text-center mt-4 no-print">
        <button onclick="window.print()" class="btn btn-primary btn-lg">🖨️ Cetak Kartu</button>
        <button onclick="window.close()" class="btn btn-secondary btn-lg">Tutup</button>
    </div>

    <div class="ktm-card">
        <div class="circle-bg"></div>
        
        <div class="d-flex align-items-start">
            <div class="me-4">
                <img src="/uploads/<?= $m['foto']; ?>" class="foto-ktm">
            </div>
            <div class="flex-grow-1">
                <div class="judul">KARTU MAHASISWA</div>
                <table class="data-table text-white">
                    <tr>
                        <td>NIM</td>
                        <td>: <b><?= $m['nim']; ?></b></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>: <?= $m['nama']; ?></td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td>: <?= $m['jurusan']; ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?= $m['nim']; ?>" class="qr-code">

        <div class="logo">
            <p class="mb-0 fw-bold">POLITEKNIK LP3I</p>
            <small>Berlaku Selama Menjadi Mahasiswa</small>
        </div>
    </div>

</body>
</html>