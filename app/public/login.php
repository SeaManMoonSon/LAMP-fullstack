<?php
session_start();
require_once "./cms-includes/models/Database.php";
require_once "./cms-includes/models/User.php";
require_once "./cms-includes/models/Page.php";

$title = "Citrus CMS - Login";
$page_setup = new Page();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_username = $_POST['username'];
    $form_password = $_POST['password'];

    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $form_username);
    $stmt->execute();

    $user = $stmt->fetch();

    if (!$user) {
        $_SESSION['message'] = "Username does not exists";
        header("location: login.php");
        exit();
    }

    // Compare password
    $correct_password = password_verify($form_password, $user['password']);

    if (!$correct_password) {
        $_SESSION['message'] = "Invalid password";
        header("location: login.php");
        exit();
    }

    // Set user_id for session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['message'] = "Successfully logged in!";

    // Update latest_login in database to current time
    $latest_login = date('Y-m-d H:i:s');
    $query = "UPDATE users SET latest_login = ? WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$latest_login, $user['id']]);

    // Redirect to dashboard
    header("location: index.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css@1.12/mvp.css">
    <title><?= $title ?></title>
</head>

<body>
    <main>

        <?php
        $page_schema = $page_setup->setup();

        // Write out message from other pages if exists
        if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
            echo "<article><aside><p>" . $_SESSION['message'] . "</p></aside></article>";
            unset($_SESSION['message']); // remove it once it has been written
        }
        ?>
        <h1>Login</h1>
        <form action="" method="POST">
            <label for="username">Username: </label>
            <input type="text" name="username" id="username" required>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" required>
            <input type="submit" value="Login">
        </form>
        <p>Or <a href="register.php">create an account</a></p>

    </main>
</body>

</html>