<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="meta description placeholder">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <title></title>
    </head>
    <body>

    <header>
        <!-- basic navigation -->
        <nav>
            <a href="#">
                <img src="#" alt="logo">
            </a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <!-- Login/Logout form -->
            <div id="login-logout">
                <form id="login-form" action="includes/login.inc.php" method="post">
                    <input class="form-input" type="text" name="unm-input" placeholder="Username/E-mail">
                    <input class="form-input" type="password" name="upwd-input" placeholder="Password">
                    <button class="form-input" type="submit" name="login-submit">Login</button>
                    <a href="signup.php">Sign Up</a>
                </form>
                <form id="logout-form" action="includes/logout.inc.php" method="post">
                    <button class="form-input" type="submit" id="logout-submit" name="logout-submit">Logout</button>
            </div>
        <!-- php script to hide login form if already logged in -->
        <?php
            if(isset($_SESSION['userName'])){
                echo '<script> document.getElementById("login-form").style.display = "none"</script>';
            } else {
                echo '<script> document.getElementById("logout-form").style.display = "none"</script>';
            }
        ?>
    </header>
