<?php
include_once("conf.php");
include_once("models/DB.class.php");
include_once("controllers/ClubEvent.controller.php");

$controller = new ClubEventController();

if (isset($_POST['add'])) {
    $controller->add();
} else if (isset($_POST['update']) && isset($_GET['id_edit'])) {
    $controller->update($_GET['id_edit']);
} else if (!empty($_GET['id_hapus'])) {
    $controller->delete($_GET['id_hapus']);
} else if (!empty($_GET['id_edit'])) {
    $controller->edit($_GET['id_edit']);
} else {
    $controller->index();
}
?>
