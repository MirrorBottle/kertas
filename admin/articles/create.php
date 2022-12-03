<?php require_once('../../layouts/admin/header.php') ?>

<?php
$tags = all("tags");
?>

<?php
if (isset($_POST['submit'])) {
  unset($_POST['submit']);

  store("articles");
  flash("Berhasil menambah artikel!", "success");
  header("Location: ./index.php");
}
?>
<main>
  <div class="flex justify-between align-center mb-4">
    <h1 class="text-2xl font-bold">Artikel Baru</h1>
  </div>
  <form action="" method="POST">
    <div class="form-control">
      <div class="label">
        <div class="label-text">Tag</div>
      </div>
      <select class="select select-bordered w-full max-w-xs" name="tag_id">
        <?php foreach($tags as $tag): ?>
          <option value="<?= $tag['id'] ?>"><?= $tag['title'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-control">
      <div class="label">
        <div class="label-text">Judul</div>
      </div>
      <input type="text" class="input input-bordered w-full" name="title" placeholder="Judul">
    </div>
    <div class="form-control">
      <div class="label">
        <div class="label-text">Tanggal Rilis</div>
      </div>
      <input type="date" class="input input-bordered w-full" name="release_date" placeholder="Tanggal Rilis">
    </div>
    <div class="form-control">
      <label class="label">
        <span class="label-text">Konten</span>
      </label>
      <textarea class="textarea textarea-bordered h-24" placeholder="Konten" name="content"></textarea>
    </div>
    <div class="text-right mt-4">
      <button type="submit" class="btn btn-outline" name="submit">Simpan</button>
    </div>
  </form>
</main>
<?php require_once('../../layouts/admin/footer.php') ?>