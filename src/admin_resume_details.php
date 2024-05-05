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
              </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>