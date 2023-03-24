<?php 
    session_start(); 

    require_once "./cms-includes/models/Database.php";
    require_once "./cms-includes/models/Parsedown.php";

    $id = $_GET['id'];

    $pdo = new PDO("mysql:host=". DB_HOST .";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    $query = "SELECT * FROM pages WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $page = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css@1.12/mvp.css"> 
    <title>title</title>
</head>
<body>
    <?php 
        $Parsedown = new Parsedown();
        $html = $Parsedown->text($page['title'] . $page['content']);

        echo $html;
    ?>
</body>
</html>