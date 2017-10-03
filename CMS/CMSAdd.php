<!DOCTYPE html>
<html>
<head>
    <title> CMS Home Add </title>
</head>

<body>

<?php
if(isset($_POST['Text.sectionName']) && isset($_GET['pageId']) && isset($_POST['Text.content'])) {
    if (addText($_POST['Text.sectionName'], $_GET['pageId'], $_POST['Text.content'])) {
        header('Location: CMSHome.php');
    } else {
        echo 'Sorry, there was a problem adding the text'; ?>
        <a href="CMSHome.php">
            Go back to Home
        </a>
<?php
    }
}

if(isset($_POST['Images.imageName']) && isset($_GET['pageId']) && isset($_POST['Images.url'])) {
$imageId = addImage($_POST['Images.imageName'], $_GET['pageId'], $_POST['Images.url']);
if ($imageId > 0) { ?>
<!--    <form name="AddText" method="POST" action="CMSAddRelatedText.php">-->
<!--        Image Id:-->
<!--        <label title="ImageId:"/>-->
<!--        <!--        <input name="Images.Id" type="hidden">-->-->
<!--        <input name="Images.Id" type="number" readonly value="--><?php //echo $imageId ?><!--">-->
<!--        Image Name:-->
<!--        <label title="Image Name:"/>-->
<!--        <input name="Images.imageName" type="text" readonly value="--><?php //echo $_POST['Images.imageName'] ?><!--"> <br/>-->
<!--        Image Url:-->
<!--        <label title="Image Url"/>-->
<!--        <input name="Images.url" type="text" readonly value="--><?php //echo $_POST['Images.url'] ?><!--"> <br/>-->
<!--        Content Name:-->
<!--        <label title="Section Name:"/>-->
<!--        <input name="Text.sectionName" type="text" required maxlength="20" value=""> <br/>-->
<!--        Text Content:-->
<!--        <label title="Content"/>-->
<!--        <input name="Text.content" type="text" required value=""> <br/>-->
<!--        <input type="submit" value="Add Related Text">-->
<!--    </form>-->
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


function addImage(string $imageName, int $pageId, string $url) : int {
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsiteDb', 'root', '');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO `Images` (`imageName`, `pageId`, `url`) VALUES (:imageName, :pageId, :url);";
        $query = $db->prepare($sql);

        $query->bindParam(':sectionName', $imageName, PDO::PARAM_STR, 20);
        $query->bindParam(':pageId', $pageId, PDO::PARAM_INT, 11);
        $query->bindParam(':content', $url, PDO::PARAM_STR);

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