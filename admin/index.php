<?php include('includes/config.php');?>
<?php include('includes/db.php');?>
<?php 
session_start();

if(isset($_COOKIE['user'])&&isset($_COOKIE['pass'])&&isset($_COOKIE['id'])&&isset($_COOKIE['email'])){
	//set session
$_SESSION['id']=$_COOKIE['id'];
$_SESSION['email']=$_COOKIE['email'];
$_SESSION['username']=$_COOKIE['username'];
	header("location:dashboard.php");
}

if(isset($_POST['signin'])){
 $email=$_POST['email'];
 $pass=$_POST['password'];
$stmt=$pdo->prepare("INSERT INTO access_logs(email,date,time)VALUES(?,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)");
$stmt->execute([$email]);
$stmt=null;
 $stmt=$pdo->prepare("SELECT * FROM members WHERE email=?");
 $stmt->execute([$email]);
    $result = $stmt->rowCount();
    $row = $stmt->fetch();


 if($result==1){
//check if password is correct
 if(password_verify($pass,$row['password'])){
//set remember
if(isset($_POST['remme'])){
setcookie('user',$email,time()+60*60*24*365,'/');
setcookie('pass',md5($pass),time()+60*60*24*365,'/');
setcookie('id',$row['id'],time()+60*60*24*365,'/');
setcookie('email',$row['email'],time()+60*60*24*365,'/');
}

//set session
$_SESSION['id']=$row['id'];
$_SESSION['email']=$row['email'];
$_SESSION['username']=$row['username'];
header("location:dashboard.php");
 }
 }else{
   //error
   header("location:index.php?info=error");
 }

}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>School Club| Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <!-- Bootstrap 3.3.7 -->
   <link rel="stylesheet" href="../bower_components/bootstrap/css/bootstrap.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
   <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->

   <!-- Google Font -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<title>Login</title>
</head>
<body>
<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4 col-lg-4">
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Log In</h3>
            </div>
            
            <?php
            if(isset($_GET['info'])){
              $info=$_GET['info'];
              if($info=='success'){
                ?>
                <div class="alert-success">
                <strong>Login success <?php echo $_SESSION['username']; ?> </strong>
                </div>
                <?php
              }else if($info=='login'){
                ?>
                <div class="alert-warning">
                <strong>Please login</strong>
                </div>
                <?php
              }else{
                ?>
                <div class="alert-error">
                <strong>Login failed</strong>
                </div>
                <?php
              }
            }
            ?>
            
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="remme"> Remember me
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="register.php" class="btn btn-default">Register</a>
                <button type="submit" name="signin" class="btn btn-info pull-right">Sign in</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          </div>
          </body>
          </html>