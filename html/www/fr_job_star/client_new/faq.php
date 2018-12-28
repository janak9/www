<?php
    if (session_status() == PHP_SESSION_NONE) 
    {
        session_start(); 
    }
if(!isset($_SESSION["c_key"]))
  {
    header("location:index.php");
  }
    ?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demo.suavedigital.com/jobstar/faq.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:29:10 GMT -->
<head>
   <?php include_once("add_once_head.php"); ?>
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
         <?php include('company_menu.php');?>
    
    <!-- Banner Grey Starts -->
    <section class="banner-grey">
      <div class="container sec-hq-pad-t sec-hq-pad-b animated wow fadeIn">
        <h2>Frequently Asked Question (FAQ)</h2>
      </div>
    </section>
    <!-- Banner Grey Ends -->

    <!-- FAQ Starts -->
    <section class="faq animated wow fadeIn" data-wow-delay="0.2s">

      <div class="container sec-hq-pad-t sec-hq-pad-b">
        <div class="col-md-6 col-sm-6">
          <div class="title-underlined">
            <h3>Frequently Asked Question</h3>
          </div>

          <!-- Accordion Panel Group -->
          <div class="panel-group sec-q-pad-t" id="accordion2" role="tablist" aria-multiselectable="true">

            <div class="panel panel-default def-accordion wow animated fadeIn">
              <div class="panel-heading" role="tab" id="headingOne">
                <a class="no-effect" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-faq-1" aria-expanded="true" aria-controls="collapseOne">
                  <div class="accordion-shapes"><i class="fa fa-minus"></i></div>
                  <div class="title-text">Collapsible Group #1</div>
                </a>
              </div>
              <div id="collapse-faq-1" class="panel-collapse collapse in" role"tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <ul class="list-unstyled">
                    <li>
                      <a href="#" class="list">Class aptent taciti sociosqu ad litora torquent per</a>
                    </li>
                    <li>
                      <a href="#" class="list">Class aptent taciti sociosqu ad litora torquent per</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div><!--/.def-accordion-->

            <div class="panel panel-default def-accordion wow animated fadeIn">
              <div class="panel-heading" role="tab" id="headingOne">
                <a class="no-effect" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-faq-2" aria-expanded="true" aria-controls="collapseOne">
                  <div class="accordion-shapes"><i class="fa fa-plus"></i></div>
                  <div class="title-text">Collapsible Group #1</div>
                </a>
              </div>
              <div id="collapse-faq-2" class="panel-collapse collapse" role"tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <ul class="list-unstyled">
                    <li>
                      <a href="#" class="list">Class aptent taciti sociosqu ad litora torquent per</a>
                    </li>
                    <li>
                      <a href="#" class="list">Class aptent taciti sociosqu ad litora torquent per</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div><!--/.def-accordion-->

            <div class="panel panel-default def-accordion wow animated fadeIn">
              <div class="panel-heading" role="tab" id="headingOne">
                <a class="no-effect" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-faq-3" aria-expanded="true" aria-controls="collapseOne">
                  <div class="accordion-shapes"><i class="fa fa-plus"></i></div>
                  <div class="title-text">Collapsible Group #1</div>
                </a>
              </div>
              <div id="collapse-faq-3" class="panel-collapse collapse" role"tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <ul class="list-unstyled">
                    <li>
                      <a href="#" class="list">Class aptent taciti sociosqu ad litora torquent per</a>
                    </li>
                    <li>
                      <a href="#" class="list">Class aptent taciti sociosqu ad litora torquent per</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div><!--/.def-accordion-->

          </div><!--/.panel-group -->
        </div>

        <div class="col-md-6 col-sm-6">
          <div class="title-underlined mar-b-20">
            <h3>Answer of The Faq</h3>
          </div>

          <div class="text-content">
            
            <div class="answered-question">
              <div class="heading mar-b-10">
                <p>Class Aptent Taciti Sociosqu</p>
              </div>
              <div class="content mar-b-20">
                <p>Curabitur ipsum justo, mattis eu odio sed, porta sodales urna. Nunc lobortis, massa eu volutpat commodo, ipsum nibh condimentum libero, id dictum ex neque sit amet neque. Sed sodales tempus lectus, efficitur luctus sem elementum ut..</p>
              </div>
              <a href="#" class="def-btn btn-bg-yellow mar-b-20">View Details</a>
            </div><!--/.answered-question -->

            <div class="anwered-question">
              <div class="heading mar-b-10">
                <p>Class Aptent Taciti Sociosqu</p>
              </div>
              <div class="content mar-b-20">
                <p>Curabitur ipsum justo, mattis eu odio sed, porta sodales urna. Nunc lobortis, massa eu volutpat commodo, ipsum nibh condimentum libero, id dictum ex neque sit amet neque. Sed sodales tempus lectus, efficitur luctus sem elementum ut.</p>
              </div>
              <a href="#" class="def-btn btn-bg-yellow">View Details</a>
            </div><!--/.answered-question -->

          </div>

        </div>

      </div><!--/.container -->
    </section><!--/.faq -->
    <!-- FAQ Ends -->

    <!-- Got a Question Starts -->
    <section class="got-a-question" style="background:url(assets/images/got-a-question.jpg) center; background-size: cover; background-attachment: fixed;">
      <div class="overlay"></div>
          
      <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 content-wrap valign-wrap">
        <div class="content valign-middle text-center animated wow fadeInUp">
          <h1>Got A Question?</h1>
          <div class="sec-q-pad-b"></div>
          <div class="text">
            <p>We're here to help! You've already checked FAQ. If you got any further question, send us an e-mail or call us at +(1) 123 456 789</p>
          </div>
          <div class="sec-q-pad-b"></div>
          <a href="contact-us.html" class="def-btn btn-bg-yellow">Send us e-mail</a>
        </div>
      </div>
    </section><!--/.got-a-question -->

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

<!-- Mirrored from demo.suavedigital.com/jobstar/faq.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:29:10 GMT -->
</html>