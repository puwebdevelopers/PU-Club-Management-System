<?php  
//include('config.php');
//include('db.php');

//session_start();
if((!isset($_SESSION['id']))&&(!isset($_SESSION['email']))&&(!isset($_SESSION['username']))){
header("location:index.php?info=login");
}else{

$sql="SELECT * FROM skills WHERE uid=? ";
$statement = $pdo->prepare($sql);

$statement->execute([$_SESSION['id']]);

$result = $statement->fetchAll();

?>
<!-- <script src="../../bower_components/jquery/dist/jquery.min.js"></script> -->
<div class="modal fade" id="skills">
    <div class="modal-dialog" id="c">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Your Skills</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered" id="tb">
                    <thead>
                        <tr>
                            <th>Skill</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>    
                <tbody id="table_data">
                    <?php
    foreach($result as $row)
    {
        $id=$row["id"];
     echo '
     <tr>
      <td>'.$row["skill"].'</td>
      <td>'.$row["level"].'</td>
      <td>
      <button class="btn btn-info ">Edit</button>
      <button type="submit" class="btn btn-danger" id="delete" value="'.$id.'">Delete</button>
      </td>
     </tr>
     ';
    }
    ?>
                    </tbody>
                </table>



                <form method="POST" id="add_details" role="form">
                    <div class="row">
                        <input type="hidden" id="uid" name="uid" value="<?php echo $_SESSION['id'];?>" class="form-control">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="Title">Skill</label>
                                <input type="text" id="skill" name="skill" class="form-control" placeholder="Skill"
                                    required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="Title">Level</label>
                                <select name="level" class="form-control" id="level" required>
                                    <option value="Begginer">Begginer</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Expert">Expert</option>
                                </select>
                                <button type="submit" class="btn btn-success" id="add">Add</button>
                            </div>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                                class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i>
                            Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
$(document).ready(function() {

    //add
    $('#add_details').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "includes/insert_skill.php",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('#add').attr('disabled', 'disabled');
            },
            success: function(data) {
                 $('#add').attr('disabled', false);
                if (data.skill) {
                    var html = '<tr>';
                    html += '<td>' + data.skill + '</td>';
                    html += '<td>' + data.level + '</td></tr>';
                    $('#table_data').prepend(html);
                    $('#add_details')[0].reset();
                    $("#skills").load(location.href+"#skills");
                }
            }
        })
    });

    // Delete 
    $('#delete').click(function() {
        var el = this;
        var id = $(this).val();
        // alert(id);
        $.ajax({
            url: 'includes/remove_skill.php',
            type: 'POST',
            data: {
                id: id
            },
            success: function(response) {

                if (response == 1) {
                    // Remove row from HTML Table

                    $(el).closest('tr').css('background', 'tomato');
                    $(el).closest('tr').fadeOut(800, function() {
                        $(this).remove();
                    });
                    //$("#skills").load(location.href+"#skills");
                } else {
                    alert('Invalid ID.');
                }

            }
        });

    });

});
</script>
<?php  } ?>