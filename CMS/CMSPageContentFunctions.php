<?php




//function getPageText(int $pageId) : array {
//    try {
//        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsiteDb', 'root', '');
//        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//        $sql = "INSERT INTO `Text` (`sectionName`, `pageId`, `content`) VALUES (:sectionName, :pageId, :content);";
//        $query = $db->prepare($sql);
//
//        $query->bindParam(':sectionName', $sectionName, PDO::PARAM_STR, 20);
//        $query->bindParam(':pageId', $pageId, PDO::PARAM_INT, 11);
//        $query->bindParam(':content', $content, PDO::PARAM_STR);
//
//        $query->execute();
//        $result = 1;
//    } catch (Exception $e) {
//        echo $e->getMessage();
//        $result = 0;
//    }
//
//    return $result;
//}

?>