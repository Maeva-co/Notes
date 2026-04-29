<?php

namespace App\Models;

use CodeIgniter\Model;

class UtilisateurModel extends Model
{
    protected $table            = 'utilisateur';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields  = [
        'username',
        'password',
    ];

    protected $useTimestamps = false;

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    /**
     * Hash le mot de passe si un champ 'password' est présent.
     */
    protected function hashPassword(array $data): array
    {
        if (! isset($data['data']['password'])) {
            return $data;
        }

        $password = $data['data']['password'];
        if ($password === null || $password === '') {
            return $data;
        }

        // Évite de re-hasher un hash bcrypt/argon existant.
        if (is_string($password) && str_starts_with($password, '$2y$')) {
            return $data;
        }
        if (is_string($password) && str_starts_with($password, '$argon2')) {
            return $data;
        }

        $data['data']['password'] = password_hash((string) $password, PASSWORD_DEFAULT);
        return $data;
    }
}
