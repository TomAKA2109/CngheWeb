<?php
    // tạo lớp kết nối CSDL
    class DBConnection {
        private $host;
        private $user;
        private $password;
        private $dbname;
        private $conn;

        // hàm khởi tạo lấy giá trị từ config 
        public function __construct() {
            $this->host = DB_HOST;
            $this->user = DB_USER;
            $this->password = DB_PASS;
            $this->dbname = DB_NAME;

            try {
                $sqlStr = "mysql:host=$this->host;dbname=$this->dbname";
                $this->conn = new PDO($sqlStr, $this->user, $this->password);
            } catch (PDOException $e) {
                $this->conn = null;
            }
        }

        public function getConnection() {
            return $this->conn;
        }
        
    }
