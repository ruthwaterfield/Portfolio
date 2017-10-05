<?php
require_once('CMSNavigation.php');
require_once('CMSPageContentFunctions.php');

session_start();
if ($_SESSION['loggedIn'] != 1) {
    header('Location: index.php');
}
if (!isset($_SESSION['pageId'])) {
    header('Location: CMSChoosePage.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit content in: <?php echo getPageNameFromPageId($_SESSION['pageId']) ?>  </title>
    <link rel="stylesheet" type="text/css" href="../CMSStyles/normalize.css">
    <link rel="stylesheet" type="text/css" href="../CMSStyles/CMSTheme.css">
</head>

<body>

<header>
    <h1> Edit content in: <?php echo getPageNameFromPageId($_SESSION['pageId']) ?></h1>

    <form action="CMSLogIn.php" method="POST">
        <input type="submit" name="logOut" value="Log out">
    </form>

    <a href="CMSChoosePage.php">
        Choose a different page
    </a>
</header>

<div class="mainContent">
    <a href="CMSPageContent.php">
        Go back to page content for: <?php echo getPageNameFromPageId($_SESSION['pageId']) ?> without changing anything
    </a>

    <?php
    if (!isset($_GET['id'])) {
        header('Location: CMSPageContent.php');
    }

    $contentArray = getContentWithId($_GET['id'], $_SESSION['pageId']); ?>

    <form method="POST" action="CMSChangeOccurred.php">
        <input name="action" type="hidden" value="edit">
        <input name="pageId" type="hidden" value="<?php echo $_SESSION['pageId'] ?>">
        <input name="id" type="hidden" value="<?php echo $contentArray['id'] ?>">
        <p>Text label:</p>
        <label about="Text label:"/>
        <input name="textLabel" type="text" required maxlength="20" value="<?php echo $contentArray['textLabel'] ?>">
        <br/>
        <p>Text content:</p>
        <label about="Text content"/>
        <textarea name="textContent" required rows="3"><?php echo $contentArray['textContent'] ?></textarea> <br/>

        <?php if (contentHasImage($contentArray['imageLabel'], $contentArray['imageLocation'])) { ?>
            <p>(Optional) Image label:</p>
            <label about="Image label:"/>
            <input name="imageLabel" type="text" maxlength="20" value="<?php echo $contentArray['imageLabel'] ?>"> <br/>
            <p>(Optional) Image location:</p>
            <label about="Image location"/>
            <input name="imageLocation" type="text" value="<?php echo $contentArray['imageLocation'] ?>"> <br/>
        <?php } else { ?>
            <p>(Optional) Image label:</p>
            <label about="Image label:"/>
            <input name="imageLabel" type="text" maxlength="20"> <br/>
            <p>(Optional) Image location:</p>
            <label about="Image location"/>
            <input name="imageLocation" type="text"> <br/>
        <?php } ?>

        <input type="submit" value="Edit this content">
    </form>
</div>

<div class="mainContent">
    <form method="POST" action="CMSChangeOccurred.php">
        <input name="action" type="hidden" value="delete">
        <input name="id" type="hidden" value="<?php echo $contentArray['id'] ?>">
        <input type="submit" value="Delete this content">
    </form>
</div>

</body>

</html>
