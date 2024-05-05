<?php require '../layouts/admin_header.php'; ?>
<?php
include_once '../models/connection.php';
$pdo = Connection::get()->connect();
$sql = 'SELECT * FROM public.users';
$statement = $pdo->prepare($sql);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
        <main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
              Таблица c пользователями
            </h2>
            <!-- With actions -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Имя</th>
                      <th class="px-4 py-3">Логин</th>
                      <th class="px-4 py-3">Электронная почта</th>
                      <th class="px-4 py-3">Роль</th>
                      <th class="px-4 py-3">Действие</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  <?php foreach($users as $user) :?>
                    <? if ($user['admin'] == 1 or $user['admin'] == 2 or $user['admin'] == 0): ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div>
                            <p class="font-semibold"><?= $user['username'] ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            <?= $user['id'] ?>
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <?= $user['login'] ?>
                      </td>
                      <td class="px-4 py-3 text-xs">
                        <span
                          class="px-4 py-3 text-xs">
                        <?= $user['email'] ?>
                        </span>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <a href="../controllers/accessUser.php?id=<?=$user['id']?>" class="font-medium text-green-600 dark:text-blue-500 hover:underline">Повысить</a>

                      <? if ($user['admin'] == 1): ?>
                            Администратор
                            <? elseif ($user['admin'] == 2): ?>
                            Сотрудник
                            <? else: ?>
                            Пользователь
                        <? endif; ?>

                        <a href="../controllers/rejectUser.php?id=<?=$user['id']?>" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Понизить</a>
                      </td>
                      <td class="px-4 py-3">
                      <div class="flex items-center space-x-4 text-sm">


                          <button data-modal-target="edit<?= $user['id'] ?>" data-modal-toggle="edit<?= $user['id'] ?>"
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit"
                          >
                            <svg
                              class="w-5 h-5"
                              aria-hidden="true"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                            >
                              <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                              ></path>
                            </svg>
                          </button>


                          <button data-modal-target="del<?= $user['id'] ?>" data-modal-toggle="del<?= $user['id'] ?>"
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Delete"
                          >
                            <svg
                              class="w-5 h-5"
                              aria-hidden="true"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"
                              ></path>
                            </svg>
                          </button>
                      </div>

                        <div id="del<?= $user['id'] ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="<?= $user['id'] ?>">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    
                                      <div class="px-6 py-6 mx-auto lg:px-8">
                                          <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Блокировака пользователя # <?= $user['id'] ?> </h3>
                                            <p class="pb-2">
                                            Вы точно хотите заблокировать пользователя <br> <?= $user['username'] ?>
                                            </p>
                                        <a  href="../controllers/blockUser.php?id=<?=$user['id']?>" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Заблокировать</a>
                                                  
                                      </div>
                                </div>
                            </div>
                        </div>
                        </div>




                        <div id="edit<?= $user['id'] ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="<?= $user['id'] ?>1">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    
                                      <div class="px-6 py-6 mx-auto lg:px-8">
                                          <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Изменить данные # <?= $user['id'] ?> </h3>
                                            <p>
                                            Блокировака пользователя <?= $user['username'] ?>
                                            </p>
                                        <a  href="../controllers/adminDeleteUser.php?id=<?=$user['id']?>" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Заблокировать</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>

                      </td>
                    </tr>
                    <? endif; ?>
                    <?php endforeach;?>
                    </tbody>
                </table>
              </div>
              <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
              >
                
              </div>
            </div>
                  

              <h4
              class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              Заблокированные пользователи
            </h4>


                        <!-- With actions -->
                        <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Имя</th>
                      <th class="px-4 py-3">Логин</th>
                      <th class="px-4 py-3">Электронная почта</th>
                      <th class="px-4 py-3">Роль</th>
                      <th class="px-4 py-3">Действие</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  <?php foreach($users as $user) :?>
                    <? if ($user['admin'] == 4): ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div>
                            <p class="font-semibold"><?= $user['username'] ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            <?= $user['id'] ?>
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <?= $user['login'] ?>
                      </td>
                      <td class="px-4 py-3 text-xs">
                        <span
                          class="px-4 py-3 text-xs">
                        <?= $user['email'] ?>
                        </span>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                          Заблокирован
                      </span>
                      </td>
                      <td class="px-4 py-3">
                      <div class="flex items-center space-x-4 text-sm">


                          <button data-modal-target="edit<?= $user['id'] ?>" data-modal-toggle="edit<?= $user['id'] ?>"
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit"
                          >
                            <svg
                              class="w-5 h-5"
                              aria-hidden="true"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                            >
                              <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                              ></path>
                            </svg>
                          </button>


                          <button data-modal-target="back<?= $user['id'] ?>" data-modal-toggle="back<?= $user['id'] ?>"
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Delete"
                          >
                          <svg
                              class="w-5 h-5"
                              aria-hidden="true"
                              fill="none"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                            >
                              <path
                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"
                              ></path>
                            </svg>
                          </button>
                      </div>

                        <div id="back<?= $user['id'] ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="<?= $user['id'] ?>">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    
                                      <div class="px-6 py-6 mx-auto lg:px-8">
                                          <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Разблокировать пользователя # <?= $user['id'] ?> </h3>
                                            <p class="pb-2">
                                            Вы точно хотите разаблокировать пользователя <br> <?= $user['username'] ?> с ролью пользователя?
                                            </p>
                                        <a  href="../controllers/unblockUser.php?id=<?=$user['id']?>" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Разблокировать</a>
                                                  
                                      </div>
                                </div>
                            </div>
                        </div>
                        </div>


                      </td>
                    </tr>
                    <? endif; ?>
                    <?php endforeach;?>
                    </tbody>
                </table>
              </div>
              <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
              >
                
              </div>
            </div>
                



              
            </div>
          </div>
        </main>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
      </div>
    </div>
  </body>
</html>
