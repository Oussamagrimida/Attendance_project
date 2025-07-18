<?php $title = 'Login';
  require_once 'includes/header.php';
  require_once 'db/conn.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $username = strtolower(trim($_POST['username']));
     $password = $_POST['password'];
     $new_password = md5($password.$username);

    $result = $user->getUser($username,$new_password);
    if(!$result){
        echo '<div class="alert alert-danger">Invalid username or password</div>';
     }else{
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $result['id'];
        header("Location: viewrecords.php");
     }
  }


?>


<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
    <h2 class="text-center mb-4">Login</h2>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD']=='POST') echo htmlspecialchars($_POST['username']); ?>" required autofocus>
      </div>
      <div class="mb-3 position-relative">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control pe-5" id="password" required>
        <button type="button"
                class="btn btn-sm btn-outline-secondary position-absolute end-0"
                style="top: 70%; transform: translateY(-40%); border: none; background: transparent; height: 2rem; width: 2.5rem; padding: 0;"
                tabindex="-1"
                onclick="togglePassword()">
          <i id="toggle-password-icon" class="bi bi-eye"></i>
        </button>
      </div>
      <button type="submit" class="btn btn-primary w-100 mb-2">Login</button>
      <div class="text-center">
        <a href="#">Forgot Password?</a>
      </div>
    </form>
  </div>
</div>

<?php include_once 'includes/footer.php'?>
<script>
function togglePassword() {
  const passwordInput = document.getElementById('password');
  const icon = document.getElementById('toggle-password-icon');
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    icon.classList.remove('bi-eye');
    icon.classList.add('bi-eye-slash');
  } else {
    passwordInput.type = 'password';
    icon.classList.remove('bi-eye-slash');
    icon.classList.add('bi-eye');
  }
}
</script>