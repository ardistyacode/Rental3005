<?php

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'OhMyNative | Welcome',
        ];
        $this->view('pages/welcome', $data);
    }

    public function create()
    {
        
    }

    public function edit ($id){

    }

    public function delete($id){

    }
}

// untuk crud nya masih ada create, edit, hapus