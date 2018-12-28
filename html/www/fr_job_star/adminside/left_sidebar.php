<aside class="main-sidebar" style="position: fixed;">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image user user-menu">
        <img src="assets/image/profile/<?php echo $row[3];?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['user_name']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Deshboard</span></a></li>
      <a href="#">
        <li class="treeview">
          <i class="fa fa-map-marker"></i> <span>Locations</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="state_master.php"><i class="fa fa-circle-o"></i> <span>State</span></a></li>
          
          <li><a href="city_master.php"><i class="fa fa-circle-o"></i> <span>City</span></a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-language"></i> <span>Skill And Language</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="role_master.php"><i class="fa fa-book"></i> <span>Skill</span></a></li>
          <li><a href="subrole_master.php"><i class="fa fa-book"></i> <span>Sub Skill</span></a></li>
        </ul>
      </li>
      <li><a href="jobtype_master.php"><i class="fa fa-circle-o"></i> <span>Job Type</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-table"></i> <span>Date Base</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="companyInfo.php"><i class="fa fa-circle-o"></i> <span>Company</span></a></li>
          <li><a href="jobpostInfo.php"><i class="fa fa-circle-o"></i> <span>Job Post</span></a></li>
          <li><a href="candidateInfo.php"><i class="fa fa-circle-o"></i> <span>Candidate</span></a></li>
          <li><a href="educationInfo.php"><i class="fa fa-circle-o"></i> <span>Education</span></a></li>
          <li><a href="experienceInfo.php"><i class="fa fa-circle-o"></i> <span>Experience</span></a></li>
          <li><a href="applyInfo.php"><i class="fa fa-circle-o"></i> <span>Apply</span></a></li>
          <li><a href="certificateInfo.php"><i class="fa fa-circle-o"></i> <span>Cerificate</span></a></li>
        </ul>
      </li>
      <li><a href="FAQinfo.php">
        <i class="fa fa-question"></i> <span>FAQ Answare</span>
        <span class="pull-right-container"><span class="label label-success">
          <?php echo $c=$con->counter("faq","''","ans");?></span>
        </span>
      </a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>