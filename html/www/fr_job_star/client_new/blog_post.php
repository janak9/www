<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demo.suavedigital.com/jobstar/blog-post.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:29:10 GMT -->
<head>
    <?php include_once("add_once_head.php"); ?>
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
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index-2.html"></a>
          </div><!--/.navbar-header -->
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#home" data-toggle="dropdown" class="dropdown-toggle">Home <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="index-2.html">Home #1</a></li>
                  <li><a href="index-3.html">Home #2</a></li>
                  <li><a href="index-4.html">Home #3</a></li>
                  <li><a href="index-5.html">Home #4</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#add-a-job" data-toggle="dropdown" class="dropdown-toggle">Resumes <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="browse-resumes.html">Browse Resumes</a></li>
                  <li><a href="resume-details.html">Resume Details</a></li>
                  <li><a href="create-resume.html">Create Resume</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#jobs" data-toggle="dropdown" class="dropdown-toggle">Jobs <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="job-search-1.html">Job Search #1</a></li>
                  <li><a href="job-search-2.html">Job Search #2</a></li>
                  <li><a href="job-details.html">Job Details</a></li>
                  <li><a href="company-directory.html">Company By Directory</a></li>
                  <li><a href="vacancy-by-special.html">Vacancy By Specialization</a></li>
                  <li><a href="post-a-job.html">Post A Job</a></li>
                  <li><a href="job-alert-list.html">Job Alert</a></li>
                  <li><a href="my-bookmark.html">My Bookmark</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#blog" data-toggle="dropdown" class="dropdown-toggle">Blog <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="blog-list.html">Blog List</a></li>
                  <li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
                  <li><a href="blog-post.html">Blog Post</a></li>
                  <li><a href="blog-post-left-sidebar.html">Blog Post Left Sidebar</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#pages" data-toggle="dropdown" class="dropdown-toggle">Pages <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="contact-us.html">Contact</a></li>
                  <li><a href="pricing.html">Pricing</a></li>
                  <li><a href="faq.html">FAQ</a></li>
                  <li><a href="shop-grid.html">Store</a></li>
                  <li><a href="error-404.html">Error 404</a></li>
                </ul>
              </li>
              <li><a href="#" class="login-nav" data-toggle="modal" data-target="#LogIn">Sign in</a></li>
              <li><a href="#" class="register" data-toggle="modal" data-target="#Register">Register</a></li>
            </ul>
          </div><!--/ Collapse -->
        </div>
      </nav>
    </div>
    <!-- Navbar Ends -->

    <!-- Login Modal -->
    <div class="modal fade login" id="LogIn" role="dialog">
      <div class="modal-dialog login-dialog">
      
        
        <div class="login-content">
          <div class="login-header">
            <h3>Sign In</h3>
            <hr>
          </div>
          <div class="login-body">
            <p>Sign in using your account</p>
            <div class="account-login">
              <a href="#" class="def-btn google"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="def-btn facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="def-btn twitter"><i class="fa fa-twitter"></i></a>
            </div>
            <hr>
            <form action="#" class="form-horizontal">
              <input type="text" name="" class="login-form def-input" placeholder="Email">
              <input type="password" name="" class="login-form def-input" placeholder="Password">
              <div class="remember-me-forgot-pw">
                <div class="col-md-6 no-padding">
                  <input type="checkbox">
                  <label>Remember me</label>
                </div>
                <div class="col-md-6 no-padding text-right">
                  <a href="#">Forgot your password?</a>
                </div>
              </div>
              <a href="#">
                <div class="sign-in">Sign In</div>
              </a>
            </form>
            <div class="dont-have">Don't have an account yet? <a href="#" data-toggle="modal" data-target="#Register" data-dismiss="modal">Register now!</a></div>
          </div>
        </div><!--/.login-content-->
        
      </div>
    </div>
    <!-- Login Ends -->

    <!-- Register -->
    <div class="modal fade login" id="Register" role="dialog">
      <div class="modal-dialog login-dialog">
      
        
        <div class="login-content">
          <div class="login-header">
            <h3>Register</h3>
            <hr>
          </div>
          <div class="login-body">
            <p>Create your account</p>
            <form action="#" class="form-horizontal">
              <input type="text" name="" class="login-form def-input" placeholder="Email">
              <input type="password" name="" class="login-form def-input" placeholder="Password">
              <input type="password" name="" class="login-form def-input" placeholder="Re-type password">
              <input type="checkbox" name=""> I accepted the user agreement
              <a href="#"><div class="sign-in">Register</div></a>
              <div class="dont-have"><a href="#" data-toggle="modal" data-target="#LogIn" data-dismiss="modal">Already have an account</a></div>
            </form>
          </div>
        </div><!--/.login-content-->
        
      </div>
    </div>
    <!-- Register Ends -->

    <!-- Banner Grey Starts -->
    <section class="banner-grey">
      <div class="container sec-hq-pad-t sec-hq-pad-b animated wow fadeIn">
        <h2>Blog Post</h2>
      </div>
    </section>
    <!-- Banner Grey Ends -->

    <section class="blog-post sec-pad animated wow fadeIn" data-wow-delay="0.2s">
      <div class="container">
        
        <div class="blog-content-info">
          <div class="col-md-9 col-sm-9">

            <div class="blog-content">

              <div class="blog-info">
              <div class="col-md-2 col-sm-2">
                <div class="photo-wrap">
                  <div class="photo">
                    <img src="assets/images/individu-2.png" alt="">
                  </div>
                </div>
                <div class="written-by">
                  <p>Written by</p>
                  <p><strong>Robbie Brady</strong></p>
                </div>

                <div class="blog-tag">
                  <p><i class="fa fa-clock-o"></i> &nbsp; July 23, 2016</p>
                  <p><i class="fa fa-comment"></i> &nbsp; 6 Comments</p>
                </div>
                <div class="social-media-wrap">
                  <a href="#" class="social-media"><i class="fa fa-facebook"></i></a>
                  <a href="#" class="social-media"><i class="fa fa-instagram"></i></a>
                  <a href="#" class="social-media"><i class="fa fa-google-plus"></i></a>
                  <a href="#" class="social-media"><i class="fa fa-twitter"></i></a>
                </div>
              </div>
            </div><!--/.blog-info -->

              <div class="col-md-10 col-sm-10">

                <div class="image">
                  <img src="assets/images/blog1.jpg" alt="">
                </div>
                <div class="title-underlined">
                  <h3>Employment Summit: Guiding Syrian Refugees in finding Menaningful Employment</h3>
                </div>
                <div class="headlines">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </div>
                <p>Curabitur viverra vulputate tincidunt. Fusce ultricies dui pretium purus vestibulum suscipit. Proin ut turpis a mauris porttitor luctus eu quis velit. Nunc libero dolor, commodo sit amet nunc nec. Curabitur viverra vulputate tincidunt. Fusce ultricies dui pretium purus vestibulum suscipit.</p>
                <p>Curabitur viverra vulputate tincidunt. Fusce ultricies dui pretium purus vestibulum suscipit. Proin ut turpis a mauris porttitor luctus eu quis velit. Nunc libero dolor, commodo sit amet nunc nec. Curabitur viverra vulputate tincidunt. Fusce ultricies dui pretium purus vestibulum suscipit.</p>
                <div class="headlines">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </div>
                <p>Curabitur viverra vulputate tincidunt. Fusce ultricies dui pretium purus vestibulum suscipit. Proin ut turpis a mauris porttitor luctus eu quis velit. Nunc libero dolor, commodo sit amet nunc nec. Curabitur viverra vulputate tincidunt. Fusce ultricies dui pretium purus vestibulum suscipit.</p>
                <p>Curabitur viverra vulputate tincidunt. Fusce ultricies dui pretium purus vestibulum suscipit. Proin ut turpis a mauris porttitor luctus eu quis velit. Nunc libero dolor, commodo sit amet nunc nec. Curabitur viverra vulputate tincidunt. Fusce ultricies dui pretium purus vestibulum suscipit.</p>

                <div class="comments">
                  <div class="heading">
                    <h4>Comments (<span>6</span>)</h4>
                  </div>

                  <div class="comment-list col-md-12 no-padding">
                    <div class="col-md-2">
                      <div class="photo no-padding">
                        <img src="assets/images/individu-2.png" alt="">
                      </div>
                    </div>
                    <div class="col-md-10">
                      <div class="content">
                        <div class="date"><p>March 26, 2016</p></div>
                        <div class="name"><p><strong>Robbie Brady</strong></p></div>
                        <p>Curabitur viverra vulputate tincidunt. Fusce ultricies dui pretium purus vestibulum suscipit. Proin ut turpis a mauris porttitor luctus eu quis velit.</p>
                        <a href="#">Reply</a>
                      </div>

                      <div class="col-md-2">
                        <div class="photo-reply no-padding">
                          <img src="assets/images/individu-1.png" alt="">
                        </div>
                      </div>
                      <div class="col-md-10">
                        <div class="content">
                          <div class="date"><p>March 26, 2016</p></div>
                          <div class="name"><p><strong>Joe Allen</strong></p></div>
                          <p>Curabitur viverra vulputate tincidunt. Fusce ultricies dui pretium purus vestibulum suscipit. Proin ut turpis a mauris porttitor luctus eu quis velit.</p>
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="photo-reply no-padding">
                          <img src="assets/images/individu-2.png" alt="">
                        </div>
                      </div>
                      <div class="col-md-10">
                        <div class="content">
                          <div class="date"><p>March 26, 2016</p></div>
                          <div class="name"><p><strong>Robbie Brady</strong></p></div>
                          <p>Curabitur viverra vulputate tincidunt. Fusce ultricies dui pretium purus vestibulum suscipit. Proin ut turpis a mauris porttitor luctus eu quis velit.</p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="comment-list col-md-12 no-padding">
                    <div class="col-md-2">
                      <div class="photo no-padding">
                        <img src="assets/images/individu-3.png" alt="">
                      </div>
                    </div>
                    <div class="col-md-10">
                      <div class="content">
                        <div class="date"><p>March 26, 2016</p></div>
                        <div class="name"><p><strong>Neil Taylor</strong></p></div>
                        <p>Curabitur viverra vulputate tincidunt. Fusce ultricies dui pretium purus vestibulum suscipit. Proin ut turpis a mauris porttitor luctus eu quis velit.</p>
                        <a href="#">Reply</a>
                      </div>

                      <div class="col-md-2">
                        <div class="photo-reply no-padding">
                          <img src="assets/images/individu-1.png" alt="">
                        </div>
                      </div>
                      <div class="col-md-10">
                        <div class="content">
                          <div class="date"><p>March 26, 2016</p></div>
                          <div class="name"><p><strong>Joe Allen</strong></p></div>
                          <p>Curabitur viverra vulputate tincidunt. Fusce ultricies dui pretium purus vestibulum suscipit. Proin ut turpis a mauris porttitor luctus eu quis velit.</p>
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="photo-reply no-padding">
                          <img src="assets/images/individu-4.png" alt="">
                        </div>
                      </div>
                      <div class="col-md-10">
                        <div class="content">
                          <div class="date"><p>March 26, 2016</p></div>
                          <div class="name"><p><strong>Craig Dawson</strong></p></div>
                          <p>Curabitur viverra vulputate tincidunt. Fusce ultricies dui pretium purus vestibulum suscipit. Proin ut turpis a mauris porttitor luctus eu quis velit.</p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="add-comment col-md-12">

                    <div class="mar-b-20">
                      <h4>Leave a Comment</h4>
                      
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <input type="text" class="def-input" placeholder="Name *">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <input type="text" class="def-input" placeholder="E-mail *">
                      </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                        <textarea name="" id="" class="def-input" placeholder="Comment *"></textarea>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <a href="#" class="def-btn btn-bg-yellow">Post Comment</a>
                    </div>

                  </div>
                </div><!--/.comments -->

              </div>
            </div><!--/.blog-content -->
          </div><!--/.blog-content-info -->

          <div class="blog-sidebar">
          <div class="col-md-3 col-sm-3">

            <div class="search-form">
              <input type="text" class="def-input" placeholder="Keyword">
              <a href="#">
                <span class="fa fa-search"></span>
              </a>
            </div>

            <div class="sec-hq-pad-t">
              <h3>Recent Post</h3>
            </div>

            <div class="sidebar-list mar-t-10 sec-h-pad-b right">
              <ul>
                <li>
                  <a href="#">
                    <span class="title-blog">
                      Employment Summit: Guiding Syrian Refugees in finding Menaningful Employment
                    </span>
                    <span class="date"><i class="fa fa-clock-o"></i> &nbsp; March 16, 2016</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="title-blog">
                      Nunc libero dolor, commodo sit amet nunc nec
                    </span>
                    <span class="date"><i class="fa fa-clock-o"></i> &nbsp; March 16, 2016</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="title-blog">
                      Nunc libero dolor, commodo sit amet nunc nec
                    </span>
                    <span class="date"><i class="fa fa-clock-o"></i> &nbsp; March 16, 2016</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="title-blog">
                      Nunc libero dolor, commodo sit amet nunc nec
                    </span>
                    <span class="date"><i class="fa fa-clock-o"></i> &nbsp; March 16, 2016</span>
                  </a>
                </li>
              </ul>
            </div>

            <h3>Archive</h3>

            <div class="sidebar-list mar-t-10 sec-h-pad-b right">
              <ul>
                <li>
                  <a href="#"><span class="title">January 2016</span></a>
                </li>
                <li>
                  <a href="#"><span class="title">February 2016</span></a>
                </li>
                <li>
                  <a href="#"><span class="title">March 2016</span></a>
                </li>
                <li>
                  <a href="#"><span class="title">April 2016</span></a>
                </li>
                <li>
                  <a href="#"><span class="title">May 2016</span></a>
                </li>
                <li>
                  <a href="#"><span class="title">June 2016</span></a>
                </li>
                <li>
                  <a href="#"><span class="title">July 2016</span></a>
                </li>
                <li>
                  <a href="#"><span class="title">August 2016</span></a>
                </li>
                <li>
                  <a href="#"><span class="title">September 2016</span></a>
                </li>
                <li>
                  <a href="#"><span class="title">October 2016</span></a>
                </li>
                <li>
                  <a href="#"><span class="title">November 2016</span></a>
                </li>
                <li>
                  <a href="#"><span class="title">December 2016</span></a>
                </li>
              </ul>
            </div>

            <h3>Categories</h3>

            <div class="sidebar-list mar-t-10 sec-h-pad-b right">
              <ul>
                <li>
                  <a href="#"><span class="title">Development</span></a>
                </li>
                <li>
                  <a href="#"><span class="title">News</span></a>
                </li>
                <li>
                  <a href="#"><span class="title">Skill</span></a>
                </li>
                <li>
                  <a href="#"><span class="title">Productivity</span></a>
                </li>
                <li>
                  <a href="#"><span class="title">Career Advice</span></a>
                </li>
                <li>
                  <a href="#"><span class="title">Uncategorized</span></a>
                </li>
              </ul>
            </div>

          </div>
        </div><!--/.blog-sidebar -->

        </div>

      </div>
    </section>

    <!-- Footer Starts -->
   <?php include_once 'footer.php'; ?>
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

<!-- Mirrored from demo.suavedigital.com/jobstar/blog-post.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:29:10 GMT -->
</html>