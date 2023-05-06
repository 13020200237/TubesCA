<?php

class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Home';
        try {
            $data['name'] = $this->model('User_model')->GetByUsername()->nama_user;
            #ketika user belum login, maka $data['name'] akan menjadi kosong berarti masuk ke catch
        } catch (\Throwable $th) {
            $data['name'] = "Guest";
        }
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');

    }
}