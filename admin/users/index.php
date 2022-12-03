<?php require_once('../../layouts/admin/header.php') ?>

<?php
$users = query("SELECT * FROM users WHERE role = 2");
?>
<main>
  <div class="flex justify-between align-center  mb-4">
    <h1 class="text-2xl font-bold">Daftar Pengguna</h1>
  </div>
  <table class="datatable table w-full">
    <thead>
      <tr>
        <th></th>
        <th>Nama</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user) : ?>
        <?php $i = 1; ?>
        <tr>
          <th><?= $i ?></th>
          <td><?= $user['name'] ?></td>
          <td><?= $user['email'] ?></td>
        </tr>
        <?php $i++ ?>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>
<?php require_once('../../layouts/admin/footer.php') ?>