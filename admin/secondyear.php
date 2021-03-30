<section class="content-header">
      <h1>
       Second year Members
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Members</li>
        <li class="active">Members</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Photo</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>status</th>
                  <th>Date Joined</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  <?php
                    try{
                      $sql ='SELECT * FROM members WHERE year=?';
                      $stmt = $pdo->prepare($sql);
                      $stmt->execute(['2']);
                      foreach($stmt as $row){
                        // $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg';
                        // $active = (!$row['status']) ? '<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id="'.$row['id'].'"><i class="fa fa-check-square-o"></i></a></span>' : '';
                        // $status = ($row['status']) ? '<button class="btn btn-danger btn-xs  btn-flat>Block</button>' : '<button class="btn btn-warning btn-xs">Unblock</button>';
                       ?>
                          <tr>
                            <td>
							<?php if(!empty($row['photo'])){?>
                              <img src="<?php echo $row['photo']; ?>" height='30px' width='30px'>
							<?php }else{ ?>
							 <img src="includes/profiles/profile.jpg" height='30px' width='30px'>
							<?php } ?>
                              <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id="<?php $row['id']?>"><i class='fa fa-edit'></i></a></span>
                            </td>
                            <td><?php echo $row['email']; ?>"</td>
                            <td><?php echo $row['username'].$row['username']; ?></td>
                            <td>
                            <a> <?php echo $row['status']; ?></a>
                            </td>
                            <td><?php echo $row['created_on']; ?></td>
                            <td>
                            <button class='btn btn-success btn-sm delete btn-flat' ><i class='fa fa-trash'></i> Delete</button>
                              <a role='button' href='user_profile.php' class='btn btn-primary btn-sm btn-flat' ><i class='fa fa-eye'></i> View Profile</a>
                            </td>
                          </tr>
                        <?php
                      
                    }}catch(PDOException $e){
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