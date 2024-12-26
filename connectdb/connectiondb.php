<?php
    require_once '/MOSTAFA/briefs/RentCars_OOP/connectdb/info.php';

    class DB {
        public $servername;
        public $username;
        public $password;
        public $dbName;

        public function __construct() {
            $this->servername = 'localhost';
            $this->username = 'root';
            $this->password = 'password';
            $this->dbName = 'rent_cars';
        }

        public function connect() {
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbName);

            if($conn) {
                return $conn;
            }
        }

    }
?>