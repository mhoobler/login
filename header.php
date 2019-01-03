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
            <div id="login-logout">
                <form action="includes/login.inc.php" method="post">
                    <input type="text" name="unm-input" placeholder="Username/E-mail">
                    <input type="password" name="upwd-input" placeholder="Password">
                    <button type="submit" name="login-submit">Login</button>
                </form>
                <a href="signup.php">Sign Up</a>
            </div>
    </header>
