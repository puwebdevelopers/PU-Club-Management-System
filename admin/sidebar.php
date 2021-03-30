<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="includes/profiles/<?php echo $_SESSION['id'].'.png' ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="header">MANAGE</li>
        <li class="treeview">
          <a href="departments.php">
            <i class="fa fa-university"></i>
            <span>Departments</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="departments.php"><i class="fa fa-circle-o"></i> Departments</a></li>
            <li><a href="departments.php?department=1"><i class="fa fa-circle-o"></i> Web Development</a></li>
            <li><a href="departments.php?department=2"><i class="fa fa-circle-o"></i> Android Development</a></li>
            <li><a href="departments.php?department=3"><i class="fa fa-circle-o"></i> Cyber Security</a></li>
            <li><a href="departments.php?department=4"><i class="fa fa-circle-o"></i> Animation</a></li>
            <li><a href="departments.php?department=5"><i class="fa fa-circle-o"></i> Hardware</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="members.php">
            <i class="fa fa-users"></i> <span>Members</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="members.php"><i class="fa fa-circle-o"></i> Members</a></li>
            <li><a href="members.php?sort-by=1"><i class="fa fa-circle-o"></i> First Year</a></li>
            <li><a href="members.php?sort-by=2"><i class="fa fa-circle-o"></i> Second Year</a></li>
            <li><a href="members.php?sort-by=3"><i class="fa fa-circle-o"></i> Third Year</a></li>
            <li><a href="members.php?sort-by=4"><i class="fa fa-circle-o"></i> Forth Year</a></li>
            <li><a href="other.php"><i class="fa fa-circle-o"></i> Other</a></li>
          </ul>
        </li>
        <li>
          <a href="access_logs.php">
            <i class="fa fa-table"></i> <span>User Access Logs</span>
          </a>
        </li>
        <li>
          <a href="change_password.php">
            <i class="fa   fa-lock"></i> <span>Admin Change Password</span>
          </a>
        </li>
  </aside>
