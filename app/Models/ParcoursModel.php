<?php

namespace App\Models;

use CodeIgniter\Model;

class ParcoursModel extends Model
{
    protected $table = 'parcours';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'label',
        'responsable'
    ];

    public function getListParcours() {
        return $this->findAll();
    }
}
?>
