<?php namespace App\Controllers;

use App\Models\UserModel;

class Settings extends BaseController
{
    public function index()
    {
    
        $model = new UserModel();
        $id = session()->get('id');
        $data['user'] = $model->find($id);

        return view('settings_view', $data);
    }

    public function updateProfile()
    {
        $model = new UserModel();
        $id = session()->get('id');
        $userLama = $model->find($id);
        
        $password = $this->request->getPost('password');
        
        $dataUpdate = [
            'name'     => $this->request->getPost('name'),
            'username' => $this->request->getPost('username')
        ];

        $fileFoto = $this->request->getFile('foto_admin'); 

        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads', $namaFoto);
    
            $dataUpdate['foto'] = $namaFoto;

            if (!empty($userLama['foto']) && $userLama['foto'] != 'default.png' && file_exists('uploads/' . $userLama['foto'])) {
                unlink('uploads/' . $userLama['foto']);
            }
        }
        if(!empty($password)){
            $dataUpdate['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        $model->update($id, $dataUpdate);
        session()->set(['name' => $this->request->getPost('name')]);

        session()->setFlashdata('pesan', 'Profil berhasil diperbarui!');
        return redirect()->to('/settings');
    }

    public function backupDB()
    {
        $date = date('Y-m-d_H-i-s');
        $filename = "backup_db_portal_$date.sql";
        $db = \Config\Database::connect();
        $tables = $db->listTables();
        $sql = "-- BACKUP DATABASE PORTAL --\n-- Tanggal: $date --\n\n";

        foreach ($tables as $table) {
            $sql .= "-- Tabel: $table --\n";
            $sql .= "DROP TABLE IF EXISTS `$table`;\n";
            $row = $db->query("SHOW CREATE TABLE `$table`")->getRowArray();
            $sql .= $row['Create Table'] . ";\n\n";

            $rows = $db->table($table)->get()->getResultArray();
            foreach ($rows as $row) {
                $sql .= "INSERT INTO `$table` VALUES(";
                $values = [];
                foreach ($row as $val) {
                    $values[] = "'" . $db->escapeString($val) . "'";
                }
                $sql .= implode(", ", $values);
                $sql .= ");\n";
            }
            $sql .= "\n";
        }

        return $this->response->download($filename, $sql);
    }
}