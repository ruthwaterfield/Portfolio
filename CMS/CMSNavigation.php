<?php
/**
 * getCMSPageUrlFromPageId gets the url for the CMS page for the page currently being worked on
 *
 * @param int $pageId The id of the page being worked on
 *
 * @return string The url for the CMS page
 */
function getCMSPageUrlFromPageId(int $pageId) : string {
    $result = 'CMS';
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsiteDb', 'root', '');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `CMSUrl` FROM `Pages` WHERE `id` = :pageId;";
        $query = $db->prepare($sql);

        $query->bindParam(':pageId', $pageId, PDO::PARAM_INT, 11);

        $query->execute();
        $returnedArray = $query->fetch();

        $result = $returnedArray["CMSUrl"];
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    return $result;
}

/**
* getCMSPageUrlFromPageName gets the url for the CMS page for the page currently being worked on
*
 * @param int $pageId The id of the page being worked on
*
 * @return string The url for the CMS page
*/
function getCMSPageUrlFromPageName(string $pageName) : string {
    $result = 'CMS';
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsiteDb', 'root', '');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `CMSUrl` FROM `Pages` WHERE `name` = :pageName;";
        $query = $db->prepare($sql);

        $query->bindParam(':pageName', $pageName, PDO::PARAM_STR, 11);

        $query->execute();
        $returnedArray = $query->fetch();

        $result = $returnedArray["CMSUrl"];
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    return $result;
}

?>