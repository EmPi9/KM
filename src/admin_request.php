<?php require '../layouts/admin_header.php'; ?>
<?php include_once '../models/request.php'; 
$requests = getRequests() ?>
<main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
              Таблица c заявками
            </h2>
            <!-- With actions -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Название</th>
                      <th class="px-4 py-3">Клиент</th>
                      <th class="px-4 py-3">Компания</th>
                      <th class="px-4 py-3">Статус</th>
                      <th class="px-4 py-3">Действие</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  <?php foreach($requests as $request):?>
                    <? if ($request['status_request'] == 1 or $request['status_request'] == 3 or $request['status_request'] == 0 or $request['status_request'] == 2): ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">    
                          <div>
                          <p class="font-semibold"><?= $request['name_request']?></p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">
                        <?= $request['id_request']?>
                            </p>
                           
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <?= $request['username']?>
                      </td>
                      <td class="px-4 py-3 text-xs">
                        <?= $request['name_company']?>
                          
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <? if ($request['status_request'] == 0): ?>
                      <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                          В ожидании
                      </span>
                      <? elseif ($request['status_request'] == 1): ?>
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                          Принято на подписи
                      </span>
                      <?  elseif (($request['status_request'] == 3)): ?>
                            <span
                          class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                            В разработке
                            </span>  
                      <? else: ?>
                      <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                          Отклонено
                      </span>
                      <? endif; ?>

                      </td>
                      <td>
                      <a href="./admin_request_details.php?id_request=<?= $request['id_request']?>" class="px-4 py-3 text-sm">Подробнее</a>
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
            
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
              Архив с заявками
            </h2>
            <!-- With actions -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Клиент</th>
                      <th class="px-4 py-3">Название</th>
                      <th class="px-4 py-3">Компания</th>
                      <th class="px-4 py-3">Статус</th>
                      <th class="px-4 py-3">Действие</th>
                    </tr>
                  </thead>

                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  <?php foreach($requests as $request):?>
                    <? if ($request['status_request'] == 2): ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">    
                          <div>
                            <p class="font-semibold"><?= $request['username']?></p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <?= $request['name_request']?>
                      </td>
                      <td class="px-4 py-3 text-xs">
                        <?= $request['name_company']?>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <? if ($request['status_request'] == 0): ?>
                      <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                          В ожидании
                      </span>
                      <? elseif ($request['status_request'] == 1): ?>
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                          Принято на подписи
                      </span>
                      <? elseif ($request['status_request'] == 3): ?>
                        <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                          В разработке
                        </span>
                      <? else: ?>
                      <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                          Отклонено
                      </span>
                      <? endif; ?>
                      </td>
                      <td>
                      <a href="./request.php?id_request=<?= $request['id_request']?>" class="px-4 py-3 text-sm">Подробнее</a>
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
        </main>
      </div>
    </div>
  </body>
</html>