<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
}
    $connection = mysqli_connect("localhost","root","","job180") or die(mysql_error());

?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demo.suavedigital.com/jobstar/vacancy-by-special.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:28:19 GMT -->
<head>
<?php include_once("add_once_head.php"); ?>
  </head>

  <body>
    
      <!-- Navbar Start -->
      <nav class="navbar navbar-inverse navbar-fixed-top navbar-bg-white">
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
    
    <!-- Banner Grey Starts -->
    <section class="banner-grey">
      <div class="container sec-hq-pad-t sec-hq-pad-b">
        <h2 class="animated wow fadeIn">Vacancy by Specialization</h2>
      </div>
    </section>
    <!-- Banner Grey Ends -->

    <!-- Vacancy by Specialization Starts -->
    <section class="vacancy-by-special animated wow fadeIn">

      <div class="container sec-hq-pad-t sec-hq-pad-b">

        <div class="col-md-4 col-sm-6 accordion-container">
          <!-- Accordion Panel Group -->
          <div class="panel-group sec-q-pad-t" id="accordion2" role="tablist" aria-multiselectable="true">

            <?php 
               $res=$con->data_dd("role_master");
               $i=1;
               while($row=mysqli_fetch_array($res))
               {                 
            ?>
            <div class="panel panel-default def-accordion">
              <div class="panel-heading" role="tab" id="headingOne">
                <a class="no-effect" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne">
                  <div class="accordion-shapes"><i class="fa fa-minus"></i></div>
                  <div class="title-text text-center"><strong><?php echo $row['r_name']; ?></strong></div>
                </a>
              </div>

              <div id="collapse-<?php echo $i; ?>" class="panel-collapse collapse" role"tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <ul class="list-unstyled">
                     <li>
                      <a href="#" class="vacancy">All Jobs <?php echo $row['r_name']; ?></a>
                    </li>
                    <?php 
                    $r_id=$row['r_id'];
                       $ress=$con->select_mul("subrole_master","r_id",$r_id);
                       while($rows=mysqli_fetch_array($ress))
                       {                 
                          $sub_r=$rows['subr_id'];
                          $count_sub_cmp="SELECT * FROM jobpost_master WHERE subr_id  = $sub_r";
                          $qry=mysqli_query($connection,$count_sub_cmp);
                          $count_cmp=mysqli_num_rows($qry);
                    ?>
                    <li>
                      <a href="vacancy_by_company.php?subr_id=<?php echo $rows['subr_id']; ?>" class="vacancy"><?php echo $rows['subr_name'];?> <?php echo "($count_cmp)" ?></a>
                    </li>
                  <?php } ?> 
                  </ul>
                </div>
              </div>
            </div><!--/.def-accordion-->
            <?php 
            if($i%5==0)
             {
              ?>
                </div><!--/.panel-group -->
        </div><!--/.col-md-4 -->
        <div class="col-md-4 col-sm-6 accordion-container">
          <!-- Accordion Panel Group -->
          <div class="panel-group sec-q-pad-t" id="accordion2" role="tablist" aria-multiselectable="true">
               <?php
               }
            $i++;
         
          } 
          if($i%5!==0)
          {
            echo "</div>";
            echo "</div>";
          }
        ?>
         </div><!--/.container -->
    </section><!--/.vacancy-by-special -->
    <!-- Vacancy by Specialization Ends -->

    <!-- Footer Starts -->
   <?php include_once 'footer.php';?>
    <!-- Footer Ends -->

    <!-- JavaScripts -->
    <script src="assets/javascripts/bootstrap.min.js"></script>
    <script src="assets/javascripts/wow.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>    
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

<!-- Mirrored from demo.suavedigital.com/jobstar/vacancy-by-special.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:28:19 GMT -->
</html>