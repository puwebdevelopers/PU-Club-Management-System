<?php
session_start();

if ((!isset($_SESSION['id'])) && (!isset($_SESSION['email'])) && (!isset($_SESSION['username']))) {
    header("location:index.php?info=login");
} else {

    include('includes/config.php');
    include('includes/db.php');

    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>School Club | Departments</title>
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
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include "topbar.php"; ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php include "sidebar.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!--get dept id-->
            <?php if (isset($_GET['department'])) {
                $sort_id = $_GET['department'];
                if ($sort_id == '1') {
                    include "webdev.php";
                } else if ($sort_id == '2') {
                    include "android.php";
                } else if ($sort_id == '3') {
                    include "cyber_security.php";
                } else if ($sort_id == '4') {
                    include "animation.php";
                } else if ($sort_id == '5') {
                    include "hardware.php";
                }
            } else { ?>
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
                                <div class="box-header with-border">
                                    <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i
                                                class="fa fa-plus"></i> Add Department</a>
                                </div>
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
                                        try {
                                            $sql = 'SELECT * FROM departments';
                                            $stmt = $pdo->prepare($sql);
                                            $stmt->execute();
                                            foreach ($stmt as $row) {
                                                $id=$row['id'];
                                                $image = (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/profile.jpg';
                                                echo "
                          <tr>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['id'] . "</td>
                            <td>
                            <img src='" . $image . "' height='30px' width='30px'>
                            <span class='pull-right'><a href='#edit_logo' class='photo' data-toggle='modal' data-id='" . $row['id'] . "'><i class='fa fa-edit'></i></a></span>
                            </td>
                            <td>
                   
                             <script>

        function goDoSomething(d){
            alert(d.getAttribute('data-id'));
        }

    </script>
                              <a href='' class='btn btn-success btn-sm edit btn-flat' data-id='" . $row['id'] . "' onclick='goDoSomething(this);'><i class='fa fa-edit'></i> Edit</a>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='" . $row['id'] . "'><i class='fa fa-trash'></i> Delete</button>
                              <a href='departments.php?department=" . $row['id'] . "' role='button' class='btn btn-primary btn-sm  btn-flat' data-id='" . $row['id'] . "'><i class='fa fa-search'></i> View Members</button>
                            </td>
                          </tr>
                        ";
                                            }
                                        } catch (PDOException $e) {
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
            <?php } ?>
        </div>

        <?php include 'includes/departments_modal.php'; ?>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.13
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark" style="display: none;">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i
                                            class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <script>
        $(function () {
            $(document).on('click', '.edit', function (e) {
                e.preventDefault();
                $('#edit').modal('show');
                var id = $(this).data('id');
                getRow(id);
            });

            $(document).on('click', '.delete', function (e) {
                e.preventDefault();
                $('#delete').modal('show');
                var id = $(this).data('id');
                getRow(id);
            });

        });

        function getRow(id) {
            $.ajax({
                type: 'POST',
                url: 'category_row.php',
                data: {id: id},
                dataType: 'json',
                success: function (response) {
                    $('.catid').val(response.id);
                    $('#edit_name').val(response.name);
                    $('.catname').html(response.name);
                }
            });
        }
    </script>

    <!-- jQuery 3 -->
    <script src="../bower_components/jquery/jquery.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../bower_components/bootstrap/js/bootstrap.min.js"></script>

    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script>
        $(function () {
            $(document).on('click', '.edit', function (e) {
                e.preventDefault();
                $('#edit').modal('show');
                var id = $(this).data('id');
                getRow(id);
            });

            $(document).on('click', '.delete', function (e) {
                e.preventDefault();
                $('#delete').modal('show');
                var id = $(this).data('id');
                getRow(id);
            });

        });

        function getRow(id) {
            $.ajax({
                type: 'POST',
                url: 'category_row.php',
                data: {id: id},
                dataType: 'json',
                success: function (response) {
                    $('.catid').val(response.id);
                    $('#edit_name').val(response.name);
                    $('.catname').html(response.name);
                }
            });
        }
    </script>
    </body>
    </html>
<?php } ?>