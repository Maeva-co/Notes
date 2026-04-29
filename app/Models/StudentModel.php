<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nom',
        'prenom',
        'promotion'
    ];

    public function getListStudents() {
        return $this->findAll();
    }
}
?>