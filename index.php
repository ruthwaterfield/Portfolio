<?php
require_once('navigation.php');
require_once("CMS/CMSPageContentFunctions.php");

session_start();
$_SESSION['pageId'] = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> Ruth V Waterfield - HOME </title>
    <link rel="stylesheet" type="text/css" href="Styles/normalize.css">
    <link rel="stylesheet" type="text/css" href="Styles/theme.css">
    <link rel="stylesheet" type="text/css" href="Styles/homeStyle.css">
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

        <section class="upperSection">
            <div class="blurb">
                <h2>
                    <?php echo getContentWithTextLabel('Blurb Header', $_SESSION['pageId'])['textContent'] ?>
                </h2>
                <p>
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                    nulla pariatur.
                </p>
                <div class="link">
                    <a href="<?php echo getPageUrlForPageId(2); ?>">
                        <?php echo strtoupper(getPageNameForPageId(2)); ?>
                    </a>
                </div>
            </div>
        </section>

        <section class="lowerSection">
            <div class="infoItem">
                <?php $infoItem1 = getContentWithTextLabel('Info Item 1', $_SESSION['pageId']);
                if (contentHasImage($infoItem1['imageLabel'], $infoItem1['imageLocation'])) { ?>
                    <img src="<?php echo $infoItem1['imageLocation'] ?>"/>
                <?php } ?>
                <p>
                    <?php echo $infoItem1['textContent'] ?>
                </p>
            </div>
            <div class="infoItem">
                <?php $infoItem2 = getContentWithTextLabel('Info Item 2', $_SESSION['pageId']);
                if (contentHasImage($infoItem2['imageLabel'], $infoItem2['imageLocation'])) { ?>
                    <img src="<?php echo $infoItem2['imageLocation'] ?>"/>
                <?php } ?>
                <p>
                    <?php echo $infoItem2['textContent'] ?>
                </p>
            </div>
            <div class="infoItem">
                <?php $infoItem3 = getContentWithTextLabel('Info Item 3', $_SESSION['pageId']);
                if (contentHasImage($infoItem3['imageLabel'], $infoItem3['imageLocation'])) { ?>
                    <img src="<?php echo $infoItem3['imageLocation'] ?>"/>
                <?php } ?>
                <p>
                    <?php echo $infoItem3['textContent'] ?>
                </p>
            </div>
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