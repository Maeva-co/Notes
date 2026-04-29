<?php

namespace App\Models;

use CodeIgniter\Model;

class UeParcoursModel extends Model
{
    protected $table = 'ue_parcours';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'ue_id',
        'parcours_id',
        'categorie',
        'statuts'
    ];

    public function getListUeParcours() {
        return $this->findAll();
    }

    public function getUeByParcours($parcoursId) {
        return $this->where('parcours_id', $parcoursId)->findAll();
    }

    public function getParcoursbyUe($ueId) {
        return $this->where('ue_id', $ueId)->findAll();
    }
}
?>
