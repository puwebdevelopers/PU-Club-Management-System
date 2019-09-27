<?php
require_once('config.php');
require_once('db.php');

$message = '';

// Check for Submission
if (isset($_POST['save'])) {

    // Get form data
    $deptName = $_POST['deptname'];
    $deptHead = $_POST['head'];

    $sql = 'SELECT * FROM departments WHERE name=?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$deptName]);
    $row = $stmt->fetch();
    $rowCount = $stmt->rowCount();

    if ($rowCount > 0) {
        $message .= '
    <div class="alert alert-danger">
              <h4><i class="icon fa fa-warning"></i> Error!</h4>
              The department already exist!!
          </div>      
  ';
    } else {
        try {
            $sql = "INSERT INTO departments(name) VALUES(?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$deptName]);
            $stmt->closeCursor();//close
            //get new dept details
            $stmt = $pdo->prepare("SELECT * FROM departments WHERE name=?");
            $stmt->execute([$deptName]);
            $row = $stmt->fetch();
            //insert dept head
            $stmt = $pdo->prepare("INSERT INTO department_heads (member_id,dept_id)VALUES(?,?)");
            $stmt->execute([$deptHead, $row['id']]);
            // $count = $stmt->rowCount();

            // $lastInsertId = $pdo->lastInsertId();

            /* if($lastInsertId){
              $message .= '
                    <div class="alert alert-success">
                              <h4><i class="icon fa fa-check"></i> Success!</h4>
                              Department <b>'.$email.'</b>  added succesfully
                          </div>
                          <h4>You may <a href="login.php">Login</a> or back to <a href="index.php">Homepage</a>.</h4>
                  ';

            } */
        } catch (PDOException $e) {
            $message .= '
    <div class="alert alert-danger">
              <h4><i class="icon fa fa-warning"></i> Error!</h4>
              ' . $e->getMessage() . '
          </div>
          <h4>You may <a href="signup.php">Signup</a> or back to <a href="index.php">Homepage</a>.</h4>
  ';
        }

    }

}

if (isset($_POST['edit'])){
    $deptNameU=$_POST['deptNameU'];
    $id=$_COOKIE['ids'];
    $stmt = $pdo->prepare("UPDATE departments SET name=? WHERE id=?");
    $stmt->execute([$deptNameU,$id]);
    ?>
    <script>
        document.querySelector('input[name=edit]').addEventListener('click', function(e) {
            e.preventDefault();
            window.location.reload();
        });
    </script>
<?php
}
?>


<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Department</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="">

                    <div class="form-group">
                        <label for="name">Department Name</label>
                        <input type="text" id="name" name="deptname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="code">Department Head</label>
                        <select class="form-control" name="head" required>
                            <?php
                            $stmt = $pdo->prepare("SELECT * FROM members");
                            $stmt->execute();
                            foreach ($stmt as $row) {
                                ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['email']; ?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Choose Logo</label>
                        <input type="file" name="logo" class="form-control-file" id="exampleFormControlFile1">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                            class="fa fa-close"></i> Close
                </button>
                <button type="submit" name="save" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save
                </button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- EDIT MODAL -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Department</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="">

                    <div class="form-group">
                        <label for="Title">Department Name</label>
                        <input type="text" id="Title" name="deptNameU" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Choose Logo</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                                    class="fa fa-close"></i> Close
                        </button>
                        <button type="submit" class="btn btn-primary btn-flat" name="edit"><i class="fa fa-save"></i> Save
                        </button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- DELETE MODAL -->
<div class="modal modal-danger fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Department</h4>
            </div>
            <div class="modal-body">
                <h2>Are you sure you want to delete this user?</h2>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                            class="fa fa-close"></i> Cancel
                </button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-check"></i> Ok
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- EDIT PHOTO -->
<div class="modal fade" id="edit_logo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Member</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Choose photo</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                            class="fa fa-close"></i> Close
                </button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>