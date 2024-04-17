<?php require '../layouts/header.php'; ?>
<?php include_once '../models/resume.php';
$resumes = getResumes();  
?>

<h1 class="text-center font-extrabold text-[40px]">Ответы на резюме</h1>

<section class="text-gray-600 body-font">
    <div class="flex flex-wrap max-w-[1820px] mx-auto">

    <?php foreach ($resumes as $resume):?>
      <?php if ($user['id'] == $resume['id']):?>
      <div class="p-4 md:w-1/3 max-h-12">
        <div class="h-full border-2 bg-[#392D88] border-black border-opacity-60 rounded-lg overflow-hidden">
          <div class="p-6">
            <h2 class="tracking-widest text-xs title-font font-medium text-white mb-1 uppercase">Код резюме:<?= $resume['id_resume'] ?></h2>
            <h1 class="title-font text-lg font-medium text-white mb-3">Статус резюме:
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
                            Отклонено
                            </span>   
                        <? endif; ?>
            </h1>
            <h1 class="title-font text-lg font-medium text-white mb-3">Профессия: <?= $resume['name_vacancy'] ?></h1>
            <p class="title-font text-base font-medium text-white mb-3">  <? if ($resume['status_resume'] == 0): ?>
                        <span
                          class="text-white"
                        >
                            Ваше резюме рассматривается администрацией.
                      </span>
                            <?  elseif (($resume['status_resume'] == 1)): ?>
                            <span
                          class="text-white"
                        >
                              Ваше резюме одобренно! Приходите в офис с 7:00 до 16:00 в любой день.
                            </span>
                            <?  else: ?>
                        <span
                          class="text-white">
                          Ваше резюме отклоненно. К сожалению вы к нам не подходите.
                          </span>   
                        <? endif; ?> </p>
          </div>
        </div>
      </div>
      <?php endif;?>
    <?php endforeach;?>
  </div>
  
</section> 

<?php require '../layouts/footer.php'; ?>