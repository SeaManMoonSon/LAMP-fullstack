<?php 

// class Template extends Database {
//     function __construct()
//     {
//         // Call parent constructor 
//         parent::__construct();
//     } 
//     public function setup()
//     {
//         // $schema = "CREATE TABLE IF NOT EXISTS template (id INT NOT NULL AUTO_INCREMENT, information VARCHAR(48), position INT, PRIMARY KEY (id))";
//         // $statement = $this->db->prepare($schema);
//         return $statement->execute(); 
//     }

//     // Här följer olika exempel där placeholder för att undvika SQL injections
//     // Funktion för att lägga till data
//     public function selectAll()
//     {
//         $sql = "SELECT * FROM template";
//         $stmt = $this->db->prepare($sql);
//         $stmt->execute();

//         return $stmt->fetchAll(PDO::FETCH_ASSOC);
//     }

//     public function selectAllOrder($column, $asc_desc)
//     {
//         if ($column === "information") {
//             $sql = "SELECT * FROM template ORDER BY information :asc_desc";
//         } else {
//             $sql = "SELECT * FROM template ORDER BY position :asc_desc";
//         }

//         $stmt = $this->db->prepare($sql);
//         // $stmt->bindValue(':order', $column, PDO::PARAM_STR);
//         $stmt->bindValue(':asc_desc', $asc_desc, PDO::PARAM_STR);
//         $stmt->execute();

//         return $stmt->fetchAll(PDO::FETCH_ASSOC);
//     }

//     // Funktion för att lägga till data i tabellen
//     public function insertOne($information, $position)
//     {

//         try {
//             $sql = "INSERT INTO template (information, position) VALUES (:information, :position)";
//             $stmt = $this->db->prepare($sql);
//             $stmt->bindValue('information', $information, PDO::PARAM_STR);
//             $stmt->bindValue('position', $position, PDO::PARAM_INT);
//             $stmt->execute();

//             return $this->db->lastInsertId();

//         } catch (\Throwable $th) {
//             throw $th;
//         }
//     }

//     public function deleteOne($id)
//     {
//         $sql = "DELETE FROM template WHERE id = :id";
//         $stmt = $this->db->prepare($sql);
//         $stmt->bindValue(':id', $id, PDO::PARAM_INT);

//         return $stmt->execute();
//     }

//     public function deleteMany($array)
//     {
//         // TODO
//     }

//     public function updateOne($id, $information)
//     {
//         $sql = "UPDATE template SET information = :information WHERE id = :id";
//         $stmt = $this->db->prepare($sql);
//         $stmt->bindValue('information', $information, PDO::PARAM_STR);
//         $stmt->bindValue(':id', $id, PDO::PARAM_INT);

//         return $stmt->execute();
//     }
// }

?>