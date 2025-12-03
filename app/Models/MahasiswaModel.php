<?php namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nim', 'nama', 'jurusan', 'no_hp', 'foto'];

 
    public function search($keyword)
    {        
       return $this->table('mahasiswa')->like('nama', $keyword)->orLike('nim', $keyword);
    }
}