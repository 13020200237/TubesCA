<?php

class Peminjaman_model{
    private $table = 'trs_pinjam';
    private $db ;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPending()
    {
        $this->db->query('SELECT (SELECT nama_lengkap FROM mst_user WHERE trs_pinjaman.nim = mst_user.id_user) as nama_lengkap, tgl_mulai, tgl_selesai, status_peminjaman FROM trs_pinjaman WHERE status_peminjaman = "pending"') ;
        return $this->db->resultSet();
    } 

    public function getAllAcc()
    {
        $this->db->query('SELECT (SELECT nama_lengkap FROM mst_user WHERE trs_pinjaman.nim = mst_user.id_user) as nama_lengkap, tgl_mulai, tgl_selesai, status_peminjaman FROM trs_pinjaman WHERE status_peminjaman = "acc"') ;
        return $this->db->resultSet();
    } 

    public function getAllTolak()
    {
        $this->db->query('SELECT (SELECT nama_lengkap FROM mst_user WHERE trs_pinjaman.nim = mst_user.id_user) as nama_lengkap, tgl_mulai, tgl_selesai, status_peminjaman FROM trs_pinjaman WHERE status_peminjaman = "tolak"') ;
        return $this->db->resultSet();
    }

    public function getAllBermasalah()
    {
        $this->db->query('SELECT (SELECT nama_lengkap FROM mst_user WHERE trs_pinjaman.nim = mst_user.id_user) as nama_lengkap, tgl_mulai, tgl_selesai, status_peminjaman FROM trs_pinjaman WHERE status_peminjaman = "bermasalah"') ;
        return $this->db->resultSet();
    }

    public function getAllKembali()
    {
        $this->db->query('SELECT (SELECT nama_lengkap FROM mst_user WHERE trs_pinjaman.nim = mst_user.id_user) as nama_lengkap, tgl_mulai, tgl_selesai, status_peminjaman FROM trs_pinjaman WHERE status_peminjaman = "kembali"') ;
        return $this->db->resultSet();
    }


}