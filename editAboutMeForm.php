<?php require_once editAboutMe.php ?>
<!DOCTYPE html>
<html>
<head>
    <title>EditAboutMe</title>
</head>

<body>
<h1> Edit About Me</h1>

<form method="POST" action="EditAboutMe.php">
    Content Name:
    <label title="Content Name:"/>
    <input name="content_name" type="text" required maxlength="20" value=
    <?php echo  ?>
    <br/>
    Text Content:
    <label title="Text Content"/>
    <input name="text_content" type="date" required> <br/>
    <input type="Update">
</form>

</body>
</html>