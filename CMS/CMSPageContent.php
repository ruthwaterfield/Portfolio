<?php require_once ('CMSNavigation.php');
require_once ('CMSPageContentFunctions.php');

session_start();

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
                Text Label: <?php echo $contentItem['textLabel']?>
            </p>
            <p>
                Text Content: <?php echo $contentItem['textContent']?>
            </p>
                <?php if (contentHasImage($contentItem['imageLabel'], $contentItem['imageUrl'])) { ?>
                    <p>
                        Image Label: <?php echo $contentItem['imageLabel']?>
                    </p>
                    <p>
                        Image Url: <?php echo $contentItem['imageUrl']?>
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
