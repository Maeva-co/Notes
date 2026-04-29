<?php

namespace App\Controllers;

use App\Models\NotesModel;
use App\Models\StudentModel;
use App\Models\ParcoursModel;

class NotesController extends BaseController
{
    public function index($etudiantId)
    {
        $notesModel = new NotesModel();
        $studentModel = new StudentModel();
        $parcoursModel = new ParcoursModel();

        $data['student'] = $studentModel->find($etudiantId);

        $data['parcours'] = $parcoursModel->findAll();

        $type = $this->request->getGet('type'); // s3, s4, l2
        $parcoursId = $this->request->getGet('parcours');

        $data['notes'] = [];
        $data['type'] = $type;

        if ($type) {
            $data['notes'] = $notesModel->getNotesByEtudiant($etudiantId);
        }

        return view('notes', $data);
    }

//     public function index() {
//         $model = new NotesModel();
//         $data['notes'] = $model->getListNotes();
//         return view('notes_list', $data);
//     }

    public function show($id) {
        $model = new NotesModel();
        $data['note'] = $model->find($id);
        return view('note_detail', $data);
    }

    public function formulaire() {
        $studentModel = new \App\Models\StudentModel();
        $ueModel = new \App\Models\UeModel();
        
        $data['etudiants'] = $studentModel->getListStudents();
        $data['ues'] = $ueModel->getListUes();
        
        return view('notes/form', $data);
    }

    public function ajouter() {
        $etudiantId = $this->request->getPost('etudiant_id');
        $ueIds = $this->request->getPost('ue_id');
        $notesValues = $this->request->getPost('note');

        if (!$etudiantId || !$ueIds || !$notesValues) {
            return redirect()->back()->with('error', 'Données incomplètes');
        }

        $model = new NotesModel();
        $insertedCount = 0;

        try {
            foreach ($ueIds as $index => $ueId) {
                if (isset($notesValues[$index]) && $ueId && $notesValues[$index] !== '') {
                    $data = [
                        'etudiant_id' => $etudiantId,
                        'ue_id' => $ueId,
                        'note' => $notesValues[$index]
                    ];
                    $model->insert($data);
                    $insertedCount++;
                }
            }

            return redirect()->to('/notes')->with('success', "$insertedCount notes enregistrées");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur: ' . $e->getMessage());
        }
    }

    public function store() {
        $model = new NotesModel();
        $data = [
            'etudiant_id' => $this->request->getPost('etudiant_id'),
            'ue_id' => $this->request->getPost('ue_id'),
            'note' => $this->request->getPost('note')
        ];
        $model->insert($data);
        return redirect()->to('/notes');
    }

    public function edit($id) {
        $model = new NotesModel();
        $data['note'] = $model->find($id);
        return view('note_form', $data);
    }

    public function update($id) {
        $model = new NotesModel();
        $data = [
            'etudiant_id' => $this->request->getPost('etudiant_id'),
            'ue_id' => $this->request->getPost('ue_id'),
            'note' => $this->request->getPost('note')
        ];
        $model->update($id, $data);
        return redirect()->to('/notes');
    }

    public function delete($id) {
        $model = new NotesModel();
        $model->delete($id);
        return redirect()->to('/notes');
    }

    public function getNotesByEtudiant($etudiantId) {
        $model = new NotesModel();
        $data['notes'] = $model->getNotesByEtudiant($etudiantId);
        return view('notes_list', $data);
    }

    public function getNotesByUe($ueId) {
        $model = new NotesModel();
        $data['notes'] = $model->getNotesByUe($ueId);
        return view('notes_list', $data);
    }

    public function getNoteByEtudiantAndUe($etudiantId, $ueId) {
        $model = new NotesModel();
        $data['note'] = $model->getNoteByEtudiantAndUe($etudiantId, $ueId);
        return view('note_detail', $data);
    }
}
?>
