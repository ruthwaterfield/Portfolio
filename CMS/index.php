<?php
session_start();

if ($_SESSION['loggedIn'] == 1) {
    header('Location: CMSChoosePage.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log in to CMS</title>
    <link rel="stylesheet" type="text/css" href="../CMSStyles/normalize.css">
    <link rel="stylesheet" type="text/css" href="../CMSStyles/CMSTheme.css">
</head>
<body>

<header>
    <h1>Log in</h1>
</header>

<div class="mainContent">

<form action="CMSLogIn.php" method="POST">
    <h2>
        Please enter your username and password and click Log in:
    </h2>
    <p>Username:</p>
    <input name="username" type="text" value=""> <br/>
    <p>Password:</p>
    <input name="password" type="password" value=""> <br/>
    <input name="login" type="submit" value="Log in">
</form>

</div>

</body>
</html>
