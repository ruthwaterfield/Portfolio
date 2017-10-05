<?php
require_once ('CMSNavigation.php');
require_once ('CMSAddContentFunctions.php');

session_start();

if(!isset($_SESSION['pageId'])) {
    header('Location: CMSChoosePage.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add content to: <?php echo getPageNameFromPageId($_SESSION['pageId'])?>  </title>
</head>

<body>
<h1> Add content to: <?php echo getPageNameFromPageId($_SESSION['pageId'])?></h1>

<div>
    <form method="POST" action="CMSChangeOccurred.php">
        <input name="action" type="hidden" value="add">
        <input name="pageId" type="hidden" value="<?php echo $_SESSION['pageId']?>">
        Text label:
        <label title="Text label:"/>
        <input name="textLabel" type="text" required maxlength="20"> <br/>
        Text content:
        <label title="Text content"/>
        <input name="textContent" type="text" required> <br/>
        (Optional) Image label:
        <label title="Image label:"/>
        <input name="imageLabel" type="text" maxlength="20"> <br/>
        (Optional) Image url:
        <label title="Image url"/>
        <input name="imageUrl" type="url" maxlength="30"> <br/>
        <input type="submit" value="Add content">
    </form>

    <br/>

    <a href="CMSPageContent.php">
        Go back to page content for: <?php echo getPageNameFromPageId($_SESSION['pageId'])?> without changing anything
    </a>

</div>