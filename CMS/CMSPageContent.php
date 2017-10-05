<?php require_once('CMSNavigation.php');
require_once('CMSPageContentFunctions.php');

session_start();
if ($_SESSION['loggedIn'] != 1) {
    header('Location: index.php');
}

if (isset($_GET['pageId'])) {
    $_SESSION['pageId'] = $_GET['pageId'];
} else if (isset($_SESSION['pageId'])) {
    //page already chosen
} else {
    header('Location: CMSChoosePage.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page content: <?php echo getPageNameFromPageId($_SESSION['pageId']) ?>  </title>
    <link rel="stylesheet" type="text/css" href="../CMSStyles/normalize.css">
    <link rel="stylesheet" type="text/css" href="../CMSStyles/CMSTheme.css">
</head>

<body>

<header>
    <h1> Page content: <?php echo getPageNameFromPageId($_SESSION['pageId']) ?></h1>

    <form action="CMSLogIn.php" method="POST">
        <input type="submit" name="logOut" value="Log out">
    </form>

    <a href="CMSChoosePage.php">
        Choose a different page
    </a>
</header>

<div class="mainContent">

    <?php
    $pageContentsArray = getContentForPage($_SESSION['pageId']);
    foreach ($pageContentsArray as $contentItem) { ?>
        <div class="contentItem">
            <p class="label">
                Text label:
            </p>
            <p class="content">
                <?php echo $contentItem['textLabel'] ?>
            </p>
            <p class="label">
                Text content:
            </p>
            <p class="content">
                <?php echo $contentItem['textContent'] ?>
            </p>
            <?php if (contentHasImage($contentItem['imageLabel'], $contentItem['imageLocation'])) { ?>
                <p class="label">
                    Image label:
                </p>
                <p class="content">
                    <?php echo $contentItem['imageLabel'] ?>
                </p>
                <p class="label">
                    Image location:
                </p>
                <p class="content">
                    <?php echo $contentItem['imageLocation'] ?>
                </p>
            <?php } ?>

            <div class="divider">
            </div>
            <div class="buttonDiv">
            <a href="CMSEditContentForm.php?id=<?php echo $contentItem['id']; ?>">
                Edit/Delete this item
            </a>
            </div>
        </div>
        <?php
    }
    ?>

    <div class="contentItem">
        <div class="buttonDiv">
        <a href="CMSAddContentForm.php">
            Add content
        </a>
    </div>
    </div>


</body>
