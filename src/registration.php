<?php require '../layouts/header.php'; ?>
<div class="min-h-screen flex flex-col">
            <div class="container mx-auto flex-1 flex flex-col items-center justify-center px-2">
                <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                    <h1 class="mb-6 text-3xl text-center">Регистрация</h1>
                <form action="../controllers/registrationUser.php" method="post">
                <input id="admin" name="admin" type="hidden" value="Пользователь">
                    <input 
                        type="text" name="username" id="username"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="fullname"
                        placeholder="Имя" />

                        <input 
                        type="text" name="login" id="login"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="fullname"
                        placeholder="Логин" />

                    <input 
                        type="email" name="email" id="email"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="email"
                        placeholder="Электронная почта" />

                    <input 
                        type="password" name="password" id="password"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="password"
                        placeholder="Пароль" />

                    
                    
                    <div class="hidden border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700 " id="errorBlock"></div>
                    <div class="hidden border border-green-400 rounded bg-green-100 px-4 py-3 text-green-700 " id="successBlock"></div>

                    <div class="text-center">
                        <button type="submit" class="bg-[#392D88] text-center text-[14px] text-white font-bold px-20 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">
                                        Создать аккаунт
                        </button>
                    </div>
                    <div class="text-center text-sm text-grey-dark mt-4">
                    Регистрируясь, вы соглашаетесь с
                        <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">   
                        Условия использования
                        </a> и 
                        <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                            политика конфиденциальности
                        </a>
                    </div>
                </div>
                    </form>
                <div class="text-grey-dark mt-6">
                    У вас уже есть аккаунт? 
                    <a class="no-underline border-b border-blue text-blue" href="../src/login.php">
                        Авторизоваться
                    </a>.
                </div>
            </div>
        </div>
     
        <?php require '../layouts/footer.php'; ?>