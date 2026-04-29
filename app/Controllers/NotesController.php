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
}