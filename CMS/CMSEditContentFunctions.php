<?php
/**
 * editContentWithId updates content item given the id of the item
 *
 * @param string $textLabel The textLabel to enter
 * @param string $textContent The textContent to enter
 * @param string $imageLabel The imageLabel to enter (if an image has been appropriately added)
 * @param string $imageLocationThe imageLocation to enter (if an image has been appropriately added)
 * @param int $id The id of the content item to edit
 *
 * @return bool Success (1) or failure (0)
 */
function editContentWithId(string $textLabel, string $textContent, string $imageLabel, string $imageLocation, int $id) : bool {
    $result = 0;
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsiteContentDb', 'root', '');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(imageShouldBeAdded($imageLabel, $imageLocation)) {
            $sql = "UPDATE `Content` SET `textLabel` = :textLabel, `textContent` = :textContent, `imageLabel` = :imageLabel, `imageLocation` = :imageLocation WHERE `id` = :id;";
            $query = $db->prepare($sql);

            $query->bindParam(':textLabel', $textLabel, PDO::PARAM_STR, 20);
            $query->bindParam(':textContent', $textContent, PDO::PARAM_STR);
            $query->bindParam(':imageLabel', $imageLabel, PDO::PARAM_STR, 20);
            $query->bindParam(':imageLocation', $imageLocation, PDO::PARAM_STR, 30);
            $query->bindParam(':id', $id, PDO::PARAM_INT, 11);
        } else {
            $sql = "UPDATE `Content` SET `textLabel` = :textLabel, `textContent` = :textContent WHERE `id` = :id;";
            $query = $db->prepare($sql);

            $query->bindParam(':textLabel', $textLabel, PDO::PARAM_STR, 20);
            $query->bindParam(':textContent', $textContent, PDO::PARAM_STR);
            $query->bindParam(':id', $id, PDO::PARAM_INT, 11);
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
 * If either of the imageLabel or imageLocation has been left blank, no image should be added
 *
 * @param string $imageLabel The imageLabel data entered
 * @param string $imageLocation The imageLocation data entered
 *
 * @return bool image should be added (1), or image should not be added (0)
 */
function imageShouldBeIncluded(string $imageLabel, string $imageLocation) : bool {
    $result = 1;
    if($imageLabel == "" || $imageLocation == "") {
        $result = 0;
    }
    return $result;
}

/**
 * markContentAsDeleted sets the deleted flag on a content item to mark it as deleted content.
 *
 * @param int $id The id of the item to be deleted.
 *
 * @return bool Success(1) or failure (0) of the procedure.
 */
function markContentAsDeleted(int $id) : bool {
    $result = 0;
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=WebsiteContentDb', 'root', '');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE `Content` SET `deleted` = 0 WHERE `id` = :id;";
        $query = $db->prepare($sql);

        $query->bindParam(':id', $id, PDO::PARAM_INT, 11);
        $query->execute();

        $result = 1;
    } catch (Exception $e) {
        echo $e->getMessage();
        $result = 0;
    }

    return $result;
}
?>