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
    <title><?= $title ?></title>
    <link rel="stylesheet" href="./cms-content/styles/sass/main.css">
</head>

<body>
    <div id="dashboard">
        <?php include ROOT . '/cms-includes/partials/sidebar.php' ?>
        <div id="innerWrapper">
            <div class="users">
                <?php 
                    $pdo = new PDO("mysql:host=". DB_HOST .";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
                    $query = "SELECT * FROM users";
                    $result = $pdo->query($query);

                    echo "<ul class='userList'>";

                    while($row = $result->fetch()) {
                        $id = $row['id'];
                        $username = $row['username'];
                        $created_at = $row['created_at'];
                        $latest_login = $row['latest_login'];

                        echo "<li class='user'>
                                <p class='userID'>" . "User ID: " . $id . "</p>" .
                                "<p class='userName'>" . "Username: " . $username . "</p>" .
                                "<p class='created'>" . "Created: " . $created_at . "</p>" .
                                "<p class='latestLogin'>" . "Latest login: " . $latest_login . "</p>" .
                            "</li>";
                    }
                    echo "</ul>";
                ?>
            </div>
        </div>
    </div>
</body>

</html>