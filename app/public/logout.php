<?php 
    // Resume session
    session_start();

    // Clear session object
    session_unset();
    session_destroy();

    // Prepare new session and notify user of logout
    session_start();
    $_SESSION['message'] = "You successfully logged out";

    // Redirect user to login page
    header("location: login.php")
?>