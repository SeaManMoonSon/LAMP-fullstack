<?php

declare(strict_types=1);
include_once 'cms-config.php';
include_once ROOT . '/cms-includes/global-functions.php';
include_once ROOT . '/cms-includes/models/Database.php';

check_logged_in();

// Variables
$title = "Dashboard";
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
            <div id="topDiv">
                <div class="adminPanel">
                    <?php include ROOT . '/cms-includes/partials/admin.php' ?>
                </div>
                <div class="statPanel">Stat</div>
            </div>
            <div id="botDiv">
                <div class="activity">Activity</div>
            </div>
        </div>
    </div>
</body>

</html>