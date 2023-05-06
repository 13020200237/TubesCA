<?php

class Alat extends Controller{
    public function index()
    {
        $data['judul'] = 'List Alat';
        $data['alat'] = $this->model('alat_model')->getAllAlat();
        $this->view('templates/header');
        $this->view('templates/dashboard');
        $this->view('alat/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $nama_barang = $_POST['nama_barang'];
        $jml_stok = $_POST['jml_stok'];
        $denda_rusak = $_POST['denda_rusak'];
        // echo $nama_barang;
        // echo $jml_stok;
        // echo $denda_rusak;
        $this->model('Alat_model')->tambahDataAlat($nama_barang, $jml_stok, $denda_rusak);
        header('location: ' . BASEURL . '/alat');
    }

    public function hapus($id_barang)
    {
        $this->model('Alat_model')->hapus($id_barang);
        echo $id_barang;
        header('location: ' . BASEURL . '/alat');

    }
    
    public function edit($id_barang){
        $nama_barang = $_POST['nama_barang'];
        $id_barang = $_POST['id_barang'];
        $jml_stok = $_POST['jml_stok'];
        $denda_rusak = $_POST['denda_rusak'];
        
        $this->model('Alat_model')->edit($id_barang, $nama_barang, $jml_stok, $denda_rusak);
        header('location: ' . BASEURL . '/alat');
    }
}