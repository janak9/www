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
    <div class="container">
      <!-- Navbar Start -->
      <nav class="navbar navbar-inverse navbar-fixed-top navbar-bg-white">
        <div class="container">
          <?php include('menu.php');?>
         </div> 
          <!-- Job Map Starts -->
          <section class="job-map sec-pad-b">
            
              
              <div class="container animated wow fadeInUp">
                <div class="col-md-12 col-sm-12 search-panel form-group">
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
            
            $result_select1="SELECT * FROM `company_master` WHERE `jobtype_id` in($type) and (`r_id` in($type3) and `state_id` in($type2))";
            
          }
          else
          {
            $result_select1="select * from jobpost_master";
          }
         ?>
                <form method="post">

                  <div class="input-group">
                    
                    <div class="input-col">
                      <div class="form-group">
                        <input type="text" class="def-input" placeholder="Keywords">
                      </div>
                    </div>
                    
                    <div class="input-col">
                      <div class="form-group">
                        <select name="state" id="state" class="def-input def-select">
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
                    </div>
                    
                    <div class="input-col">
                      <div class="form-group">
                        <select name="role" id="role" class="def-input def-select">
                          <option value="" selected disabled>Choose Category</option>
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
                    <div class="search-col">
                      <a href="#" class="search-btn"><i class="fa fa-search"></i></a>
                    </div>
                  </div>
                  <div class="col-md-12 checkboxes">
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
                 </form> 
                  </div><!--/.search-panel -->
                  <div class="job-list-container sec-q-pad-t">
                    <a href="job-details.php">
                      <div class="job-list valign-wrap">
                        <div class="company-logo valign-middle content-wrap">
                          <img src="assets/images/themeforest.png" alt="">
                        </div>
                        <div class="company-name valign-middle content-wrap">
                          <h4>Themeforest Company</h4>
                          <p>Assistant Manager</p>
                        </div>
                        <div class="location valign-middle content-wrap">
                          <i class="fa fa-map-marker"></i> &nbsp; Bronx, NY
                        </div>
                        <div class="job-type fulltime valign-middle content-wrap">
                          <span>Full Time</span>
                        </div>
                        <div class="exp-salary valign-middle content-wrap">
                          <h4>$ 3000 - 4500</h4>
                        </div>
                        </div><!--/.job-list -->
                        <div class="job-list valign-wrap">
                          <div class="company-logo valign-middle content-wrap">
                            <img src="assets/images/graphicriver.png" alt="">
                          </div>
                          <div class="company-name valign-middle content-wrap">
                            <h4>Graphicriver Company</h4>
                            <p>Graphic Designer</p>
                          </div>
                          <div class="location valign-middle content-wrap">
                            <i class="fa fa-map-marker"></i> &nbsp; Orlando, FL
                          </div>
                          <div class="job-type parttime valign-middle content-wrap">
                            <span>Part Time</span>
                          </div>
                          <div class="exp-salary valign-middle content-wrap">
                            <h4>$ 2000</h4>
                          </div>
                          </div><!--/.job-list -->
                        </a>
                        <a href="job-details.html">
                          <div class="job-list valign-wrap">
                            <div class="company-logo valign-middle content-wrap">
                              <img src="assets/images/codecanyon.png" alt="">
                            </div>
                            <div class="company-name valign-middle content-wrap">
                              <h4>Codecanyon Company</h4>
                              <p>Project Manager</p>
                            </div>
                            <div class="location valign-middle content-wrap">
                              <i class="fa fa-map-marker"></i> &nbsp; Philadelphia, PA
                            </div>
                            <div class="job-type temporary valign-middle content-wrap">
                              <span>Temporary</span>
                            </div>
                            <div class="exp-salary valign-middle content-wrap">
                              <h4>$ 5000</h4>
                            </div>
                            </div><!--/.job-list -->
                          </a>
                          <a href="job-details.html">
                            <div class="job-list valign-wrap">
                              <div class="company-logo valign-middle content-wrap">
                                <img src="assets/images/audiojungle.png" alt="">
                              </div>
                              <div class="company-name valign-middle content-wrap">
                                <h4>Audiojungle Company</h4>
                                <p>Online Marketing Manager</p>
                              </div>
                              <div class="location valign-middle content-wrap">
                                <i class="fa fa-map-marker"></i> &nbsp; Quahog, NJ
                              </div>
                              <div class="job-type freelance valign-middle content-wrap">
                                <span>Freelance</span>
                              </div>
                              <div class="exp-salary valign-middle content-wrap">
                                <h4>$ 2500</h4>
                              </div>
                              </div><!--/.job-list -->
                            </a>
                            <a href="job-details.html">
                              <div class="job-list valign-wrap">
                                <div class="company-logo valign-middle content-wrap">
                                  <img src="assets/images/videohive.png" alt="">
                                </div>
                                <div class="company-name valign-middle content-wrap">
                                  <h4>Videohive Company</h4>
                                  <p>Internship</p>
                                </div>
                                <div class="location valign-middle content-wrap">
                                  <i class="fa fa-map-marker"></i> &nbsp; Springfield, IL
                                </div>
                                <div class="job-type internship valign-middle content-wrap">
                                  <span>Internship</span>
                                </div>
                                <div class="exp-salary valign-middle content-wrap">
                                  <h4>$ 40 / hour</h4>
                                </div>
                                </div><!--/.job-list -->
                              </a>
                              </div><!--/.job-list-container -->
                              <div class="col-md-12 text-center sec-h-pad-t">
                                <ul class="pagination">
                                  <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                  <li><a class="active" href="#">1</a></li>
                                  <li><a href="#">2</a></li>
                                  <li><a href="#">3</a></li>
                                  <li><a href="#">4</a></li>
                                  <li><a href="#">5</a></li>
                                  <li><a href="#">6</a></li>
                                  <li><a href="#">7</a></li>
                                  <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
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