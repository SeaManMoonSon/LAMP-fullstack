<?php
declare(strict_types=1);
include_once 'cms-config.php';
include_once ROOT . '/cms-includes/global-functions.php';
include_once ROOT . '/cms-includes/models/Database.php';

$title = "Template";

?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/cms-content/styles/style.css">
</head>
<body>
    
    <?php include ROOT . '/cms-includes/partials/header.php'; ?>
    <?php include ROOT . '/cms-includes/partials/nav.php'; ?>

    <h1><?= $title ?></h1>

    <?php

    new DisplayDBVersion();

    ?>

    <?php include ROOT . '/cms-includes/partials/footer.php'; ?>

</body>
</html>