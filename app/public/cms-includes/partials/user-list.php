<?php 
    while($row = $result->fetch()) {
        $id = $row['id'];
        $username = $row['username'];
        $created_at = $row['created_at'];
        $latest_login = $row['latest_login'];

        echo "<li class='user'>
                <img src='' alt=''>" .
                "<div class='userInfo'>" .
                    "<p class='userName'>" . "Username: " . $username . "</p>" .
                    "<p class='created'>" . "Created: " . $created_at . "</p>" .
                    "<p class='userID'>" . "User ID: " . $id . "</p>" .
                    "<p class='latestLogin'>" . "Latest login: " . $latest_login . "</p>" .
                "</div>" .
            "</li>";
    }
    echo "</ul>";
?>