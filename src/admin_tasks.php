<?php require '../layouts/admin_header.php'; ?>
<?php
include_once '../models/connection.php';
$pdo = Connection::get()->connect();
$sql = 'SELECT * FROM public.users';
$statement = $pdo->prepare($sql);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include_once '../models/kanban.php'; 
$kanbans = getKanbans() ?>
        <main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
              Таблица c задачами
            </h2>
            <!-- With actions -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Код задачи</th>
                      <th class="px-4 py-3">Задача</th>
                      <th class="px-4 py-3">Код Проекта</th>
                      <th class="px-4 py-3">Статус</th>
                      <th class="px-4 py-3">Действие</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  <?php foreach($kanbans as $kanban) :?>
                    <? if ($kanban['id'] == $user['id'] and $kanban['status_kanban'] == 'В разработке'): ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div>
                            <p class="font-semibold"><?= $kanban['id_kanban'] ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <?= $kanban['task_kanban'] ?>
                      </td>
                      <td class="px-4 py-3 text-xs">
                        <span
                          class="px-4 py-3 text-xs">
                        <?= $kanban['id_request'] ?>
                        </span>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                      <?= $kanban['status_kanban'] ?>
                      </span>
                      </td>
                      <td class="px-4 py-3">
                      
                      <a href="../src/admin_request_details.php?id_request=<?= $kanban['id_request'] ?>" class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                      Перейти к задаче 
                      </a>
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
              Выполненные задачи
            </h4>
                        <!-- With actions -->
                        <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Код задачи</th>
                      <th class="px-4 py-3">Задача</th>
                      <th class="px-4 py-3">Код Проекта</th>
                      <th class="px-4 py-3">Статус</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  <?php foreach($kanbans as $kanban) :?>
                    <? if ($kanban['id'] == $user['id'] and $kanban['status_kanban'] == 'Выполнено'): ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div>
                            <p class="font-semibold"><?= $kanban['id_kanban'] ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <?= $kanban['task_kanban'] ?>
                      </td>
                      <td class="px-4 py-3 text-xs">
                        <span
                          class="px-4 py-3 text-xs">
                        <?= $kanban['id_request'] ?>
                        </span>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                      <?= $kanban['status_kanban'] ?>
                      </span>
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
