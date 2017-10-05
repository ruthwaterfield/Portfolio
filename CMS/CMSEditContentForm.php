<?php
require_once ('CMSNavigation.php');
require_once ('CMSPageContentFunctions.php');

session_start();

if(!isset($_SESSION['pageId'])) {
    header('Location: CMSChoosePage.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit content in: <?php echo getPageNameFromPageId($_SESSION['pageId'])?>  </title>
</head>

<body>
<h1> Edit content in: <?php echo getPageNameFromPageId($_SESSION['pageId'])?></h1>

<?php
if(!isset($_GET['id'])) {
    header('Location: CMSPageContent.php');
}

$contentArray = getContentWithId($_GET['id']);?>


<div>
    <form method="POST" action="CMSChangeOccurred.php">
        <input name="action" type="hidden" value="edit">
        <input name="pageId" type="hidden" value="<?php echo $_SESSION['pageId']?>">
        <input name="id" type="hidden" value="<?php echo $contentArray['id']?>" >
        Text label:
        <label title="Text label:"/>
        <input name="textLabel" type="text" required maxlength="20" value="<?php echo $contentArray['textLabel']?>"> <br/>
        Text content:
        <label title="Text content"/>
        <input name="textContent" type="text" required value="<?php echo $contentArray['textContent']?>"> <br/>

<?php if (contentHasImage($contentArray['imageLabel'], $contentArray['imageLocation'])) { ?>
    (Optional) Image label:
    <label title="Image label:"/>
    <input name="imageLabel" type="text" maxlength="20" value="<?php echo $contentArray['imageLabel']?>"> <br/>
    (Optional) Image location:
    <label title="Image location"/>
    <input name="imageLocation" type="text" value="<?php echo $contentArray['imageLocation']?>"> <br/>
    <?php } else { ?>
        (Optional) Image label:
        <label title="Image label:"/>
        <input name="imageLabel" type="text" maxlength="20"> <br/>
        (Optional) Image location:
        <label title="Image location"/>
        <input name="imageLocation" type="text"> <br/>
    <?php } ?>

        <input type="submit" value="Edit this content">
    </form>

    <form method="POST" action="CMSChangeOccurred.php">
        <input name="action" type="hidden" value="delete">
        <input name="id" type="hidden" value="<?php echo $contentArray['id']?>">
        <input type="submit" value="Delete this content">
    </form>

    <br/>

    <a href="CMSPageContent.php">
        Go back to page content for: <?php echo getPageNameFromPageId($_SESSION['pageId'])?> without changing anything
    </a>

</div>

</body>

</html>
