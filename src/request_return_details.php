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
                    <h1 class="font-bold uppercase text-4xl mb-20"><?= $request['name_request']?></h1>
                    <p class="text-xl font-normal mb-10">Компания: <?= $request['name_company'] ?></p>
                    <p class="text-xl font-normal mb-10">Имя: ₽ <?= $request['username'] ?></p>
                    <p class="text-xl font-normal mb-10">Дата: <?= $request['date_request'] ?></p>
                    <p class="text-xl font-normal mb-10">Стоимость: ₽ <?= $request['price_request'] ?></p>
                    <p class="text-xl font-normal mb-10">Описание: <?= $request['description_request'] ?></p>
                    <p class="text-xl font-normal mb-10">Комментарий: <?= $request['comment_request'] ?></p>

                    <p class="text-xl font-normal mb-10">Требования к надежности: <a class="my-6 text-xl font-medium text-gray-700 dark:text-gray-200"> <?=$request['reliability_request']?></p></a>
                    <p class="text-xl font-normal mb-10">Требования к технологичности: <a class="my-6 text-xl font-medium text-gray-700 dark:text-gray-200"> <?=$request['manufacturability_request']?></p></a>
                    <p class="text-xl font-normal mb-10">Требования к безопасности: <a class="my-6 text-xl font-medium text-gray-700 dark:text-gray-200"> <?=$request['security_request']?></p></a>
                    <p class="text-xl font-normal mb-10">Требования к документации: <a class="my-6 text-xl font-medium text-gray-700 dark:text-gray-200"> <?=$request['documentation_equipment_request']?></p></a>
                    <p class="text-xl font-normal mb-10">Требование к программному обеспечению: <a class="my-6 text-xl font-medium text-gray-700 dark:text-gray-200"> <?=$request['program_request']?></p></a>
                    <p class="text-xl font-normal mb-10">Требования к приемке: <a class="my-6 text-xl font-medium text-gray-700 dark:text-gray-200"> <?=$request['acceptance_request']?></p></a>
                    <p class="text-xl font-normal mb-10">Гарантийные обязательства: <a class="my-6 text-xl font-medium text-gray-700 dark:text-gray-200"> <?=$request['warranty_request']?>.</a>
                    <?php if ($request['status_request'] == 1): ?>
                        <form action="../controllers/loadSign.php" method="post" enctype="multipart/form-data">
                        <input id="id_request" name="id_request" type="hidden" value="<?=$request['id_request']?>">
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                <label for="signed_request" class="leading-7 text-2xl font-semibold text-black">Загрузите ДВОУ c печатью</label>
                                <input type="file" id="signed_request" name="signed_request" class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <button class="bg-[#392D88] text-[24px] text-white font-semibold px-10 py-2 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">Отправить</button>
                        </form>
                    <? endif; ?>


                </div>
                <div>
                    <div class="flex justify-between">
                        <a href="../assets/documents/<?=$request['document_request']?>" class="bg-[#392D88] text-white font-bold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">Скачать ТЗ</a>
                        <?php if ($request['status_request'] == 1): ?>
                        <a href="../assets/documents/<?=$request['sign_request']?>" class="bg-[#392D88] text-white font-bold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">Скачать ДВОУ</a>
                        <? endif; ?>
                        <a href="../src/request_return.php" class="bg-[#392D88] text-white font-bold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700 ml-20">Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php require '../layouts/footer.php'; ?>