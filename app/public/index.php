<?php

declare(strict_types=1);
include_once 'cms-config.php';
include_once ROOT . '/cms-includes/global-functions.php';
include_once ROOT . '/cms-includes/models/Database.php';
// include_once ROOT . '/cms-includes/models/Activity.php';

check_logged_in();

$title = "Dashboard";
// $activity_setup = new Activity();

$current_user = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_username = $_POST["username"];
    $form_password = $_POST["password"];

    $hashed_password = password_hash($form_password, PASSWORD_DEFAULT);

    if (!empty($form_username) && !empty($form_password) && !isset($_POST['delete'])) {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

        $query = "UPDATE users SET username = :username, password = :password WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $form_username);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':id', $current_user);
        $stmt->execute();

        $_SESSION['message'] = "Sucessfully edited user settings!";
    } else if (isset($_POST['delete'])) {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $current_user);
        $stmt->execute();

        session_destroy();
        header("location: login.php");
    } else {
        $_SESSION['message'] = "No changes were made";
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="./cms-content/functions.js"></script>
</head>

<body>
    <?php
    // $activity_schema = $activity_setup->setup();

    // Write out message from other pages if exists
    if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
        echo "<article><aside><p>" . $_SESSION['message'] . "</p></aside></article>";
        unset($_SESSION['message']); // remove it once it has been written
    }

    ?>
    <div id="dashboard">
        <?php include ROOT . '/cms-includes/partials/sidebar.php' ?>
        <div id="innerWrapper">
            <div id="topDiv">
                <div class="adminPanel">
                    <div class="adminDiv">
                        <img src="" alt="">
                        <?php

                        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
                        $query = "SELECT * FROM users";
                        $result = $pdo->query($query);

                        while ($row = $result->fetch()) {
                            $user = $row['username'];

                            if ($_SESSION['user_id'] === $row['id']) {
                                echo "<p>" . $user . "</p>";
                            }
                        }

                        $user_query = "SELECT username FROM users WHERE id = '$current_user'";
                        $user_result = $pdo->query($user_query);
                        $user_row = $user_result->fetch();
                        $username = $user_row['username'];
                        ?>
                        <div class="adminButtons">
                            <div class="logoutWrapper">
                                <span class="material-symbols-rounded">logout</span>
                                <a href="logout.php">Log out</a>
                            </div>
                            <div class="settingsWrapper">
                                <span class="material-symbols-rounded">manage_accounts</span>
                                <button onclick="toggleSettings()">User settings</button>
                            </div>
                        </div>
                        <div class="formDiv">
                            <form action="" id="settingsForm" style="display: none;" method="POST">
                                <p>Change your username</p>
                                <input type="text" name="username" id="username" placeholder="<?= $username ?>">
                                <p>Change your password</p>
                                <input type="text" name="password" id="password" placeholder="********">
                                <fieldset>
                                    <legend>Danger zone!</legend>
                                    <input type="checkbox" name="delete" id="delete">
                                    <label for="delete">Delete your account</label>
                                </fieldset>
                                <input type="number" name="id" id="id" value="<?= $current_user ?>" hidden>
                                <br>
                                <input type="submit" value="Submit changes" class="btn-secondary">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="statPanel">Stat</div>
            </div>
            <div id="botDiv">
                <div class="activity">
                    <?php
                    // $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
                    // $query = "SELECT * FROM user_activity";
                    // $result = $pdo->query($query);

                    // while ($row = $result->fetch()) {
                    //     $user = $row['user'];
                    //     $user_action = $row['user_action'];
                    //     $action_time = $row['action_time'];

                    //     echo "<p>" . $user . "</p>" .
                    //         "<p>" . $user_action . "</p>";
                    //         "<p>" . $action_time . "</p>";
                    // }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>