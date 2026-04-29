<?php

namespace App\Controllers;

use App\Models\UeModel;

class UeController extends BaseController
{
    public function index() {
        $model = new UeModel();
        $data['ues'] = $model->getListUes();
        return view('ues_list', $data);
    }

    public function show($id) {
        $model = new UeModel();
        $data['ue'] = $model->find($id);
        return view('ue_detail', $data);
    }

    public function create() {
        return view('ue_form');
    }

    public function store() {
        $model = new UeModel();
        $data = [
            'id' => $this->request->getPost('id'),
            'label' => $this->request->getPost('label'),
            'credits' => $this->request->getPost('credits'),
            'semestre_id' => $this->request->getPost('semestre_id')
        ];
        $model->insert($data);
        return redirect()->to('/ues');
    }

    public function edit($id) {
        $model = new UeModel();
        $data['ue'] = $model->find($id);
        return view('ue_form', $data);
    }

    public function update($id) {
        $model = new UeModel();
        $data = [
            'label' => $this->request->getPost('label'),
            'credits' => $this->request->getPost('credits'),
            'semestre_id' => $this->request->getPost('semestre_id')
        ];
        $model->update($id, $data);
        return redirect()->to('/ues');
    }

    public function delete($id) {
        $model = new UeModel();
        $model->delete($id);
        return redirect()->to('/ues');
    }

    public function getUeBySemestre($semestreId) {
        $model = new UeModel();
        $data['ues'] = $model->getUesBySemestre($semestreId);
        return view('ues_list', $data);
    }
}
?>
