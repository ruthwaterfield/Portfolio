<!DOCTYPE html>
<html>
<head>
    <title>CMS Home</title>
</head>

<body>
<h1> Home</h1>

<?php
session_start();

$_SESSION['pageId'] = 1;
echo 'page id: ' . $_SESSION['pageId'] . '<br/> <br/>';
?>

<form method="POST" action="CMSAdd.php">
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



</body>
