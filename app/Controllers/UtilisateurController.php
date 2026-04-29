<?php

namespace App\Controllers;

use App\Models\UtilisateurModel;

class UtilisateurController extends BaseController
{
    public function index() {
        $model = new UtilisateurModel();
        $data['utilisateurs'] = $model->getListUtilisateurs();
        return view('utilisateurs_list', $data);
    }

    public function show($id) {
        $model = new UtilisateurModel();
        $data['utilisateur'] = $model->find($id);
        return view('utilisateur_detail', $data);
    }

    public function create() {
        return view('utilisateur_form');
    }

    public function store() {
        $model = new UtilisateurModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT)
        ];
        $model->insert($data);
        return redirect()->to('/utilisateurs');
    }

    public function edit($id) {
        $model = new UtilisateurModel();
        $data['utilisateur'] = $model->find($id);
        return view('utilisateur_form', $data);
    }

    public function update($id) {
        $model = new UtilisateurModel();
        $data = [
            'username' => $this->request->getPost('username')
        ];
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
        }
        $model->update($id, $data);
        return redirect()->to('/utilisateurs');
    }

    public function delete($id) {
        $model = new UtilisateurModel();
        $model->delete($id);
        return redirect()->to('/utilisateurs');
    }

    public function getUtilisateurByUsername($username) {
        $model = new UtilisateurModel();
        $data['utilisateur'] = $model->getUtilisateurByUsername($username);
        return view('utilisateur_detail', $data);
    }
}
?>
