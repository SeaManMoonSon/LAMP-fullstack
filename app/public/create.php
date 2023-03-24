<?php

declare(strict_types=1);
include_once 'cms-config.php';
include_once ROOT . '/cms-includes/global-functions.php';
include_once ROOT . '/cms-includes/models/Database.php';
include_once ROOT . '/cms-includes/models/Page.php';

check_logged_in();

$title = "Page creator";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];

    $form_title = $_POST['title'];
    $form_content = $_POST['content'];

    if (!empty($form_title || $form_content)) {
        $pdo = new PDO("mysql:host=". DB_HOST .";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

        $query = "INSERT INTO pages (id, title, content, user_id) VALUES (NULL, '$form_title', '$form_content', $user_id)";
        $stmt = $pdo->query($query);

        $_SESSION['message'] = "New page added, go check it out!";
        header("location: pages.php");
    }
}

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
            <div class="pages">
                <form action="" method="POST">
                    <input type="text" name="title" id="title" placeholder="Page title" required>
                    <textarea name="content" id="" cols="30" rows="10" placeholder="Page content" required></textarea>

                    <input type="submit" value="Create page">
                </form>
            </div>
        </div>
    </div>
</body>

</html>