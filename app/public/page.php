<?php
session_start();

require_once "./cms-includes/models/Database.php";
require_once "./cms-includes/models/Parsedown.php";

$id = $_GET['id'];

$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
$query = "SELECT * FROM pages WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$page = $stmt->fetch(PDO::FETCH_ASSOC);

$title = $page['title'];

if (!isset($id)) {
    header("location: index.php");
}

$Parsedown = new Parsedown();
$page_title = $Parsedown->text($page['title']);
$page_content = $Parsedown->text($page['content']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./cms-content/styles/sass/main.css">
    <title><?= $title ?></title>
</head>

<body>
    <header>
        <?php include_once "./cms-includes/partials/header.php"; ?>
    </header>
    <main>
        <div class="dynamicPage">
            <?= $page_title ?>
            <?= $page_content ?>
        </div>
    </main>
    <footer>
        <?php include_once "./cms-includes/partials/footer.php"; ?>
    </footer>
</body>

</html>