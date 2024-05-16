<?php require '../layouts/admin_header.php'; ?>
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
<main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto">
          <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Бригады
            </h2>

          <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              Добавление бригад с сотрудниками
            </h4>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <form action="../controllers/addTeam.php" method="post" enctype="multipart/form-data" class='text-center'>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Название бригады</span>
                <textarea name="name_team" id="name_team"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Название"></textarea>
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  1 Сотрудник
                </span>
                <select required id="employee1_team" name="employee1_team"
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                >
                <option>Отсутствует</option>
                <?php foreach($users as $user) :?>
                    <?php if($user['admin'] == 2): ?>
                  <option><?= $user['id'] ?> <?= $user['username'] ?></option>
                      <?php endif; ?>
                  <?php endforeach;?>
                </select>
              </label>


              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  2 Сотрудник
                </span>
                <select id="employee2_team" name="employee2_team"
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                >
                <option>Отсутствует</option>
                <?php foreach($users as $user) :?>
                    <?php if($user['admin'] == 2): ?>
                  <option><?= $user['id'] ?> <?= $user['username'] ?></option>
                      <?php endif; ?>
                  <?php endforeach;?>
                </select>
              </label>


              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  3 Сотрудник
                </span>
                <select id="employee3_team" name="employee3_team"
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                >
                <option>Отсутствует</option>
                <?php foreach($users as $user) :?>
                    <?php if($user['admin'] == 2): ?>
                  <option><?= $user['id'] ?> <?= $user['username'] ?></option>
                      <?php endif; ?>
                  <?php endforeach;?>
                </select>
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  4 Сотрудник
                </span>
                <select id="employee4_team" name="employee4_team"
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                >
                <option>Отсутствует</option>
                <?php foreach($users as $user) :?>
                    <?php if($user['admin'] == 2): ?>
                  <option><?= $user['id'] ?> <?= $user['username'] ?></option>
                      <?php endif; ?>
                  <?php endforeach;?>
                </select>
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  5 Сотрудник
                </span>
                <select id="employee5_team" name="employee5_team"
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                >
                <option>Отсутствует</option>
                <?php foreach($users as $user) :?>
                    <?php if($user['admin'] == 2): ?>
                  <option><?= $user['id'] ?> <?= $user['username'] ?></option>
                      <?php endif; ?>
                  <?php endforeach;?>
                </select>
              </label>
<br>

              <button type="submit"
                  class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                  Отправить
                </button>
            </div>
            </form>






            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
              Таблица c бригадами
            </h2>
            <!-- With actions -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Код бригады</th>
                      <th class="px-4 py-3">Название</th>
                      <th class="px-4 py-3">Сотрудники</th>
                      <th class="px-4 py-3">Статус</th>
                      <th class="px-4 py-3">Действие</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  <?php foreach($teams as $team): ?>

                    <? if ($team['status_team'] == 0): ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div>
                          <?= $team['id_team'] ?>
                          </div>
                        </div>
                      </td>
                        
                      <td class="px-4 py-3 text-sm">
                        <?= $team['name_team'] ?> <br>
                      </td>

                      <td class="px-4 py-3 text-xs">
                        1. <?= $team['employee1_team'] ?><br>
                        2. <?= $team['employee2_team'] ?><br>
                        3. <?= $team['employee3_team'] ?><br>
                        4. <?= $team['employee4_team'] ?><br>
                        5. <?= $team['employee5_team'] ?><br>
                      </td>

                      <td class="px-4 py-3 text-sm">
                      <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                          >
                            Используется
                          </span>
                      </td>
                    

                      <td class="px-4 py-3">
                      <div class="flex items-center space-x-4 text-sm">
                            <button 
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

                            <button data-modal-target="arch<?= $vacancy['id_vacancy'] ?>" data-modal-toggle="arch<?= $vacancy['id_vacancy'] ?>"
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
              Архив с бригадами
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
                  <?php foreach($teams as $team) :?>
                    <? if ($team['status_team'] == 1 or $team['status_team'] == 2): ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div>
                            <?= $team['id_team'] ?>
                           
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <p class="font-semibold"><?= $team['username'] ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            <?= $team['id'] ?>
                      </td>
                      <td class="px-4 py-3 text-xs">
                        <span
                          class="px-4 py-3 text-xs">
                        <?= $team['education_team'] ?>
                        </span>
                      </td>

                      <td class="px-4 py-3 text-sm">
                      <? if ($team['status_team'] == 0): ?>
                        <span
                          class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600"
                        >
                            В ожидании
                      </span>
                            <?  elseif (($team['status_team'] == 1)): ?>
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
                        <a href="./admin_team_details.php?id_team=<?= $team['id_team']?>">Подробнее</a>
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