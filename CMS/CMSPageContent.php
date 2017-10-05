<?php require_once ('CMSNavigation.php');
require_once ('CMSPageContentFunctions.php');

session_start();
if ($_SESSION['loggedIn'] != 1) {
    header('Location: index.php');
}

if(isset($_GET['pageId']))
{
    $_SESSION['pageId'] = $_GET['pageId'];
}
else if(isset($_SESSION['pageId'])) {
    //page already chosen
}
else
{
    header('Location: CMSChoosePage.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page content: <?php echo getPageNameFromPageId($_SESSION['pageId'])?>  </title>
</head>

<body>
<h1> Page content: <?php echo getPageNameFromPageId($_SESSION['pageId'])?></h1>

<form action="CMSLogIn.php" method="POST">
    <input type="submit" name="logOut" value="LOG OUT">
</form>

<div>
<a href="CMSChoosePage.php">
    Choose a different page
</a>
</div>

<div>

    <a href="CMSAddContentForm.php">
        Add content
    </a>

<div>

<h3>Existing content</h3>
    <div>

        <?php
        $pageContentsArray = getContentForPage($_SESSION['pageId']);
        foreach ($pageContentsArray as $contentItem) { ?>
            <div>
            <p>
                Text label: <?php echo $contentItem['textLabel']?>
            </p>
            <p>
                Text content: <?php echo $contentItem['textContent']?>
            </p>
                <?php if (contentHasImage($contentItem['imageLabel'], $contentItem['imageLocation'])) { ?>
                    <p>
                        Image label: <?php echo $contentItem['imageLabel']?>
                    </p>
                    <p>
                        Image location: <?php echo $contentItem['imageLocation']?>
                    </p>

                <?php } ?>

                <a href="CMSEditContentForm.php?id=<?php echo $contentItem['id'];?>">
                    Edit/Delete this item
                </a>
            </div>
        <?php
        }
        ?>

</div>

</body>
