<?php require '../layouts/header.php'; ?>
<?php include_once '../models/product.php';
//$productCount = !empty($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] : 0;
$product = getProduct($_GET['id_product']);
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Компьютерный Мир</title>
    <link rel="stylesheet" href="../src/output.css">

</head>
<body class="font-inter">

<header class="text-gray-900 body-font p-6">
    <div class="max-w-[1820px] mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <a href="./index.html" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
        <img src="../assets/img/logo 1.png" alt="">
      </a>
      <div class="md:ml-auto md:mr-auto flex flex-wrap mb-6 items-center text-base justify-center underline-animation text-gray-900 hover:text-gray-700 relative transition duration-300 ease-in-out md:my-2">
        <a href="./index.html" class="mr-5 uppercase font-bold cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">ГЛАВНАЯ</a>
        <a href="./products.html" class="mr-5 uppercase font-bold cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">ПРОДУКТЫ</a>
        <a href="./projects.html" class="mr-5 uppercase font-bold cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">ПРОЕКТЫ</a>
        <a href="./contact.html" class="mr-5 uppercase font-bold cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">КОНТАКТЫ</a>
        <a href="./vacancy.html" class="mr-5 uppercase font-bold cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">ВАКНСИИ</a>
      </div>

        <a href="./send_request.html" class="bg-[#392D88] text-white font-bold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">Оставить заявку</a>

    </div>
  </header>
     -->

  <div class="min-w-screen min-h-screen flex items-center p-5 lg:p-10 overflow-hidden relative">
    <div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
        <div class="md:flex items-center -mx-10">
            <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
            <input name=<?=$product['id_product']?> type="hidden">
                <div class="relative">
                    <img src="../assets/img/<?= $product['img_product'] ?>" class="w-full relative z-10" alt="">
                    <div class="border-4 border-yellow-200 absolute top-10 bottom-10 left-10 right-10 z-0"></div>
                </div>
            </div>
            <div class="w-full md:w-1/2 px-10">
                <div class="mb-10">
                    <h1 class="font-bold uppercase text-4xl mb-20"><?= $product['name_product']?></h1>
                    <p class="text-xl font-normal mb-10">Тип продукта: <?= $product['type_product'] ?></p>
                    <p class="text-xl font-normal mb-10">Цена: ₽ <?= $product['cost_product'] ?></p>
                    <p class="text-xl font-normal mb-10"><?= $product['desc_product'] ?></p>
                </div>
                <div>
                    <div class="flex justify-between">
                        <a href="../src/products.html" class="bg-[#392D88] text-white font-bold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">Купить</a>
                        <a href="../src/products.html" class="bg-[#392D88] text-white font-bold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700 ml-20">Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
  <footer class="text-gray-900 body-font p-6">
    <div class="max-w-[1820px] mx-auto flex flex-wrap justify-between p-5 flex-col md:flex-row items-center">
      <a class="flex flex-col w-96 title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
        <img src="../assets/img/logo 1.png" alt="">
        <p class="pt-2">
          Улучшим вашу текущую автоматизированную производственную систему или разработаем совершенно новую.
        </p>
      </a>
      <div class="md:ml-auto md:mr-auto flex flex-col flex-wrap gap-3 text-base justify-center underline-animation text-gray-900 hover:text-gray-700 relative transition duration-300 ease-in-out md:my-2">
        <a class="mr-5 uppercase font-medium text-[24px] text-left cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">ГЛАВНАЯ</a>
        <a class="mr-5 uppercase font-medium text-[24px] text-left cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">ПРОДУКТЫ</a>
        <a class="mr-5 uppercase font-medium text-[24px] text-left cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">ПРОЕКТЫ</a>
        <a class="mr-5 uppercase font-medium text-[24px] text-left cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">КОНТАКТЫ</a>
        <a class="mr-5 uppercase font-medium text-[24px] text-left cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">ВАКНСИИ</a>
      </div>
      <div class="md:ml-auto md:mr-auto flex flex-col flex-wrap gap-3 text-base justify-center underline-animation text-gray-900 hover:text-gray-700 relative transition duration-300 ease-in-out md:my-2"">
        <p class="text-[36px] font-medium pb-5"><span>Телефон</span> : <span class="text-black font-semibold">8 (8553) 312-668</span></p>
        <p class="text-[36px] font-medium pb-5"><span>Электронная почта:</span>  <span class="text-black font-semibold">info@tatkm.ru</span></p>
        <a href="./send_request.html" class="bg-[#392D88] text-white text-center font-bold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">Оставить заявку</a>
      </div>
    </div>
  </footer>

</body>