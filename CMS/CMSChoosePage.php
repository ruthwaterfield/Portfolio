<?php require_once ('CMSNavigation.php');
session_start();
if ($_SESSION['loggedIn'] != 1) {
header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Choose page </title>
</head>

<h1> Choose page to edit: </h1>

<form action="CMSLogIn.php" method="POST">
    <input type="submit" name="logOut" value="LOG OUT">
</form>

<form action="CMSLogIn.php" method="POST">
    <input type="submit" name="logOut" value="LOG OUT">
</form>

<nav>
    <?php $pageArray = getPages();
        echo '</br>';
        foreach ($pageArray as $page) { ?>
            <a href="CMSPageContent.php?pageId=<?php echo $page['id'];?>">
                <?php echo $page['name'] . '<br/>';?>
            </a>
    <?php } ?>

</html>

