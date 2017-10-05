<?php
session_start();
$_SESSION['pageId'] = 2;
require_once('Navigation.php');
include_once("CMS/CMSPageContentFunctions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> Ruth V Waterfield - ABOUT ME </title>
    <link rel="stylesheet" type="text/css" href="Styles/normalize.css">
    <link rel="stylesheet" type="text/css" href="Styles/theme.css">
    <link rel="stylesheet" type="text/css" href="Styles/aboutMeStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<header>
    <h1>
        Ruth V Waterfield
    </h1>
    <nav>
        <ul>
            <?php $pageArray = getPages();
            foreach ($pageArray as $page) { ?>
                <li>
                    <a href="<?php echo $page['url']; ?>">
                        <?php echo strtoupper($page['name']); ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </nav>
</header>

<article>
    <div class="central">

        <section class="profile">
            <?php $profile = getContentWithTextLabel('Profile', $_SESSION['pageId']);
            if (contentHasImage($profile['imageLabel'], $profile['imageLocation'])) { ?>
                <img src="<?php echo $profile['imageLocation'] ?>"/>
            <?php } ?>
            <p>
                <?php echo $profile['textContent'] ?>
            </p>
        </section>

        <section class="lowerSection">
            <?php
            $contentItems = getContentForPage($_SESSION['pageId']);
            $count = 1;
            foreach ($contentItems as $contentItem) {
                if ($contentItem['textLabel'] != 'Profile') { //treat everything except profile in the following way:
                    if ($count & 1) { //odd items ?>
                        <div class="infoItem">
                            <p>
                                <?php echo $contentItem['textContent']; ?>
                            </p>
                            <?php if (contentHasImage($contentItem['imageLabel'], $contentItem['imageLocation'])) { ?>
                                <img src="<?php echo $contentItem['imageLocation'] ?>">
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <div class="infoItem">
                            <?php if (contentHasImage($contentItem['imageLabel'], $contentItem['imageLocation'])) { ?>
                                <img src="<?php echo $contentItem['imageLocation'] ?>">
                            <?php } ?>
                            <p>
                                <?php echo $contentItem['textContent']; ?>
                            </p>
                        </div>
                    <?php }
                    $count++;
                }
            } ?>
    </div>
</article>


<footer>
    <nav>
        <a href="https://twitter.com/login?lang=en">
            <img src="Images/if_Twitter_logo_2258490.png">
        </a>
        <a href="https://en-gb.facebook.com/">
            <img src="Images/if_Facebook_logo_2258500.png">
        </a>
        <a href="https://www.google.co.uk/">
            <img src="Images/if_G_google._logo_2258499.png">
        </a>
        <a href="https://uk.linkedin.com/">
            <img src="Images/if_Linkedin_logo_2258497.png">
        </a>
        <a href="https://www.instagram.com/?hl=en">
            <img src="Images/if_Instagram_logo_2258498.png">
        </a>
    </nav>
    <p>
        &#169; 2017 by Ruth V Waterfield. All rights reserved.
    </p>
</footer>


</body>

</html>