<?php

function getContentForPage(int $pageId) : array {
    $result = [];
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsiteContentDb', 'root', '');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `id`, `textLabel`, `textContent`, `imageLabel`, `imageUrl` FROM `Content` WHERE `deleted` = 0 ORDER BY `id`;";
        $query = $db->prepare($sql);

        $query->execute();
        $result = $query->fetchAll();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return $result;
}

function contentHasImage($imageLabel, $imageUrl) : bool {
    $result = 0;
    if($imageLabel != NULL || $imageUrl != NULL) {
        if(is_string($imageLabel) && is_string($imageUrl)) {
            $result = 1;
        }
    }
    return $result;
}

?>