<?php
require_once ('CMSNavigation.php');
require_once ('CMSAddContentFunctions.php');

session_start();
if ($_SESSION['loggedIn'] != 1) {
    header('Location: index.php');
}
if(!isset($_SESSION['pageId'])) {
    header('Location: CMSChoosePage.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add content to: <?php echo getPageNameFromPageId($_SESSION['pageId'])?>  </title>
    <link rel="stylesheet" type="text/css" href="../CMSStyles/normalize.css">
    <link rel="stylesheet" type="text/css" href="../CMSStyles/CMSTheme.css">
</head>

<body>

<header>
    <h1> Add content to: <?php echo getPageNameFromPageId($_SESSION['pageId'])?></h1>

    <form action="CMSLogIn.php" method="POST">
        <input type="submit" name="logOut" value="Log out">
    </form>

    <a href="CMSChoosePage.php">
        Choose a different page
    </a>
</header>

<div class="mainContent">
    <a href="CMSPageContent.php">
        Go back to page content for: <?php echo getPageNameFromPageId($_SESSION['pageId'])?> without changing anything
    </a>

    <form method="POST" action="CMSChangeOccurred.php">
        <input name="action" type="hidden" value="add">
        <input name="pageId" type="hidden" value="<?php echo $_SESSION['pageId']?>">
        <p>Text label: </p>
        <label about="Text label:"/>
        <input name="textLabel" type="text" required maxlength="20"> <br/>
        <p>Text content:</p>
        <label about="Text content"/>
        <textarea name="textContent" rows="3" required></textarea>  <br/>
        <p>(Optional) Image label: </p>
        <label about="Image label:"/>
        <input name="imageLabel" type="text" maxlength="20"> <br/>
        <p>(Optional) Image location: </p>
        <label about="Image location"/>
        <input name="imageLocation" type="text"> <br/>
        <input type="submit" value="Add content">
    </form>

    <br/>



</div>