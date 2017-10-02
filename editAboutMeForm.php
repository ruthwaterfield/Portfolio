<?php require_once('editAboutMe.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>EditAboutMe</title>
</head>

<body>
<h1> Edit About Me</h1>


<form method="POST" action="editAboutMe.php">
    Content Name:
    <label title="Content Name:"/>
    <input name="content_name" type="text" required maxlength="20" value="<?php echo getContentName()?>"> <br/>
    Text Content:
    <label title="Text Content"/>
    <input name="text_content" type="text" required value="<?php echo getTextContent()?>"> <br/>
    <input type="submit" value="Update">
</form>

</body>
</html>