<?php
    require "header.php"
?>

    <main>
        <?php
            if(isset($_SESSION['userName'])){
                echo '<p>Logged in as '. $_SESSION['userName']. '</p>';
            }
        ?>
        <p>Logged in</p>
        <p>Logged out</p>
    </main>

<?php
    require "footer.php"
?>