<?php require '../layouts/header.php'; ?>
<?php 
include_once '../models/request.php';
$requests = getRequests(); 
?>


<h1 class="text-center font-extrabold text-[40px]">Ответы на заявки</h1>

<section class="text-gray-600 body-font">
    <div class="flex flex-wrap max-w-[1820px] mx-auto">
    <?php foreach ($requests as $request):?>
      <?php if ($user['id'] == $request['id']):?>
        <? if ($request['status_request'] == 1 or $request['status_request'] == 3): ?>
      <div class="p-4 md:w-1/3 max-h-12">
        <div class="h-full border-2 bg-[#392D88] border-black border-opacity-60 rounded-lg overflow-hidden">
          <div class="p-6">
            <h2 class="tracking-widest text-xs title-font font-medium text-white mb-1 uppercase">Код заявки:<?= $request['id_request'] ?></h2>
            <h1 class="title-font text-lg font-medium text-white mb-3">Статус заявки:
            <? if ($request['status_request'] == 0): ?>
                        <span
                          class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600 "
                        >
                            В ожидании
                      </span>
                            <?  elseif (($request['status_request'] == 1)): ?>
                            <span
                          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full ">
                            На подписи
                            </span>
                            <?  elseif (($request['status_request'] == 2)): ?>
                            <span
                          class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full">
                            Отклонено
                            </span>
                            <?  elseif (($request['status_request'] == 3)): ?>
                            <span
                          class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full ">
                            В разработке
                            </span>   
              <? endif; ?>
            </h1>
            <h1 class="title-font text-lg font-medium text-white mb-10">Название завявки: <?= $request['name_request'] ?></h1>
            <div class="flex flex-wrap">
                <a href="../src/request_return_details.php?id_request=<?= $request['id_request']?>" class="px-2 py-1 mx-10 font-semibold text-white px-10 py-4 rounded-xl border-2 border-white">Подробнее</a>                
                <a href="../assets/documents/<?=$request['document_request']?>" class="px-2 py-1 mx-10 font-semibold text-white px-10 py-4 rounded-xl border-2 border-white">Скачать ТЗ</a>
            </div>                   
        </div>
        </div>
      </div>
      <?php endif;?>
      <?php endif;?>
    <?php endforeach;?>
  </div>
  
</section>


<h1 class="text-center font-extrabold text-[40px]">В ожидании</h1>

<section class="text-gray-600 body-font">
    <div class="flex flex-wrap max-w-[1820px] mx-auto">
    <?php foreach ($requests as $request):?>
      <?php if ($user['id'] == $request['id']):?>
        <? if ($request['status_request'] == 0): ?>
      <div class="p-4 md:w-1/3 max-h-12">
        <div class="h-full border-2 bg-[#392D88] border-black border-opacity-60 rounded-lg overflow-hidden">
          <div class="p-6">
            <h2 class="tracking-widest text-xs title-font font-medium text-white mb-1 uppercase">Код заявки:<?= $request['id_request'] ?></h2>
            <h1 class="title-font text-lg font-medium text-white mb-3">Статус заявки:
            <? if ($request['status_request'] == 0): ?>
                        <span
                          class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600 "
                        >
                            В ожидании
                      </span>
                            <?  elseif (($request['status_request'] == 1)): ?>
                            <span
                          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full ">
                            Принят
                            </span>
                            <?  else: ?>
                        <span
                          class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full">
                            Отклонено
                            </span>   
            <? endif; ?>
            </h1>
            <h1 class="title-font text-lg font-medium text-white mb-10">Название завявки: <?= $request['name_request'] ?></h1>
            <div class="flex flex-wrap">
                <a href="../src/request_return_details.php?id_request=<?= $request['id_request']?>" class="px-2 py-1 mx-10 font-semibold text-white px-10 py-4 rounded-xl border-2 border-white">Подробнее</a>
                <a href="../assets/documents/<?=$request['document_request']?>" class="px-2 py-1 mx-10 font-semibold text-white px-10 py-4 rounded-xl border-2 border-white">Скачать ТЗ</a>
            </div>                   
        </div>
        </div>
      </div>
      <?php endif;?>
      <?php endif;?>
    <?php endforeach;?>
  </div>
  
</section>
<? if ($request['status_request'] == 2): ?>
<h1 class="text-center font-extrabold text-[40px]">Отклонено</h1>
<? endif; ?>
<section class="text-gray-600 body-font">
    <div class="flex flex-wrap max-w-[1820px] mx-auto">
    <?php foreach ($requests as $request):?>
      <?php if ($user['id'] == $request['id']):?>
        <? if ($request['status_request'] == 2): ?>
      <div class="p-4 md:w-1/3 max-h-12">
        <div class="h-full border-2 bg-[#392D88] border-black border-opacity-60 rounded-lg overflow-hidden">
          <div class="p-6">
            <h2 class="tracking-widest text-xs title-font font-medium text-white mb-1 uppercase">Код заявки:<?= $request['id_request'] ?></h2>
            <h1 class="title-font text-lg font-medium text-white mb-3">Статус заявки:
            <? if ($request['status_request'] == 0): ?>
                        <span
                          class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600 "
                        >
                            В ожидании
                      </span>
                            <?  elseif (($request['status_request'] == 1)): ?>
                            <span
                          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full "
                        >
                            Принят
                            </span>
                            <?  else: ?>
                        <span
                          class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full">
                            Отклонено
                            </span>   
                        <? endif; ?>
            </h1>
            <h1 class="title-font text-lg font-medium text-white mb-10">Название завявки: <?= $request['name_request'] ?></h1>
            <div class="flex flex-wrap">
                <a href="../src/request_return_edit.php?id_request=<?= $request['id_request']?>" class="px-2 py-1 mx-10 font-semibold text-white px-10 py-4 rounded-xl border-2 border-white">Отредактировать</a>
                <a href="../assets/documents/<?=$request['document_request']?>" class="px-2 py-1 mx-10 font-semibold text-white px-10 py-4 rounded-xl border-2 border-white">Скачать ТЗ</a>
            </div>                   
        </div>
        </div>
      </div>
      <?php endif;?>
      <?php endif;?>
    <?php endforeach;?>
  </div>
  
</section>

<?php require '../layouts/footer.php'; ?>