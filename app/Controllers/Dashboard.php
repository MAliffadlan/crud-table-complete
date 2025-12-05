<?php namespace App\Controllers;

use App\Models\MahasiswaModel;

class Dashboard extends BaseController
{
    public function index()
    {
       
        $role = session()->get('role');

       
        if ($role == 'mahasiswa') {
            return view('dashboard_mhs_view');
        }   
        $model = new MahasiswaModel();

        $totalMahasiswa = $model->countAll();

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

        return view('dashboard_view', $data);
    }
}