<?php

declare(strict_types=1);
include_once 'cms-config.php';
include_once ROOT . '/cms-includes/global-functions.php';
include_once ROOT . '/cms-includes/models/Database.php';

check_logged_in();

// Variables
$title = "Users";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citrus CMS - <?= $title ?></title>
    <link rel="stylesheet" href="./cms-content/styles/sass/main.css">
</head>

<body>
    <div class="outerWrapper">
        <div id="dashboard">
            <?php include ROOT . '/cms-includes/partials/sidebar.php' ?>
            <div id="innerWrapper">
                <div class="users">
                    <div class="header">
                        <h2><?= $title ?></h2>
                    </div>
                    <?php
                    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
                    $query = "SELECT * FROM users";
                    $result = $pdo->query($query);

                    echo "<ul class='userList'>";
                    include ROOT . '/cms-includes/partials/user-list.php';
                    echo "</ul>";
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>