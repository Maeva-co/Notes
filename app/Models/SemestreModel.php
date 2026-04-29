<?php

namespace App\Models;

use CodeIgniter\Model;

class SemestreModel extends Model
{
    protected $table = 'semestre';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'label'
    ];

    public function getListSemestres() {
        return $this->findAll();
    }
}
?>
