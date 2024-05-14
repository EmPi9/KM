<?php require '../layouts/header.php'; ?>
<?php include_once '../models/request.php';
$request = getRequest($_GET['id_request']);

?>
  <div class="min-w-screen min-h-screen flex items-center p-5 lg:p-10 overflow-hidden relative">
    <div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
        <div class="md:flex items-center -mx-10">
            <input name=<?=$request['id_request']?> type="hidden">
            <div class="w-full px-10">
                <div class="mb-10">
                <h1 class="font-bold uppercase text-4xl mb-20">Редактирование заявки</h1>
                <h3 class="font-bold uppercase text-4xl mb-20">Причина: <?=$request['comment_request']?></h3>
    <form action="../controllers/editRequest.php" method="post" enctype="multipart/form-data">
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <input id="id_request" name="id_request" type="hidden" value="<?=$request['id_request']?>">
                <input id="id" name="id" type="hidden" value="<?=$user['id']?>">
                <input id="username" name="username" type="hidden" value="<?=$user['username']?>">
                <input id="comment_request" name="comment_request" value="" type="hidden">
                <input id="signed_request" name="signed_request" value="" type="hidden">

        <div class="flex flex-wrap -m-2">
          <div class="p-2 w-full element_animation right_animation">
            <div class="relative">
              <label for="name_request" class="leading-7 text-2xl font-semibold text-black">Название проекта</label>
              <input type="text" id="name_request" name="name_request" value="<?=$request['name_request']?>" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>

          <div class="p-2 w-1/2 element_animation left_animation">
            <div class="relative">
              <label for="name_company" class="leading-7 text-2xl font-semibold text-black mb-4">Название компании</label>
              <input type="text" id="name_company" name="name_company" value="<?=$request['name_company']?>" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>

          <div class="p-2 w-1/2 element_animation right_animation">
            <div class="input-container">
            <label for="price_request" class="leading-7 text-2xl font-semibold text-black">Стоимость проекта</label>
            <input type="text" id="price_request" name="price_request" value="<?=$request['price_request']?>" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            <span class="currency-symbol">&#8381;</span>
        </div>
    </div>


          <div class="p-2 w-full element_animation left_animation">
            <div class="relative">
              <label for="description_request" class="leading-7 text-2xl font-semibold text-black">1. Описание проекта</label>
              <textarea type="text" id="description_request" name="description_request" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              <?=$request['description_request']?>
                </textarea>
            </div>
          </div>

        
        <div class="p-2 w-full element_animation right_animation">
            <div class="relative">
              <label for="reliability_request" class="leading-7 text-2xl font-semibold text-black">2. Требования к надежности</label>
              <textarea type="text" id="reliability_request" name="reliability_request" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              <?=$request['reliability_request']?>
            </textarea>
            </div>
          </div>


        <div class="p-2 w-full element_animation right_animation">
            <div class="relative">
              <label for="manufacturability_request" class="leading-7 text-2xl font-semibold text-black">3. Требования к технологичности</label>
              <textarea type="text" id="manufacturability_request" name="manufacturability_request"  class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              <?=$request['manufacturability_request']?>
                </textarea>
            </div>
          </div>


        <div class="p-2 w-full element_animation left_animation">
            <div class="relative">
              <label for="security_request" class="leading-7 text-2xl font-semibold text-black">4. Требования к безопасности</label>
              <textarea type="text" id="security_request" name="security_request"  class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              <?=$request['security_request']?>
            </textarea>
            </div>
          </div>


        <div class="p-2 w-full element_animation right_animation">
            <div class="relative">
              <label for="documentation_equipment_request" class="leading-7 text-2xl font-semibold text-black">5. Требования к документации</label>
              <textarea type="text" id="documentation_equipment_request" name="documentation_equipment_request" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              <?=$request['documentation_equipment_request']?>
            </textarea>
            </div>
          </div>

        
          <div class="p-2 w-full element_animation left_animation">
            <div class="relative">
              <label for="program_request" class="leading-7 text-2xl font-semibold text-black">6. Требования к программному обеспечению</label>
              <textarea type="text" id="program_request" name="program_request"  class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
             <?=$request['program_request']?>
            </textarea>
            </div>
          </div>


        <div class="p-2 w-full element_animation right_animation">
            <div class="relative">
              <label for="acceptance_request" class="leading-7 text-2xl font-semibold text-black">7. Требования к приемке</label>
              <textarea type="text" id="acceptance_request" name="acceptance_request"  class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
             <?=$request['acceptance_request']?>
            </textarea>
            </div>
          </div>


        <div class="p-2 w-full element_animation left_animation">
            <div class="relative">
              <label for="warranty_request" class="leading-7 text-2xl font-semibold text-black">8. Гарантийные обязательства</label>
              <textarea type="text" id="warranty_request" name="warranty_request" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              <?=$request['warranty_request']?>
            </textarea>
            </div>
          </div>
        </div>

        <? if (!isset($_SESSION['user'])): ?>
        <div class="p-2 flex justify-between text-center pt-10">
          <a href="./registration.php" class="leading-7 text-2xl font-semibold text-black">Зарегестрируйтесь</a> <p>или</p>  <a href="./login.php" class="leading-7 text-2xl font-semibold text-black">Авторизируйтесь</a>
        </div>
        <? elseif ($user['admin'] == 4): ?>
        <div class="p-2 flex justify-center text-center pt-10">
        <a class="leading-7 text-2xl font-semibold text-black">Вы заблокированы администрицией сайта!</a>
        </div>
          <? else: ?>
        <div class="p-2 flex justify-center text-center pt-10">
          <button class="bg-[#392D88] text-[24px] text-white font-semibold px-10 py-2 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">Отредактировать</button>
        </div>
        <?php endif; ?>  

      </div>
    </form>
    
</div>
</div>
</div>

<?php require '../layouts/footer.php'; ?>