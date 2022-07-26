<?php
namespace Config;

class DB extends \PDO{
    private $host = "localhost";
    private $db_name = "kelnik";
    private $username = "root";
    private $password = "";
    static private $instance = null;

    public function __construct() {
        parent::__construct("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
    }

    private function __clone() {}
}
?>
