<?php

namespace App\Models;

use CodeIgniter\Model;

class Mpengguna extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'idUser';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idUser', 'Nama_User', 'Password', 'username','Level'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getPengguna($pengguna,$pass)
    {

        $where = [
            'username' => $pengguna,
            'password' => md5($pass)
        ];
        $pengguna = new Mpengguna;
        $pengguna->select("user.idUser,user.username,user.Nama_User,user.Password,user.Level");
        $pengguna->where($where);
        return $pengguna->findAll();
    }

    public function getEnumValues()
    {
        $query = $this->db->query("SHOW COLUMNS FROM user WHERE Field = 'Level'");
        $row = $query->getRow();
        $enum = explode("','",substr($row->Type,6,-2));

        return $enum;
    }
}
