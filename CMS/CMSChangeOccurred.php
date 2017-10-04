<?php require_once ('CMSNavigation.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title> CMS Add Related Text </title>
</head>

<body>

<?php
session_start();
if(isset($_SESSION['pageId'])) {
    echo 'You are working on the ' . getPageNameFromPageId($_SESSION['pageId']) . ' page.<br/>';
}

if (isset($_POST['RelatedText_sectionName']) && isset($_SESSION['pageId']) && isset($_POST['RelatedText_content']) && isset($_POST['Images_id'])) {
if (addRelatedText($_POST['RelatedText_sectionName'], $_SESSION['pageId'], $_POST['RelatedText_content'], $_POST['Images_id'])) {
    ?>
    <p>Successfully added :-)</p>
    <a href="<?php echo getCMSPageUrlFromPageId($_SESSION['pageId'])?>">
        Go back to <?php echo getPageNameFromPageId($_SESSION['pageId']); ?> page
    </a>
<?php } else { ?>
<p>'Sorry, there was a problem adding the image';
    <a href="<?php echo getCMSPageUrlFromPageId($_SESSION['pageId'])?>">
        Go back to <?php echo getPageNameFromPageId($_SESSION['pageId']); ?> page
    </a>
<?php }
}

/**
 * addRelatedText adds the requested text to the Text table and adds a link between it and the image that had just been added in the TextForImages table
 *
 * @param string $sectionName The name for the text section.
 * @param int $pageId Which page the text should appear on.
 * @param string $content The content of the text.
 * @param int $imageId The image the text is related to.
 *
 * @return bool Was the process successful? 1 for success, 0 for failure.
 */
function addRelatedText(string $sectionName, int $pageId, string $content, int $imageId) : bool {
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsiteDb', 'root', '');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Add the text into the text table
        $sql = "INSERT INTO `Text` (`sectionName`, `pageId`, `content`) VALUES (:sectionName, :pageId, :content);";
        $query = $db->prepare($sql);

        $query->bindParam(':sectionName', $sectionName, PDO::PARAM_STR, 20);
        $query->bindParam(':pageId', $pageId, PDO::PARAM_INT, 11);
        $query->bindParam(':content', $content, PDO::PARAM_STR);

        $query->execute();

        //Find the id of the text just entered.
        $sql = "SELECT LAST_INSERT_ID();";
        $query = $db->prepare($sql);

        $query->execute();
        $returnedArray = $query->fetch();
        $textId = $returnedArray['LAST_INSERT_ID()'];

        //Insert the link between image and text into the link table.
        $sql = "INSERT INTO `TextForImages` (`imageId`, `textId`) VALUES (:imageId, :textId);";
        $query = $db->prepare($sql);

        $query->bindParam(':imageId', $imageId, PDO::PARAM_INT, 11);
        $query->bindParam(':textId', $textId, PDO::PARAM_INT, 11);

        $query->execute();
        $result = 1;
    } catch (Exception $e) {
        echo $e->getMessage();
        $result = 0;
    }

    return $result;
}

?>