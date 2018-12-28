<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
$page="job_search";
}
// $k=$_SESSION['c_key'];
$con1 = mysqli_connect("localhost","root","","job180") or die(mysql_error());
$arr="";
?>
<!DOCTYPE html>
<html lang="en">
  
  <!-- Mirrored from demo.suavedigital.com/jobstar/job-search-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:41 GMT -->

  <head>
    <?php include_once("add_once_head.php");
    $page1=0;
    ?>
  </head>
  <body>

    <!-- <div class="preloader">
      <div class="image-container">
        <div class="image"><img src="assets/images/preloader.gif" alt=""></div>
      </div>
    </div> -->
    <!-- Navbar Start -->
    
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-bg-white">
      <div class="container">
        <?php 
        if(isset($_SESSION['key']))
        {
          include_once("connection.php");
          $con = new JobClass;
          include('candidate_menu.php');
        
        }
        else
        {
          include('menu.php');
        }
        ?>
        
        <section class="job-map sec-pad">
          <div class="map-canas animated wow fadeIn" id="custom-map-job-map">
            </div><!--/.map-canvas -->
            <div class="container animated wow fadeIn" data-wow-delay="0.2s">
              <div class="col-md-12 col-sm-12 search-panel " style="height:110px;">
                <?php
        if(isset($_GET['page']))
        {
            $page = $_GET['page'];
            if($page=="" || $page==1)
            {
            $page1=0;
            }
            else
            {
              $page1=($page*6)-6;
            }

          }
          $str="";
          $state_str="";
          $type2="";
          $role_str="";
          if(isset($_POST['filter']))
          {
         // echo "FASD";
            $sid=$_REQUEST['state'];
            $rid=$_REQUEST['role'];
            @$chk=$_REQUEST['type'];
            // print_r($chk);
            if($chk=="")
            {
              $jtype="select * from jobtype_master";
              $res_jtype=mysqli_query($con1,$jtype);
              while($row_jtype=mysqli_fetch_array($res_jtype))
              {
                $str.=$row_jtype[0].",";
              }
              $str1=rtrim($str,",");
              $type=$str1;
            }
            else
            {
               $type=implode(',', $chk);
            }
            if($sid=="")
            {
              $state="select * from state_master";
              $res_state=mysqli_query($con1,$state);
              while($row_state=mysqli_fetch_array($res_state))
              {
                $state_str.=$row_state[0].",";
              }
              $str2=rtrim($state_str,",");
              $type2=$str2;
            }
            else
            {
              $type2=$sid;
            }
            if($rid=="")
            {
              $state="select * from role_master";
              $res_res=mysqli_query($con1,$state);
              while($row_role=mysqli_fetch_array($res_res))
              {
                $role_str.=$row_role[0].",";
              }
              $str3=rtrim($role_str,",");
              $type3=$str3;
            }
            else
            {
              $type3=$rid;
            }
            
            $result_select1="SELECT * FROM `jobpost_master` WHERE `jobtype_id` in($type) and (`r_id` in($type3) and `state_id` in($type2)) limit $page1,6";
            
          }
          else
          {
            $result_select1="select * from jobpost_master limit $page1,6";
          }
         ?>
                <form method="post">
                  <div class="input-group">
                    
                    <div class="input-col">
                      <div class="form-group">
                        <select name="state" id="state" class="def-input def-select">
                          <option value="">Select State</option>
                          <?php
                          $result_select=$con->data_dd("state_master");
                          while($row=mysqli_fetch_array($result_select))
                          {
                          echo "<option value='$row[0]'> $row[1] </option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="input-col">
                      <div class="form-group">
                        <select name="role" id="role" class="def-input def-select">
                          <option value="">---Select Skill----</option>
                          <?php
                          $result_select=$con->data_dd("role_master");
                          while($row=mysqli_fetch_array($result_select))
                          {
                          echo "<option value='$row[0]'> $row[1] </option>";
                          }
                          ?>
                          
                        </select>
                      </div>
                    </div>
                    <div style="position: absolute;margin-left: 300px;">
                    <?php
                    $result_select=$con->data_dd("jobtype_master");
                    while($row_chk=mysqli_fetch_array($result_select))
                    {
                    ?>
                    <label class="checkbox-inline">
                      <input type="checkbox" name="type[]" value="<?php echo $row_chk['jtype_id'];?>"><?php echo $row_chk['jtype_name'];?>
                    </label>
                    <?php } ?>
                  </div>
                    <div class="search-col">
                      <input type="submit" name="filter" class="search-btn" value="search">
                    </div>
                  </div>
                  
                </form>
              </div>
              <div class="job-info-2">
                <div class="container sec-pad-t">
                  <div class="job-content-2 animated wow fadeIn" data-wow-delay="0.2s">
                    <?php
                      $con = mysqli_connect("localhost","root","","job180") or die(mysql_error());
                    $result_s=mysqli_query($con,$result_select1);
                    $count_row=mysqli_num_rows($result_s);
                    if($count_row==0)
                    {
                      
                      echo "<p style='color:red;margin-left:39%;font-size: 25px;'>Match Not Found</p>";
                      
                    }
                    while($row=mysqli_fetch_array($result_s))
                    {
                    //print_r($row);
                    $cmp_id=$row[1];
                    $cmp_sql="select * from company_master where cmp_id= $cmp_id";
                    $cmp_select=mysqli_query($con,$cmp_sql);
                    $row1=mysqli_fetch_array($cmp_select);
                    //print_r($row1);
                    //$cmp=$con->select_up("company_master","cmp_id",$row[1]);
                    $jtype_sql="select * from jobtype_master where jtype_id= '$row[2]'";
                    $jtype_select=mysqli_query($con,$jtype_sql);
                    $row2=mysqli_fetch_array($jtype_select);
                    
                    $name=$row2['jtype_name'];
                    $str=str_replace(" ", "", $name);
                    $new_str=strtolower($str);
                    ?>
                    <div class="col-md-4 col-sm-6 job-item <?php echo $new_str; ?>">
                      <div class="content-wrap">
                        <a href="job_details.php?cid=<?php echo $row[1];?>&jid=<?php echo $row[0] ;?>">
                        <div class="company-logo valign-wrap">
                          <div class="valign-middle">
                            <img src="<?php echo '../assets/image/cmp_logo/'.$row1[15];?>" height="100px">
                          </div>
                        </div>
                      </a>
                        <div class="company-info <?php echo $new_str; ?>">
                          <div class="job-type"><span><?php echo $row2['jtype_name'];?></span></div>
                          <div class="job-position"><?php echo $row['j_name'];?></div>
                          <!-- <div class="job-position"><?php //echo "$row[],$row[] ";?></div> -->
                          <div class="job-description"><?php echo $row['des'];?></div>
                          <div class="release-date"><?php echo $row['updated_date']; ?></div>
                          <a href="job_details.php?cid=<?php echo $row[1];?>&jid=<?php echo $row[0] ;?>" class="read-more"><div class="text">Read More</div><div class="right-arrow"><i class="fa fa-angle-right"></i></div></a>
                        </div>
                      </div>
                    
                      </div>
                   
                      <!--/.job-item -->
                      <?php }
                   
                    ?>
                    </div>
                  </div>
                  </div><!--/.job-info-2 -->
                  <div class="col-md-12 text-center sec-h-pad-t">
                    <ul class="pagination">
                      <?php 
                       if(isset($_GET['page'])){
                      $get_page=$_GET['page'];}
                       else
                        {
                          $get_page=1;
                        }
                    ?>
                      <li><a href="?page=<?php if($get_page > 1) {echo $get_page-1;}else{echo "1";} ?>""><i class="fa fa-angle-left"></i></a></li>
                    <?php
                      $str="";
                      $state_str="";
                      $type2="";
                      $role_str="";
                      if(isset($_POST['filter']))
                      {
                     // echo "FASD";
                        $sid=$_REQUEST['state'];
                        $rid=$_REQUEST['role'];
                        @$chk=$_REQUEST['type'];
                        // print_r($chk);
                        if($chk=="")
                        {
                          $jtype="select * from jobtype_master";
                          $res_jtype=mysqli_query($con1,$jtype);
                          while($row_jtype=mysqli_fetch_array($res_jtype))
                          {
                            $str.=$row_jtype[0].",";
                          }
                          $str1=rtrim($str,",");
                          $type=$str1;
                        }
                        else
                        {
                           $type=implode(',', $chk);
                        }
                        if($sid=="")
                        {
                          $state="select * from state_master";
                          $res_state=mysqli_query($con1,$state);
                          while($row_state=mysqli_fetch_array($res_state))
                          {
                            $state_str.=$row_state[0].",";
                          }
                          $str2=rtrim($state_str,",");
                          $type2=$str2;
                        }
                        else
                        {
                          $type2=$sid;
                        }
                        if($rid=="")
                        {
                          $state="select * from role_master";
                          $res_res=mysqli_query($con1,$state);
                          while($row_role=mysqli_fetch_array($res_res))
                          {
                            $role_str.=$row_role[0].",";
                          }
                          $str3=rtrim($role_str,",");
                          $type3=$str3;
                        }
                        else
                        {
                          $type3=$rid;
                        }
                         $result_select2="SELECT j_id FROM `jobpost_master` WHERE `jobtype_id` in($type) and (`r_id` in($type3) and `state_id` in($type2))";
                      }
                      else
                      {
                        $result_select2="select j_id from jobpost_master";
                      }
                      $con2 = mysqli_connect("localhost","root","","job180") or die(mysql_error());
                      $result_s2=mysqli_query($con2,$result_select2);
                      $cou=mysqli_num_rows($result_s2);
                      $a = $cou/6;
                      $a=ceil($a);
                      $i=0;
                      for($b=1; $b<=$a; $b++)
                      {
                        $arr[] = ($b);
                        if(isset($_GET['page']))
                        {
                          $page=$_GET['page'];
                        }
                        else
                        {
                          $page=1;
                        }
                        //print_r($arr);
                      ?>  
                        <li><a class="<?php if($page == $b) { echo "active"; } ?>" href="?page=<?php echo $b;?>"><?php echo $b; ?></a></li>
                      <?php 
                      $i++;
                      }
                        //echo current($arr);
                        //echo next($arr);
                      if(isset($_GET['page'])){
                      $get_page=$_GET['page'];}
                       else
                        {
                          $get_page=1;
                        }
                    ?>
                      <li><a href="?page=<?php if($get_page < $b-1) {echo $get_page+1;}else{echo $b-1;} ?>"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                  </div>
                  </div><!--/.container -->
                  </section><!--/.job-map -->
                  <!-- Job Map Ends -->
                  <!-- Got a Question Starts -->
                  <!--/.got-a-question -->
                  <?php include('got.php');?>  <!-- Got a Question Ends -->
                  <!-- Footer Starts -->
                  <?php include('footer.php');?>



                  <!-- Footer Ends -->
                  <!-- JavaScripts -->
                  <script src="assets/javascripts/bootstrap.min.js"></script>
                  <script src="assets/javascripts/wow.min.js"></script>
                  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJEWOkg4njiqY71jR-xxs-PnQI9yXaYsQ"></script>
                  <script src="assets/javascripts/custom.js"></script>
                  <script src="assets/javascripts/jquery.countTo.js"></script>
                  <script src="assets/javascripts/isotope.pkgd.min.js"></script>
                  <script src="assets/javascripts/slick.min.js"></script>
                  <script src="assets/javascripts/jquery.parallax-1.1.3.js"></script>
                  <script src="assets/javascripts/jquery.appear.min.js"></script>
                  <script src="assets/javascripts/smoothproducts.min.js"></script>
                  <script src="assets/javascripts/custom-map-job-map.js"></script>
                  <script src="assets/javascripts/custom-map-post-a-job.js"></script>
                  <script src="assets/javascripts/custom-map-contact-us.js">
                  </script>
                </body>
                <!-- Mirrored from demo.suavedigital.com/jobstar/job-search-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:41 GMT -->
              </html>