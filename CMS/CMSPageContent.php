<?php require_once ('CMSNavigation.php');

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

    <a href="CMSAddContentForm.php">
        Add content
    </a>




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
