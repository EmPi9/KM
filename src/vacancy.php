<link rel="stylesheet" href="../assets/styles/accordion.css">
<?php require '../layouts/header.php'; 
$websiteTitle = 'Вакансии'; ?>

<?php include_once '../models/vacancy.php';
$vacancys = getVacancys() ?>

    <h1 class="text-center font-extrabold text-[40px] pb-6 element_animation top_animation">Вакансии</h1>

  <div class="max-w-[1820px] mx-auto">


  <?php foreach ($vacancys as $vacancy):?>
    <label for="chk-<?= $vacancy['id_vacancy'] ?>">
    <input id="chk-<?= $vacancy['id_vacancy'] ?>" type="checkbox"/>
     <div class="title element_animation bottom_animation">
         <h3><?= $vacancy['name_vacancy'] ?></h3>
     </div>
      <div class="content element_animation bottom_animation">
          <p>
            <b class="text-3xl">Обязанности:</b> <br>
            <?= $vacancy['respons_vacancy'] ?>
            <br>
            <button class="mt-10 mb-5">
              <a href="#anketa" class="bg-[#392D88] text-white font-bold px-10 py-4 rounded-xl border-2 border-white hover:bg-white hover:text-[#392D88] transition-all duration-700" href="./">Оставить заявку</a>
            </button>
          </p>
          <p>
            <b class="text-3xl">Требования:</b> <br>
            <?= $vacancy['requir_vacancy'] ?>
            <br>
          </p> 

          <p>
            <b class="text-3xl">Условия:</b> <br>
            <?= $vacancy['conditions_vacancy'] ?> 
            <br>
          </p>
        </div>
    </label>
    <?php endforeach;?>



    <!-- <label for="chk-1">
    <input id="chk-1" type="checkbox"/>
     <div class="title element_animation bottom_animation">
         <h3>Инженер-электромеханик</h3>
     </div>
      <div class="content element_animation bottom_animation">
          <p>
            <b class="text-3xl">Обязанности:</b> <br>
            - Организовывать техническое обслуживание автоматизированного парковочного комплекса; <br>
            - Обеспечивать безопасную эксплуатацию подъемного оборудования, электрических сетей; <br>
            - Готовить и согласовывать технические задания, в части эксплуатации и обслуживания АПК; <br>
            - Организовывать проверку и испытания контрольно-измерительных приборов и средств автоматики; <br>
            <button class="mt-10 mb-5">
              <a href="#anketa" class="bg-[#392D88] text-white font-bold px-10 py-4 rounded-xl border-2 border-white hover:bg-white hover:text-[#392D88] transition-all duration-700" href="./">Оставить заявку</a>
            </button>
           
          </p>
          <p>
            <b class="text-3xl">Требования:</b> <br>
            - Высшее или среднее техническое образование <br>
            - Знание правил охраны труда и пожарной безопасности <br>
            - Стаж работы по специальности не менее 3 лет, опыт работы в должности электромеханика от 1 года <br>
          </p> 

          <p>
            <b class="text-3xl">Условия:</b> <br>
            - График работы: 5/2 <br>
            - ДМС <br>
            - Оплата 2 раза в месяц <br>
            - Трудоустройство согласно ТК РФ <br>
          </p>
          
        </div>
        
    </label>
    
    <label for="chk-3">
    <input id="chk-3" type="checkbox" />
       <div class="title element_animation bottom_animation">
         <h3>Слесарь КИПиА</h3>
     </div>
     <div class="content">
      <p>
        <b>Обязанности</b> <br>
        - Организовывать техническое обслуживание автоматизированного парковочного комплекса; <br>
        - Обеспечивать безопасную эксплуатацию подъемного оборудования, электрических сетей; <br>
        - Готовить и согласовывать технические задания, в части эксплуатации и обслуживания АПК; <br>
        - Организовывать проверку и испытания контрольно-измерительных приборов и средств автоматики; <br>
        <button class="mt-10 mb-5">
          <a href="#anketa" class="bg-[#392D88] text-white font-bold px-10 py-4 rounded-xl border-2 border-white hover:bg-white hover:text-[#392D88] transition-all duration-700" href="./">Оставить заявку</a>
        </button>
       
      </p>
      <p>
        <b>Требования</b> <br>
        - Высшее или среднее техническое образование <br>
        - Знание правил охраны труда и пожарной безопасности <br>
        - Стаж работы по специальности не менее 3 лет, опыт работы в должности электромеханика от 1 года <br>
      </p> 

      <p>
        <b>Условия</b> <br>
        - График работы: 5/2 <br>
        - ДМС <br>
        - Оплата 2 раза в месяц <br>
        - Трудоустройство согласно ТК РФ <br>
      </p>
      
    </div>
    </label>
    
    <label for="chk-4">
    <input id="chk-4" type="checkbox" />
       <div class="title element_animation bottom_animation">
         <h3>Автоэлектрик</h3>
     </div>
     <div class="content">
      <p>
        <b>Обязанности</b> <br>
        - Организовывать техническое обслуживание автоматизированного парковочного комплекса; <br>
        - Обеспечивать безопасную эксплуатацию подъемного оборудования, электрических сетей; <br>
        - Готовить и согласовывать технические задания, в части эксплуатации и обслуживания АПК; <br>
        - Организовывать проверку и испытания контрольно-измерительных приборов и средств автоматики; <br>
        <button class="mt-10 mb-5">
          <a href="#anketa" class="bg-[#392D88] text-white font-bold px-10 py-4 rounded-xl border-2 border-white hover:bg-white hover:text-[#392D88] transition-all duration-700" href="./">Оставить заявку</a>
        </button>
       
      </p>
      <p>
        <b>Требования</b> <br>
        - Высшее или среднее техническое образование <br>
        - Знание правил охраны труда и пожарной безопасности <br>
        - Стаж работы по специальности не менее 3 лет, опыт работы в должности электромеханика от 1 года <br>
      </p> 

      <p>
        <b>Условия</b> <br>
        - График работы: 5/2 <br>
        - ДМС <br>
        - Оплата 2 раза в месяц <br>
        - Трудоустройство согласно ТК РФ <br>
      </p>
      
    </div>
    </label> -->

    </div>
  <section class="text-black body-font relative element_animation bottom_animation" id="anketa">
    <div class="px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-12">
        <h1 class="text-center font-extrabold text-[40px] pb-6">Анкета</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Оставьте анкету, а мы ей рассмотрим в течение дня!</p>

      </div>
      <form action="../controllers/addResume.php" method="post" enctype="multipart/form-data">
      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <div class="flex flex-wrap -m-2">
        <input id="id" name="id" type="hidden" value="<?=$user['id']?>">
        <input id="username" name="username" type="hidden" value="<?=$user['username']?>">
        <input id="email" name="email" type="hidden" value="<?=$user['email']?>">

          <div class="p-2 w-full">
            <div class="relative">
              <label for="fio_resume" class="leading-7 text-2xl font-semibold text-black">Стаж работы*</label>
              <input type="text" name="exp_resume" id="exp_resume" required class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <label for="tel_resume" class="leading-7 text-2xl font-semibold text-black">Уменя/Знания*</label>
              <input type="text" id="skill_resume" name="skill_resume" required class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <label for="email_resume" class="leading-7 text-2xl font-semibold text-black">Достижения</label>
              <input type="text" id="achiv_resume" name="achiv_resume" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>


          <div class="p-2 w-1/2">
            <div class="relative">
              <label for="name_resume" class="leading-7 text-2xl font-semibold text-black">Образование*</label>
              <select type="text" required id="education_resume" name="education_resume" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                <option>Среднее профессиональное образование</option>
                <option>Высшее образование - бакалавриат</option>
                <option>Высшее образование - специалитет, магистратура</option>
                <option>Высшее образование - кадров высшей квалификации</option>
                <option>Два высших образования</option>
                <option>Другое образование</option>
              </select>
            </div>
          </div>


          <div class="p-2 w-1/2">
            <div class="relative">
              <label for="name_vacancy" class="leading-7 text-2xl font-semibold text-black">Выберите профессию*</label>
              <select type="text" required id="name_vacancy" name="name_vacancy" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              <?php foreach ($vacancys as $vacancy):?>
                <option><?= $vacancy['name_vacancy'] ?></option>
              <?php endforeach;?>
                <option>Другая профессия</option>
              </select>
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <label for="name_resume" class="leading-7 text-2xl font-semibold text-black text-center">О себе*</label>
              <textarea type="text" required id="about_resume" name="about_resume" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </textarea>
            </div>
          </div>


        </div>

        <div class="p-2 flex justify-between text-center pt-10">
        <? if (!isset($_SESSION['user'])): ?>
          <a href="./registration.php" class="leading-7 text-2xl font-semibold text-black">Зарегестрируйтесь</a> <p>или</p>  <a href="./login.php" class="leading-7 text-2xl font-semibold text-black">Авторизируйтесь</a>
        <?else: ?>
          <div class="p-2 flex justify-center text-center pt-10 element_animation bottom_animation">
          <button href="" class="bg-[#392D88] text-[24px] text-white font-semibold px-10 py-2 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">Отправить</button>
        </div>
        <?php endif; ?>  
        </div>

       




      </div>
    </div>
  </section>
  <script src="../assets/js/animation_by_scroll.js"></script>

<!-- Footer -->
<?php require '../layouts/footer.php'; ?>

