<?php require '../layouts/admin_header.php'; ?>
<?php include_once '../models/request.php';
$request = getRequest($_GET['id_request']);
?>

            <div class="px-10">
                <div class="mb-10 text-white flex flex-col gap-4 justify-between">
                    <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Код заявки: <?=$request['id_request']?>.</p>
                    <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Название: <?=$request['name_request']?>.</p>
                    <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Стоимость заявки: <?=$request['price_request']?>.</p>
                    <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Дата заявки: <?=$request['date_request']?>.</p>
                    <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Компания: <?=$request['name_company']?>.</p>
                    <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Описание проекта: <?=$request['description_request']?>.</p>
                </div>
                <div class="mb-10 text-white flex">
                    <a href="../assets/documents/<?=$request['document_request']?>" class="text-xl my-6 px-10 py-4 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">Скачать Техническое Задание</a>
                </div>

                <div class="py-4">
                    <a href="../controllers/acceptRequest.php?id_request=<?=$request['id_request']?>" class="px-10 py-4 text-xl font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Принять</a>
                    <div class="flex items-center space-x-4 text-sm">
                          <a @click="openModal" 
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
                          </a>
                        </div>
                               <!-- Modal backdrop. This what you want to place close to the closing body tag -->
    <div
      x-show="isModalOpen"
      x-transition:enter="transition ease-out duration-150"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
    >
      <!-- Modal -->
      <div
        x-show="isModalOpen"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-1/2"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0  transform translate-y-1/2"
        @click.away="closeModal"
        @keydown.escape="closeModal"
        class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
        role="dialog"
        id="modal"
      >
        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
        <header class="flex justify-end">
          <button
            class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
            aria-label="close"
            @click="closeModal"
          >
            <svg
              class="w-4 h-4"
              fill="currentColor"
              viewBox="0 0 20 20"
              role="img"
              aria-hidden="true"
            >
              <path
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
                fill-rule="evenodd"
              ></path>
            </svg>
          </button>
        </header>
        <!-- Modal body -->
        <div class="mt-4 mb-6">
          <!-- Modal title -->
          <p
            class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300"
          >
            Укажите причину отказа.
          </p>
          <!-- Modal description -->
            <form action="../controllers/deniedRequest.php" method="post" enctype="multipart/form-data" >
                <p class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">

                </p>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Причина</span>
                <textarea name="comment_request" id="comment_request"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Причина"></textarea>

              </label> <br>
              <button type="submit" class="btn btn-success">Отправить</button>
            </form>
        </div>
        </div>
                   
                   </div> 
                </div>

                <div class="mb-10 text-white flex">
                    <a href="./admin_request.php" class="text-xl my-6 px-10 py-4 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">Вернуться Назад</a>
                </div>
            </div>
