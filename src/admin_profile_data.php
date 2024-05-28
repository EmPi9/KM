<?php require '../layouts/admin_header.php'; ?>
<?php
include_once '../models/connection.php';
$pdo = Connection::get()->connect();
$sql = 'SELECT * FROM public.users';
$statement = $pdo->prepare($sql);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include_once '../models/team.php'; 
$teams = getTeams() ?>
<div class="flex items-center p-6 bg-gray-50 dark:bg-gray-900">
      <div
        class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
      >
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img

              class="object-cover w-full h-full block"
              src="../assets/img/create-account-office-dark.jpeg"
              alt="Office"
            />
          </div>
          
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1
                class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
              >
                Изменение данных
              </h1>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Электронная почта</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="<?= $user['email'] ?>"
                />
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Логин</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="<?= $user['login'] ?>"
                />
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                 ФИО
                </span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="<?= $user['username'] ?>"

                />
              </label>

              <!-- <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Команда
                </span>
                <p class="mb-4 text-xl font-base text-gray-700 dark:text-gray-200"> <?= $user['team_name'] ?> </p>
              </label> -->

              <button
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                href="../src/admin_tasks.php"
              >
                Изменить данные
              </button>

              <hr class="my-8" />


              <a href="./admin_profile.php"
                class="flex items-center justify-center w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
              >

                Назад
              </a>


            </div>
          </div>
        </div>
      </div>
    </div>