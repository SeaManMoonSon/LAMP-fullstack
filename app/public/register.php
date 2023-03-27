<?php 
    session_start();
    require_once "./cms-includes/models/Database.php";
    require_once "./cms-includes/models/User.php";

    $user_setup = new User();

    // Handle form submission
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $form_username = $_POST['username'];
        $form_password = $_POST['password'];

        $pdo = new PDO("mysql:host=". DB_HOST .";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $form_username);
        $stmt->execute();
        
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['message'] = "Username is already taken!";
            header("location: register.php");
            exit();
        } else {
            $hashed_password = password_hash($form_password, PASSWORD_DEFAULT);
            $pdo->query("INSERT INTO users (username, password) VALUES ('$form_username', '$hashed_password')");

            $_SESSION['message'] = "Successfully created user! Please login";
            header("location: login.php");
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css@1.12/mvp.css"> 
    <title>My CMS</title>
</head>
<body>
    <main>
    <?php 
    
    $user_schema = $user_setup->setup();

    // Write out message from other pages if exists
    if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
        echo "<article><aside><p>". $_SESSION['message'] . "</p></aside></article>";
        unset( $_SESSION['message']); // remove it once it has been written
    }
    ?>
    <h1>Register new user</h1>
    <form action="" method="POST">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username">
        <label for="password">Password: </label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Register">
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
   
    </main>
</body>
</html>