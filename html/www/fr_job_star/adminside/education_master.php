<!DOCTYPE html>
<html>
  <head>
    <?php include 'add_ons_head.php';
    include_once("connection.php");
    $con = new JobClass;
    ?>
    <script src="jquery-1.11.3.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function()
      {
        $('#rname').on('change',function()
        {
          var roleid=$(this).val();
          if(roleid)
          {
            $.ajax
            ({
              type:'post',
              url:'get_subrole.php',
              data:'role_id='+roleid,
              success:function(html)
              {
                $('#subrole').html(html);
              }
            });
           }
          else
          {
            $('#subrole').html('<option value="">not selecte sub role</option>');
          }  

         });
        $('#state').on('change',function()
        {
            var stateid=$(this).val();
             if(stateid)
             {
               $.ajax
               ({
                 type:'post',
                 url:'get_city.php',
                 data:'state_id='+stateid,
                 success:function(html)
                 {
                   $('#city').html(html);
                 }
               });
              }
             else
             {
               $('#city').html('<option value="">not selecte sub city</option>');
             }    
        })
      });
    </script>
    <style type="text/css">
    .erText{
    font-family: Arial;
    font-size: 15px;
    color:#cc0000;
    text-decoration: none;
    font-weight: normal;
    }
    </style>
  </head>
  <?php
  if(isset($_POST['sinsert']))
  {
  $erdgr="";
  $erclg="";
  $ersy="";
  $erey="";
  $erskill="";
  if(!preg_match("/^[A-Za-z]+$/", $_POST["degree"]))
  {
  $erdgr="<p class='erText'>Enter Your Degree</p>";
  }
  if(!preg_match("/^[A-Za-z0-9 _,.&]+$/", $_POST["clg_name"]))
  {
  $erclg="<p class='erText'>Enter Your College Name</p>";
  }
  if(!preg_match("/^[0-9]{1,4}$/", $_POST["stating_year"]))
  {
  $ersy="<p class='erText'>Enter Starting Year  </p>";
  }
  if(!preg_match("/^[0-9]{1,4}$/", $_POST["ending_year"]))
  {
  $erey="<p class='erText'>Enter Ending Year </p>";
  }
  if(!preg_match("/^[A-Za-z, &._]+$/", $_POST["extra_skill"]))
  {
  $erskill="<p class='erText'>Enter Your Skills</p>";
  }
  }
  ?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include 'header.php'; ?>
      <?php include 'left_sidebar.php'; ?>
      <!-- Content Wrapper.z Contains page content -->
      <div class="content-wrapper">
        <div class="col-md-12">
          <h2> Education</h2>
          <div class="text-right">
            <a href="table_education.php"><h2><i class="fa fa-hand-o-right"></i></i> <span>show record</span></h2></a>
          </div>
          <?php
          if(isset($_GET['uid'])){
          $id = $_GET['uid'];
          $row=$con->select_up('education_master','edu_id',$id);
          }
          ?>
          <form method="post">
            <div class="form-group">
              <label for="cnd_id">Candidate Id</label>
              <select class="form-control" name="candidatename" id="candidatename">
                <option>select Candidate</option>
                <?php
                $result_select=$con->data_dd("candidate_master");
                while($row=mysqli_fetch_array($result_select))
                {
                ?>
                <option value="<?php echo $row[0]; ?>"><?php echo "$row[2] $row[3]"; ?> </option>";
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="degree">Degree</label>
              <input type="text" class="form-control" id="degree" placeholder="Enter Degree...." name="degree" value="<?php if(isset($_POST['degree'])){ echo $_POST['degree']; } ?>">
              <?php if(isset($erdgr)) {echo $erdgr; }?>
            </div>
            <div class="form-group">
              <label for="clg_name">Collage Name</label>
              <input type="text" class="form-control" id="clg_name" placeholder="Enter College Name...." name="clg_name" value="<?php if(isset($_POST['clg_name'])){ echo $_POST['clg_name']; } ?>">
              <?php if(isset($erclg)) {echo $erclg; }?>
            </div>
            <div class="form-group">
              <label for="r_id">Role</label>
              <select class="form-control" name="rname" id="rname">
                <option>Select Role</option>
                <?php
                $result_select=$con->data_dd("role_master");
                while($row=mysqli_fetch_array($result_select))
                {
                echo "<option value='$row[0]'> $row[1] </option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="subr_id">Sub Role </label>
                 <select class="form-control" name="subrole" id="subrole">
                        <option>Select Sub Role</option>
                      </select>         
            </div>
            <div class="form-group">
              <label for="state_id">State </label>
              <select class="form-control" name="state_name">
                <option>Select State</option>
                <?php
                $result_select=$con->data_dd("state_master");
                while($row=mysqli_fetch_array($result_select))
                {
                echo "<option value='$row[0]'> $row[1] </option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="city_id">City </label>
              <select class="form-control" name="city_name">
                <option>Select City</option>
                <?php
                $result_select=$con->data_dd("city_master");
                while($row=mysqli_fetch_array($result_select))
                {
                echo "<option value='$row[0]'> $row[2] </option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="stating_year">Starting Year </label>
              <input type="text" class="form-control" id="stating_year" placeholder="Enter Stating Year...." name="stating_year" value="<?php if(isset($_POST['stating_year'])){ echo $_POST['stating_year']; } ?>">
              <?php if(isset($ersy)) {echo $ersy; }?>
            </div>
            <div class="form-group">
              <label for="ending_year">Ending Year</label>
              <input type="text" class="form-control" id="ending_year" placeholder="Eenter Endiyear...." name="ending_year" value="<?php if(isset($_POST['ending_year'])){ echo $_POST['ending_year']; } ?>">
              <?php if(isset($erey)) {echo $erey; }?>
            </div>
            <div class="form-group">
              <label for="extra_skill">Extra Skill</label>
              <input type="text" class="form-control" id="extra_skill" placeholder="Enter Extra Skill...." name="extra_skill" value="<?php if(isset($_POST['extra_skill'])){ echo $_POST['extra_skill']; } ?>">
              <?php if(isset($erskill)) {echo $erskill; }?>
            </div>
            <div class="form-group">
              <label for="extra_skill">Description</label>
              <input type="text" class="form-control" id="des" placeholder="Enter Extra Skill...." name="des" value="<?php if(isset($_POST['extra_skill'])){ echo $_POST['extra_skill']; } ?>">
            </div>
            <div>
              <input type="submit" class="btn btn-default" name="sinsert">
            </div>
          </form>
          <?php
          if(isset($_POST['sinsert']))
          {
          $data="";
          $data["candidatename"]=$_POST["candidatename"];
          $data["degree"]=$_POST["degree"];
          $data["clg_name"]=$_POST["clg_name"];
          $data["r_name"]=$_POST["rname"];
          $data["subrole"]=$_POST["subrole"];
          $data["state_name"]=$_POST["state_name"];
          $data["city_name"]=$_POST["city_name"];
          $data["stating_year"]=$_POST["stating_year"];
          $data["ending_year"]=$_POST["ending_year"];
          $data["extra_skill"]=$_POST["extra_skill"];
          $data["des"]=$_POST["des"];
          //print_r($data);
          $con->insertion('education_master',$data);
          }
          ?>
        </div>
      </div>
      <!-- /.content-wrapper -->
      <?php include 'footer.php'; ?>
      <?php include 'right_sidebar.php'; ?>
    </div>
    <!-- ./wrapper -->
    
    <?php include 'add_ons_body.php'; ?>
  </body>
</html>