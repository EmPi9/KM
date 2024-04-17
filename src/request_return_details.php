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
                </div>
                <div>
                    <div class="flex justify-between">
                        <a href="../assets/documents/<?=$request['document_request']?>" class="bg-[#392D88] text-white font-bold px-10 py-4 rounded-xl border-2 border-[#392D88] hover:bg-white hover:text-[#392D88] transition-all duration-700">Скачать ТЗ</a>
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