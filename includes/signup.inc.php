<?php

if(isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['unm'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $pass_conf = $_POST['pwd-conf'];

    if(empty($username) || empty($email) || empty($password) || empty($pass_conf)) {
        header("Location: ../signup.php?error=emptyFields&uid=".$username."&mail=".$email);
        exit();
    } else if (!preg_match('/^[a-zA-Z0-9]*$/', $username)) {
        header("Location: ../signup.php?error=invalidUsername&mail=".$email);
    
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidEmail&uid=".$username);
        exit();
    } else if ($password!==$pass_conf) {
        header("Location: ../signup.php?error=passwordConfirmation&uid=".$username."&mail=".$email);
        exit();
    } else {

        $sql = "SELECT unmUsers FROM user_accounts WHERE unmUsers=?"; //add email checl
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=duplicateError");
            exit();
        }
    }
}