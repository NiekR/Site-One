<?php

if (isset ($_POST['signup-submit'])) {
    require 'dbh.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail".$email);
        exit();
    }

    // Email validation
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[]a-ZA-Z0-9*$/", $username) ) {
        header("Location: ../signup.php?error=invalidmail");
        exit();
    }
    else  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    }
    else  if (preg_match("/^[]a-ZA-Z0-9*$/", $username)) {
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    }
    else if($password !==  $passwordRepeat) {
        header("Location: ../signup.php?error=passwordcheck&mail=".$email."&uid=".$username);
        exit();
    }
    else {

        // Query with placeholders
        $sql = "SELECT username FROM users WHERE username=? AND passw=?";

        // Init statement and return object for stmt_prepare
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else {
            // "s" for 1 string
            mysqli_stmt_bind_param($stmt, "s", $username);

            // Check data database
            mysqli_stmt_execute($stmt);

            // Store result from database back in variable
            mysqli_stmt_store_result($stmt);

            // Amount of rows of result
            $resultCheck = mysqli_stmt_num_rows($stmt);


            // Check if user is taken
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();
            }
            else{

                $sql = "INSERT INTO users (username,email,passw) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn);

                // Check if SQL statement is valiable
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else {
                    // Hash pw
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email,$hashedPwd);

                    // Check data database
                    mysqli_stmt_execute($stmt);

                    header("Location: ../signup.php?signup=succes");
                    exit();

                }
            }

        }
    }

    // Disconnect
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else {
    header("Location: ../signup.php");
    exit();
}

