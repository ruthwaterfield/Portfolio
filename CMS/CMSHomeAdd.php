<!DOCTYPE html>
<html>
<head>
    <title> CMS Home Add </title>
</head>

<body>

<?php
if(isset($_POST['Text.sectionName']) && isset($_POST['Text.content'])) {
    if (addText()) {
        header('Location: CMSHome.php');
    } else {
        echo 'Sorry, there was a problem adding the text'; ?>
        <a href="CMSHome.php">
            Go back to Home
        </a>
<?php
    }
}

if(isset($_POST['Images.imageName']) && isset($_POST['Images.url'])) {
$imageId = addImage();
if ($imageId > 0) { ?>
    <form name="AddText" method="POST" action="CMSHomeAddRelatedText.php">
        Image Id:
        <label title="ImageId:"/>
        <!--        <input name="Images.Id" type="hidden">-->
        <input name="Images.Id" type="number" readonly value="<?php echo $imageId ?>">
        Image Name:
        <label title="Image Name:"/>
        <input name="Images.imageName" type="text" readonly value="<?php echo $_POST['Images.imageName'] ?>"> <br/>
        Image Url:
        <label title="Image Url"/>
        <input name="Images.url" type="text" readonly value="<?php echo $_POST['Images.url'] ?>"> <br/>
        Content Name:
        <label title="Section Name:"/>
        <input name="Text.sectionName" type="text" required maxlength="20" value=""> <br/>
        Text Content:
        <label title="Content"/>
        <input name="Text.content" type="text" required value=""> <br/>
        <input type="submit" value="Add Related Text">
    </form>
    <?php
} else {
echo 'Sorry, there was a problem adding the image';
?>
<a href="CMSHome.php">
    Go back to Home
</a>
<?php
}
}


/**
 * getData selects the desired field in the TextContents table
 *
 * @param int $recordId The selected record id
 * @param string $fieldName The desired column name
 *
 * @return string The data in string format
 */
function getTextContentsData(int $recordId, string $fieldName) : string {
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsitePrototypeDb', 'root', '');
        $db ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `id`, `content_name`, `text_content` FROM `TextContents` WHERE `id`=:id";
        $query = $db -> prepare($sql);

        $query->bindParam(':id', $recordId, PDO::PARAM_INT);

        $query->execute();
        $resultingArray = $query->fetchAll();

        $result = $resultingArray[0][$fieldName];
    }
    catch (Exception $e) {
        $result = $e->getMessage();
    }

    return $result;
}