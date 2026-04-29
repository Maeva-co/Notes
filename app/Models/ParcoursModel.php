<?php

namespace App\Models;

use CodeIgniter\Model;

class ParcoursModel extends Model
{
    protected $table            = 'parcours';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'label',
        'responsable',
    ];

    protected $useTimestamps = false;
}
