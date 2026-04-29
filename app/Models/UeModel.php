<?php

namespace App\Models;

use CodeIgniter\Model;

class UeModel extends Model
{
    protected $table = 'ue';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'label',
        'credits',
        'semestre_id'
    ];

    public function getListUes() {
        return $this->findAll();
    }

    public function getUeBySemestre($semestreId) {
        return $this->where('semestre_id', $semestreId)->findAll();
    }
}
?>
