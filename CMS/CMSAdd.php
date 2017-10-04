<?php require_once ('CMSNavigation.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title> CMS Add </title>
</head>

<body>

<?php
session_start();
if(isset($_SESSION['pageId'])) {
    echo 'You are working on the ' . getPageNameFromPageId($_SESSION['pageId']) . ' page.<br/>';
}


//If the text form has been submitted, run the queries to add that text to the database.
if(isset($_POST['Text_sectionName']) && isset($_SESSION['pageId']) && isset($_POST['Text_content'])) {
    if (addText($_POST['Text_sectionName'], $_SESSION['pageId'], $_POST['Text_content'])) { ?>
        <p>Successfully added :-)</p>
        <a href="<?php echo getCMSPageUrlFromPageId($_SESSION['pageId'])?>">
            Go back to <?php echo getPageNameFromPageId($_SESSION['pageId']); ?> page
        </a> <?php
    } else { ?>
        <p>Sorry, there was a problem adding the text'</p>
        <a href="<?php echo getCMSPageUrlFromPageId($_SESSION['pageId'])?>">
            Go back to <?php echo getPageNameFromPageId($_SESSION['pageId']); ?> page
        </a>
<?php
    }
}

//If the image form has been submitted, run the queries to add that image to the database, then if this was successful,
// give the option of adding text related to that image.
if(isset($_POST['Images_imageName']) && isset($_SESSION['pageId']) && isset($_POST['Images_url'])) {
    $imageId = addImage($_POST['Images_imageName'], $_SESSION['pageId'], $_POST['Images_url']);
    if ($imageId > 0) { ?>
        <h2>Successfully added :-) <br/>
            You can now return to Home or add some text related to the image you just added.</h2>
        <a href="<?php echo getCMSPageUrlFromPageId($_SESSION['pageId'])?>">
            Go back to <?php echo getPageNameFromPageId($_SESSION['pageId']); ?> page
        </a>
        <br/> <br/>
        <h3>Add related text:</h3>
        <form name="AddText" method="POST" action="CMSAddRelatedText.php">
            Image Id:
            <label title="Image Id:"/>
            <!--        <input name="Images.Id" type="hidden">-->
            <input name="Images_id" type="number" readonly value="<?php echo $imageId ?>">
            Image Name:
            <label title="Image Name:"/>
            <input name="Images_imageName" type="text" readonly value="<?php echo $_POST['Images_imageName'] ?>"> <br/>
            Image Url:
            <label title="Image Url"/>
            <input name="Images_url" type="text" readonly value="<?php echo $_POST['Images_url'] ?>"> <br/>
            Content Name:
            <label title="Section Name:"/>
            <input name="RelatedText_sectionName" type="text" required maxlength="20" value=""> <br/>
            Text Content:
            <label title="Content"/>
            <input name="RelatedText_content" type="text" required value=""> <br/>
            <input type="submit" value="Add related text">
        </form>
        <?php
    } else {
        echo 'Sorry, there was a problem adding the image';
        ?>
        <a href="<?php echo getCMSPageUrlFromPageId($_SESSION['pageId'])?>">
            Go back to <?php echo getPageNameFromPageId($_SESSION['pageId']); ?> page
        </a>
        <?php
    }
}

/**
 * addText inserts a new row into the Text table detailing a section of text.
 *
 * @param string $sectionName The label for that piece of text.
 * @param int $pageId Which page the piece of text is for.
 * @param string $content The text to add.
 *
 * @return bool Success or failure.
 */
function addText(string $sectionName, int $pageId, string $content) : bool {
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsiteDb', 'root', '');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO `Text` (`sectionName`, `pageId`, `content`) VALUES (:sectionName, :pageId, :content);";
        $query = $db->prepare($sql);

        $query->bindParam(':sectionName', $sectionName, PDO::PARAM_STR, 20);
        $query->bindParam(':pageId', $pageId, PDO::PARAM_INT, 11);
        $query->bindParam(':content', $content, PDO::PARAM_STR);

        $query->execute();
        $result = 1;
    } catch (Exception $e) {
        echo $e->getMessage();
        $result = 0;
    }

    return $result;
}


/**
 * addImage inserts a new row into the Images table detailing a section of text.
 *
 * @param string $imageName The label for that image.
 * @param int $pageId Which page the image is for.
 * @param string $url The location of the image.
 *
 * @return int The id of the image that has been added if success, or 0 if failure.
 */
function addImage(string $imageName, int $pageId, string $url) : int {
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsiteDb', 'root', '');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO `Images` (`imageName`, `pageId`, `url`) VALUES (:imageName, :pageId, :url);";
        $query = $db->prepare($sql);

        $query->bindParam(':imageName', $imageName, PDO::PARAM_STR, 20);
        $query->bindParam(':pageId', $pageId, PDO::PARAM_INT, 11);
        $query->bindParam(':url', $url, PDO::PARAM_STR);

        $query->execute();

        $sql = "SELECT LAST_INSERT_ID();";
        $query = $db->prepare($sql);

        $query->execute();
        $returnedArray = $query->fetch();
        $result = $returnedArray['LAST_INSERT_ID()'];
    } catch (Exception $e) {
        echo $e->getMessage();
        $result = 0;
    }

    return $result;
}
?>
</body>
</html>


