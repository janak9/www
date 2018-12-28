<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

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
      <div class="container sec-hq-pad-t sec-hq-pad-b animated wow fadeIn">
        <h2>Company Directory</h2>
      </div>
    </section>
    <!-- Banner Grey Ends -->

    <!-- Company Directory -->
    <section class="company-directory animated wow fadeIn" data-wow-delay="0.2s">

      <div class="container">

        <div class="col-md-12 col-sm-12">
          <div class="text-content col-md-8 col-md-offset-2 no-padding">
            <div class="text-center sec-hq-pad-t sec-hq-pad-b">
              <h3>Find company you want to work for!</h3>
              <div class="sec-q-pad-t"></div>
              <p>Curabitur viverra vulputate tincidunt. Fusce ultricies dui pretium purus vestibulum suscipit. Proin ut turpis a mauris porttitor luctus eu quis velit. Nunc libero dolor, commodo sit amet nunc nec.</p>
            </div>
          </div><!--/.text-content -->
        </div>

        <div class="col-md-12 col-sm-12 sec-hq-pad-b">

          <!-- Accordion Group -->
          <div class="panel-group sec-q-pad-t" id="accordion1" role="tablist" aria-multiselectable="true">

            <div class="col-md-6 col-sm-6 accordion-container">  
              <?php $con = mysqli_connect("localhost","root","","job180") or die(mysql_error()); ?>

              <?php 
                for($i=65;$i<=77;$i++){
                  $ch=chr($i);
              ?>

              <div class="panel panel-default def-accordion">
                <div class="panel-heading" role="tab" id="headingOne">
                  <a class="no-effect" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $ch; ?>" aria-expanded="true" aria-controls="collapseOne">
                    <div class="accordion-shape text-center valign-middle"><h4><?php echo $ch; ?></h4></div>
                    <div class="title-text">Companies Starting with "<?php echo $ch; ?>"</div>
                  </a>
                </div>
                <div id="collapse-<?php echo $ch; ?>" class="panel-collapse collapse <?php if($i==65){echo 'in';}?>" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <ul class="list-unstyled">
                    <?php 
                      $sql="select * from company_master where cmp_name like '$ch%' order by cmp_name";
                      $result_select=mysqli_query($con,$sql);
                      while($row=mysqli_fetch_assoc($result_select))
                      {
                    ?>
                      <li>
                        <a href="company_detail.php?cmp_id=<?php echo $row['cmp_id']; ?>" class="list"><?php echo $row['cmp_name']; ?></a>
                      </li>
                      <?php }?>
                     <!-- 
                      <li class="text-right">
                        <a href="#" class="load-more">Load More &nbsp; <i class="fa fa-chevron-right"></i></a>
                      </li> -->
                    </ul>
                  </div>
                </div>
              </div><!--/.def-accordion-->
              <?php }?>
            </div><!--/.col-md-6 -->
          
            <div class="col-md-6 col-sm-6 accordion-container">  
              <?php 
                for($i=78;$i<=90;$i++){
                  $ch=chr($i);
              ?>
              <div class="panel panel-default def-accordion">
                <div class="panel-heading" role="tab" id="headingOne">
                  <a class="no-effect" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $ch; ?>" aria-expanded="true" aria-controls="collapseOne">
                    <div class="accordion-shape text-center valign-middle"><h4><?php echo $ch; ?></h4></div>
                    <div class="title-text">Companies Starting with "<?php echo $ch; ?>"</div>
                  </a>
                </div>
                <div id="collapse-<?php echo $ch; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <ul class="list-unstyled">
                      <?php
                     $sql="select * from company_master where cmp_name like '$ch%' order by cmp_name";
                      $result_select=mysqli_query($con,$sql);
                      while($row=mysqli_fetch_assoc($result_select))
                      {
                    ?>
                      <li>
                        <a href="company_detail.php?cmp_id=<?php echo $row['cmp_id']; ?>" class="list"><?php echo $row['cmp_name']; ?></a>
                      </li>
                      <?php }?>
                     <!-- 
                      <li class="text-right">
                        <a href="#" class="load-more">Load More &nbsp; <i class="fa fa-chevron-right"></i></a>
                      </li> -->
                    </ul>
                  </div>
                </div>
              </div><!--/.def-accordion-->
              <?php }?>
              
            </div><!--/.col-md-6 -->

          </div><!--/.panel-group -->

        </div><!--/.col-md-12 -->
      </div><!--/.container -->
    </section><!--/.company-directory -->
    <!-- Company Directory -->

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

<!-- Mirrored from demo.suavedigital.com/jobstar/company-directory.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:28:19 GMT -->
</html>