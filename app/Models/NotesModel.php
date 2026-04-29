<?php

namespace App\Models;

use CodeIgniter\Model;

class NotesModel extends Model
{
    protected $table = 'notes';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'etudiant_id',
        'ue_id',
        'note'
    ];

    public function getListNotes() {
        return $this->findAll();
    }

    public function getNotesByEtudiant($etudiantId) {
        return $this->where('etudiant_id', $etudiantId)->findAll();
    }

    public function getNotesByUe($ueId) {
        return $this->where('ue_id', $ueId)->findAll();
    }

    public function getNoteByEtudiantAndUe($etudiantId, $ueId) {
        return $this->where('etudiant_id', $etudiantId)
                    ->where('ue_id', $ueId)
                    ->first();
    }
}
?>
