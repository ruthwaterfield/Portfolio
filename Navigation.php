<?php
/**
 * getPageUrlFromPageId gets the url for the page specified by id
 *
 * @param int $pageId The id of the page
 *
 * @return string The url for the page
 */
function getPageUrlFromPageId(int $pageId) : string {
    $result = 'index.php';
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsiteDb', 'root', '');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
 * getPageUrlFromPageName gets the url for the page specified by name
 *
 * @param string $pageName The name of the page
 *
 * @return string The url for the page
 */
function getPageUrlFromPageName(string $pageName) : string {
    $result = 'index.php';
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsiteDb', 'root', '');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `url` FROM `Pages` WHERE `name` = :pageName;";
        $query = $db->prepare($sql);

        $query->bindParam(':pageName', $pageName, PDO::PARAM_STR, 11);

        $query->execute();
        $returnedArray = $query->fetch();

        $result = $returnedArray["url"];
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    return $result;
}

?>