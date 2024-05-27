<?php
include_once '../models/kanban.php';
 
$task_kanban = $_POST['task_kanban'];
$id_request = $_POST['id_request'];
$status_kanban = $_POST['status_kanban'];


addKanban($task_kanban, $id_request, $status_kanban);

header('Location: ../src/admin_request_details.php?id_request='.$id_request);
