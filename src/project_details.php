<?php require '../layouts/header.php'; ?>
<?php include_once '../models/project.php';
//$projectCount = !empty($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] : 0;
$project = getProject($_GET['id_project']);
$comments = getComments(); 
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
      <a href="./index.php" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
        <img src="../assets/img/logo 1.png" alt="">
      </a>
      <div class="md:ml-auto md:mr-auto flex flex-wrap mb-6 items-center text-base justify-center underline-animation text-gray-900 hover:text-gray-700 relative transition duration-300 ease-in-out md:my-2">
        <a href="./index.php" class="mr-5 uppercase font-bold cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">ГЛАВНАЯ</a>
        <a href="./projects.php" class="mr-5 uppercase font-bold cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">ПРОДУКТЫ</a>
        <a href="./projects.php" class="mr-5 uppercase font-bold cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">ПРОЕКТЫ</a>
        <a href="./contact.php" class="mr-5 uppercase font-bold cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">КОНТАКТЫ</a>
        <a href="./vacancy.php" class="mr-5 uppercase font-bold cursor-pointer hover:text-[#392D88] hover:transition-all ease-in-out">ВАКНСИИ</a>
      </div>

        <a href="./send_request.php" class="bg-[#392D88] text-white font-bold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">Оставить заявку</a>

    </div>
  </header>
     -->

  <div class="min-w-screen min-h-screen flex items-center p-5 lg:p-10 overflow-hidden relative">
    <div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
        <div class="md:flex items-center -mx-10">
            <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
              <input name=<?=$project['id_project']?> type="hidden">
                <div class="relative">
                    <img src="../assets/img/<?= $project['img_project'] ?>" class="w-full relative z-10" alt="">
                    <div class="border-4 border-yellow-200 absolute top-10 bottom-10 left-10 right-10 z-0"></div>
                </div>
            </div>
            <div class="w-full md:w-1/2 px-10">
                <div class="mb-10">
                    <h1 class="font-bold uppercase text-4xl mb-20"><?= $project['name_project']?></h1>
                    <p class="text-xl font-normal mb-10">Тип продукта: <?= $project['type_project'] ?></p>
                    <p class="text-xl font-normal mb-10">Цена: ₽ <?= $project['cost_project'] ?></p>
                    <p class="text-xl font-normal mb-10"><?= $project['desc_project'] ?></p>
                </div>
                <div>
                    <div class="flex justify-between">
                        <a href="../src/send_request.php" class="bg-[#392D88] text-white font-bold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">Оставить заявку</a>
                        <a href="../src/projects.php" class="bg-[#392D88] text-white font-bold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700 ml-20">Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<h2 class="text-left font-extrabold text-[36px] pl-20">Оставить комментарий к проекту:</h2>
<form action="../controllers/addComment.php" method="post" enctype="multipart/form-data" >
<input id="id" name="id" type="hidden" value="<?=$user['id']?>">
<input id="username" name="username" type="hidden" value="<?=$user['username']?>">
<input id="id_project" name="id_project" value="<?=$project['id_project']?>" type="hidden">
<div class="p-2 w-full pl-20">
            <div class="relative">
              <label for="text_comment" class="leading-7 text-2xl font-semibold text-black">Комментарий:</label>
              <textarea type="text" id="text_comment" name="text_comment" class="w-full  mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </textarea>
              <button href="" class="bg-[#392D88] text-[24px] text-white font-semibold px-10 py-2 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">Отправить</button>
         </div>
</div>

</form>

<h2 class="text-left font-extrabold text-[36px] pl-20">Комментарии к проекту:</h2>
<?php if (empty($comments)): ?>

            <h2 class="text-left font-extrabold text-[36px] pl-20 text-center">Комментариев нет.</h2>

    <?php else: ?>
<!-- component -->
<div class="antialiased mx-auto max-w-screen-sm">
  <div class="space-y-4">
  <?php foreach($comments as $comment) :?>
    <?php if ($project['id_project'] == $comment['id_project']):?>
    <div class="flex">
      <div class="flex-shrink-0 mr-3">
        <!-- Ава Иконка -->
        <!-- <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt=""> -->
      </div>
      <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
        <strong><?=$comment['username']?></strong> <span class="text-xs text-gray-400">Код: <?=$comment['id']?></span>
        <p class="text-sm">
              <?=$comment['text_comment']?>
        </p>
        <div class="mt-4 flex items-center">
          <div class="flex -space-x-2 mr-2">

          </div>
          <div class="text-sm text-gray-500 font-semibold">
          Дата: <?=$comment['date_comment']?>
          </div>
        </div>
      </div>
      <? endif; ?>
      <?php endforeach;?>
      <? endif; ?>

    </div>
      </div>
    </div>
  </div>
</div>

<?php require '../layouts/footer.php'; ?>