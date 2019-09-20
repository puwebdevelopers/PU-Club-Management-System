<?php include('includes/config.php');?>
<?php include('includes/db.php');?>
<?php 

if(isset($_POST['register'])&&isset($_POST['email'])&&isset($_POST['password'])){
 $email=$_POST['email'];
 $pass=password_hash($_POST['password'], PASSWORD_DEFAULT);

 //check if user exists
 $stmt=$pdo->prepare("SELECT * FROM members WHERE email=?");
 $stmt->execute([$email]);
 $count=$stmt->rowCount();
 if($count!=0){
     //already exixts
     header("location:register.php?info=error");
 }else{
     //register
     $stmt=$pdo->prepare("INSERT INTO members (email,password)VALUES(?,?)");
     if($stmt->execute([$email,$pass])){
       //success
       header("location:register.php?info=success");
}else{
    //error
    header("location:register.php?info=errors");
}

 }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>School Club | Register</title>
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

  <script src="includes/passVerify.js"></script>

<title>Register</title>
</head>
<body>
<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4 col-lg-4">
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Register</h3>
            </div>
            
            <?php
            if(isset($_GET['info'])){
              $info=$_GET['info'];
              if($info=='success'){
                ?>
                <div class="alert-success">
                <strong>Registration successfull<a href="index.php">You can now login</a></strong>
                </div>
                <?php
              }else if($info=='error'){
                ?>
                <div class="alert-warning">
                <strong>User already exists.</strong>
                </div>
                <?php
              }else{
                ?>
                <div class="alert-error">
                <strong>Registration failed</strong>
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
                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword1" placeholder="Password" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword2" onkeyup="passwordVerify();" placeholder="Confirm password" required>
                    <div id="passwordError"></div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="index.php" class="btn btn-default">Sign in</a>
                <button type="submit" name="register" class="btn btn-info pull-right" id="btnReg">Register</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          </div>
          </body>
          </html>