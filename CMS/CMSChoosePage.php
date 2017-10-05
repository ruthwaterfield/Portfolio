<?php require_once ('CMSNavigation.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title> Choose page </title>
</head>

<h1> Choose page to edit: </h1>

<nav>
    <?php $pageArray = getPages();
        echo '</br>';
        foreach ($pageArray as $page) { ?>
            <a href="CMSPageContent.php?pageId=<?php echo $page['id'];?>">
                <?php echo $page['name'] . '<br/>';?>
            </a>
    <?php } ?>

</html>

