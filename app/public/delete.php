<?php
require_once "./cms-includes/models/Database.php";
include_once ROOT . '/cms-includes/global-functions.php';

check_logged_in();

$id = $_GET['id'];

if (isset($id)) {
    $pdo = new PDO("mysql:host=". DB_HOST .";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

    $query = "DELETE FROM pages WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $_SESSION['message'] = "Page deleted successfully";
    header("location: pages.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css@1.12/mvp.css">
    <title>title</title>
</head>
<body>
    <main>
        <h1>Delete</h1>
    </main>
</body>

</html>