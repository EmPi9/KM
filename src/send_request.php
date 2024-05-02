<?php require '../layouts/header.php'; ?>

<style>
  .input-container {
	position: relative;
}
  .input-container input {
    padding-right: 30px; /* Размер места для символа рубля */
}
  .currency-symbol {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(25%)
}  
</style>
  <section class="text-black body-font relative">
    <div class="px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-12">
        <h1 class="text-center font-extrabold text-[40px] pb-6 element_animation top_animation">Заявка на проект</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base pb-6  element_animation bottom_animation">Оставьте заявку, а мы ей рассмотрим в течение дня!</p>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base element_animation bottom_animation">Если вы хотите подпункт в требование, указывате по форме c новой строки. Например: 4.1 </p>
      </div>
      <form action="../controllers/addRequest.php" method="post" enctype="multipart/form-data">
      <div class="lg:w-1/2 md:w-2/3 mx-auto">
      <input id="id" name="id" type="hidden" value="<?=$user['id']?>">
      <input id="username" name="username" type="hidden" value="<?=$user['username']?>">
      <input id="comment_request" name="comment_request" type="hidden">


        <div class="flex flex-wrap -m-2">
          <div class="p-2 w-full element_animation right_animation">
            <div class="relative">
              <label for="name_request" class="leading-7 text-2xl font-semibold text-black">Название проекта</label>
              <input type="text" id="name_request" name="name_request" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>

          <div class="p-2 w-1/2 element_animation left_animation">
            <div class="relative">
              <label for="name_company" class="leading-7 text-2xl font-semibold text-black mb-4">Название компании</label>
              <input type="text" id="name_company" name="name_company" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>

          <div class="p-2 w-1/2 element_animation right_animation">
            <div class="input-container">
            <label for="price_request" class="leading-7 text-2xl font-semibold text-black">Стоимость проекта</label>
            <input type="text" id="price_request" name="price_request" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            <span class="currency-symbol">&#8381;</span>
        </div>
    </div>


          <div class="p-2 w-full element_animation left_animation">
            <div class="relative">
              <label for="description_request" class="leading-7 text-2xl font-semibold text-black">1. Описание проекта</label>
              <textarea type="text" id="description_request" name="description_request" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </textarea>
            </div>
          </div>

        
        <div class="p-2 w-full element_animation right_animation">
            <div class="relative">
              <label for="reliability_request" class="leading-7 text-2xl font-semibold text-black">2. Требования к надежности</label>
              <textarea type="text" id="reliability_request" name="reliability_request" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </textarea>
            </div>
          </div>


        <div class="p-2 w-full element_animation right_animation">
            <div class="relative">
              <label for="manufacturability_request" class="leading-7 text-2xl font-semibold text-black">3. Требования к технологичности</label>
              <textarea type="text" id="manufacturability_request" name="manufacturability_request" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </textarea>
            </div>
          </div>


        <div class="p-2 w-full element_animation left_animation">
            <div class="relative">
              <label for="security_request" class="leading-7 text-2xl font-semibold text-black">4. Требования к безопасности</label>
              <textarea type="text" id="security_request" name="security_request" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </textarea>
            </div>
          </div>


        <div class="p-2 w-full element_animation right_animation">
            <div class="relative">
              <label for="documentation_equipment_request" class="leading-7 text-2xl font-semibold text-black">5. Требования к документации</label>
              <textarea type="text" id="documentation_equipment_request" name="documentation_equipment_request" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </textarea>
            </div>
          </div>

        
          <div class="p-2 w-full element_animation left_animation">
            <div class="relative">
              <label for="program_request" class="leading-7 text-2xl font-semibold text-black">6. Требования к программному обеспечению</label>
              <textarea type="text" id="program_request" name="program_request" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </textarea>
            </div>
          </div>


        <div class="p-2 w-full element_animation right_animation">
            <div class="relative">
              <label for="acceptance_request" class="leading-7 text-2xl font-semibold text-black">7. Требования к приемке</label>
              <textarea type="text" id="acceptance_request" name="acceptance_request" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </textarea>
            </div>
          </div>


        <div class="p-2 w-full element_animation left_animation">
            <div class="relative">
              <label for="warranty_request" class="leading-7 text-2xl font-semibold text-black">8. Гарантийные обязательства</label>
              <textarea type="text" id="warranty_request" name="warranty_request" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </textarea>
            </div>
          </div>
        </div>

        <div class="p-2 flex justify-between text-center pt-10 element_animation right_animation">
        <? if (!isset($_SESSION['user'])): ?>
          <a href="./registration.php" class="leading-7 text-2xl font-semibold text-black">Зарегестрируйтесь</a> <p>или</p>  <a href="./login.php" class="leading-7 text-2xl font-semibold text-black">Авторизируйтесь</a>
        <?else: ?>
          <button href="" class="bg-[#392D88] text-[24px] text-white font-semibold px-10 py-2 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">Отправить</button>
        <?php endif; ?>  
        </div>

      </div>
    </form>
    </div>
  </section>
  
  <section class="text-black body-font relative">
    <div class="px-5 mx-auto">
      <div class="flex flex-col text-center w-full mb-12">
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base element_animation bottom_animation">Оставить заявку по своему файлу или самому заполнить <a href="../assets/documents/shablon.docx" class="underline">шаблон</a>.</p>
      </div>
      <form action="../controllers/addRequestdocs.php" method="post" enctype="multipart/form-data">
      <div class="lg:w-1/2 md:w-2/3 mx-auto element_animation right_animation">
      <input id="id" name="id" type="hidden" value="<?=$user['id']?>">
      <input id="username" name="username" type="hidden" value="<?=$user['username']?>">
      <input id="comment_request" name="comment_request" type="hidden">

          <div class="p-2 w-full">
            <div class="relative">
              <label class="leading-7 text-2xl font-semibold text-black mb-4">Название компании</label>
              <input type="text" id="name_company" name="name_company" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <label for="document_request" class="leading-7 text-2xl font-semibold text-black">Техническое задание</label>
              <input type="file" id="document_request" name="document_request" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>

        
        <div class="p-2 flex justify-between text-center pt-10">
        <? if (!isset($_SESSION['user'])): ?>
          <a href="./registration.php" class="leading-7 text-2xl font-semibold text-black">Зарегестрируйтесь</a> <p>или</p>  <a href="./login.php" class="leading-7 text-2xl font-semibold text-black">Авторизируйтесь</a>
        <?else: ?>
          <button href="" class="bg-[#392D88] text-[24px] text-white font-semibold px-10 py-2 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">Отправить</button>
        <?php endif; ?>  
        </div>

      </div>
    </form>
    </div>
  </section>


  <script src="../assets/js/mask_rubles.js"></script>
  <script src="../assets/js/animation_by_scroll.js"></script>

<!-- Footer -->
<?php require '../layouts/footer.php'; ?>
