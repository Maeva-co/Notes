<?php

namespace App\Controllers;

use App\Models\SemestreModel;

class SemestreController extends BaseController
{
    public function index() {
        $model = new SemestreModel();
        $data['semestres'] = $model->getListSemestres();
        return view('semestres_list', $data);
    }

    public function show($id) {
        $model = new SemestreModel();
        $data['semestre'] = $model->find($id);
        return view('semestre_detail', $data);
    }

    public function create() {
        return view('semestre_form');
    }

    public function store() {
        $model = new SemestreModel();
        $data = [
            'label' => $this->request->getPost('label')
        ];
        $model->insert($data);
        return redirect()->to('/semestres');
    }

    public function edit($id) {
        $model = new SemestreModel();
        $data['semestre'] = $model->find($id);
        return view('semestre_form', $data);
    }

    public function update($id) {
        $model = new SemestreModel();
        $data = [
            'label' => $this->request->getPost('label')
        ];
        $model->update($id, $data);
        return redirect()->to('/semestres');
    }

    public function delete($id) {
        $model = new SemestreModel();
        $model->delete($id);
        return redirect()->to('/semestres');
    }
}
?>
