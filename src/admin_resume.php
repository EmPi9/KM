<?php require '../layouts/admin_header.php'; ?>
<?php include_once '../models/resume.php'; 
$resumes = getResumes() ?>
<main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
              Таблица c резюме
            </h2>
            <!-- With actions -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Код резюме</th>
                      <th class="px-4 py-3">Имя</th>
                      <th class="px-4 py-3">Образование</th>
                      <th class="px-4 py-3">Статус</th>
                      <th class="px-4 py-3">Действие</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  <?php foreach($resumes as $resume): ?>

                    <? if ($resume['status_resume'] == 0): ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div>
                          <?= $resume['id_resume'] ?>
                            
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <p class="font-semibold"><?= $resume['username'] ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            <?= $resume['id'] ?>
                      </td>
                      <td class="px-4 py-3 text-xs">
                        <span
                          class="px-4 py-3 text-xs">
                        <?= $resume['education_resume'] ?>
                        </span>
                      </td>

                      <td class="px-4 py-3 text-sm">
                      <? if ($resume['status_resume'] == 0): ?>
                        <span
                          class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600"
                        >
                            В ожидании
                      </span>
                            <?  elseif (($resume['status_resume'] == 1)): ?>
                            <span
                          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                            Принят
                            </span>
                            <?  else: ?>
                        <span
                          class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                            Отклонен
                            </span>   
                            <? endif; ?>
                      </td>
                      <td class="px-4 py-3">
                        <a href="./admin_resume_details.php?id_resume=<?= $resume['id_resume']?>">Подробнее</a>
                      </td>
                    </tr>
                    
                    <? endif; ?>

                    <?php endforeach; ?>
                    
                    
                  
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
              Архив с резюме
            </h2>
            <!-- With actions -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Код резюме</th>
                      <th class="px-4 py-3">Имя</th>
                      <th class="px-4 py-3">Образование</th>
                      <th class="px-4 py-3">Статус</th>
                      <th class="px-4 py-3">Действие</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  <?php foreach($resumes as $resume) :?>
                    <? if ($resume['status_resume'] == 1 or $resume['status_resume'] == 2): ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div>
                            <?= $resume['id_resume'] ?>
                           
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <p class="font-semibold"><?= $resume['username'] ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            <?= $resume['id'] ?>
                      </td>
                      <td class="px-4 py-3 text-xs">
                        <span
                          class="px-4 py-3 text-xs">
                        <?= $resume['education_resume'] ?>
                        </span>
                      </td>

                      <td class="px-4 py-3 text-sm">
                      <? if ($resume['status_resume'] == 0): ?>
                        <span
                          class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600"
                        >
                            В ожидании
                      </span>
                            <?  elseif (($resume['status_resume'] == 1)): ?>
                            <span
                          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                            Принят
                            </span>
                            <?  else: ?>
                        <span
                          class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                            Отклонен
                            </span>   
                        <? endif; ?>

                      </td>
                      <td class="px-4 py-3">
                        <a href="./admin_resume_details.php?id_resume=<?= $resume['id_resume']?>">Подробнее</a>
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