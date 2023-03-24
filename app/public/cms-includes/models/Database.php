<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/cms-config.php';

class Database {

    protected $db;

    protected function __construct() {

        $dsn = "mysql:host=". DB_HOST .";dbname=". DB_NAME;

        try {
            $pdo = $this->db = new PDO($dsn, DB_USER, DB_PASSWORD);
            
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_PERSISTENT, true);

        } catch (PDOException $err) {
            print_r($err);
        }
    }
}