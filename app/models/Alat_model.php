<?php

class Alat_model {
    
    private $table = 'mst_alat';
    private $db ;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllAlat(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahDataAlat($nama_barang, $jml_stok, $denda_rusak){
        $query = "INSERT INTO mst_alat VALUES ('', :nama_barang, :jml_stok, :denda_rusak)";
        $this->db->query($query);
        $this->db->bind('nama_barang', $nama_barang);
        $this->db->bind('jml_stok', $jml_stok);
        $this->db->bind('denda_rusak', $denda_rusak);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapus($id_barang)
    {
        $query = 'DELETE FROM mst_alat WHERE id_barang = :id_barang';
        $this->db->query($query);
        $this->db->bind('id_barang', $id_barang);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function edit($id_barang, $nama_barang, $jml_stok, $denda_rusak){
        $query = 'UPDATE mst_alat SET nama_barang = :nama_barang, jml_stok = :jml_stok, denda_rusak = :denda_rusak WHERE id_barang = :id_barang';
        $this->db->query($query);
        $this->db->bind('id_barang', $id_barang);
        $this->db->bind('nama_barang', $nama_barang);
        $this->db->bind('jml_stok', $jml_stok);
        $this->db->bind('denda_rusak', $denda_rusak);
        $this->db->execute();
        return $this->db->rowCount();
    }
}