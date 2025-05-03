<?php
include_once("conf.php");
include_once("models/DB.class.php");
include_once("controllers/Student.controller.php");

$student = new StudentController();

if (isset($_POST['add'])) {
    $student->add();
} else if (isset($_POST['update']) && isset($_GET['id_edit'])) {
    $student->update($_GET['id_edit']);
} else if (!empty($_GET['id_hapus'])) {
    $student->delete($_GET['id_hapus']);
} else if (!empty($_GET['id_edit'])) {
    $student->edit($_GET['id_edit']);
} else {
    $student->index();
}
?>
