<?php
include_once './../models/kanban.php';


$employee_kanban= $_POST['employee_kanban'];
$status_kanban = $_POST['status_kanban'];
$id = $_POST['id'];
$id_request = $_POST['id_request'];
$id_kanban= $_POST['id_kanban'];


takeTask($employee_kanban, $status_kanban, $id, $id_request, $id_kanban);

header('Location: ../src/admin_request_details.php?id_request='.$id_request);