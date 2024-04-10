<? session_start();
include '../models/authentication.php';
include '../models/connection.php';
$pdo = Connection::get()->connect();
$auth = new Authentication($pdo);
$user = $auth->getCurrentUser();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $websiteTitle ?></title>
    <link rel="stylesheet" href="../src/output.css">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="../assets/styles/animation.css">
    <? if ($websiteTitle = 'Вакансии'): ?>
        
    <?php endif; ?>  

    <? if ($websiteTitle = 'Реализованные проекты'): ?>
        
    <?php endif; ?>  
        
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="../assets/js/init-alpine.js"></script>
    <script src="../assets/js/focus-trap.js" defer></script>
</head>
<body class="font-inter">
  
<!-- Header -->
<header class="text-gray-900 body-font p-6">
    <div class="max-w-[1820px] mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <a href="./index.php" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
        <img src="../assets/img/logo 1.png" alt="">
      </a>
      <div class="md:ml-auto md:mr-auto flex flex-wrap mb-6 items-center text-base justify-center underline-animation text-gray-900 hover:text-gray-700 relative transition duration-300 ease-in-out md:my-2">
        <a href="./index.php" class="mr-5 uppercase font-bold cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">ГЛАВНАЯ</a>
        <!-- <a href="./products.php" class="mr-5 uppercase font-bold cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">ПРОДУКТЫ</a> -->
        <a href="./projects.php" class="mr-5 uppercase font-bold cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">ПРОЕКТЫ</a>
        <a href="./contact.php" class="mr-5 uppercase font-bold cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">КОНТАКТЫ</a>
        <a href="./vacancy.php" class="mr-5 uppercase font-bold cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">ВАКНСИИ</a>
        <?
        if (!isset($_SESSION['user'])): ?>
         <?else: ?>
          <a href="../src/profile.php" class="mr-5 uppercase font-bold cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">ЛИЧНЫЙ КАБИНЕТ</a>
        <?php endif; ?>  

        <? if ($user['admin'] == 1): ?>
        <a href="../src/admin_dashboard.php" class="mr-5 uppercase font-bold cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">Админ-панель</a>       
        <? endif; ?>
      </div>

      <?
        if (!isset($_SESSION['user'])): ?>
        <a class="">
          <a href="./registration.php" class="bg-[#392D88] text-white font-bold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">Регистрация</a>
        </a>
        <?else: ?>
        <a class="">
          <a href="./send_request.php" class="bg-[#392D88] text-white font-bold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">Оставить заявку</a>
        </a>
        <?php endif; ?>  
      
    </div>
  </header>