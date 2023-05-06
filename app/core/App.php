<?php 

class App{
    //properti
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        // echo 'ok';
        // var_dump($_GET);
        $url = $this->parseURL();
        // var_dump($url);

        //controller
        if (isset($url[0]) && !is_null($url[0])) {
            if (file_exists('../app/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }
           //menghilangkan controler dari elemen arraynya
            // var_dump($url);
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        //method
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //params
        if(!empty($url)){
            $this->params = array_values($url);
        }
        
        //jalankan controler dan method, serta kirimkna params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    public function parseURL(){//METHOD MENGAMBIL URL DAN MEMECAH SESUAI KEINGINAN KITA
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'] ,'/');//rtrim digunakan untuk menghilangkan tanda akhir di url
            $url = filter_var($url, FILTER_SANITIZE_URL); //Menghilangkan karekter aneh di url
            $url = explode('/', $url); //pecah url berdasarkan tanda /
            return $url;
        }
    }
}