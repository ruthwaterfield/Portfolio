<?php
require_once ('CMSNavigation.php');
require_once ('CMSAddContentFunctions.php');
require_once ('CMSEditContentFunctions.php');

session_start();
if ($_SESSION['loggedIn'] != 1) {
    header('Location: index.php');
}
if(!isset($_SESSION['pageId'])) {
    header('Location: CMSChoosePage.php');
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Making a change to page: <?php echo getPageNameFromPageId($_SESSION['pageId'])?>  </title>
        <link rel="stylesheet" type="text/css" href="../CMSStyles/normalize.css">
        <link rel="stylesheet" type="text/css" href="../CMSStyles/CMSTheme.css">
    </head>

<body>

    <header>
    <h1> Making a change to page: <?php echo getPageNameFromPageId($_SESSION['pageId'])?></h1>

    <form action="CMSLogIn.php" method="POST">
        <input type="submit" name="logOut" value="Log out">
    </form>


</header>

<div class="mainContent">
    <div class="contentItem">


<?php
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case "add" :
            if(isValidAddContentFormSubmission()) {
                if (addContentToPage($_POST['textLabel'], $_POST['textContent'], $_POST['imageLabel'], $_POST['imageLocation'], $_POST['pageId'])) {
                    ?>
                    <p> Successfully added :-) </p>
                    <a href="CMSPageContent.php">
                        Go back to page content for: <?php echo getPageNameFromPageId($_SESSION['pageId'])?>
                    </a>
                    <br/> <br/>
                    <a href="CMSChoosePage.php">
                        Choose a different page
                    </a>
                    <?php
                } else { ?>
                    <p>Something went wrong :-( </p>
                    <a href="CMSPageContent.php">
                        Go back to page content for: <?php echo getPageNameFromPageId($_SESSION['pageId'])?>
                    </a>
                    <?php
                }
            }
            break;

        case "edit" :
            if(isValidEditContentFormSubmission()) {
                if (editContentWithId($_POST['textLabel'], $_POST['textContent'], $_POST['imageLabel'], $_POST['imageLocation'], $_POST['id'])) { ?>
                    <p>Successfully edited :-) </p>
                    <a href="CMSPageContent.php">
                        Go back to page content for: <?php echo getPageNameFromPageId($_SESSION['pageId'])?>
                    </a>
                    <br/> <br/>
                    <a href="CMSChoosePage.php">
                        Choose a different page
                    </a>
                    <?php
                } else { ?>
                    <p>Something went wrong :-( </p>
                    <a href="CMSPageContent.php">
                        Go back to page content for: <?php echo getPageNameFromPageId($_SESSION['pageId'])?>
                    </a>
                    <?php
                }
            }
            break;
        case "delete" :
            if(isValidDeleteContentFormSubmission()) {
                if (markContentAsDeleted($_POST['id'])) { ?>
                    <p>Successfully deleted :-) </p>
                    <a href="CMSPageContent.php">
                        Go back to page content for: <?php echo getPageNameFromPageId($_SESSION['pageId'])?>
                    </a>
                    <br/> <br/>
                    <a href="CMSChoosePage.php">
                        Choose a different page
                    </a>
                    <?php
                } else { ?>
                    <p>Something went wrong :-( </p>
                    <a href="CMSPageContent.php">
                        Go back to page content for: <?php echo getPageNameFromPageId($_SESSION['pageId'])?>
                    </a>
                    <?php
                }
            }
            break;
        default :
            header('Location: CMSPageContent.php');
    }
} ?>
    </div>
</div>

<?php

/**
 * isValidAddContentFormSubmission checks whether the post data has been set correctly before it is used for adding content.
 *
 * @return bool Success (1) or failure (0)
 */
function isValidAddContentFormSubmission() : bool {
    $result = 0;
    if (isset($_POST['textLabel']) && isset($_POST['textContent']) && isset($_POST['imageLabel']) && isset($_POST['imageLocation']) && isset($_POST['pageId'])){
        $result = 1;
    }
    return $result;
}

/**
 * isValidEditContentFormSubmission checks whether the post data has been set correctly before it is used for editing content.
 *
 * @return bool Success (1) or failure (0)
 */
function isValidEditContentFormSubmission() : bool {
    $result = 0;
    if (isset($_POST['textLabel']) && isset($_POST['textContent']) && isset($_POST['imageLabel']) && isset($_POST['imageLocation']) && isset($_POST['id'])){
        $result = 1;
    }
    return $result;
}

/**
 * isValidDeleteContentFormSubmission checks whether the post data has been set correctly before it is used for editing content.
 *
 * @return bool Success (1) or failure (0)
 */
function isValidDeleteContentFormSubmission() : bool {
    $result = 0;
    if (isset($_POST['id'])){
        $result = 1;
    }
    return $result;
}

?>