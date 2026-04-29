<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string {
        return view('login');
    }

    public function dashboard() {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to(site_url('login'));
        }
        return view('dashboard');
    }

    public function list(): string {
        return view('list');
    }

    public function form(): string {
        return view('form');
    }
}
