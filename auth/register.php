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
    $user_id = store("users", [
      "name" => $_POST["name"],
      "email" => $_POST["email"],
      "role" => 2,
      "password" => password_hash($_POST["password"], PASSWORD_DEFAULT)
    ], true);
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['id'] = $user_id;
    $_SESSION['role'] = "user";
    $_SESSION['status'] = "login";
    header("Location:../user/dashboard");
  } else {
    header("Location:./register.php?denied=true");
  }
}
?>

<?php require_once('../layouts/auth/header.php') ?>
  <!-- MAIN -->
  <main class="min-h-screen flex items-center justify-center">
    <div class="hero min-h-screen bg-base-200">
      <div class="hero-content flex-col lg:flex-row-reverse">
        <div class="text-center lg:text-left lg:pl-8">
          <h1 class="text-5xl font-bold">Daftar</h1>
          <p class="py-6">Pastikan dirimu bermanfaat tuk yang lainnya.</p>
        </div>
        <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
          <div class="card-body">
            <img src="../assets/img/logo_black.png" class="object-contain h-[120px]">
            <?php if(isset($_GET['denied'])): ?>
            <div class="alert alert-error">
              <span>Akun sudah terdaftar!</span>
            </div>
            <?php endif; ?>
            <form action="" method="post">
              <div class="form-control">
                <label class="label">
                  <span class="label-text">Nama</span>
                </label>
                <input type="text" name="name" class="input input-bordered" required />
              </div>
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
                <button type="submit" class="btn btn-outline">Register</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php  require_once('../layouts/auth/footer.php') ?>