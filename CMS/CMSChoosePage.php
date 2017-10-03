<?php require_once ('CMSNavigation.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title> Choose page </title>
</head>

<h1> Choose page to edit: </h1>

<nav>
    <ul>
        <li>
            <a href="<?php echo getCMSPageUrlFromPageName('Home')?>">
                HOME
            </a>
        </li>
        <li>
            <a href="<?php echo getCMSPageUrlFromPageName('AboutMe')?>">
                ABOUT ME
            </a>
        </li>
        <li>
            <a href="<?php echo getCMSPageUrlFromPageName('Portfolio')?>">
                PORTFOLIO
            </a>
        </li>
        <li>
            <a href="<?php echo getCMSPageUrlFromPageName('ContactMe')?>">
                CONTACT ME
            </a>
        </li>
    </ul>
</nav>



</html>

