<?php require '../layouts/header.php'; ?>

 <div class="container px-5 py-12 mx-auto ">
    <div class="flex flex-wrap text-center -m-4">
      <div class="p-4 lg:w-2/2 md:w-full">
        <div class="flex border-2 rounded-lg bg-white p-6 sm:flex-row flex-col">
          <section class="text-gray-600 body-font relative">
            <div class=" px-5 py-12 mx-auto">
              <div class="flex flex-col text-center w-full mb-2">
              <h1 class="mx-auto leading-relaxed text-base">Мой уникальный номер: <?= $user['id'] ?></h1>
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900"><?= $user['username'] ?></h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base"> <?= $user['email'] ?></p>
              </div>
              <div class=" md:w-2/3 mx-auto">
                <div class="flex flex-wrap -m-2">
                  <div class="p-2 w-1/2">
                    <div class="relative">
                      <label for="name" class="leading-7 text-sm text-gray-600">Логин</label>
                      <input value=<?= $user['login'] ?> type="text" name="login" id="login" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-[#F56E1E] focus:bg-white focus:ring-2 focus:ring-[#F56E1E] text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                  </div>
                  <div class="p-2 w-1/2">
                    <div class="relative">
                      <label for="tel" class="leading-7 text-sm text-gray-600">E-mail</label>
                      <input value=<?= $user['email'] ?> type="text" name="username" id="username" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border[#F56E1E] focus:bg-white focus:ring-2 focus:ring-[#F56E1E] text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                  </div>

                  <div class="p-2 w-full">
                    <div class="relative">
                      <label for="email" class="leading-7 text-sm text-gray-600">Ваше имя</label>
                      <input value=<?= $user['username'] ?> type="text" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border[#F56E1E] focus:bg-white focus:ring-2 focus:ring-[#F56E1E] text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                  </div>

                

    
                  <div class="flex gap-2 p-2 mt-4 justify-center">
                      <a href="./edit_profile.php" class="bg-[#392D88] text-white font-semibold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">ИЗМЕНИТЬ ДАННЫЕ</a>
                  </div>

                  <div class="flex gap-2 p-2 mt-4 justify-center">
                      <a href="./edit_password.php" class="bg-[#392D88] text-white font-semibold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">ИЗМЕНИТЬ ПАРОЛЬ</a>
                  </div>

                  <div class="flex gap-2 p-2 mt-4 justify-center">
                  <a href="../src/request_return.php" class="bg-[#392D88] text-white font-semibold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">МОИ ЗАЯВКИ</a>
                  </div>

                  <div class="flex gap-2 p-2 mt-4 justify-center">
                  <a href="../src/resume_return.php" class="bg-[#392D88] text-white font-semibold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">РЕЗЮМЕ</a>
                  </div>

                  <div class="flex gap-2 p-2 mt-4 justify-center">
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



<?php require '../layouts/footer.php'; ?>