<?php require_once('../../layouts/admin/header.php') ?>

<?php
$journals = query("SELECT
  journals.*,
  users.name as user_name,
  tags.title as tag_title
  FROM journals
  JOIN users ON journals.user_id=users.id
  JOIN tags ON journals.tag_id=tags.id
  WHERE status=1
");
?>
<main>
  <h1 class="text-2xl font-bold mb-2">Selamat Datang, <?= $_SESSION['name'] ?></h1>
  <div class="flex justify-between align-center mt-3 mb-4">
    <h1 class="text-xl font-bold">Validasi Jurnal</h1>
  </div>
  <table class="datatable table w-full">
    <thead>
      <tr>
        <th></th>
        <th>Judul</th>
        <th>Nama Pengguna</th>
        <th>Tag</th>
        <th>Tanggal Rilis</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($journals as $journal) : ?>
        <?php $i = 1; ?>
        <tr>
          <th><?= $i ?></th>
          <td><?= $journal['title'] ?></td>
          <td><?= $journal['user_name'] ?></td>
          <td><?= $journal['tag_title'] ?></td>
          <td><?= $journal['release_date'] ?></td>
          <td><?= $journal['description'] ?></td>
          <td>
            <?php if ($journal['status'] == 1) : ?>
              <a href="./validate.php?id=<?= $journal['id'] ?>&status=2" class="btn btn-sm btn-success">Terima</a>
              <a href="./validate.php?id=<?= $journal['id'] ?>&status=3" class="btn btn-sm btn-info">Tolak</a>
            <?php endif; ?>
          </td>
        </tr>
        <?php $i++ ?>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>
<?php require_once('../../layouts/admin/footer.php') ?>