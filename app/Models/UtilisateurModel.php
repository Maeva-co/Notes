<?php

namespace App\Models;

use CodeIgniter\Model;

class UtilisateurModel extends Model
{
    protected $table = 'utilisateur';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'username',
        'password'
    ];

    public function getListUtilisateurs() {
        return $this->findAll();
    }

    public function getUtilisateurByUsername($username) {
        return $this->where('username', $username)->first();
    }
}
?>
