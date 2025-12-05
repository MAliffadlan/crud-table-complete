<?php namespace App\Controllers;

use App\Models\MahasiswaModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // CEK ROLE USER
        $role = session()->get('role');

        // JIKA MAHASISWA, LEMPAR KE TAMPILAN KHUSUS MAHASISWA
        if ($role == 'mahasiswa') {
            return view('dashboard_mhs_view');
        }

        // --- LOGIC KHUSUS ADMIN (HITUNG STATISTIK) ---
        // Code di bawah ini cuma jalan kalau yang login itu ADMIN
        
        $model = new MahasiswaModel();

        // 1. Ambil data total mahasiswa
        $totalMahasiswa = $model->countAll();

        // 2. Ambil data statistik per jurusan
        $hasil = $model->select('jurusan, COUNT(*) as jumlah')
                       ->groupBy('jurusan')
                       ->findAll();

        $labelJurusan = [];
        $dataJumlah = [];

        foreach ($hasil as $row) {
            $labelJurusan[] = $row['jurusan'];
            $dataJumlah[]   = $row['jumlah'];
        }

        $data = [
            'total_mahasiswa' => $totalMahasiswa,
            'label_jurusan'   => json_encode($labelJurusan),
            'data_jumlah'     => json_encode($dataJumlah)
        ];

        // TAMPILKAN DASHBOARD ADMIN YANG LENGKAP
        return view('dashboard_view', $data);
    }
}