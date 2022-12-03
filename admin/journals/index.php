<?php require_once('../../layouts/admin/header.php') ?>

<?php
$journals = query("SELECT
  journals.*,
  users.name as user_name,
  tags.title as tag_title
  FROM journals
  JOIN users ON journals.user_id=users.id
  JOIN tags ON journals.tag_id=tags.id
");
?>
<main>
  <div class="flex justify-between align-center  mb-4">
    <h1 class="text-2xl font-bold">Daftar Jurnal</h1>
    <a href="./create.php" class="btn">
      <span>Jurnal Baru</span>
    </a>
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
        <th>Status</th>
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
            <?php if($journal['status'] == 1): ?>
              <div class="badge badge-info">Belum Divalidasi</div>
            <?php elseif($journal['status'] == 2): ?>
              <div class="badge badge-success">Tervalidasi</div>
            <?php else: ?>
              <div class="badge badge-error">Ditolak</div>
            <?php endif; ?>
          </td>
          <td>
            <a href="./delete.php?id=<?= $journal['id'] ?>" class="btn btn-sm btn-error">Hapus</a>
            <a href="./edit.php?id=<?= $journal['id'] ?>" class="btn btn-sm btn-warning">Ubah</a>
            <?php if($journal['status'] == 1): ?>
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