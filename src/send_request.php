<?php require '../layouts/header.php'; ?>
  <section class="text-black body-font relative">
    <div class="px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-12">
        <h1 class="text-center font-extrabold text-[40px] pb-6 element_animation top_animation">Заявка на проект</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base element_animation bottom_animation">Оставьте заявку, а мы ей рассмотрим в течение дня!</p>
      </div>
      <form action="../controllers/addRequest.php" method="post" enctype="multipart/form-data">
      <div class="lg:w-1/2 md:w-2/3 mx-auto element_animation right_animation">
      <input id="id" name="id" type="hidden" value="<?=$user['id']?>">
      <input id="username" name="username" type="hidden" value="<?=$user['username']?>">

        <div class="flex flex-wrap -m-2">
          <div class="p-2 w-full">
            <div class="relative">
              <label for="name_request" class="leading-7 text-2xl font-semibold text-black">Название проекта</label>
              <input type="text" id="name_request" name="name_request" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <label for="name_company" class="leading-7 text-2xl font-semibold text-black mb-4">Название компании</label>
              <input type="text" id="name_company" name="name_company" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <label for="price_request" class="leading-7 text-2xl font-semibold text-black">Цена проекта</label>
              <input type="number" id="price_request" name="price_request" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>


          <div class="p-2 w-full">
            <div class="relative">
              <label for="description_request" class="leading-7 text-2xl font-semibold text-black">Описание проекта</label>
              <textarea type="text" id="description_request" name="description_request" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </textarea>
            </div>
          </div>


        </div>
        <div class="p-2 flex justify-center text-center pt-10">
        <? if (!isset($_SESSION['user'])): ?>
          <a href="./registration.php" class="leading-7 text-2xl font-semibold text-black">Зарегестрируйтесь</a> <p>или</p>  <a href="./login.php.php" class="leading-7 text-2xl font-semibold text-black">Авторизируйтесь</a>
        <?else: ?>
          <button href="" class="bg-[#392D88] text-[24px] text-white font-semibold px-10 py-2 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">Отправить</button>
        <?php endif; ?>  
          
        </div>
      </div>
    </form>
    </div>
  </section>
  <script src="../assets/js/animation_by_scroll.js"></script>

<!-- Footer -->
<?php require '../layouts/footer.php'; ?>
