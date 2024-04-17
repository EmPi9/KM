<?php require '../layouts/header.php'; ?>
<?php include_once '../models/project.php';
$projects = getProjects() ?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Компьютерный Мир</title>
    <link rel="stylesheet" href="../src/output.css">
    <link rel="stylesheet" href="../assets/styles/style.css">
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
      <a class="">
        <a href="./send_request.html" class="bg-[#392D88] text-white font-bold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">Оставить заявку</a>
      </a>
    </div>
  </header> -->

  <h1 class="text-center font-extrabold text-[40px]">Завершенные проекты</h1>

  <section class="text-gray-600 body-font">
      <div class="flex flex-wrap max-w-[1820px] mx-auto">

      <?php foreach ($projects as $project):?>
        <div class="p-4 md:w-1/3 max-h-12">
          <div class="h-full border-2 bg-[#392D88] border-black border-opacity-60 rounded-lg overflow-hidden">
            <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="../assets/img/<?= $project['img_project'] ?>" alt="blog">
            <div class="p-6">
              <h2 class="tracking-widest text-xs title-font font-medium text-white mb-1 uppercase"><?= $project['type_project']?></h2>
              <h1 class="title-font text-lg font-medium text-white mb-3"><?= $project['name_project']?></h1>
              <p class="leading-relaxed mb-5 text-white text-ellipsis overflow-hidden whitespace-no-wrap h-12"><?= $project['desc_project'] ?></p>
              <div class="flex items-center flex-wrap justify-center">
                <a href="./project_details.php?id_project=<?= $project['id_project']?>" class="bg-[#392D88] text-white font-semibold px-8 py-2 rounded-xl border-2 border-white hover:bg-white hover:text-[#392D88] transition-all duration-700">Подробнее
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach;?>
    </div>
    </section>
 

    

<!-- Footer -->
<?php require '../layouts/footer.php'; ?>