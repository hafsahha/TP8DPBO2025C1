<?php
include_once("controllers/ClubMember.controller.php");

$controller = new ClubMemberController();

if (isset($_POST['add'])) {
    $controller->add();
} else if (!empty($_GET['hapus_s']) && !empty($_GET['hapus_c'])) {
    $controller->delete($_GET['hapus_s'], $_GET['hapus_c']);
} else {
    $controller->index();
}
?>
