<!DOCTYPE html>
<html>
<head>
    <title> CMS Add </title>
</head>

<body>

<?php
session_start();

echo $_SESSION['pageId'];

if(isset($_POST['Text_sectionName']) && isset($_SESSION['pageId']) && isset($_POST['Text_content'])) {
    if (addText($_POST['Text_sectionName'], $_SESSION['pageId'], $_POST['Text_content'])) {
        header('Location: CMSHome.php');
    } else {
        echo 'Sorry, there was a problem adding the text'; ?>
        <a href="CMSHome.php">
            Go back to Home
        </a>
<?php
    }
}

if(isset($_POST['Images_imageName']) && isset($_SESSION['pageId']) && isset($_POST['Images_url'])) {
    $imageId = addImage($_POST['Images_imageName'], $_SESSION['pageId'], $_POST['Images_url']);
    if ($imageId > 0) { ?>
        <form name="AddText" method="POST" action="CMSAddRelatedText.php">
            Image Id:
            <label title="Image Id:"/>
            <!--        <input name="Images.Id" type="hidden">-->
            <input name="Images_Id" type="number" readonly value="<?php echo $imageId ?>">
            Image Name:
            <label title="Image Name:"/>
            <input name="Images_imageName" type="text" readonly value="<?php echo $_POST['Images_imageName'] ?>"> <br/>
            Image Url:
            <label title="Image Url"/>
            <input name="Images_url" type="text" readonly value="<?php echo $_POST['Images_url'] ?>"> <br/>
            Content Name:
            <label title="Section Name:"/>
            <input name="Text_sectionName" type="text" required maxlength="20" value=""> <br/>
            Text Content:
            <label title="Content"/>
            <input name="Text_content" type="text" required value=""> <br/>
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

?>
</body>
</html>


