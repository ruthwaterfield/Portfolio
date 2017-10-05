<?php
require_once ('CMSDatabaseFunctions.php');

/**
 * getPages returns an array containing the names and ids of all pages in the website
 *
 * @return array each row has a name field and an id field
 */
function getPages() : array {
    $result = [];
    try {
        $db = createPDO();

        $sql = "SELECT `id`, `name` FROM `Pages` ORDER BY `id`;";
        $query = $db->prepare($sql);

        $query->execute();
        $result = $query->fetchAll();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return $result;
}

/**
 * getPageNameFromPageId gets the page name give the page id
 *
 * @param int $pageId The id of the page
 *
 * @return string The name of the page
 */
function getPageNameFromPageId(int $pageId) : string {
    $result = 'None selected';
    try {
        $db = createPDO();

        $sql = "SELECT `name` FROM `Pages` WHERE `id` = :pageId;";
        $query = $db->prepare($sql);

        $query->bindParam(':pageId', $pageId, PDO::PARAM_INT, 11);

        $query->execute();
        $returnedArray = $query->fetch();

        $result = $returnedArray["name"];
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    return $result;
}

?>