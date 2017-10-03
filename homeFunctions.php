<?php
session_start();

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

