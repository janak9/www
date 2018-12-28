<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
}
$subr_id=$_GET['subr_id'];
 $page1=0;
?>
<!DOCTYPE html>
<html lang="en">
  
  <!-- Mirrored from demo.suavedigital.com/jobstar/job-search-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:41 GMT -->
  <head>
    <?php include("add_once_head.php"); ?>
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
           <div class="container">
           <?php 
          if(isset($_SESSION["key"]))
          {
            include_once("connection.php");
            $con = new JobClass;
            include("candidate_menu.php"); 
          }
          else
          {
            include("menu.php"); 

          } 
          ?>
          
          <!-- Job Map Starts -->
          <section class="job-map sec-pad">
          <div class="map-canas animated wow fadeIn" id="custom-map-job-map">
            </div><!--/.map-canvas -->
            <div class="container animated wow fadeIn" data-wow-delay="0.2s">
              <div class="col-md-12 col-sm-12 search-panel ">
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
                    $page1=($page*10)-10;
                  }
                }
                  $result_select1="SELECT * FROM jobpost_master WHERE subr_id  = $subr_id limit $page1,10";
               ?>
                <form method="post">
                  <div class="input-group">
                    <div class="input-col">
                      <div class="form-group">
                        <input type="text" class="def-input" placeholder="Keywords">
                      </div>
                    </div>
                    <div class="search-col">
                      <a href="#" class="search-btn"><i class="fa fa-search"></i></a>
                    </div>
                  </div>
                </form>
              </div><!--/.search-panel -->
                  <div class="job-list-container sec-q-pad-t">
                    <?php
                      $con1 = mysqli_connect("localhost","root","","job180") or die(mysql_error());
                    $result_s=mysqli_query($con1,$result_select1);
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
                    $cmp_select=mysqli_query($con1,$cmp_sql);
                    $row1=mysqli_fetch_array($cmp_select);
                    //print_r($row1);
                    //$cmp=$con->select_up("company_master","cmp_id",$row[1]);
                    $jtype_sql="select * from jobtype_master where jtype_id= $row[2]";
                    $jtype_select=mysqli_query($con1,$jtype_sql);
                    $row2=mysqli_fetch_array($jtype_select);

                    $name=$row2['jtype_name'];
                    $str=str_replace(" ", "", $name);
                    $new_str=strtolower($str);

                    $state=$con->select_up("state_master","state_id",$row['state_id']);
                    $city=$con->select_up("city_master","city_id",$row['city_id']);
                    ?>
                    <a href="job_details.php?cid=<?php echo $row[1];?>&jid=<?php echo $row[0] ;?>">
                      <div class="job-list valign-wrap">
                        <div class="company-logo valign-middle content-wrap">
                          <img src="<?php echo '../assets/image/cmp_logo/'.$row1[15];?>" alt="">
                        </div>
                        <div class="company-name valign-middle content-wrap">
                          <h4><?php echo $row1['cmp_name']; ?></h4>
                          <p><?php echo $row['j_name'];?></p>
                        </div>
                        <div class="location valign-middle content-wrap">
                          <i class="fa fa-map-marker"></i> &nbsp;  <?php echo "$state[1] , $city[2]"; ?>
                        </div>
                        <div class="job-type <?php echo $new_str; ?> valign-middle content-wrap">
                          <span><?php echo $row2['jtype_name']; ?></span>
                        </div>
                        <div class="exp-salary valign-middle content-wrap">
                          <h4><i class="fa fa-money"></i> &nbsp; <?php echo "$row[6] - $row[7]"; ?></h4>
                        </div>
                        </div><!--/.job-list -->
                        </a>
                        <?php }
                        ?>
                      
                              </div><!--/.job-list-container -->
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
                      
                        $result_select2="SELECT * FROM jobpost_master WHERE subr_id  = $subr_id";
                      
                      $con2 = mysqli_connect("localhost","root","","job180") or die(mysql_error());
                      $result_s2=mysqli_query($con2,$result_select2);
                      $cou=mysqli_num_rows($result_s2);
                      $a = $cou/10;
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
                              <?php include 'got.php'; ?><!-- Got a Question Ends -->
                              <!-- Footer Starts -->
                              <?php include 'footer.php'; ?>
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
                            <!-- Mirrored from demo.suavedigital.com/jobstar/job-search-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:41 GMT -->
                          </html>