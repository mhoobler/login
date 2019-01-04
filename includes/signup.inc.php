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
            header("Location: ../signup.php?error=sqlError");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0){
                header("Location: ../signup.php?error=duplicateUsername&mail=".$email);
                exit();
            } else {
                $sql = "INSERT INTO user_accounts (unmUsers, mailUsers, pwd) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                } else {
                    $hashed = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
} else {
    header("Location: ../signup.php");
    exit();
}