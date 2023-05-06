<?php

class Peminjaman extends Controller{
    public function index(){
        
        $data['judul'] = 'Peminjaman Alat';
        $data['pending'] = $this->model('Peminjaman_Model')->getAllPending();
        $data['acc'] = $this->model('Peminjaman_Model')->getAllAcc();
        $data['tolak'] = $this->model('Peminjaman_Model')->getAllTolak();
        $data['bermasalah'] = $this->model('Peminjaman_Model')->getAllBermasalah();
        $data['kembali'] = $this->model('Peminjaman_Model')->getAllKembali();
        // var_dump($data['pending']);
        // die;
        $this->view('templates/header');
        $this->view('templates/dashboard');
        $this->view('peminjaman/index', $data);
        $this->view('templates/footer');
    }

    public function detail(){

    }
}