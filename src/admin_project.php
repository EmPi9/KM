<?php require '../layouts/admin_header.php'; ?>
<?php include_once '../models/project.php'; 
$projects = getProjects() ?>

        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Проекты
            </h2>

            <!-- General elements -->
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              Добавление завершенных проектов
            </h4>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <form action="../controllers/addProject.php" method="post" enctype="multipart/form-data" class='text-center'>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Название</span>
                <textarea name="name_project" id="name_project"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Название"></textarea>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Тип</span>
                <textarea name="type_project" id="type_project"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Тип"></textarea>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Цена</span>
                <textarea name="cost_project" id="cost_project"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Цена"></textarea>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Описание</span>
                <textarea name="desc_project" id="desc_project"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Описание"></textarea>

              </label> <br>
              <label class="block mt-4 text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Фотография</span>
                <input name="img_project" id="img_project" type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Цена">
              </label>

              <button
                  class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                  Отправить
                </button>
            </div>
            </form>

            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              Созданные завершенные проекты
            </h4>
            <!-- Table -->


            <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
                <div class="w-full overflow-x-auto ">
                  <table class="w-full whitespace-no-wrap">
                    <thead>
                      <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Название</th>
                        <th class="px-4 py-3">Тип</th>
                        <th class="px-4 py-3">Цена</th>
                        <th class="px-4 py-3">Статус</th>
                        <th class="px-4 py-3">Действия</th>
                      </tr>
                    </thead>
                    <tbody
                      class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                    >
                    <?php foreach($projects as $project):?>
                      <? if ($project['status_project'] == 0): ?>
                      <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                          <div class="flex items-center text-sm">
                  
                            <div>
                              <p class="font-semibold"><?= $project['name_project']?></p>
                              <p class="text-xs text-gray-600 dark:text-gray-400">
                            <?= $project['id_project'] ?>
                            </p>
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                        <?= $project['type_project']?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                        <?= $project['cost_project']?>
                        </td>
                        <td class="px-4 py-3 text-xs">
                          <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                          >
                            На сайте 
                          </span>
                        </td>
                        <td class="px-4 py-3">
                          <div class="flex items-center space-x-4 text-sm">
                            <button data-modal-target="edit<?= $project['id_project'] ?>" data-modal-toggle="edit<?= $project['id_project'] ?>"
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

                            <div class="flex items-center space-x-4 text-sm">
                            <button data-modal-target="arch<?= $project['id_project'] ?>" data-modal-toggle="arch<?= $project['id_project'] ?>"
                                  aria-label="Edit"
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
                          </div>
                        </td>
                      </tr>

                      <div id="arch<?= $project['id_project'] ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="arch<?= $project['id_project'] ?>">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    
                                      <div class="px-6 py-6 mx-auto lg:px-8">
                                          <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Архивировать завершенных проектов №<?= $project['id_project'] ?> </h3>
                                            <p class="pb-2 dark:text-white">
                                            Вы точно хотите архивировать проект <?= $project['name_project'] ?>?
                                            </p>
                                            <br>
                                        <a href="../controllers/archivingProject.php?id_project=<?=$project['id_project']?>" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Архивировать</a>
                                      </div>
                                </div>
                            </div>
                        </div>


                        
                      <div id="edit<?= $project['id_project'] ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="edit<?= $project['id_project'] ?>">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <form action="../controllers/editProject.php" method="post" enctype="multipart/form-data">
                                      
                                    <input id="id_project" name="id_project" type="hidden" value="<?= $project['id_project'] ?>">
                                      <div class="px-6 py-6 mx-auto lg:px-8">
                                          <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Изменение завершенного проекта # <?= $project['id_project'] ?> </h3>

                                              <label class="block text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">Название</span>
                                                <input name="name_project" id="name_project"
                                                  class="block w-full w-1/2 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                  placeholder="Jane Doe" value="<?= $project['name_project'] ?>"
                                                />
                                              </label>

                                              <label class="block text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">Тип</span>
                                                <input name="type_project" id="type_project"
                                                  class="block w-full w-1/2 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                  placeholder="Jane Doe" value="<?= $project['type_project'] ?>"
                                                />
                                              </label>

                                              <label class="block text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">Цена</span>
                                                <input name="cost_project" id="cost_project"
                                                  class="block w-full w-1/2 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                  placeholder="Jane Doe" value="<?= $project['cost_project'] ?>"
                                                />
                                              </label>

                                              <label class="block mt-4 text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">Описание</span>
                                                <textarea name="desc_project" id="desc_project"
                                                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                  rows="3"
                                                  placeholder="Enter some long form content."
                                                ><?= $project['desc_project'] ?></textarea>
                                              </label>
<!-- 
                                                <label class="block mt-4 text-sm mb-4">
                                                  <span class="text-gray-700 dark:text-gray-400">Фотография</span>
                                                  <input name="img_project" id="img_project" type="file"
                                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                    placeholder="Цена" value="<?= $project['img_project'] ?>">
                                                </label> -->



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
              <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
              >
                <span class="flex items-center col-span-3">
                  Показано 1-3 из 100
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                  <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                      <li>
                        <button
                          class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                          aria-label="Previous"
                        >
                          <svg
                            aria-hidden="true"
                            class="w-4 h-4 fill-current"
                            viewBox="0 0 20 20"
                          >
                            <path
                              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                              clip-rule="evenodd"
                              fill-rule="evenodd"
                            ></path>
                          </svg>
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          1
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          2
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          3
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          4
                        </button>
                      </li>
                      <li>
                        <span class="px-3 py-1">...</span>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          8
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          9
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                          aria-label="Next"
                        >
                          <svg
                            class="w-4 h-4 fill-current"
                            aria-hidden="true"
                            viewBox="0 0 20 20"
                          >
                            <path
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"
                              fill-rule="evenodd"
                            ></path>
                          </svg>
                        </button>
                      </li>
                    </ul>
                  </nav>
                </span>
              </div>
            </div>

           
    
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 mt-10 dark:text-gray-300 mb-10">
              Архивированные завершенные проекты
            </h4>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                  <table class="w-full whitespace-no-wrap">
                    <thead>
                      <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Название</th>
                        <th class="px-4 py-3">Тип</th>
                        <th class="px-4 py-3">Цена</th>
                        <th class="px-4 py-3">Статус</th>
                        <th class="px-4 py-3">Действия</th>
                      </tr>
                    </thead>
                    <tbody
                      class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                    >
                    <?php foreach($projects as $project):?>
                      <? if ($project['status_project'] == 1): ?>
                      <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                          <div class="flex items-center text-sm">
                  
                            <div>
                              <p class="font-semibold"><?= $project['name_project']?></p>
                              <p class="text-xs text-gray-600 dark:text-gray-400">
                            <?= $project['id_project'] ?>
                            </p>
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                        <?= $project['type_project']?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                        <?= $project['cost_project']?>
                        </td>
                        <td class="px-4 py-3 text-xs">

                        <? if ($project['status_project'] == 0): ?>
                          <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                            На сайте 
                          </span>
                        <? elseif ($project['status_project'] == 1): ?>
                          <span
                          class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600"
                            >
                            Архивировано
                          </span>
                        <? endif; ?>
                        </td>
                        <td class="px-4 py-3">

                          <div class="flex items-center space-x-4 text-sm">
                          <button data-modal-target="1edit<?= $project['id_project'] ?>" data-modal-toggle="1edit<?= $project['id_project'] ?>"
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

                            <div class="flex items-center space-x-4 text-sm">
                            <button data-modal-target="back<?= $project['id_project'] ?>" data-modal-toggle="back<?= $project['id_project'] ?>"
                                  aria-label="Edit"
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
                      </div>
                        </td>
                      </tr>


                      <div id="back<?= $project['id_project'] ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="back<?= $project['id_project'] ?>">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    
                                      <div class="px-6 py-6 mx-auto lg:px-8">
                                          <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Вернуть завершенной проект №<?= $project['id_project'] ?> </h3>
                                            <p class="pb-2 dark:text-white">
                                            Вы точно хотите вернуть архивированный проект <?= $project['name_project'] ?>?
                                            </p>
                                            <br>
                                        <a href="../controllers/returnProject.php?id_project=<?=$project['id_project']?>" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Вернуть проект</a>
                                      </div>
                                </div>
                            </div>
                        </div>

                             
                      <div id="1edit<?= $project['id_project'] ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="1edit<?= $project['id_project'] ?>">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <form action="../controllers/editProject.php" method="post" enctype="multipart/form-data">
                                      
                                    <input id="id_project" name="id_project" type="hidden" value="<?= $project['id_project'] ?>">
                                      <div class="px-6 py-6 mx-auto lg:px-8">
                                          <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Изменение завершенного проекта # <?= $project['id_project'] ?> </h3>

                                              <label class="block text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">Название</span>
                                                <input name="name_project" id="name_project"
                                                  class="block w-full w-1/2 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                  placeholder="Jane Doe" value="<?= $project['name_project'] ?>"
                                                />
                                              </label>

                                              <label class="block text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">Тип</span>
                                                <input name="type_project" id="type_project"
                                                  class="block w-full w-1/2 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                  placeholder="Jane Doe" value="<?= $project['type_project'] ?>"
                                                />
                                              </label>

                                              <label class="block text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">Цена</span>
                                                <input name="cost_project" id="cost_project"
                                                  class="block w-full w-1/2 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                  placeholder="Jane Doe" value="<?= $project['cost_project'] ?>"
                                                />
                                              </label>

                                              <label class="block mt-4 text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">Описание</span>
                                                <textarea name="desc_project" id="desc_project"
                                                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                  rows="3"
                                                  placeholder="Enter some long form content."
                                                ><?= $project['desc_project'] ?></textarea>
                                              </label>
<!-- 
                                                <label class="block mt-4 text-sm mb-4">
                                                  <span class="text-gray-700 dark:text-gray-400">Фотография</span>
                                                  <input name="img_project" id="img_project" type="file"
                                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                    placeholder="Цена" value="<?= $project['img_project'] ?>">
                                                </label> -->



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
               
              <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
              >
                <span class="flex items-center col-span-3">
                  Показано 1-3 из 100
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                  <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                      <li>
                        <button
                          class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                          aria-label="Previous"
                        >
                          <svg
                            aria-hidden="true"
                            class="w-4 h-4 fill-current"
                            viewBox="0 0 20 20"
                          >
                            <path
                              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                              clip-rule="evenodd"
                              fill-rule="evenodd"
                            ></path>
                          </svg>
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          1
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          2
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          3
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          4
                        </button>
                      </li>
                      <li>
                        <span class="px-3 py-1">...</span>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          8
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          9
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                          aria-label="Next"
                        >
                          <svg
                            class="w-4 h-4 fill-current"
                            aria-hidden="true"
                            viewBox="0 0 20 20"
                          >
                            <path
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"
                              fill-rule="evenodd"
                            ></path>
                          </svg>
                        </button>
                      </li>
                    </ul>
                  </nav>
                </span>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
  </body>
</html>
