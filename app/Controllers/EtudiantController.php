<?php

namespace App\Controllers;

use App\Models\EtudiantModel;

class EtudiantController extends BaseController
{
    public function index() {
        $model = new EtudiantModel();
        $data['etudiants'] = $model->getListEtudiants();
        return view('etudiants_list', $data);
    }

    public function show($id) {
        $model = new EtudiantModel();
        $data['etudiant'] = $model->find($id);
        return view('etudiant_detail', $data);
    }

    public function create() {
        return view('etudiant_form');
    }

    public function store() {
        $model = new EtudiantModel();
        $data = [
            'id' => $this->request->getPost('id'),
            'nom' => $this->request->getPost('nom'),
            'prenom' => $this->request->getPost('prenom'),
            'promotion' => $this->request->getPost('promotion')
        ];
        $model->insert($data);
        return redirect()->to('/etudiants');
    }

    public function edit($id) {
        $model = new EtudiantModel();
        $data['etudiant'] = $model->find($id);
        return view('etudiant_form', $data);
    }

    public function update($id) {
        $model = new EtudiantModel();
        $data = [
            'nom' => $this->request->getPost('nom'),
            'prenom' => $this->request->getPost('prenom'),
            'promotion' => $this->request->getPost('promotion')
        ];
        $model->update($id, $data);
        return redirect()->to('/etudiants');
    }

    public function delete($id) {
        $model = new EtudiantModel();
        $model->delete($id);
        return redirect()->to('/etudiants');
    }

    public function getEtudiantsByPromotion($promotion) {
        $model = new EtudiantModel();
        $data['etudiants'] = $model->getEtudiantsByPromotion($promotion);
        return view('etudiants_list', $data);
    }
}
?>
