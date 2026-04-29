<?php

namespace App\Controllers;

use App\Models\NotesModel;

class NotesController extends BaseController
{
    public function index() {
        $model = new NotesModel();
        $data['notes'] = $model->getListNotes();
        return view('notes_list', $data);
    }

    public function show($id) {
        $model = new NotesModel();
        $data['note'] = $model->find($id);
        return view('note_detail', $data);
    }

    public function create() {
        return view('note_form');
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