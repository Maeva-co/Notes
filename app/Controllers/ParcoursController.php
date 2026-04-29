<?php

namespace App\Controllers;

use App\Models\ParcoursModel;

class ParcoursController extends BaseController
{
    public function index() {
        $model = new ParcoursModel();
        $data['parcours'] = $model->getListParcours();
        return view('parcours_list', $data);
    }

    public function show($id) {
        $model = new ParcoursModel();
        $data['parcours'] = $model->find($id);
        return view('parcours_detail', $data);
    }

    public function create() {
        return view('parcours_form');
    }

    public function store() {
        $model = new ParcoursModel();
        $data = [
            'label' => $this->request->getPost('label'),
            'responsable' => $this->request->getPost('responsable')
        ];
        $model->insert($data);
        return redirect()->to('/parcours');
    }

    public function edit($id) {
        $model = new ParcoursModel();
        $data['parcours'] = $model->find($id);
        return view('parcours_form', $data);
    }

    public function update($id) {
        $model = new ParcoursModel();
        $data = [
            'label' => $this->request->getPost('label'),
            'responsable' => $this->request->getPost('responsable')
        ];
        $model->update($id, $data);
        return redirect()->to('/parcours');
    }

    public function delete($id) {
        $model = new ParcoursModel();
        $model->delete($id);
        return redirect()->to('/parcours');
    }
}
?>
