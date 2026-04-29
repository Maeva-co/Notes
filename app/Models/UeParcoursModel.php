<?php

namespace App\Models;

use CodeIgniter\Model;

class UeParcoursModel extends Model
{
    protected $table            = 'ue_parcours';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'ue_id',
        'parcours_id',
        'categorie',
        'statuts',
    ];

    protected $useTimestamps = false;
}
