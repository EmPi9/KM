
<?php require '../layouts/header.php'; ?>
<?php include_once '../models/resume.php';
$resumes = getResumes() ?>

 <div class="container px-5 py-12 mx-auto ">
    <div class="flex flex-wrap text-center -m-4">
      <div class="p-4 lg:w-2/2 md:w-full">
        <div class="flex border-2 rounded-lg bg-white p-6 sm:flex-row flex-col">
          <section class="text-gray-600 body-font relative">
            <div class="container px-5 py-12 mx-auto">
              <div class="flex flex-col text-center w-full mb-2">
              <h1 class="mx-auto leading-relaxed text-base">Мой уникальный номер: <?= $user['id'] ?></h1>
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900"><?= $user['username'] ?></h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base"> <?= $user['email'] ?></p>
              </div>
              <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <div class="flex flex-wrap -m-2">
                  <div class="p-2 w-1/2">
                    <div class="relative">
                      <label for="name" class="leading-7 text-sm text-gray-600">Логин</label>
                      <input value=<?= $user['login'] ?> type="text" name="login" id="login" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-[#F56E1E] focus:bg-white focus:ring-2 focus:ring-[#F56E1E] text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                  </div>
                  <div class="p-2 w-1/2">
                    <div class="relative">
                      <label for="email" class="leading-7 text-sm text-gray-600">Ваше имя</label>
                      <input value=<?= $user['username'] ?> type="text" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border[#F56E1E] focus:bg-white focus:ring-2 focus:ring-[#F56E1E] text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                  </div>
                  <div class="p-2 w-1/2">
                    <div class="relative">
                      <label for="tel" class="leading-7 text-sm text-gray-600">E-mail</label>
                      <input value=<?= $user['email'] ?> type="text" name="username" id="username" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border[#F56E1E] focus:bg-white focus:ring-2 focus:ring-[#F56E1E] text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                  </div>

                  
                  <div class="p-2 w-1/2">
                    <div class="relative">
                      <label for="name" class="leading-7 text-sm text-gray-600">Старый пароль</label>
                      <input type="password" minlength="6" name="oldPassword" id="oldPassword" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border[#F56E1E]focus:bg-white focus:ring-2 focus:ring-[#F56E1E] text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                  </div>
                  <div class="p-2 w-1/2">
                    <div class="relative">
                      <label for="message" class="leading-7 text-sm text-gray-600">Новый пароль</label>
                      <input type="password" minlength="6" name="password" id="password" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border[#F56E1E] focus:bg-white focus:ring-2 focus:ring-[#F56E1E] text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                  </div>
                  <div class="p-2  w-1/2">
                    <div class="relative">
                      <label for="message" class="leading-7 text-sm text-gray-600">Новый пароль</label>
                      <input type="password" minlength="6" name="confirmPassword" id="confirmPassword" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border[#F56E1E] focus:bg-white focus:ring-2 focus:ring-[#F56E1E] text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                  </div>

                  <div class="p-2 mt-4 justify-center">
                  <a href="#" class="bg-[#392D88] text-white font-semibold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">СОХРАНИТЬ</a>
                  </div>

                  <div class="p-2 mt-4 justify-center">
                  <a href="./order.php" class="bg-[#392D88] text-white font-semibold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">МОИ ЗАЯВКИ</a>
                  </div>

                  <div class="p-2 mt-4 justify-center">
                  <a href="../controllers/logout.php" class="bg-[#392D88] text-white font-semibold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">ВЫЙТИ</a>
                  </div>

                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>


<h1 class="text-center font-extrabold text-[40px]">Ответы на вакансию</h1>

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