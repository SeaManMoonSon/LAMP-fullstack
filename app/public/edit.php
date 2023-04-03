<?php
session_start();
require_once "./cms-includes/models/Database.php";
// require_once "./cms-includes/models/Activity.php";

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_title = $_POST["title"];
    $form_content = $_POST["content"];
    $form_id = $_POST["id"];
    // $user_action = "UPDATED";

    if (!empty($form_title)) {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

        $query = "UPDATE pages SET title = :title, content = :content WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':title', $form_title);
        $stmt->bindParam(':content', $form_content);
        $stmt->bindParam(':id', $form_id);
        $stmt->execute();

        $_SESSION['message'] = "Page edited successfully";

        // $action_query = "INSERT INTO user_activity (user, user_action, action_time) VALUES (NULL, '$user_action', NULL)";
        // $stmt = $pdo->query($action_query);

        header("location: pages.php");
    }
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
    <div class="outerWrapper">
        <h1>Edit page</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="text" name="title" id="title" placeholder="Page title" required>
            <textarea name="content" id="content" cols="30" rows="10" placeholder="Page content" required></textarea>
            <input type="number" name="id" id="id" value="<?= $id ?>" hidden>

            <input type="submit" value="submit">
        </form>
    </div>
</body>

</html>