<?php
session_start();
include_once 'connection.php';
$newFilename = uploadImage($_FILES['image'],$filename);

function uploadImage($image) {
    $extension = pathinfo($image['name'], PATHINFO_EXTENSION); // узнаем расширение файла
    $filename = uniqid() . "." . $extension; // делаем уникальное название файла и добавляем в конец расширение
    move_uploaded_file($image['tmp_name'], "./../assets/img/" . $filename);
    return $filename;
}

function search($text) {
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    $pdo = Connection::get()->connect();
    $sql = "SELECT id_product, name_product FROM public.products WHERE name_product ILIKE '%$text%'";
    // $sql = "SELECT id, title, content FROM public.posts WHERE title ILIKE '%$text%' OR content ILIKE '%$text%'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $found = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $found;
}

function addProduct($cost_product, $name_product, $type_product, $desc_product, $img_product) {
    $pdo = Connection::get()->connect();
    $sql = 'INSERT INTO public.products (cost_product, name_product, type_product, desc_product, img_product) VALUES( :cost_product, :name_product, :type_product, :desc_product, :img_product)';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":cost_product", $cost_product);
    $statement->bindValue(":name_product", $name_product);
    $statement->bindValue(":type_product",  $type_product);
    $statement->bindValue(":desc_product",  $desc_product);
    $statement->bindValue(":img_product", $img_product);
    $statement->execute();
}

function getProducts() {
    $pdo = Connection::get()->connect();
    $sql = 'SELECT * FROM public.products';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}

function getProduct($id_product){
    $pdo = Connection::get()->connect();
    $sql = 'SELECT * FROM public.products WHERE id_product = :id_product';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id_product', intval($id_product));
    $statement->execute();
    $post = $statement->fetch(PDO::FETCH_ASSOC);
    return $post;
}

function delProduct($id_product){
    $pdo = Connection::get()->connect();
    $sql = 'DELETE FROM public.products WHERE id_product = :id_product';
    $statement = $pdo->prepare($sql);
    $statement->execute([$id_product]);
    return true;
}