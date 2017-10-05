<?php

/**
 * getContentForPage returns an array of all the contents for a specified page.
 *
 * @param int $pageId The id of the page.
 *
 * @return array The contents for the page (each row is an item of content)
 */
function getContentForPage(int $pageId) : array {
    $result = [];
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsiteContentDb', 'root', '');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `id`, `textLabel`, `textContent`, `imageLabel`, `imageLocation` FROM `Content` WHERE `deleted` = 0 AND `pageId` = :pageId ORDER BY `id`;";
        $query = $db->prepare($sql);

        $query->bindParam(':pageId', $pageId, PDO::PARAM_INT, 11);
        $query->execute();
        $result = $query->fetchAll();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return $result;
}

/**
 * contentHasImage tests an item of content and determines whether it has an image specified.
 *
 * @param $imageLabel The field of the database that would contain the image label.
 * @param $imageLocation The field of the database that would contain the image Location.
 *
 * @return bool 1 if the content item has an image, 0 if not.
 */
function contentHasImage($imageLabel, $imageLocation) : bool {
    $result = 0;
    if($imageLabel != NULL && $imageLocation != NULL) {
        if(is_string($imageLabel) && is_string($imageLocation)) {
            $result = 1;
        }
    }
    return $result;
}x

/**
 * getContentWithId find the content from the database with a specified id
 *
 * @param int $id The id of the content to be selected
 *
 * @return array The content data
 */
function getContentWithId(int $id) : array {
    $result = [];
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsiteContentDb', 'root', '');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `id`, `textLabel`, `textContent`, `imageLabel`, `imageLocation` FROM `Content` WHERE `id` = :id;";
        $query = $db->prepare($sql);

        $query->bindParam(':id', $id, PDO::PARAM_INT, 11);

        $query->execute();
        $result = $query->fetch();
//        var_dump($result);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return $result;
}
?>