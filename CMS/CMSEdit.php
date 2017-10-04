<?php require_once ('CMSNavigation.php');

session_start();
if(isset($_SESSION['pageId'])) {
    echo 'You are working on the ' . getPageNameFromPageId($_SESSION['pageId']) . ' page.<br/>';
}
$id = $_GET['id'];
echo $id;

?>