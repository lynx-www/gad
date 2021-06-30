<?php
class DataBase
{
    const USER = "apache";
	const PASS = 123;
	const HOST = "localhost";
    const DB   = "gtp";
    
    public function __construct(){

    }
    public function connect()
    {
        $user = self::USER;
		$pass = self::PASS;
		$host = self::HOST;
		$db   = self::DB;
        $conn = new mysqli($host, $user, $pass, $db);
        return $conn;
    }

    public function __destruct()
    {
       // if ($this->conn) $this->conn->close();

    }
}