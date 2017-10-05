<?php
require_once ('CMS/CMSDatabaseFunctions.php');

/**
 * getPages returns an array containing the names, ids and urls of all pages in the website
 *
 * @return array each row has a name field and an id field
 */
function getPages(): array
{
    $result = [];
    try {
        $db = createPDO();

        $sql = "SELECT `id`, `name`, `url` FROM `Pages` ORDER BY `id`;";
        $query = $db->prepare($sql);

        $query->execute();
        $result = $query->fetchAll();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return $result;
}


/**
 * getPageUrlForPageId gets the url for the page specified by id
 *
 * @param int $pageId The id of the page
 *
 * @return string The url for the page
 */
function getPageUrlForPageId(int $pageId): string
{
    $result = 'index.php';
    try {
        $db = createPDO();

        $sql = "SELECT `url` FROM `Pages` WHERE `id` = :pageId;";
        $query = $db->prepare($sql);

        $query->bindParam(':pageId', $pageId, PDO::PARAM_INT, 11);

        $query->execute();
        $returnedArray = $query->fetch();

        $result = $returnedArray["url"];
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    return $result;
}

/**
 * getPageNameForPageId gets the page name given the page id
 *
 * @param int $pageId The id of the page
 *
 * @return string The name of the page
 */
function getPageNameForPageId(int $pageId): string
{
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