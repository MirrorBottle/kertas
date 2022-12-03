<?php require_once('../../layouts/admin/header.php') ?>

<?php
$tags = all("tags");
?>
<main>
  <div class="flex justify-between align-center  mb-4">
    <h1 class="text-2xl font-bold">Tag</h1>
    <a href="./create.php" class="btn">
      <span>Tag Baru</span>
    </a>
  </div>
  <table class="datatable table w-full">
    <thead>
      <tr>
        <th></th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tags as $tag) : ?>
        <?php $i = 1; ?>
        <tr>
          <th><?= $i ?></th>
          <td><?= $tag['title'] ?></td>
          <td><?= $tag['description'] ?></td>
          <td>
            <a href="./delete.php?id=<?= $tag['id'] ?>" class="btn btn-sm btn-error">Hapus</a>
            <a href="./edit.php?id=<?= $tag['id'] ?>" class="btn btn-sm btn-warning">Ubah</a>
          </td>
        </tr>
        <?php $i++ ?>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>
<?php require_once('../../layouts/admin/footer.php') ?>