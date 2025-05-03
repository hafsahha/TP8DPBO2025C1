<?php
include_once("conf.php");
include_once("models/DB.class.php");
include_once("controllers/Club.controller.php");

$club = new ClubController();

if (isset($_POST['add'])) {
    $club->add();
} else if (isset($_POST['update']) && isset($_GET['id_edit'])) {
    $club->update($_GET['id_edit']);
} else if (!empty($_GET['id_hapus'])) {
    $club->delete($_GET['id_hapus']);
} else if (!empty($_GET['id_edit'])) {
    $club->edit($_GET['id_edit']);
} else {
    $club->index();
}
