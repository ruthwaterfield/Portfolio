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
        Content Name:
        <label title="Section Name:"/>
        <input name="Text_sectionName" type="text" required maxlength="20" value=""> <br/>
        Text Content:
        <label title="Content"/>
        <input name="Text_content" type="text" required value=""> <br/>
        <input type="submit" value="Add">
    </form>

    <br/>
    <br/>

    <form method="POST" action="CMSAdd.php">
        Image Name:
        <label title="Image Name:"/>
        <input name="Images_imageName" type="text" required maxlength="20" value=""> <br/>
        Image Url:
        <label title="Image Url"/>
        <input name="Images_url" type="text" required value=""> <br/>
        <input type="submit" value="Add">
    </form>

</div>