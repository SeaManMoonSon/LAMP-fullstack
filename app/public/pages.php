<?php

declare(strict_types=1);
include_once 'cms-config.php';
include_once ROOT . '/cms-includes/global-functions.php';
include_once ROOT . '/cms-includes/models/Database.php';
include_once ROOT . '/cms-includes/models/Page.php';
include_once ROOT . '/cms-includes/models/Parsedown.php';

check_logged_in();

$title = "Pages";
$Parsedown = new Parsedown();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="./cms-content/styles/sass/main.css">
    <script src="./cms-content/functions.js"></script>
</head>

<body>

    <div id="dashboard">
        <?php include ROOT . '/cms-includes/partials/sidebar.php' ?>
        <div id="innerWrapper">
            <a href="create.php">Add new page</a>
            <div class="pages">
                <?php
                $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
                $query = "SELECT * FROM pages";
                $result = $pdo->query($query);

                echo "<ul class='pageList'>";

                while ($row = $result->fetch()) {
                    $id = $row['id'];
                    $title = trim($row['title']);
                    $content = trim($row['content']);
                    $created_at = $row['created_at'];
                    $created_by = $row['user_id'];

                    echo "<li class='page'>" .
                        "<p class='title'>" . "Title: " . $title . "</p>" .
                        "<p class='createdBy'>" . "Created by: " . $created_by . "</p>" .
                        "<p class='createdAt'>" . "At: " . $created_at . "</p>" .
                        "<p class='pageID'>" . "Page ID: " . $id . "</p>" .
                        "<a href='page.php?id=$id'>Visit page</a>" .
                        "<a href='edit.php?id=$id'>Edit page</a>" .
                        "<a href='delete.php?id=$id'>Delete page</a>" .
                        "</li>";
                }
                echo "</ul>";
                ?>
            </div>
        </div>
    </div>
</body>

</html>