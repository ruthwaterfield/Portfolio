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
</head>
<body>

<h1>
    Log in
</h1>
<h2>
    Please enter your username and password and click LOG IN
</h2>
<form action="CMSLogIn.php" method="POST">
    Username:
    <input name="username" type="text" value="">
    Password:
    <input name="password" type="password" value="">
    <input name="login" type="submit" value="LOG IN">
</form>



</body>
</html>
