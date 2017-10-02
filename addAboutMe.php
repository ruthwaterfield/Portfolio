<?php


if(isset($_POST['content_name'], $_POST['text_content'])) {
    echo addTextContentsData($_POST['content_name'], $_POST['text_content']);
}
else {
    echo "error!";
}

/**
 * addTextContentsData adds given data as a new record in the TextContents table
 *
 * @param string $contentName The desired name for the content
 * @param string $textContent The desired text
 *
 * @return string Feedback for success or errors
 */
function addTextContentsData(string $contentName, string $textContent) : string {
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsitePrototypeDb', 'root', '');
        $db ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO `TextContents` (`content_name`, `text_content`) VALUES (:contentName, :textContent);";
        $query = $db -> prepare($sql);

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
