<?php
session_start();
$_SESSION['pageId'] = 4;
require_once('Navigation.php');
include_once("CMS/CMSPageContentFunctions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> Ruth V Waterfield - CONTACT ME </title>
    <link rel="stylesheet" type="text/css" href="Styles/normalize.css">
    <link rel="stylesheet" type="text/css" href="Styles/theme.css">
    <link rel="stylesheet" type="text/css" href="Styles/contactMeStyle.css">
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

        <section class="content">
            <?php
            $contentItems = getContentForPage($_SESSION['pageId']);
            foreach ($contentItems as $contentItem) { ?>
                <div class="contactItem">
                    <?php if (contentHasImage($contentItem['imageLabel'], $contentItem['imageLocation'])) { ?>
                        <img src="<?php echo $contentItem['imageLocation'] ?>">
                    <?php } ?>
                    <p>
                        <?php echo $contentItem['textContent']; ?>
                    </p>
                </div>
            <?php } ?>
        </section>

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