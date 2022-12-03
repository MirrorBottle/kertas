<?php require_once('../../layouts/admin/header.php') ?>

<?php 
  $tag = find("tags", $_GET['id']);
?>
<?php
if (isset($_POST['submit'])) {
  unset($_POST['submit']);

  update("tags");
  flash("Berhasil menambah tag!", "success");
  header("Location: ./index.php");
}
?>
<main>
  <div class="flex justify-between align-center mb-4">
    <h1 class="text-2xl font-bold">Tag Baru</h1>
  </div>
  <form action="" method="POST">
    <input type="hidden" name="id" value="<?= $tag['id'] ?>">
    <div class="form-control">
      <div class="label">
        <div class="label-text">Nama</div>
      </div>
      <input type="text" class="input input-bordered w-full" name="title" placeholder="Nama" value="<?= $tag['title'] ?>">
    </div>
    <div class="form-control">
      <label class="label">
        <span class="label-text">Deskripsi</span>
      </label>
      <textarea class="textarea textarea-bordered h-24" placeholder="Deskripsi" name="description"><?= $tag['description'] ?></textarea>
    </div>
    <div class="text-right mt-4">
      <button type="submit" class="btn btn-outline" name="submit">Simpan</button>
    </div>
  </form>
</main>
<?php require_once('../../layouts/admin/footer.php') ?>