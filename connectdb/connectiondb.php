<?php
    class DB {
        public $servername;
        public $username;
        public $password;
        public $dbName;

        public function __construct() {
            $config = require __DIR__ . '/info.php';
            $this->servername = $config['localhost'];
            $this->username = $config['username'];
            $this->password = $config['password'];
            $this->dbName = $config['dbName'];
        }

        public function connect() {
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbName);

            if($conn) {
                return $conn;
            }
        }

    }
?>