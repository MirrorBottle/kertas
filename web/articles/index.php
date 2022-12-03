<?php require_once('../../layouts/web/header.php') ?>

<?php
include("../../core/functions.php");
$articles = query("SELECT
  articles.*,
  tags.title as tag_title
  FROM articles
  JOIN tags ON articles.tag_id=tags.id
  WHERE status = 2
");
?>
<section id="trending" class="lg:px-48 px-8 py-8 min-h-screen">
  <h1 class="text-2xl">Daftar Artikel</h1>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <?php $i = 1 ?>
    <?php foreach ($articles as $article) : ?>
      <div class="card bg-base-100 shadow-md h-[140px]">
        <div class="card-body pr-5 py-7 pl-0">
          <div class="flex">
            <div class="pr-4 pl-4 flex align-center">
              <h2 class="text-3xl text-base-300 font-bold"><span>
                <?= $i < 10 ? "0$i" : $i ?>
              </span></h2>
            </div>
            <div class="card-content">
              <h3 class="card-title mt-2 text-base"><?= $article['title'] ?></h3>
              <div class="alt-info-container" <span class="text-xs"><?= $article['release_date'] ?></span>
                <span class="ml-3 badge p-2"><?= $article['tag_title'] ?></span>
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