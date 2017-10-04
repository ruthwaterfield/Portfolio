<?php
require_once ('CMSNavigation.php');
require_once ('CMSAddContentFunctions.php');

session_start();

if(!isset($_SESSION['pageId'])) {
    header('Location: CMSChoosePage.php');
}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Making a change to page: <?php echo getPageNameFromPageId($_SESSION['pageId'])?>  </title>
    </head>

<body>
    <h1> Making a change to page: <?php echo getPageNameFromPageId($_SESSION['pageId'])?></h1>

<?php
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case "add" :
            if(isValidAddContentFormSubmission()) {
                if (addContentToPage($_POST['textLabel'], $_POST['textContent'], $_POST['imageLabel'], $_POST['imageUrl'], $_POST['pageId'])) {
                    echo "Success :-) </br>";
                    ?>
                    <a href="CMSPageContent.php">
                        Go back to page content for: <?php echo getPageNameFromPageId($_SESSION['pageId'])?>
                    </a>
                    <?php
                } else {
                    echo "Something went wrong :-( </br>";
                    ?>
                    <a href="CMSPageContent.php">
                        Go back to page content for: <?php echo getPageNameFromPageId($_SESSION['pageId'])?>
                    </a>
                    <?php
                }
            }
            break;

        case "edit" :
            break;
        default :

    }
}

/**
 * isValidAddContentFormSubmission checks whether the post data has been set correctly before it is used.
 *
 * @return bool Success (1) or failure (0)
 */
function isValidAddContentFormSubmission() : bool {
    $result = 0;
    if (isset($_POST['textLabel']) && isset($_POST['textContent']) && isset($_POST['pageId']) && isset($_POST['imageLabel']) && isset($_POST['imageUrl'])){
        $result = 1;
    }
    return $result;
}

?>