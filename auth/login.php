<?php

session_start();
include_once('../core/functions.php');

if(isset($_SESSION['status'])) {
  if($_SESSION['role'] == 'admin') {
    header("Location:../admin/dashboard");
  } else {
    header("Location:../user/dashboard");
  }
}

if(isset($_POST['email'])) {

  $user = query("SELECT * FROM users WHERE email='{$_POST['email']}'");
  if(empty($user)) {
    header("Location:./login.php?denied=true");
    return;
  }

  $user = $user[0];
  $isPasswordCorrect = password_verify($_POST['password'], $user['password']);

  if(!$isPasswordCorrect) {
    header("Location:./login.php?denied=true");
    return;
  }

  

  $_SESSION['name'] = $user['name'];
  $_SESSION['id'] = $user['id'];
  $_SESSION['role'] = $user['role'] == 1 ? 'admin' : 'user';
  $_SESSION['status'] = "login";
  if($_SESSION['role'] == 'admin') {
    header("Location:../admin/dashboard");
  } else {
    header("Location:../user/dashboard");
  }
}
?>

<?php require_once('../layouts/auth/header.php') ?>
  <!-- MAIN -->
  <main class="min-h-screen flex items-center justify-center">
    <div class="hero min-h-screen bg-base-200">
      <div class="hero-content flex-col lg:flex-row-reverse">
        <div class="text-center lg:text-left lg:pl-8">
          <h1 class="text-5xl font-bold">Masuk</h1>
          <p class="py-6">Pastikan dirimu bermanfaat tuk yang lainnya.</p>
        </div>
        <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
          <div class="card-body">
            <img src="../assets/img/logo_black.png" class="object-contain h-[120px]">
            <?php if(isset($_GET['denied'])): ?>
            <div class="alert alert-error">
              <span>Password atau email salah!</span>
            </div>
            <?php endif; ?>
            <form action="" method="post">
              <div class="form-control">
                <label class="label">
                  <span class="label-text">Email</span>
                </label>
                <input type="email" name="email" placeholder="info@kertas.my.id" class="input input-bordered" required />
              </div>
              <div class="form-control">
                <label class="label">
                  <span class="label-text">Password</span>
                </label>
                <input type="password" name="password" placeholder="Rahasia" class="input input-bordered" required />
              </div>
              <div class="form-control mt-6">
                <button type="submit" class="btn btn-outline">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php  require_once('../layouts/auth/footer.php') ?>