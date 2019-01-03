<?php
    require "header.php"
?>

    <div class="main">
        <section class="section-default">
            <h1>Signup</h1>
            <form class="form-signup" action="includes/signup.inc.php" method="post" required>
                <input type="text" name="unm" placeholder="Username" required>
                <input type="text" name="mail" placeholder="E-mail" required>
                <input type="password" name="pwd" placeholder="Password" required>
                <input type="password" name="pwd-conf" placeholder="Confirm Password" required>
                <button type="submit" name="signup-submit">Signup</button>
            </form>
        </section>
    </div>

<?php
    require "footer.php"
?>