<?php

require_once "./cms-includes/models/Database.php";

$title = "Homepage";

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
        <?php include_once "./cms-includes/partials/header.php" ?>
    </header>
    <main>
        <h1>Homepage</h1>
    </main>
    <footer>
        <?php include_once "./cms-includes/partials/footer.php" ?>
    </footer>

</body>

</html>