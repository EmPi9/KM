<?php require '../layouts/header.php'; ?>

    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div
        class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
      >
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img
              aria-hidden="true"
              class="object-cover w-full h-full dark:hidden"
              src="../assets/img/air-insulated-substation-2-1 1.png"
              alt="Office"
            />
            <img
              aria-hidden="true"
              class="hidden object-cover w-full h-full dark:block"
              src="../assets/img/login-office-dark.jpeg"
              alt="Office"
            />
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1
                class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
              >
                Авторизация
              </h1>
                <form action="../controllers/loginUser.php" method="post">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Логин</span>
                    <input name="login" id="login"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Логин" 
                    />
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Пароль</span>
                    <input name="password" id="password"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="***************"
                    type="password"
                    />
                </label>

                <div class="hidden border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700 " id="errorBlock"></div>
                <div class="hidden border border-green-400 rounded bg-green-100 px-4 py-3 text-green-700 " id="successBlock"></div>
              <!-- You should use a button here, as the anchor is only used for the example  -->
              <button type="submit"
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" 
              >
                Войти
              </button>
              <div class="hidden border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700 " id="errorBlock"></div>
              <div class="hidden border border-green-400 rounded bg-green-100 px-4 py-3 text-green-700 " id="successBlock"></div>
              </form>
              <hr class="my-8" />
              <!-- <p class="mt-4">
                <a
                  class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                  href="./forgot-password.html"
                >
                  Забыли пароль?
                </a>
              </p> -->
              <p class="mt-1">
                <a
                  class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                  href="./registration.php"
                >
                  Создать аккаунт
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
    loginform.onsubmit = async (e) => {
        //отменяем перезагрузку страницы
        e.preventDefault();

        //отправляем запрос в editUser в контроллер
        let response = await fetch('../controllers/loginUser.php', {
            method: 'POST',
            body: new FormData(loginform)
        });

        // получение результата и конвертация его в текст, т.к контроллер отпраялет текст (echo)
        let result = await response.text();

        if (response.status === 200) {
            errorBlock.classList.add('hidden');
            successBlock.classList.remove('hidden');
            successBlock.innerHTML = result;
            window.location.href = './index.php';
        }
        if (response.status === 400) {
            successBlock.classList.add('hidden');
            errorBlock.classList.remove('hidden');
            errorBlock.innerHTML = result;
        }

    }
</script>
<!-- Footer -->
<?php require '../layouts/footer.php'; ?>
