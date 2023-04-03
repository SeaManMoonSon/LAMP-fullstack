<?php 
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    $query = "SELECT * FROM pages";
    $result = $pdo->query($query);

    while ($row = $result->fetch()) {
        $id = $row['id'];
        echo "<a href='page.php?id=$id'>" . $row['title'] . "</a>";
    }
