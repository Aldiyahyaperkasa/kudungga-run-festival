<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = [
        'email', 'password', 'nama_admin', 'level', 'created_at', 'updated_at'
    ];
}
