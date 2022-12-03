<div class="drawer-side">
  <label for="drawer" class="drawer-overlay"></label> 
  <ul class="menu p-4 overflow-y-auto w-80 bg-base-200 text-base-content">
    <?php 
      $link = $_SERVER['PHP_SELF'];
      $link_array = explode('/',$link);
    ?>
    <?php if ($_SESSION['role'] == 'admin'): ?>
    <li>
      <a class="<?= in_array("dashboard", $link_array) ? 'active' : ''  ?>" href="../../admin/dashboard"><i class="fa-solid fa-gauge"></i>Dashboard</a>
    </li>
    <li>
      <a class="<?= in_array("journals", $link_array) ? 'active' : ''  ?>" href="../../admin/journals"><i class="fa-regular fa-newspaper"></i>Daftar Jurnal</a>
    </li>
    <li>
      <a class="<?= in_array("users", $link_array) ? 'active' : ''  ?>" href="../../admin/users"><i class="fa-solid fa-users"></i>Daftar Pengguna</a>
    </li>
    <li>
      <a class="<?= in_array("articles", $link_array) ? 'active' : ''  ?>" href="../../admin/articles"><i class="fa-solid fa-pen-nib"></i>Artikel</a>
    </li>
    <li>
      <a class="<?= in_array("tags", $link_array) ? 'active' : ''  ?>" href="../../admin/tags"><i class="fa-solid fa-tag"></i>Tag</a>
    </li>
    <?php else: ?>
    <li>
      <a class="<?= in_array("dashboard", $link_array) ? 'active' : ''  ?>" href="../../user/dashboard"><i class="fa-solid fa-gauge"></i>Dashboard</a>
    </li>
    <li>
      <a class="<?= in_array("journals", $link_array) ? 'active' : ''  ?>" href="../../user/journals"><i class="fa-regular fa-newspaper"></i>Jurnal</a>
    </li>
    
    <?php endif ?>
  </ul>
  
</div>