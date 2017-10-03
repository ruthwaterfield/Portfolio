<?php require_once('CMSHomeAdd.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>CMS Home</title>
</head>

<body>
<h1> Home</h1>

<form name="AddText" method="POST" action="CMSHomeAdd.php">
    Content Name:
    <label title="Section Name:"/>
    <input name="Text.sectionName" type="text" required maxlength="20" value=""> <br/>
    Text Content:
    <label title="Content"/>
    <input name="Text.content" type="text" required value=""> <br/>
    <input type="submit" value="Add">
</form>

<br/>
<br/>

<form name="AddImage" method="POST" action="CMSHomeAdd.php">
    Content Name:
    <label title="Image Name:"/>
    <input name="Image.imageName" type="text" required maxlength="20" value=""> <br/>
    Text Content:
    <label title="Image Url"/>
    <input name="Image.url" type="text" required value=""> <br/>
    <input type="submit" value="Add">
</form>



</body>
