<?php require_once('../../layouts/admin/header.php') ?>

<?php
$articles = query("SELECT articles.*, tags.title as tag_title FROM articles JOIN tags ON articles.tag_id=tags.id");
?>
<main>
  <div class="flex justify-between align-center  mb-4">
    <h1 class="text-2xl font-bold">Artikel</h1>
    <a href="./create.php" class="btn">
      <span>Artikel Baru</span>
    </a>
  </div>
  <table class="datatable table w-full">
    <thead>
      <tr>
        <th></th>
        <th>Judul</th>
        <th>Tag</th>
        <th>Tanggal Rilis</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($articles as $article) : ?>
        <?php $i = 1; ?>
        <tr>
          <th><?= $i ?></th>
          <td><?= $article['title'] ?></td>
          <td><?= $article['tag_title'] ?></td>
          <td><?= $article['release_date'] ?></td>
          <td>
            <a href="./delete.php?id=<?= $article['id'] ?>" class="btn btn-sm btn-error">Hapus</a>
            <a href="./edit.php?id=<?= $article['id'] ?>" class="btn btn-sm btn-warning">Ubah</a>
          </td>
        </tr>
        <?php $i++ ?>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>
<?php require_once('../../layouts/admin/footer.php') ?>