<?php


/**
 * getContentName returns the first text_content field in the TextContents table of the database
 *
 * @return string the text content
 */
function getTextContent() : string {
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsitePrototypeDb', 'root', '');
        $db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `text_content` FROM `TextContents` LIMIT 1;";
        $query = $db -> prepare($sql);

        $query->execute();
        $returnedArray = $query->fetch();
        $result =$returnedArray["text_content"];
    }
    catch(Exception $e) {
        $result = $e->getMessage();
    }

    return $result;
}



/**
 * getContentName returns the first text_content field in the TextContents table of the database
 *
 * @return string the text content
 */
function getContentName() : string {
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsitePrototypeDb', 'root', '');
        $db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `content_name` FROM `TextContents` LIMIT 1;";
        $query = $db -> prepare($sql);

        $query->execute();
        $returnedArray = $query->fetch();
        $result =$returnedArray["content_name"];
    }
    catch(Exception $e) {
        $result = $e->getMessage();
    }

    return $result;
}



//$sql = "INSERT INTO `adults` (`name`, `DOB`, `gender`) VALUES (:name, :DOB, :gender);";
//$query = $db -> prepare($sql);
//
//if(isset($_POST['name']) && $_POST['DOB'] && $_POST['gender']) {
//    $outputString = 'Added an adult with ';
//    $query->bindParam(':name', $_POST['name'], PDO::PARAM_STR, 255);
//    $outputString .= ' name: ' . $_POST['name'];
//    $query->bindParam(':DOB', $_POST['DOB'], PDO::PARAM_STR, 10);
//    $outputString .= ', Date of Birth: ' . $_POST['DOB'];
//    if($_POST['gender']=='m' || $_POST['gender']=='f') {
//        $query->bindParam(':gender', $_POST['gender'], PDO::PARAM_STR, 1);
//        $outputString .= ', Gender: ' . $_POST['gender'];
//    }
//    else {
//        $gender = NULL;
//        $query->bindParam(':gender', $gender,PDO::PARAM_NULL);
//    }
//    try {
//        $query->execute();
//        echo $outputString;
//    }
//    catch(Exception $e) {
//        echo $e->getMessage();
//    }
//
//}

?>