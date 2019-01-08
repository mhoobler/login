<?php
    require "header.php";

    //if logged in, redirect user to homepage
    if(isset($_SESSION['userName'])) {
        header("Location: /login2018/index.php");
    }
?>

    <div class="main">
        <section class="section-default">
            <h1>Signup</h1>
            <form class="form-signup" action="includes/signup.inc.php" method="post" required>
                <input type="text" name="unm-input" placeholder="Username" required>
                <input type="text" name="mail-input" placeholder="E-mail" required>
                <input type="password" name="pwd-input" placeholder="Password" required>
                <input type="password" name="pwd-conf" placeholder="Confirm Password" required>
                <button type="submit" name="signup-submit">Signup</button>
            </form>
        </section>
    </div>

<?php
    require "footer.php"
?>