<?php 

class User extends Database {
    function __construct()
    {
        parent::__construct();
    }
    public function setup()
    {
        try {
            $user_table = "CREATE TABLE IF NOT EXISTS users (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(50) UNIQUE NOT NULL,
                password VARCHAR(255) NOT NULL,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                latest_login DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
        
            $statement = $this->db->prepare($user_table);
        } catch (\Throwable $th) {
            throw $th;
        }
        return $statement->execute();
    }
}

?>