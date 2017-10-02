<?php require_once('editAboutMe.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>EditAboutMe</title>
</head>

<body>
<h1> Edit About Me</h1>


<form method="POST" action="editAboutMe.php">
    Entry:
    <label title="Id"/>
    <input name="id" type="number" readonly value="1"> <br/>
    Content Name:
    <label title="Content Name:"/>
    <input name="content_name" type="text" required maxlength="20" value="<?php echo getTextContentsData(1,'content_name')?>"> <br/>
    Text Content:
    <label title="Text Content"/>
    <input name="text_content" type="text" required value="<?php echo getTextContentsData(1,'text_content')?>"> <br/>
    <input type="submit" value="Update">
</form>

<br/>
<br/>

<form method="POST" action="addAboutMe.php">
    Content Name:
    <label title="Content Name:"/>
    <input name="content_name" type="text" required maxlength="20" value=""> <br/>
    Text Content:
    <label title="Text Content"/>
    <input name="text_content" type="text" required value=""> <br/>
    <input type="submit" value="Add">
</form>

</body>
</html>