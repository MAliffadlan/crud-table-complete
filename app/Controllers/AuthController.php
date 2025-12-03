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

        $session->set([
            'name'     => $name,
            'username' => $username
        ]);

        $session->setFlashdata('pesan', 'Profil berhasil diperbarui!');
        return redirect()->to('/profile');
    }
}
