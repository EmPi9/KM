<?php require '../layouts/admin_header.php'; ?>
<?php include_once '../models/resume.php';
$resume = getResume($_GET['id_resume']);
?>
<main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Резюме: <?=$resume['username']?>
            </h2>
            <!-- With actions -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
               <p class="my-6 text-2xl font-base text-gray-700 dark:text-gray-200">Код резюме: <?=$resume['id_resume']?></p>
               <p class="my-6 text-2xl font-base text-gray-700 dark:text-gray-200">Профессия: <?=$resume['name_vacancy']?></p>
               <p class="my-6 text-2xl font-base text-gray-700 dark:text-gray-200">Стаж работы: <?=$resume['exp_resume']?></p>
               <p class="my-6 text-2xl font-base text-gray-700 dark:text-gray-200">Знания\Уменя: <?=$resume['skill_resume']?></p>
               <p class="my-6 text-2xl font-base text-gray-700 dark:text-gray-200">Достижения: <?=$resume['achiv_resume']?></p>
               <p class="my-6 text-2xl font-base text-gray-700 dark:text-gray-200">Образование: <?=$resume['education_resume']?></p>
               <p class="my-6 text-2xl font-base text-gray-700 dark:text-gray-200">ФИО: <?=$resume['username']?></p>
               <p class="my-6 text-2xl font-base text-gray-700 dark:text-gray-200">Электронная почта: <?=$resume['email']?></p>
               <p class="my-6 text-2xl font-base text-gray-700 dark:text-gray-200">О себе: <?=$resume['about_resume']?></p>

               <div class="mt-10 py-4">
                <a href="../controllers/acceptResume.php?id_resume=<?=$resume['id_resume']?>" class="px-10 py-4 text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Принять</a>


                <a href="../controllers/cancelResume.php?id_resume=<?=$resume['id_resume']?>" class="px-10 py-4 text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">Отклонить</a>
                </div>

                <div id="accept_resume" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="<?= $user['id'] ?>1">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                
                  <div class="px-6 py-6 mx-auto lg:px-8">
                      <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Отклонить резюме №<?=$resume['id_resume']?></h3>
                      <form action="../controllers/deniedRequest.php" method="post" enctype="multipart/form-data" >
            <input id="id_request" name="id_request" type="hidden" value="<?=$request['id_request']?>">
                <p class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">

                </p>
                <label class="block mt-2 text-sm">
                <span class="text-gray-700 dark:text-gray-400 my-6">Вы точно хотите отклонить резюме <?=$resume['username']?></span>
            
                  </label> <br>
                <a class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Отклонить</ф>
                  </form>
                </div>
            </div>
        </div>
      </div>
      </div>

    

              </div>
              </div>
            </div>
          </div>
        </main>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
    </div>
  </body>
</html>