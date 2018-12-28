
<script type="text/javascript">
  function checks()
  {
    pass1=document.getElementById("ps").value;
    pass2=document.getElementById("ps2").value;
    psw=document.getElementById("psw").value;
    psw1=document.getElementById("psw1").value;
    if(pass1!=pass2)
    {
      alert("password does not metch");
    }
    if(psw!=psw1)
    {
      alert("password does not metch");
    }
  }
</script>
<?php
ob_start();
include("connection.php");
$con = new JobClass;
$con2 = mysqli_connect("localhost","root","","job180") or die(mysql_error());
?>
<?php
if(isset($_POST['btnsubmit']))
{
  $erpwd="";
  $rand=$con->randString(11);
  $f_name=$_POST["f_name"];
  $l_name=$_POST["l_name"];
  $u=$_POST["email"];
  // if($_POST["password"]==$_POST["re_upwd"])
  // {
  // $p=$_POST["password"];
  $p = rand(100000,999999);
  $to=$u;
  $subject="Password";
  $msg = "Your Password Is $p";
  $headers="From: vaghelajanak97145@gmail.com";
  if(mail($to,$subject,$msg,$headers)){
    $qry="insert into candidate_master (serial_key,f_name,l_name,email_id,password) values('$rand','$f_name','$l_name','$u','$p')";
    mysqli_query($con2,$qry);
    echo "<script>alert('Password is Send to your Email Check Your Mail.');</script>";
  }else{
    echo "<script>alert('Mail Not Send.Somthing Is Wrong.May be Your connection is slow.');</script>";
  }
//}
}
?>
<?php
if(isset($_POST["shinein"]))
{
  $e=$_POST["email"];
  $p=$_POST["pwd"];
  $qry="select * from candidate_master where email_id='".$e."' and password='".$p."'";
  $result = mysqli_query($con2,$qry) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows == 1)
   {
    $r=mysqli_fetch_array($result);
    $_SESSION['key']=$r['serial_key'];
    header("location:index.php");
    // $_SESSION['password']=$row['2'];
    // header("location:dashboard.php");
  }
  else
  {
    echo"<script>alert('email id and password are not metch');</script>";
  }
}
?>
<?php
if(isset($_POST['C_submit']))
{
  $ercpwd="";
  $rand=$con->randString(11);
  $cmp_name=$_POST["cmp_name"];
  $u=$_POST["c_email"];
  // $p=$_POST["c_pwd"];
  //$res=$con->select_mul("company_master","email_id",$u);
  //$cmp_cou=mysqli_num_rows($res);
  $query="select * from company_master where email_id='".$u."'";
  $res=mysqli_query($con2,$query);
  $count=mysqli_num_rows($res);
  if($count==1)
  {
      echo"<script>alert('you are already register');</script>";
  }
   else
  {
     // if($_POST["c_pwd"]==$_POST["c_rpwd"])
     //  {
    $p = rand(100000,999999);
    $to=$u;
    $subject="Password";
    $msg = "Your Password Is $p";
    $headers="From: vaghelajanak97145@gmail.com";
    if(mail($to,$subject,$msg,$headers)){
      $qry="insert into company_master (serial_key,cmp_name,email_id,password) values('$rand','$cmp_name','$u','$p')";
      mysqli_query($con2,$qry);
      echo "<script>alert('Password is Send to your Email Check Your Mail.');</script>";
    }else{
      echo "<script>alert('Mail Not Send Somthing Is Wrong.May be Your connection is slow.');</script>";
    }
      //}
  }
}

?>
<?php
if(isset($_POST["sign_in"]))
{
$e=$_POST["c_email"];
$p=$_POST["c_pwd"];
$qry="select * from company_master where email_id='".$e."' and password='".$p."'";
$result = mysqli_query($con2,$qry) or die(mysql_error());
$rows = mysqli_num_rows($result);
//echo $rows;
if($rows == 1)
{
$r=mysqli_fetch_array($result);
echo $_SESSION['c_key']=$r['serial_key'];
header("location:profile.php");
}
}
?>
<?php
//$cnd_sql="select * from candidate_master where f_name=$f_name and l_name=$lname and email=$e and password=$p";
?>
<div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="index.php"></a>
  </div><!--/.navbar-header -->
  <div class="collapse navbar-collapse" id="navbar">
    <ul class="nav navbar-nav navbar-right">
      <li>
        <a href="index.php"> Home</a>
      </li>
      <li class="dropdown">
        <a href="#jobs" data-toggle="dropdown" class="dropdown-toggle">Search Jobs <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <!-- <li><a href="job_search1.php">Job Search #1</a></li> -->
          <li><a href="job_search2.php">Job Search </a></li>
          <li><a href="company_directory.php">Company By Directory</a></li>
          <li><a href="vacancy_by_special.php">Vacancy By Specialization</a></li>
          <!-- <li><a href="job_details.php">Job Details</a></li>
          <li><a href="post_a_job.php">Post A Job</a></li>
          <li><a href="job_alert_list.php">Job Alert</a></li>
          <li><a href="my_bookmark.html">My Bookmark</a></li> -->
        </ul>
      </li>
      
      <!-- <li class="dropdown">
        <a href="#pages" data-toggle="dropdown" class="dropdown-toggle">Pages <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="contact.php">Contact</a></li>
          <li><a href="faq.php">FAQ</a></li>
          <li><a href="shop-grid.html">Store</a></li>
          <li><a href="error-404.html">Error 404</a></li>
        </ul>
      </li> -->
      <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-user"></i>  Company <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#" class="login-nav" data-toggle="modal" data-target="#CLogIn">Company Login</a></li>
          <li><a href="#" class="register" data-toggle="modal" data-target="#CRegister">Company Register</a></li>
        </ul>
      </li>
      <?php
      if(!isset($_SESSION['c_key']))
      {
      ?>
      <li><a href="#" class="login-nav" data-toggle="modal" data-target="#LogIn">Sign in</a></li>
      <li><a href="#" class="register" data-toggle="modal" data-target="#Register">Register</a></li>
      <?php
      }
      elseif (!isset($_SESSION['key']))
      {
      ?>
      <li><a href="#" class="login-nav" data-toggle="modal" data-target="#LogIn">Sign in</a></li>
      <li><a href="#" class="register" data-toggle="modal" data-target="#Register">Register</a></li>
      <?php
      }
      else
      {
      ?>
      <li><a href="logout.php" class="register">Logout</a></li>
      <?php } ?>
    </ul>
    </div><!--/ Collapse -->
  </div>
</nav>
</div>
<!--candidate Login & Register -->
<div class="modal fade login" id="LogIn" role="dialog">
<div class="modal-dialog login-dialog">
  <div class="login-content">
    <div class="login-header">
      <h3>Sign In</h3>
      <hr>
    </div>
    <div class="login-body">
      <hr>
      <form action="" method="post" class="form-horizontal">
        <input type="text" name="email" class="login-form def-input" placeholder="Email">
        <input type="password" name="pwd" class="login-form def-input" placeholder="Password">
        <div class="remember-me-forgot-pw">
          <div class="col-md-6 no-padding">
            <input type="checkbox">
            <label>Remember me</label>
          </div>
          <div class="col-md-6 no-padding text-right">
            <a href="#">Forgot your password?</a>
          </div>
        </div>
        <div class="sign-in">
          <input type="submit" name="shinein" style="width: auto; border: none; background: #fcc512">
        </div>
      </form>
      <div class="dont-have">Don't have an account yet? <a href="#" data-toggle="modal" data-target="#Register" data-dismiss="modal">Register now!</a></div>
    </div>
    </div><!--/.login-content-->
  </div>
  
</div>
<div class="modal fade login" id="Register" role="dialog">
  <div class="modal-dialog login-dialog">
    
    
    <div class="login-content">
      <div class="login-header">
        <h3>Register</h3>
        <hr>
      </div>
      <div class="login-body">
        <p>Create your account</p>
        <form action="" class="form-horizontal" method="post">
          <input type="text" name="f_name" class="login-form def-input" placeholder="First Name">
          <input type="text" name="l_name" class="login-form def-input" placeholder="Last Name">
          <input type="text" name="email" class="login-form def-input" placeholder="Email">
       <!--    <input type="password" name="password" class="login-form def-input" placeholder="Password" id="psw">
          <input type="password" name="re_upwd" class="login-form def-input" placeholder="Re-type password" id="psw1" onblur="checks()"> -->
         
          <!-- <input type="checkbox" name="check"> I accepted the user agreement -->
          <div class="sign-in">
            <input type="submit" name="btnsubmit" style="width: auto; border: none; background: #fcc512">
          </div>
          <div class="dont-have"><a href="#" data-toggle="modal" data-target="#LogIn" data-dismiss="modal">Already have an account</a></div>
        </form>
        
      </div>
      </div><!--/.login-content-->
      
    </div>
  </div>
  <!-- Company Login & Register -->
  <div class="modal fade login" id="CLogIn" role="dialog">
    <div class="modal-dialog login-dialog">
      <div class="login-content">
        <div class="login-header">
          <h3>Sign In</h3>
          <hr>
        </div>
        <div class="login-body">
          <hr>
          <form action="" method="post" class="form-horizontal">
            <input type="text" name="c_email" class="login-form def-input" placeholder="Email" required="required">
            <input type="password" name="c_pwd" class="login-form def-input" placeholder="Password" required="required">
            <div class="remember-me-forgot-pw">
              <div class="col-md-6 no-padding">
                <input type="checkbox">
                <label>Remember me</label>
              </div>
              <div class="col-md-6 no-padding text-right">
                <a href="#">Forgot your password?</a>
              </div>
            </div>
            <div class="sign-in">
              <input type="submit" name="sign_in" style="width: auto; border: none; background: #fcc512">
            </div>
          </form>
          <div class="dont-have">Don't have an account yet? <a href="#" data-toggle="modal" data-target="#Register" data-dismiss="modal">Register now!</a>
        </div>
      </div>
      </div><!--/.login-content-->
    </div>
  </div>
  <div class="modal fade login" id="CRegister" role="dialog">
    <div class="modal-dialog login-dialog">
      <div class="login-content">
        <div class="login-header">
          <h3>Register</h3>
          <hr>
        </div>
        <div class="login-body">
          <p>Create your account</p>
          <form action="" class="form-horizontal" method="post">
            <input type="text" name="cmp_name" class="login-form def-input" placeholder="Company Name">
            <input type="text" name="c_email" class="login-form def-input" placeholder="Email">
           <!--  <input type="password" name="c_pwd" class="login-form def-input" placeholder="Password" id="ps">
            <input type="password" name="c_rpwd" class="login-form def-input" placeholder="Re-type password" id="ps2" onblur="checks()"> -->
           
            <!-- <input type="checkbox" name="check"> I accepted the user agreement -->
            <div class="sign-in">
              <input type="submit" name="C_submit" style="border: none; background: #fcc512" value="Submit">
            </div>
            <div class="dont-have"><a href="#" data-toggle="modal" data-target="#LogIn" data-dismiss="modal">Already have an account</a></div>
          </form>
          
          
        </div>
        </div><!--/.login-content-->
        
      </div>
    </div>