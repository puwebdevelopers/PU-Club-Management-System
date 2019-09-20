<?php  
//session_start();
if((!isset($_SESSION['id']))&&(!isset($_SESSION['email']))&&(!isset($_SESSION['username']))){
header("location:index.php?info=login");
}else{
//include('config.php');
//include('db.php');

if(isset($_POST['add'])){
$email=$_POST['email'];
$username=$_POST['username'];
$location=$_POST['location'];
$year=$_POST['year'];
$dept=$_POST['dept'];
$adm=$_POST['adm'];
$course=$_POST['course'];

$stmt=$pdo->prepare("UPDATE members SET email=?, username=?,department_id=?,year=?,location=?,course=?,adm=? WHERE id=?");
$stmt->execute([$email,$username,$dept,$year,$location,$course,$adm,$_SESSION['id']]);

$target_dir = "includes/profiles/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
// Check file size
if ($_FILES["photo"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG, PNG files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
 
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
       switch(exif_imagetype ($target_file)){
         case 2:
         $ext='.jpeg';
         break;
         case 3:
         $ext='.png';
         break;
       }
	   $urlPic = "includes/profiles".'/'.$_SESSION['id'].$ext;
      rename("includes/profiles".'/'.basename( $_FILES["photo"]["name"]), $urlPic);
	  $stmt=$pdo->prepare("UPDATE members SET photo=? WHERE id=?");
	  $stmt->execute([$urlPic,$_SESSION['id']]);
        echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.".$ext;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
unset($_POST['add']);
}

$stmt=$pdo->prepare("SELECT * FROM members WHERE id=?");
$stmt->execute([$_SESSION['id']]);
$row=$stmt->fetch();

?>

<div class="modal fade" id="profile">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Profile</h4>
              </div>
              <div class="modal-body">
              <form method="POST" action="" enctype="multipart/form-data">
<div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="form-group">
            <label for="Title">Username</label>
            <input type="text" id="Title" name="username" class="form-control" value="<?php echo $row['username']; ?>" required>
        </div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="form-group">
            <label for="authot">Email</label>
            <input type="text" name="email" id="authot" class="form-control" value="<?php echo $row['email']; ?>" required>
        </div>
		</div>
		</div>
		<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="form-group">
          <label for="exampleFormControlFile1">Choose photo</label>
		  <?php if(isset($row['photo'])){ ?>
          <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1" value="<?php echo $row['photo'];?>" >
		  <?php }else{ ?>
          <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1" required>
		  <?php } ?>
        </div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="form-group">
            <label for="authot">Location</label>
            <input type="text" name="location" id="authot" class="form-control" value="<?php echo $row['location']; ?>" required>
        </div>
		</div>
		</div>
		
		 <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="form-group">
            <label for="authot">Adm No</label>
            <input type="text" name="adm" class="form-control"  value="<?php echo $row['adm']; ?>"	required>
        </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="form-group">
            <label for="authot">Course</label>
            <select class="form-control" name="course" required>
              <option value="<?php echo $row['course']; ?>"><?php echo $row['course'];?></option>
              <option value="BSc. Computer Science">BSc. Computer Science</option>
              <option value="BSc. TIT">BSc. TIT</option>
              <option value="Dip. IT">Dip. IT</option>
              <option value="Dip. Computer Science">Dip. Computer Science</option>
            </select>
        </div>
        </div>
              </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="form-group">
            <label for="authot">Department</label>
            <select class="form-control" name="dept" required>
              <option value="<?php echo $row['department_id']; ?>"><?php echo $row['department_id'];?></option>
              <?php 
              $stmt=$pdo->prepare("SELECT * FROM departments");
              $stmt->execute();
              while($rows = $stmt->fetch()){
              ?>
              <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name'];?></option>
             
              <?php } ?>
            </select>
        </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="form-group">
            <label for="authot">Year</label>
            <select class="form-control" name="year" required>
              <option value="<?php echo $row['year']; ?>"><?php echo $row['year'];?></option>
              <option value="1">Year 1</option>
              <option value="2">Year 2</option>
              <option value="3">Year 3</option>
              <option value="4">Year 4</option>
              
            </select>
        </div>
        </div>
              </div>

        <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </div>
      </form>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<?php  } ?>