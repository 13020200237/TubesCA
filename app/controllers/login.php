<?php

class Login extends Controller
{
    // public function index()
    // {
    //     $data['title'] = 'login';
    //     $this->view('templates/header');
    //     $this->view('login/index', $data);
    //     $this->view('templates/footer');
    // }

    // public function login()
    // {
    //         $username = $_POST['username'];
    //         $password = $_POST['password'];
    //         $sebagai  = $_POST['sebagai'];
    //         var_dump($username, $password, $sebagai);
            
    //         $data['login'] = $this->model('User_model')->getUser($username, $password, $sebagai);
            
    //         foreach ($data['login'] as $a => $row) {
    //             $user['nama_user'] = $row['nama_user'];
    //             $user['password'] = $row['password'];
    //             $user['sebagai'] = $row['sebagai'];
    //         }
            
    // }



    public function index(){
        // $this->guestonly();

        $this->view('templates/header', ['judul' => 'Login PAL']);
        $this->view('login/index');
        $this->view('templates/footer');
    }

    public function login(){
        $data = $this->model('User_model')->getUser($_POST['nama_user'], $_POST['password'], $_POST['sebagai']);
        // var_dump($data[0]['nama_user']);
            if($_POST['password'] == $data[0]['password']){
                session_start();
                $_SESSION["nama_user"] = $data[0]['nama_user'];
                $_SESSION["sebagai"] = $data[0]['sebagai'];
                Flasher::setFlash('Berhasil', 'Anda Berhasil Login', 'success');
                header("Location: " . BASEURL . "/dash");
            } else {
                Flasher::setFlash('Gagal', 'nama_user / Password Salah', 'danger');
                header("Location: " . BASEURL . "/login");
            }
    }

    public function logout(){
        session_start();
        unset($_SESSION["nama_user"]);
        session_destroy();
        header("Location: " . BASEURL);
    }
}