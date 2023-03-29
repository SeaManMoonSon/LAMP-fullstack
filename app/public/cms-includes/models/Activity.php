<?php 

class Activity extends Database {
    function __construct()
    {
        parent::__construct();
    }
    public function setup()
    {
        try {
            $activity_table = "CREATE TABLE IF NOT EXISTS user_activity (
                user VARCHAR(255),
                user_action VARCHAR(255),
                action_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
        
            $stmt = $this->db->prepare($activity_table);
        } catch (\Throwable $th) {
            throw $th;
        }
        return $stmt->execute();
    }
}

?>