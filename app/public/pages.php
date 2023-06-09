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
    <title>Citrus CMS - <?= $title ?></title>
    <link rel="stylesheet" href="./cms-content/styles/sass/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="outerWrapper">
        <div id="dashboard">
            <?php include ROOT . '/cms-includes/partials/sidebar.php'; ?>
            <div class="pages">
                <div class="header">
                    <h2><?= $title ?></h2>
                    <a href="create.php" class="btn-primary">Add new page</a>
                </div>
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

                    $user_query = "SELECT username FROM users WHERE id = $created_by";
                    $user_result = $pdo->query($user_query);
                    $user_row = $user_result->fetch();
                    $username = $user_row['username'];

                    echo "<li class='page'>" .
                        "<p class='title'>" . "Title: " . $title . "</p>" .
                        "<p class='createdBy'>" . "By: " . $username . "</p>" .
                        "<p class='createdAt'>" . "At: " . date('m/d - H:i', strtotime($created_at)) . "</p>" .
                        "<p class='pageID'>" . "Page ID: " . $id . "</p>" .
                        "<div class='btnDiv'>" .
                        "<a href='page.php?id=$id'><span class='material-symbols-rounded visit'>arrow_forward</span></a>" .
                        "<a href='edit.php?id=$id'><span class='material-symbols-rounded edit'>edit_square</span></a>" .
                        "<a href='delete.php?id=$id'><span class='material-symbols-rounded delete'>delete</span></a>" .
                        "</div>" .
                        "</li>";
                }
                echo "</ul>";
                ?>
            </div>
        </div>
    </div>


</body>

</html>