<?php


if(isset($_POST['id'], $_POST['content_name'], $_POST['text_content'])) {
    echo updateTextContentsData($_POST['id'], $_POST['content_name'], $_POST['text_content']);
}
else {
    echo "error!";
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

/**
 * updateTextContentsData updates the row with the selected id
 *
 * @param int $recordId The selected record id
 * @param string $contentName The desired name for the content
 * @param string $textContent The desired text
 *
 * @return string Feedback for success or errors
 */
function updateTextContentsData(int $recordId, string $contentName, string $textContent) : string {
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsitePrototypeDb', 'root', '');
        $db ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE `TextContents` SET `content_name`= :contentName, `text_content`= :textContent WHERE `id`= :id;";
        $query = $db -> prepare($sql);

        $query->bindParam(':id', $recordId, PDO::PARAM_INT);
        $query->bindParam(':contentName', $contentName, PDO::PARAM_STR, 20);
        $query->bindParam(':textContent', $textContent, PDO::PARAM_STR);

        $query->execute();
        $result = 'Success!';
    }
    catch (Exception $e) {
        $result = $e->getMessage();
    }

    return $result;
}









//$sql = "INSERT INTO `adults` (`name`, `DOB`, `gender`) VALUES (:name, :DOB, :gender);";
//$query = $db -> prepare($sql);
//
//if(isset($_POST['name']) && $_POST['DOB'] && $_POST['gender']) {
//    $outputString = 'Added an adult with ';
//    $query->bindParam(':name', $_POST['name'], PDO::PARAM_STR, 255);
//    $outputString .= ' name: ' . $_POST['name'];
//    $query->bindParam(':DOB', $_POST['DOB'], PDO::PARAM_STR, 10);
//    $outputString .= ', Date of Birth: ' . $_POST['DOB'];
//    if($_POST['gender']=='m' || $_POST['gender']=='f') {
//        $query->bindParam(':gender', $_POST['gender'], PDO::PARAM_STR, 1);
//        $outputString .= ', Gender: ' . $_POST['gender'];
//    }
//    else {
//        $gender = NULL;
//        $query->bindParam(':gender', $gender,PDO::PARAM_NULL);
//    }
//    try {
//        $query->execute();
//        echo $outputString;
//    }
//    catch(Exception $e) {
//        echo $e->getMessage();
//    }
//
//}

?>