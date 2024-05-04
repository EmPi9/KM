<?
include_once '../models/request.php';

$id_request = $_POST['id_request'];
$status_request = "3";
$signed_request = $_FILES['signed_request'];

$signed_request = uploadDocument_Sign($_FILES['signed_request']);

loadSign($status_request, $id_request, $signed_request);

function loadSign($status_request, $id_request, $signed_request){
    $pdo = Connection::get()->connect();
    $sql = 'UPDATE public.requests
    SET status_request=:status_request, signed_request=:signed_request
    WHERE id_request=:id_request;';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":signed_request", $signed_request);
    $statement->bindValue(":status_request", $status_request);
    $statement->bindValue(":id_request", $id_request);
    $statement->execute();
}
 
function uploadDocument_Sign($document_sign) {
    $extension = pathinfo($document_sign['name'], PATHINFO_EXTENSION); // узнаем расширение файла
    $signed_request = uniqid() . "." . $extension; // делаем уникальное название файла и добавляем в конец расширение
    $uploadPath = "./../assets/documents/" . $signed_request; // полный путь к файлу
    move_uploaded_file($document_sign['tmp_name'], $uploadPath); // перемещаем файл в папку для документов
    return $signed_request; // возвращаем только имя файла
}

header('Location: ../src/request_return.php');