<?php

namespace App\Models;

use CodeIgniter\Model;

class UeModel extends Model
{
    protected $table            = 'ue';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'id',
        'label',
        'credits',
        'semestre_id',
    ];

    protected $useTimestamps = false;
}
