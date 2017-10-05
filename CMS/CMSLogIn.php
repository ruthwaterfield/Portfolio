<?php
require_once('CMSLogInFunctions.php');

session_start();

if ($_SESSION['loggedIn'] != 1) {
    if (isApproved($_POST)) {
        $_SESSION['loggedIn'] = 1;
        header('Location: CMSChoosePage.php');
    } else {
        header('Location: index.php');
    }
}

if(isset($_POST['logOut']))
{
    $_SESSION['loggedIn'] = 0;
    header('Location: index.php');
}
?>
