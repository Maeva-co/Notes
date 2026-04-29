<?php

namespace App\Controllers;

use App\Models\UeParcoursModel;

class UeParcoursController extends BaseController
{
    public function index() {
        $model = new UeParcoursModel();
        $data['ueParcours'] = $model->getListUeParcours();
        return view('ue_parcours_list', $data);
    }

    public function show($id) {
        $model = new UeParcoursModel();
        $data['ueParcours'] = $model->find($id);
        return view('ue_parcours_detail', $data);
    }

    public function create() {
        return view('ue_parcours_form');
    }

    public function store() {
        $model = new UeParcoursModel();
        $data = [
            'ue_id' => $this->request->getPost('ue_id'),
            'parcours_id' => $this->request->getPost('parcours_id'),
            'categorie' => $this->request->getPost('categorie'),
            'statuts' => $this->request->getPost('statuts')
        ];
        $model->insert($data);
        return redirect()->to('/ue-parcours');
    }

    public function edit($id) {
        $model = new UeParcoursModel();
        $data['ueParcours'] = $model->find($id);
        return view('ue_parcours_form', $data);
    }

    public function update($id) {
        $model = new UeParcoursModel();
        $data = [
            'ue_id' => $this->request->getPost('ue_id'),
            'parcours_id' => $this->request->getPost('parcours_id'),
            'categorie' => $this->request->getPost('categorie'),
            'statuts' => $this->request->getPost('statuts')
        ];
        $model->update($id, $data);
        return redirect()->to('/ue-parcours');
    }

    public function delete($id) {
        $model = new UeParcoursModel();
        $model->delete($id);
        return redirect()->to('/ue-parcours');
    }

    public function getUesByParcours($parcoursId) {
        $model = new UeParcoursModel();
        $data['ueParcours'] = $model->getUesByParcours($parcoursId);
        return view('ue_parcours_list', $data);
    }

    public function getParcoursbyUe($ueId) {
        $model = new UeParcoursModel();
        $data['ueParcours'] = $model->getParcoursbyUe($ueId);
        return view('ue_parcours_list', $data);
    }
}
?>
