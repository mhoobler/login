<?php
if(isset($_POST["login-submit"])){ 
    
    require 'dbh.inc.php';

    $email = $_POST['unm-input'];
    $password = $_POST['upwd-input'];

    //Lots of error handling
    if(empty($email) || empty($password)){
        header("Location: ../index.php?error=emptyFields");
        exit();

    } else {
        $sql = "SELECT * FROM user_accounts WHERE unmUsers=? OR mailUsers=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sqlError");
            exit();

        } else {
            mysqli_stmt_bind_param($stmt, 'ss', $email, $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwd']);
                if($pwdCheck == false){
                    header("Location: ../index.php?error=loginError");
                    exit();
                } else if($pwdCheck == true){
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userName'] = $row['unmUsers'];
                    
                    header("Location: ../index.php?login=success");
                    exit();
                }

            } else {
                header("Location: ../index.php?error=loginError");
                exit();
            }
        }
    }

} else {
    header("Location: ../index.php");
    exit();
}