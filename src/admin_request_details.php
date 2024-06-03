<?php require '../layouts/admin_header.php'; ?>
<?php include_once '../models/request.php';
$request = getRequest($_GET['id_request']);
?>
<?php include_once '../models/kanban.php'; 
$kanbans = getKanbans() ?>
<?php include_once '../models/team.php'; 
$teams = getTeams() ?>
<?php
include_once '../models/connection.php';
$pdo = Connection::get()->connect();
$sql = 'SELECT * FROM public.users';
$statement = $pdo->prepare($sql);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<style>
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: sans-serif;

  -ms-overflow-style: none; /* IE and Edge */
  scrollbar-width: none; /* Firefox */
}

*::-webkit-scrollbar {
  display: none;
}

.board {
  width: 100%;
  height: 100vh;
  overflow: scroll;

  background-image: url(https://images.unsplash.com/photo-1519681393784-d120267933ba?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);
  background-position: center;
  background-size: cover;
}

/* ---- FORM ---- */
#todo-form {
  padding: 32px 32px 0;
}

#todo-form input {
  padding: 12px;
  margin-right: 12px;
  width: 225px;

  border-radius: 4px;
  border: none;

  box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);
  background: white;

  font-size: 14px;
  outline: none;
}

#todo-form button {
  padding: 12px 32px;

  border-radius: 4px;
  border: none;

  box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);
  background: #ffffff;
  color: black;

  font-weight: bold;
  font-size: 14px;
  cursor: pointer;
}

/* ---- BOARD ---- */
.lanes {
  display: flex;
  align-items: flex-start;
  justify-content: start;
  gap: 16px;

  padding: 24px 32px;

  overflow: scroll;
  height: 100%;
}

.heading {
  font-size: 22px;
  font-weight: bold;
  margin-bottom: 8px;
}

.swim-lane {
  display: flex;
  flex-direction: column;
  gap: 12px;

  background: #f4f4f4;
  box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);

  padding: 12px;
  border-radius: 4px;
  width: 225px;
  min-height: 120px;

  flex-shrink: 0;
}

.task {
  background: white;
  color: black;
  box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.15);

  padding: 12px;
  border-radius: 4px;

  font-size: 16px;
  cursor: move;
}

.is-dragging {
  scale: 1.05;
  box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);
  background: rgb(50, 50, 50);
  color: white;
}

</style>

<main class="h-full pb-16 overflow-y-auto">
<div class="container px-6 mx-auto grid">
<h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Заявка
            </h2>
  <?php if (is_array($user) && $user['admin'] == 'Администратор'): ?>
          <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              Добавить задачу
            </h4>
          
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <form action="../controllers/addTask.php" method="post" enctype="multipart/form-data" class='text-center'>
              <input id="id_request" name="id_request" type="hidden" value="<?=$request['id_request']?>">
              <input id="status_kanban" name="status_kanban" type="hidden" value="Запланировано">
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Задача</span>
                <textarea name="task_kanban" id="task_kanban"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Описание задачи"></textarea>
              </label>
              <br>
              <button
                  class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                  Отправить
                </button>
            </div>
            </form>
            <? endif; ?>

            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              Доска задач
            </h4>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >

      <div class="lanes flex flex-wrap">
        <div class="swim-lane dark:bg-gray-800 dark:text-gray-200" id="todo-lane">
          <h3 class="heading">Запланировано</h3>
          <?php foreach($kanbans as $kanban):?>
                    <? if ($kanban['id_request'] == $request['id_request'] and $kanban['status_kanban'] == 'Запланировано'): ?>

                      <button data-modal-target="back<?= $kanban['id_kanban'] ?>" data-modal-toggle="back<?= $kanban['id_kanban'] ?>"
                              class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                              aria-label="Delete"
                            >
                            Взять задачу №<?= $kanban['id_kanban'] ?>
                      </button>

                      <p class="task border border-gray dark:border-white dark:bg-gray-800 dark:text-gray-200"><?= $kanban['id_kanban']?>. <?= $kanban['task_kanban']?></p>
                      
                      <div id="back<?= $kanban['id_kanban'] ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="back<?= $kanban['id_kanban'] ?>">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    
                                      <div class="px-6 py-6 mx-auto lg:px-8">
                                          <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Вы точно хотите взять задачу №<?= $kanban['id_kanban'] ?> </h3>
                                            <p class="pb-2 dark:text-white">
                                            Вам предстоит выполнить задачу, <?= $kanban['task_kanban']?>. И за вами будет закрепленна эта задача.
                                            </p>
                                        <form action="../controllers/takeTask.php" method="post" enctype="multipart/form-data" class='text-center'>
                                              <input id="id_request" name="id_request" type="hidden" value="<?=$request['id_request']?>">
                                              <input id="id_kanban" name="id_kanban" type="hidden" value="<?=$kanban['id_kanban']?>">
                                              <input id="id" name="id" type="hidden" value="<?=$user['id']?>">
                                              <input id="employee_kanban" name="employee_kanban" type="hidden" value="<?=$user['username']?>">
                                              <input id="status_kanban" name="status_kanban" type="hidden" value="В разработке">
                                          <button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Взять задачу</button>
                                        </form>
                                      </div>
                                </div>
                            </div>
                        </div>


                     <? endif; ?>
          <?php endforeach;?>
        </div>

        <div class="swim-lane dark:bg-gray-800 dark:text-gray-200">
          <h3 class="heading">В разработке</h3>
          <?php foreach($kanbans as $kanban):?>
                    <? if ($kanban['id_request'] == $request['id_request'] and $kanban['status_kanban'] == 'В разработке'): ?>
                      <? if ($kanban['id'] == $user['id']): ?>
                      <button data-modal-target="fin<?= $kanban['id_kanban'] ?>" data-modal-toggle="fin<?= $kanban['id_kanban'] ?>"
                              class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                              aria-label="Delete"
                            >
                            Завершить задачу №<?= $kanban['id_kanban'] ?>
                      </button>
                          <? endif; ?>
                      <p class="task border border-gray dark:border-white dark:bg-gray-800 dark:text-gray-200"><?= $kanban['id_kanban']?>. <?= $kanban['task_kanban']?>
                    <br>
                    Разрабатывает: <?= $kanban['employee_kanban']?>
                    </p>
                    <div id="fin<?= $kanban['id_kanban'] ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <? if ($kanban['id'] == $user['id']): ?>
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="fin<?= $kanban['id_kanban'] ?>">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                <? endif; ?>  
                                      <div class="px-6 py-6 mx-auto lg:px-8">
                                          <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Вы точно хотите завершить задачу №<?= $kanban['id_kanban'] ?> </h3>
                                            <p class="pb-2 dark:text-white">
                                            Вы уверены что выполнили задачу, <?= $kanban['task_kanban']?>.
                                            </p>
                                        <form action="../controllers/takeTask.php" method="post" enctype="multipart/form-data" class='text-center'>
                                              <input id="id_request" name="id_request" type="hidden" value="<?=$request['id_request']?>">
                                              <input id="id_kanban" name="id_kanban" type="hidden" value="<?=$kanban['id_kanban']?>">
                                              <input id="id" name="id" type="hidden" value="<?=$user['id']?>">
                                              <input id="employee_kanban" name="employee_kanban" type="hidden" value="<?=$user['username']?>">
                                              <input id="status_kanban" name="status_kanban" type="hidden" value="Выполнено">
                                          <button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Завершить задачу задачу</button>
                                        </form>
                                      </div>
                                </div>
                            </div>
                        </div>
                     <? endif; ?>
          <?php endforeach;?>
        </div>

        <div class="swim-lane dark:bg-gray-800 dark:text-gray-200">
          <h3 class="heading">Выполнено</h3>
          <?php foreach($kanbans as $kanban):?>
                    <? if ($kanban['id_request'] == $request['id_request'] and $kanban['status_kanban'] == 'Выполнено'): ?>
                    
                      <p class="task border border-gray dark:border-white dark:bg-gray-800 dark:text-gray-200"><?= $kanban['id_kanban']?>. <?= $kanban['task_kanban']?>
                      <br>
                    Выполнил: <?= $kanban['employee_kanban']?></p>
                     <? endif; ?>
          <?php endforeach;?>
        </div>
      </div>
    </div>


    <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              Информация о заявке
            </h4>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
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
                <?php if (is_array($user) && $user['admin'] == 'Администратор'): ?>
                <div class="flex items-center space-x-4 text-sm">
                <? if ($request['status_request'] == 0): ?>
              <button data-modal-target="accept" data-modal-toggle="accept"
                class="px-10 py-4 text-xl font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                aria-label="Edit"
              >
                Принять
              </button>
              <?php endif;?>

              <? if ($request['status_request'] == 3): ?>
              <button data-modal-target="over" data-modal-toggle="over"
                class="px-10 py-4 text-xl font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                aria-label="Edit"
              >
                Завершить
              </button>
              <?php endif;?>

              <button data-modal-target="deneid" data-modal-toggle="deneid"
                class="px-10 py-4 text-xl font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100"
                aria-label="Delete"
              >
               Отклонить
              </button>
</div>
<?php endif;?>
          <div id="accept" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-md md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="accept">
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
                <span class="text-gray-700 text-xl dark:text-gray-400 my-6">Выберите бригаду для проекта</span>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Бригады
                </span>
                <select id="worker_request" name="worker_request" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  multiple>
                  <?php foreach($teams as $team) :?>
                    <?php if($team['status_team'] == 0): ?>
                  <option><?= $team['id_team'] ?> <?= $team['name_team'] ?></option>
                      <?php endif; ?>
                  <?php endforeach;?>
                </select>
              </label>

              </label> <br>
              <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Принять</button>
                    </form>          
                    </div>
                </div>
            </div>
          </div>
          </div>

          <div id="over" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-md md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="over">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    
                      <div class="px-6 py-6 mx-auto lg:px-8">
                          <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Принять заявку с договором №<?=$request['id_request']?></h3>
                  <form action="../controllers/overRequest.php" method="post" enctype="multipart/form-data" >
                  <input id="id_request" name="id_request" type="hidden" value="<?=$request['id_request']?>">
                  <p class="my-3 text-gray-700 dark:text-gray-200">
                    Вы уверены что хотите заврешить заявку <?=$request['name_request']?>?
                  </p> 
                  <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Комментарий</span>
                    <textarea
                      class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      rows="3"
                      placeholder="Обьясните как можно забрать заявку."
                    ></textarea>
                  </label>

                  <br>
              <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Завершить</button>
                    </form>          
                    </div>
                </div>
            </div>
          </div>
          </div>

      <div id="deneid" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="deneid">
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