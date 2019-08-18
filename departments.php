<?php




include('includes/config.php');?>
<?php include('includes/db.php');?>

<?php include('includes/header.php');?>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Departments
      </h1>
      <ol class="breadcrumb">
      <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="departments">Departments</a></li>
        <li class="active">Departments</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <th>Department Name</th>
                  <th>Department Code</th>
                  <th>Department Logo</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  <?php
                    try{
                      $sql ='SELECT * FROM tbldepartments';
                      $stmt = $pdo->prepare($sql);
                      $stmt->execute();
                      foreach($stmt as $row){
                        $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/profile.jpg';
					            	// $status = (!$row['status']) ? '<button class="btn btn-danger btn-xs  btn-flat>Join</button>' : '<button class="btn btn-warning btn-xs">Exit</button>';
                        echo "
                          <tr>
                            <td>".$row['DepartmentName']."</td>
                            <td>".$row['DepartmentCode']."</td>
                            <td>
                            <img src='".$image."' height='30px' width='30px'>
                            </td>
                            <td>
							             	<button class='data-id'>Join</button>
                              <a href='department_members.php?row=".$row['id']."' role='button' class='btn btn-primary btn-sm  btn-flat' data-id='".$row['id']."'><i class='fa fa-search'></i> View Members</button>
                            </td>
                          </tr>
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
    

    <?php include 'includes/departments_modal.php'; ?>

    <?php include('includes/footer.php');?>
  

<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'category_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.catid').val(response.id);
      $('#edit_name').val(response.name);
      $('.catname').html(response.name);
    }
  });
}
</script>


<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'category_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.catid').val(response.id);
      $('#edit_name').val(response.name);
      $('.catname').html(response.name);
    }
  });
}
</script>

