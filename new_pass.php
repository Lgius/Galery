<?php
session_start();
include_once('connection.php');

if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $opwd = sha1($_POST['opwd']);
    $npwd = sha1($_POST['npwd']);
    $cpwd = $_POST['cpwd'];

    $query = mysqli_query($con, "SELECT user_name, password FROM users WHERE user_name = '$username' AND password = '$opwd'");
    $num = mysqli_fetch_array($query);

    if ($num > 0) {
        $conne = mysqli_query($con, "UPDATE users SET password = '$npwd' WHERE user_name = '$username'");
        $_SESSION['msg1'] = "Geslo je bilo uspesno spremenjeno";
        if (isset($_SESSION['user_id'])) 
            {
                unset($_SESSION['user_id']);
            }
            header("Location: login-1.php");
        } 
        else 
        {
         $_SESSION['msg2'] = "Geslo se ne ujema";
        }
}

