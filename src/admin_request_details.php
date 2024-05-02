<?php require '../layouts/admin_header.php'; ?>
<?php include_once '../models/request.php';
$request = getRequest($_GET['id_request']);
?>
<?php
include_once '../models/connection.php';
$pdo = Connection::get()->connect();
$sql = 'SELECT * FROM public.users';
$statement = $pdo->prepare($sql);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<main class="h-full pb-16 overflow-y-auto">
            <div class="px-10">
                <div class="mb-10 text-white flex flex-col gap-4 justify-between">
                    <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 w-1/2">Код заявки: <?=$request['id_request']?>.</p>
                    <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 w-1/2">Название: <?=$request['name_request']?>.</p>
                    <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 w-1/2">Стоимость заявки: <?=$request['price_request']?> <span class="currency-symbol">&#8381;</span>.</p>
                    <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 w-1/2">Дата заявки: <?=$request['date_request']?>.</p>
                    <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 w-1/2">Компания: <?=$request['name_company']?>.</p>
                    <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 w-1/2">Описание проекта: <a class="my-6 text-xl font-medium text-gray-700 dark:text-gray-200"><?=$request['description_request']?>.</a></p>
                    <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 w-1/2">Требования к надежности: <a class="my-6 text-xl font-medium text-gray-700 dark:text-gray-200"> <?=$request['reliability_request']?>.</a></p>
                    <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 w-1/2">Требования к технологичности: <a class="my-6 text-xl font-medium text-gray-700 dark:text-gray-200"> <?=$request['manufacturability_request']?>.</a></p>
                    <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 w-1/2">Требования к безопасности: <a class="my-6 text-xl font-medium text-gray-700 dark:text-gray-200"> <?=$request['security_request']?>.</a></p>
                    <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 w-1/2">Требования к документации: <a class="my-6 text-xl font-medium text-gray-700 dark:text-gray-200"> <?=$request['documentation_equipment_request']?>.</a></p>
                    <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 w-1/2">Требование к программному обеспечению: <a class="my-6 text-xl font-medium text-gray-700 dark:text-gray-200"> <?=$request['program_request']?>.</a></p>
                    <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 w-1/2">Требования к приемке: <a class="my-6 text-xl font-medium text-gray-700 dark:text-gray-200"> <?=$request['acceptance_request']?>.</a></p>
                    <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 w-1/2">Гарантийные обязательства: <a class="my-6 text-xl font-medium text-gray-700 dark:text-gray-200"> <?=$request['warranty_request']?>.</a></p>

                </div>
                <div class="text-white flex">
                    <a href="../assets/documents/<?=$request['document_request']?>" class="text-xl my-6 px-10 py-4 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">Скачать Техническое Задание</a>
                </div>

                <div class="flex flex-wrap gap-2">
              <div>
                <!-- Кнопки "Принять" и "Отклонить" -->
                <div class="flex items-center space-x-4 text-sm">

              <button data-modal-target="accept" data-modal-toggle="accept"
                class="px-10 py-4 text-xl font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                aria-label="Edit"
              >
                Принять
              </button>


              <button data-modal-target="deneid" data-modal-toggle="deneid"
                class="px-10 py-4 text-xl font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100"
                aria-label="Delete"
              >
               Отклонить
              </button>
</div>

          <div id="accept" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-md md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="<?= $user['id'] ?>">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    
                      <div class="px-6 py-6 mx-auto lg:px-8">
                          <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Принять заявку с договором №<?=$request['id_request']?></h3>
                  <form action="../controllers/acceptRequest.php" method="post" enctype="multipart/form-data" >
                  <input id="id_request" name="id_request" type="hidden" value="<?=$request['id_request']?>">
                  <p class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">

                </p>
                <label class="block mt-2 text-sm">
                <span class="text-gray-700 text-xl dark:text-gray-400 my-6">Выберите сотрудника для проекта</span>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Сотрудники
                </span>
                <select id="worker_request" name="worker_request" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  multiple>
                  <?php foreach($users as $user) :?>
                    <?php if($user['admin'] == 2): ?>
                  <option><?= $user['id'] ?> <?= $user['username'] ?></option>
                      <?php endif; ?>
                  <?php endforeach;?>
                </select>
              </label>

              </label> <br>
              <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Принять</button>
                        
                    </div>
                </div>
            </div>
          </div>
          </div>

      <div id="deneid" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="<?= $user['id'] ?>1">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                
                  <div class="px-6 py-6 mx-auto lg:px-8">
                      <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Отклонить заявку №<?=$request['id_request']?></h3>
                      <form action="../controllers/deniedRequest.php" method="post" enctype="multipart/form-data" >
            <input id="id_request" name="id_request" type="hidden" value="<?=$request['id_request']?>">
                <p class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">

                </p>
                <label class="block mt-2 text-sm">
                <span class="text-gray-700 dark:text-gray-400 my-6">Причина</span>
                <textarea name="comment_request" id="comment_request" 
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Причина"></textarea>

              </label> <br>
              <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Отклонить</button>
                  </form>
                </div>
            </div>
        </div>
      </div>
      </div>


                <div class="mb-10 text-white flex">
                    <a href="./admin_request.php" class="text-xl my-6 px-10 py-4 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">Вернуться Назад</a>
                </div>
            </div>
            </main>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>

  </body>
</html>