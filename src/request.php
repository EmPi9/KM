<?php require '../layouts/admin_header.php'; ?>
<?php include_once '../models/request.php';
$request = getRequest($_GET['id_request']);
?>

            <div class="px-10 ">
                <div class="mb-10 text-white flex flex-col gap-4 justify-between">
                    <p class="text-xl font-normal py-10">Код заявки: <?=$request['id_request']?>.</p>
                    <p class="text-xl font-normal pb-10">Телефон: <?=$request['tel_requset']?>.</p>
                    <p class="text-xl font-normal pb-10">Электронная почта: <?=$request['email_request']?>.</p>
                    <p class="text-xl font-normal pb-10">ФИО заказчика: <?=$request['fio_requset']?>.</p>
                    <p class="text-xl font-normal pb-10">Компания: <?=$request['name_company']?>.</p>
                </div>

                <div class="mt-10 py-4">
                <a href="../controllers/acceptRequest.php?id_request=<?=$request['id_request']?>" class="px-10 py-4 text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Принять</a>
                <a href="../controllers/deniedRequest.php?id_request=<?=$request['id_request']?>" class="px-10 py-4 text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">Отклонить</a>
                </div>

                <div>
                    <div class="flex justify-between">
                        <a href="./admin_dashboard.php" class="bg-[#392D88] text-white font-bold px-10 py-4 rounded-xl border-2 border-white hover:bg-white hover:text-[#392D88] transition-all duration-700 text-white">Назад</a>
                    </div>
                </div>
            </div>
