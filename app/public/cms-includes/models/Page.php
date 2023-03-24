<?php 

class Page extends Database {
    function __construct()
    {
        parent::__construct();
    }
    public function setup()
    {
        try {
            $page_table = "CREATE TABLE IF NOT EXISTS pages (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                content VARCHAR(255) NOT NULL,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                user_id INT(11) UNSIGNED NOT NULL,
                CONSTRAINT `fk_users`
                    FOREIGN KEY (user_id)
                    REFERENCES users(id)
                    ON DELETE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
        
            $statement = $this->db->prepare($page_table);
        } catch (\Throwable $th) {
            throw $th;
        }
        return $statement->execute();
    }
}

?>