<?php require_once('../../layouts/admin/header.php') ?>

<?php
$journals = query("SELECT
  journals.*,
  tags.title as tag_title
  FROM journals
  JOIN tags ON journals.tag_id=tags.id
  WHERE journals.user_id={$_SESSION['id']}
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
          </td>
        </tr>
        <?php $i++ ?>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>
<?php require_once('../../layouts/admin/footer.php') ?>