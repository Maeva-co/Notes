<?php 

namespace App\Controllers;

use App\Models\UtilisateurModel;

class LoginController extends BaseController
{
    public function index() {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(site_url('dashboard'));
        }
        return view('login');
    }

    public function authenticate() {
        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');

        if ($username === '' || $password === '') {
            return redirect()->back()->withInput()->with('error', "Nom d'utilisateur et mot de passe requis");
        }

        $utilisateurModel = new UtilisateurModel();
        $utilisateur = $utilisateurModel->getUtilisateurByUsername($username);

        if (! $utilisateur) {
            return redirect()->back()->withInput()->with('error', 'Identifiants invalides');
        }

        $storedPassword = (string) ($utilisateur['password'] ?? '');

        $isValid = password_verify($password, $storedPassword);

        // Compatibilité avec les mots de passe stockés en clair (ex: admin123 dans 002-insert.sql)
        if (! $isValid && $storedPassword !== '' && hash_equals($storedPassword, $password)) {
            $isValid = true;

            // Upgrade automatique vers un hash sécurisé
            if (isset($utilisateur['id'])) {
                $utilisateurModel->update((int) $utilisateur['id'], [
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                ]);
            }
        }

        if (! $isValid) {
            return redirect()->back()->withInput()->with('error', 'Identifiants invalides');
        }

        $session = session();
        $session->regenerate();
        $session->set([
            'isLoggedIn' => true,
            'userId'     => $utilisateur['id'] ?? null,
            'username'   => $utilisateur['username'] ?? $username,
        ]);

        return redirect()->to(site_url('dashboard'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('login'));
    }
}