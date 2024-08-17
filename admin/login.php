<?php
session_start();
require_once '../conn.php';

$title = 'Login';

if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, md5($_POST['password']));

  $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);

  if (!$row) {
    $_SESSION['message'] = 'Username atau password salah!';
    header('Location: login.php');
    exit;
  }

  $_SESSION['login'] = true;
  header('Location: index.php');
}
?>

<?php include_once '../layouts/backend/header.php'; ?>
<div class="row justify-content-center pt-5 mt-5">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <?php if (isset($_SESSION['message'])) : ?>
          <div class="alert alert-warning" role="alert">
            <?= $_SESSION['message']; ?>
            <?php session_destroy(); ?>
          </div>
        <?php endif; ?>
        <form action="" method="post">
          <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" name="username" value="admin" id="username" placeholder="Masukan username...">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi:</label>
            <input type="password" class="form-control" name="password" value="secret" id="password" placeholder="Masukan kata sandi...">
          </div>
          <div class="text-center">
            <a href="../index.php" class="btn btn-secondary">Kembali</a>
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include_once '../layouts/backend/footer.php'; ?>