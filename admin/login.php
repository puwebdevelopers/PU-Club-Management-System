<?php

include('includes/config.php');
include('includes/db.php');

$message = '';

if(isset($_POST['signin'])) {
  session_start(); //Start the session

    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['username'] = $username;
    
    if(empty($username) || empty($password)) {
      $message .= '
      <div class="callout callout-danger">
      <h4><i class="icon fa fa-warning"></i> Error!</h4>
      All fields are required
  </div>
    ';
    } else {
    $sql="SELECT email,password FROM members WHERE username=? AND password=?";
    $stmt = $pdo->prepare($sql);   //Prepare
    $stmt->execute([$username, $password]);  //Execute
    $count = $stmt->rowCount();
    $row = $stmt->fetchALL();
     
    if($count == 1) {
      $_SESSION['username'] = $username;
      $sql ='SELECT photo FROM members WHERE username=?';
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$username]);
      $row = $stmt->fetch();

      header("location:dashboard.php");
      // if(isset($_SESSION['user'])){
      //   header('location: home.php');
      // }
      // if(isset($_SESSION['admin'])){
      //   header('location: admin.php');
      // }
    } else {
      $message .= '
      <div class="callout callout-danger">
      <h4><i class="icon fa fa-warning"></i> Error!</h4>
      Incorrect username or password
  </div>
    ';
    }     
  }
}
?>

<?php include('includes/login-header.php');?>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>PU</b> ADMIN</a>
  </div>
  <?php echo $message; ?>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="" method="POST">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="signin">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="reset_password.php">I forgot my password</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php include('includes/login-footer.php');?>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
