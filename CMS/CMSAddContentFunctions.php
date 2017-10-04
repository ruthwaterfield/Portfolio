<?php

/**
 * addContentToPage enters a new content item into the database
 *
 * @param string $textLabel The textLabel to enter
 * @param string $textContent The textContent to enter
 * @param string $imageLabel The imageLabel to enter (if an image has been appropriately added)
 * @param string $imageUrl The imageUrl to enter (if an image has been appropriately added)
 * @param int $pageId The page to add the content to
 *
 * @return bool Success (1) or failure (0)
 */
function addContentToPage(string $textLabel, string $textContent, string $imageLabel, string $imageUrl, int $pageId) : bool {
    $result = 0;
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsiteContentDb', 'root', '');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(imageShouldBeAdded($imageLabel, $imageUrl)) {
            $sql = "INSERT INTO `Content` (`textLabel`, `textContent`, `imageLabel`, `imageUrl`, `pageId`) VALUES (:textLabel, :textContent, :imageLabel, :imageUrl, :pageId);";
            $query = $db->prepare($sql);

            $query->bindParam(':textLabel', $textLabel, PDO::PARAM_STR, 20);
            $query->bindParam(':textContent', $textContent, PDO::PARAM_STR);
            $query->bindParam(':imageLabel', $imageLabel, PDO::PARAM_STR, 20);
            $query->bindParam(':imageUrl', $imageUrl, PDO::PARAM_STR, 30);
            $query->bindParam(':pageId', $pageId, PDO::PARAM_INT, 11);
        }
        else {
            $sql = "INSERT INTO `Content` (`textLabel`, `textContent`, `pageId`) VALUES (:textLabel, :textContent, :pageId);";
            $query = $db->prepare($sql);

            $query->bindParam(':textLabel', $textLabel, PDO::PARAM_STR, 20);
            $query->bindParam(':textContent', $textContent, PDO::PARAM_STR);
            $query->bindParam(':pageId', $pageId, PDO::PARAM_INT, 11);
        }

        $query->execute();
        $result = 1;
    } catch (Exception $e) {
        echo $e->getMessage();
        $result = 0;
    }

    return $result;
}

/**
 * imageShouldBeAdded checks the image data that has been added and decided if a valid image has been added or not
 * If either of the imageLabel or imageUrl has been left blank, no image should be added
 *
 * @param string $imageLabel The imageLabel data entered
 * @param string $imageUrl The imageUrl data entered
 *
 * @return bool image should be added (1), or image should not be added (0)
 */
function imageShouldBeAdded(string $imageLabel, string $imageUrl) : bool {
    $result = 1;
    if($imageLabel == "" || $imageUrl == "") {
        $result = 0;
    }
    return $result;
}

?>