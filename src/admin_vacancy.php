<?php require '../layouts/admin_header.php'; ?>
<?php
include_once '../models/connection.php';
$pdo = Connection::get()->connect();
$sql = 'SELECT * FROM public.users';
$statement = $pdo->prepare($sql);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include_once '../models/vacancy.php'; 
$vacancys = getVacancys() ?>
        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Вакансии
            </h2>

            <!-- General elements -->
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              Добавление вакансий
            </h4>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <form action="../controllers/addVacancy.php" method="post" enctype="multipart/form-data" class='text-center'>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Название</span>
                <textarea name="name_vacancy" id="name_vacancy"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Название"></textarea>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Обязаности</span>
                <textarea name="respons_vacancy" id="respons_vacancy"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Обязаности"></textarea>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Требования</span>
                <textarea name="requir_vacancy" id="requir_vacancy"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Требования"></textarea>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Условия</span>
                <textarea name="conditions_vacancy" id="conditions_vacancy"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Условия"></textarea>

              </label> <br>
              <button
                  class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                  Отправить
                </button>
            </div>
            </form>
            <!-- Table -->
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              Созданные вакансии
            </h4>

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                  <table class="w-full whitespace-no-wrap">
                    <thead>
                      <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Код вакансии</th>
                        <th class="px-4 py-3">Название</th>
                        <th class="px-4 py-3">Статус</th>
                        <th class="px-4 py-3">Действия</th>
                      </tr>
                    </thead>
                    <tbody
                      class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                    >
                    <?php foreach($vacancys as $vacancy):?>
                      <? if ($vacancy['status_vacancy'] == 0): ?>
                      <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                          <div class="flex items-center text-sm">
                  
                            <div>
                              <p class="font-semibold"><?= $vacancy['id_vacancy']?></p>
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                        <?= $vacancy['name_vacancy']?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                          >
                            На сайте 
                          </span>
                        </td>
                        <td class="px-4 py-3">
                          <div class="flex items-center space-x-4 text-sm">
                            <button data-modal-target="edit<?= $vacancy['id_vacancy'] ?>" data-modal-toggle="edit<?= $vacancy['id_vacancy'] ?>"
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


                      <div id="arch<?= $vacancy['id_vacancy'] ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="arch<?= $vacancy['id_vacancy'] ?>">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    
                                      <div class="px-6 py-6 mx-auto lg:px-8">
                                          <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Архивировать вакансию №<?= $vacancy['id_vacancy'] ?> </h3>
                                            <p class="pb-2 dark:text-white">
                                            Вы точно хотите архивировать вакансию <?= $vacancy['name_vacancy'] ?>?
                                            </p>
                                        <a href="../controllers/archivingVacancy.php?id_vacancy=<?=$vacancy['id_vacancy']?>" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Архивировать</a>
                                      </div>
                                </div>
                            </div>
                        </div>


                        <div id="edit<?= $vacancy['id_vacancy'] ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="edit<?= $vacancy['id_vacancy'] ?>">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <form action="../controllers/editVacancy.php" method="post" enctype="multipart/form-data">
                                      
                                    <input id="id_vacancy" name="id_vacancy" type="hidden" value="<?= $vacancy['id_vacancy'] ?>">
                                      <div class="px-6 py-6 mx-auto lg:px-8">
                                          <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Изменение завершенного проекта # <?= $vacancy['id_vacancy'] ?> </h3>

                                              <label class="block text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">Название</span>
                                                <input name="name_vacancy" id="name_vacancy"
                                                  class="block w-full w-1/2 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                  placeholder="Jane Doe" value="<?= $vacancy['name_vacancy'] ?>"
                                                />
                                              </label>

                                              <label class="block mt-4 text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">Обязаности</span>
                                                <textarea name="respons_vacancy" id="respons_vacancy"
                                                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                  rows="3"
                                                  placeholder="Enter some long form content."
                                                ><?= $vacancy['respons_vacancy'] ?></textarea>
                                              </label>

                                              <label class="block mt-4 text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">Требования</span>
                                                <textarea name="requir_vacancy" id="requir_vacancy"
                                                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                  rows="3"
                                                  placeholder="Enter some long form content."
                                                ><?= $vacancy['requir_vacancy'] ?></textarea>
                                              </label>

                                              <label class="block mt-4 text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">Условия</span>
                                                <textarea name="conditions_vacancy" id="conditions_vacancy"
                                                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                  rows="3"
                                                  placeholder="Enter some long form content."
                                                ><?= $vacancy['conditions_vacancy'] ?></textarea>
                                              </label>

                                            <br>
                                            <button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Изменить</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>


                      <? endif; ?>
                   <?php endforeach;?>
                   </tbody>
                </table>
              </div>
               


                               <!-- Table -->
            <h4
              class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              Архивированные вакансии
            </h4>

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                  <table class="w-full whitespace-no-wrap">
                    <thead>
                      <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Код вакансии</th>
                        <th class="px-4 py-3">Название</th>
                        <th class="px-4 py-3">Статус</th>
                        <th class="px-4 py-3">Действия</th>
                      </tr>
                    </thead>
                    <tbody
                      class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                    >
                    <?php foreach($vacancys as $vacancy):?>
                      <? if ($vacancy['status_vacancy'] == 1): ?>
                      <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                          <div class="flex items-center text-sm">
                  
                            <div>
                              <p class="font-semibold"><?= $vacancy['id_vacancy']?></p>
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                        <?= $vacancy['name_vacancy']?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600"
                          >
                            Архивированно 
                          </span>
                        </td>
                        <td class="px-4 py-3">
                          <div class="flex items-center space-x-4 text-sm">
                          <button data-modal-target="edit<?= $vacancy['id_vacancy'] ?>" data-modal-toggle="edit<?= $vacancy['id_vacancy'] ?>"
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

                            <button data-modal-target="back<?= $vacancy['id_vacancy'] ?>" data-modal-toggle="back<?= $vacancy['id_vacancy'] ?>"
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
                        </td>
                      </tr>

                      <div id="back<?= $vacancy['id_vacancy'] ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="back<?= $vacancy['id_vacancy'] ?>">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    
                                      <div class="px-6 py-6 mx-auto lg:px-8">
                                          <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Вернуть на сайт вакансию №<?= $vacancy['id_vacancy'] ?> </h3>
                                            <p class="pb-2 dark:text-white">
                                            Вы точно хотите вернуть на сайт вакансию <?= $vacancy['name_vacancy'] ?>?
                                            </p>
                                        <a href="../controllers/returnVacancy.php?id_vacancy=<?=$vacancy['id_vacancy']?>" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Вернуть на сайт</a>
                                      </div>
                                </div>
                            </div>
                        </div>

                        <div id="edit<?= $vacancy['id_vacancy'] ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="edit<?= $vacancy['id_vacancy'] ?>">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <form action="../controllers/editVacancy.php" method="post" enctype="multipart/form-data">
                                      
                                    <input id="id_vacancy" name="id_vacancy" type="hidden" value="<?= $vacancy['id_vacancy'] ?>">
                                      <div class="px-6 py-6 mx-auto lg:px-8">
                                          <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Изменение завершенного проекта # <?= $vacancy['id_vacancy'] ?> </h3>

                                              <label class="block text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">Название</span>
                                                <input name="name_vacancy" id="name_vacancy"
                                                  class="block w-full w-1/2 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                  placeholder="Jane Doe" value="<?= $vacancy['name_vacancy'] ?>"
                                                />
                                              </label>

                                              <label class="block mt-4 text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">Обязаности</span>
                                                <textarea name="respons_vacancy" id="respons_vacancy"
                                                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                  rows="3"
                                                  placeholder="Enter some long form content."
                                                ><?= $vacancy['respons_vacancy'] ?></textarea>
                                              </label>

                                              <label class="block mt-4 text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">Требования</span>
                                                <textarea name="requir_vacancy" id="requir_vacancy"
                                                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                  rows="3"
                                                  placeholder="Enter some long form content."
                                                ><?= $vacancy['requir_vacancy'] ?></textarea>
                                              </label>

                                              <label class="block mt-4 text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">Условия</span>
                                                <textarea name="conditions_vacancy" id="conditions_vacancy"
                                                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                  rows="3"
                                                  placeholder="Enter some long form content."
                                                ><?= $vacancy['conditions_vacancy'] ?></textarea>
                                              </label>

                                            <br>
                                            <button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Изменить</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>


                      <? endif; ?>
                   <?php endforeach;?>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
        </main>
      </div>
    </div>
  </body>
</html>
