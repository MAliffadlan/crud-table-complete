<?php namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index()
    {
        return view('login_view');
    }

    public function loginProcess()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $data = $model->where('username', $username)->first();

        if ($data) {
            $pass = $data['password'];
            // Verifikasi Password Hash
            if (password_verify($password, $pass)) {
                $ses_data = [
                    'id'       => $data['id'],
                    'name'     => $data['name'],
                    'username' => $data['username'],
                    'foto'     => $data['foto'], // Pastikan foto masuk session
                    'role'     => $data['role'], // <--- PENTING: Simpan Role ke Session
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Password Salah');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username tidak ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    // --- FITUR REGISTER ---

    public function register()
    {
        return view('register_view');
    }

    public function registerProcess()
    {
        // 1. Validasi Input
        if (!$this->validate([
            'name' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Nama Lengkap wajib diisi.']
            ],
            'username' => [
                'rules'  => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username wajib diisi.',
                    'is_unique' => 'Username sudah dipakai orang lain.'
                ]
            ],
            'password' => [
                'rules'  => 'required|min_length[4]',
                'errors' => [
                    'required' => 'Password wajib diisi.',
                    'min_length' => 'Password minimal 4 karakter.'
                ]
            ],
            'confpassword' => [
                'rules'  => 'matches[password]',
                'errors' => ['matches' => 'Konfirmasi password tidak cocok.']
            ],
            // Validasi Role: Hanya boleh 'admin' atau 'mahasiswa'
            'role' => [
                'rules' => 'required|in_list[admin,mahasiswa]',
                'errors' => ['in_list' => 'Pilihan role tidak valid.']
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        // 2. Simpan ke Database
        $model = new UserModel();
        $model->save([
            'name'     => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            
            // INI PENTING: Tangkap pilihan 'admin' atau 'mahasiswa' dari form view
            'role'     => $this->request->getVar('role'), 
            
            'foto'     => 'default.png'
        ]);

        // 3. Sukses
        session()->setFlashdata('msg', 'Registrasi Berhasil! Silakan Login.');
        return redirect()->to('/login');
    }

    // --- FITUR PROFIL ---

    public function profile()
    {
        $session = session();
        $model = new UserModel();

        $id = $session->get('id');
        $data['user'] = $model->find($id);

        return view('profile_view', $data);
    }

    public function updateProfile()
    {
        $session = session();
        $model = new UserModel();
        $id = $session->get('id');

        $name = $this->request->getVar('name');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $dataUpdate = [
            'name'     => $name,
            'username' => $username
        ];

        if (!empty($password)) {
            $dataUpdate['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $model->update($id, $dataUpdate);

        // Update session biar nama langsung berubah
        $session->set([
            'name'     => $name,
            'username' => $username
        ]);

        $session->setFlashdata('pesan', 'Profil berhasil diperbarui!');
        return redirect()->to('/profile');
    }
}