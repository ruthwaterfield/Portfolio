<?php require_once ('CMSNavigation.php');
session_start();
if ($_SESSION['loggedIn'] != 1) {
header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> Choose page </title>
    <link rel="stylesheet" type="text/css" href="../CMSStyles/normalize.css">
    <link rel="stylesheet" type="text/css" href="../CMSStyles/CMSTheme.css">

</head>

<header>
    <h1> Choose page to edit: </h1>

    <form action="CMSLogIn.php" method="POST">
        <input type="submit" name="logOut" value="Log out">
    </form>

</header>

<div class="mainContent">

    <?php $pageArray = getPages();
        foreach ($pageArray as $page) { ?>
            <div class="pageChooser">
            <a href="CMSPageContent.php?pageId=<?php echo $page['id'];?>">
                <?php echo $page['name'];?>
            </a>
            </div>
    <?php } ?>


</div>
</html>

