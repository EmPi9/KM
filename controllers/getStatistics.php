<?php
include_once '../models/request.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $type = $data['type'];
    $startYear = $data['startYear'];
    $endYear = $data['endYear'] ?? $startYear;

    if ($type === 'requests') {
        $statistics = getRequestsStatistics($startYear, $endYear);
    } else {
        $statistics = getResumesStatistics($startYear, $endYear);
    }

    echo json_encode($statistics);
}
?>