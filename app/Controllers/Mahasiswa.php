<?php namespace App\Controllers;

use App\Models\MahasiswaModel;
use Dompdf\Dompdf;

class Mahasiswa extends BaseController
{
    public function index()
    {
        $model = new MahasiswaModel();
        
        // 1. Ambil Keyword Pencarian & Filter Jurusan
        $keyword = $this->request->getVar('keyword');
        $jurusan = $this->request->getVar('jurusan'); // <--- INI BARU

        // 2. Logic Pencarian (Search)
        if ($keyword) {
            $model->groupStart()
                  ->like('nama', $keyword)
                  ->orLike('nim', $keyword)
                  ->groupEnd();
        }

        // 3. Logic Filter Jurusan (Filter) <--- INI BARU
        if ($jurusan) {
            $model->where('jurusan', $jurusan);
        }

        // Urutkan Abjad
        $model->orderBy('nama', 'ASC');
        
        $data = [
            'keyword' => $keyword,
            'jurusan' => $jurusan, // Kirim balik ke view biar dropdown gak reset
            'mahasiswa' => $model->paginate(5, 'mahasiswa'), 
            'pager' => $model->pager 
        ];

        return view('mahasiswa/index', $data);
    }

    public function create()
    {
        return view('mahasiswa/create');
    }

    public function store()
    {
        if (!$this->validate([
            'nim' => [
                'rules'  => 'required|is_unique[mahasiswa.nim]',
                'errors' => [
                    'required'  => 'NIM harus diisi.',
                    'is_unique' => 'NIM sudah terdaftar, ganti yang lain.'
                ]
            ],
            'nama' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama lengkap harus diisi.'
                ]
            ],
            'foto' => [
                'rules'  => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar (Max 2MB).',
                    'is_image' => 'File yang dipilih bukan gambar.',
                    'mime_in'  => 'File yang dipilih bukan gambar.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $model = new MahasiswaModel();
        $fileFoto = $this->request->getFile('foto');

        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads', $namaFoto);
        }

        $model->save([
            'nim'     => $this->request->getPost('nim'),
            'nama'    => $this->request->getPost('nama'),
            'jurusan' => $this->request->getPost('jurusan'),
            'no_hp'   => $this->request->getPost('no_hp'),
            'foto'    => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/mahasiswa');
    }

    public function edit($id)
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->find($id);
        return view('mahasiswa/edit', $data);
    }

    public function update($id)
    {
        $model = new MahasiswaModel();
        $mahasiswaLama = $model->find($id);

        if($mahasiswaLama['nim'] == $this->request->getPost('nim')) {
            $rule_nim = 'required';
        } else {
            $rule_nim = 'required|is_unique[mahasiswa.nim]';
        }

        if (!$this->validate([
            'nim' => [
                'rules'  => $rule_nim,
                'errors' => [
                    'required'  => 'NIM harus diisi.',
                    'is_unique' => 'NIM sudah terdaftar milik orang lain.'
                ]
            ],
            'nama' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama lengkap harus diisi.'
                ]
            ],
            'foto' => [
                'rules'  => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar (Max 2MB).',
                    'is_image' => 'File yang dipilih bukan gambar.',
                    'mime_in'  => 'File yang dipilih bukan gambar.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $fileFoto = $this->request->getFile('foto');
        
        if ($fileFoto->getError() == 4) {
            $namaFoto = $mahasiswaLama['foto'];
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads', $namaFoto);

            if($mahasiswaLama['foto'] != 'default.png' && file_exists('uploads/' . $mahasiswaLama['foto'])){
                unlink('uploads/' . $mahasiswaLama['foto']);
            }
        }

        $model->update($id, [
            'nim'     => $this->request->getPost('nim'),
            'nama'    => $this->request->getPost('nama'),
            'jurusan' => $this->request->getPost('jurusan'),
            'no_hp'   => $this->request->getPost('no_hp'),
            'foto'    => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/mahasiswa');
    }

    public function delete($id)
    {
        $model = new MahasiswaModel();
        $dt = $model->find($id);

        if($dt['foto'] != 'default.png'){
            unlink('uploads/' . $dt['foto']);
        }

        $model->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/mahasiswa');
    }

    public function printKTM($id)
    {
        $model = new MahasiswaModel();
        $data['m'] = $model->find($id); 

        return view('mahasiswa/ktm_view', $data);
    }
}