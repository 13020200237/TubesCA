<?php 

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    public function __construct()
    {
        // data source name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        $option = [
            PDO::ATTR_PERSISTENT => true, //database koneksinya terjaga terus
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //tampilkan error
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option); //option: parameter baru untuk menghubungkan ke database
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query) //generik querynya bisa di pakai untuk apapun
    {
        $this->stmt = $this->dbh->prepare($query); //query apa
    }

    public function bind($param, $value, $type = null)
    {
        if( is_null($type) ) {
            switch( true ) {
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type); 
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function resultSet() //banyak data
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single() //datanya cuma 1
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount() //
    {
        return $this->stmt->rowCount();
    }

}