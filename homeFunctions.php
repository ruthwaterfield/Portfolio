<?php
session_start();

/**
 * getPageText looks up text using the section name and page id and returns the content as long as it has not been deleted.
 *
 * @param string $sectionName The name to look for. (unique)
 *
 * @return string The text to be output to the webpage (if failure it is blank)
 */
function getPageText(string $sectionName) : string {
    $result = '';
    try {
        if(isset($_SESSION['pageId'])) {
            $pageId = $_SESSION['pageId'];

            $db = new PDO('mysql:host=127.0.0.1;dbname=WebsiteDb', 'root', '');
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT `content`, `deleted` FROM `Text` WHERE `sectionName` = :sectionName AND `pageId` = :pageId;";
            $query = $db->prepare($sql);

            $query->bindParam(':sectionName', $sectionName, PDO::PARAM_STR, 20);
            $query->bindParam(':pageId', $pageId, PDO::PARAM_INT, 11);

            $query->execute();
            $returnedArray = $query->fetch();

            if($returnedArray["deleted"]==0) {
                $result = $returnedArray["content"];
            }
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    return $result;
}

/**
 * getPageImage looks up an image url using the image name and page id and returns the url as long as it has not been deleted.
 *
 * @param string $imageName The name to look for. (unique)
 *
 * @return string The image url to use.
 */
function getPageImage(string $imageName) : string {
    $result = '';
    try {
        if(isset($_SESSION['pageId'])) {
            $pageId = $_SESSION['pageId'];

            $db = new PDO('mysql:host=127.0.0.1;dbname=WebsiteDb', 'root', '');
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT `url`, `deleted` FROM `Images` WHERE `imageName` = :imageName AND `pageId` = :pageId;";
            $query = $db->prepare($sql);

            $query->bindParam(':imageName', $imageName, PDO::PARAM_STR, 20);
            $query->bindParam(':pageId', $pageId, PDO::PARAM_INT, 11);

            $query->execute();
            $returnedArray = $query->fetch();

            if($returnedArray["deleted"]==0) {
                $result = $returnedArray["url"];
            }
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    return $result;
}