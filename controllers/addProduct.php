<?php
include_once '../models/product.php';

$name_product = $_POST['name_product'];
$desc_product = $_POST['desc_product'];
$cost_product = $_POST['cost_product'];
$type_product= $_POST['type_product'];
$img_product = $_FILES['img_product'];
// $date = time(); //timestamp
$filename = uploadImage($img_product, $filename);
addProduct($cost_product, $name_product, $type_product, $desc_product, $filename);

// header("Location: ./../news.php?id=$id_posts");
header('Location: ../src/admin_products.php');
//header('Location: ./../prod-store.php');