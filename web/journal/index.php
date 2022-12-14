<?php require_once('../../layouts/web/header.php') ?>

<?php
include("../../core/functions.php");
$journals = query("SELECT
  journals.*,
  users.name as user_name,
  tags.title as tag_title
  FROM journals
  JOIN users ON journals.user_id=users.id
  JOIN tags ON journals.tag_id=tags.id
  WHERE status = 2
");
?>
<section id="trending" class="lg:px-48 px-8 py-8 min-h-screen">
  <h1 class="text-2xl">Daftar Jurnal</h1>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <?php $i = 1 ?>
    <?php foreach ($journals as $journal) : ?>
      <div class="card bg-base-100 shadow-md h-[140px]">
        <div class="card-body pr-5 py-7 pl-0">
          <div class="flex">
            <div class="pr-4 pl-4 flex align-center">
              <h2 class="text-3xl text-base-300 font-bold"><span>
                <?= $i < 10 ? "0$i" : $i ?>
              </span></h2>
            </div>
            <div class="card-content">
              <div class="avatar flex align-center justify-center">
                <p class="text-sm"><span><?= $journal['user_name'] ?></span></p>
              </div>
              <h3 class="card-title mt-2 text-base"><?= $journal['title'] ?></h3>
              <div class="alt-info-container" <span class="text-xs"><?= $journal['release_date'] ?></span>
                <span class="ml-3 badge p-2"><?= $journal['tag_title'] ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php $i++ ?>
    <?php endforeach; ?>
  </div>
</section>

<?php require_once('../../layouts/web/footer.php') ?>