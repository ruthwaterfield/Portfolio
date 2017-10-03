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
<div>
<h3>Add content</h3>

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

</div>

<div>
<h3>Edd/Delete existing content</h3>

<?php
$fruits = ['lemon' => 101, 'apple' => 102, 'pear' => 103];
foreach ($fruits as $fruit => $val) {
?>
    <div>
        <h5>Another Fruit</h5>
        <p>
           <?php echo $fruit; ?>
        </p>
        <p>
            <?php echo $val; ?>
        </p>
        <a href="CMSEdit.php?id=<?php echo $fruit; ?>">
            Edit this fruit
        </a>
    </div>
    <?php
}
?>

</div>

</body>
