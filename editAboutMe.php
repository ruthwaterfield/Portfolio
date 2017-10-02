<?php


if(isset($_POST['id'], $_POST['content_name'], $_POST['text_content'])) {
    echo updateTextContentsData($_POST['id'], $_POST['content_name'], $_POST['text_content']);
}

if(isset($_POST['deleted'])) {
    echo markRecordAsDeleted($_POST['deleted']);
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



function markRecordAsDeleted() {

}






?>