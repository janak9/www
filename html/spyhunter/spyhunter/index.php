<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$sendMessage = false;
$errMsg = false;

if(isset($_POST['submit']) && !empty($_POST['submit'])){

  if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
      
      //your site secret key
      $secret = '6Lc5m2kUAAAAAI86sUVljdGE5l3RFIvW6ReyaRNE';
      //get verify response data
      $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
      $responseData = json_decode($verifyResponse);

      if($responseData->success){
     
        
        $mail = new PHPMailer;
        
        $mail = new PHPMailer;
        
        $mail->isSMTP();
        
        $mail->SMTPDebug = 0;
        
        $mail->Host = 'sg3plcpnl0136.prod.sin3.secureserver.net';
         
        
        $mail->Port = 465;
        
        $mail->SMTPSecure = 'ssl';
        
        $mail->SMTPAuth = true;
        
        $mail->Username = "help@spyhunter272.in";
        
        $mail->Password = "JX2I%+p5*&]6";
        
        $mail->setFrom('help@spyhunter272.in', 'Customer Help Need');
        
        $mail->addAddress('vaghelajanak97@gmail.com', $_POST['Name']);
        
        $mail->Subject = 'Help Customer Desk';
        
        $body = 'Email is '.$_POST['Email'].' Message is '.$_POST['Message']. 'Subject is '.$_POST['Subject'].' Name is '.$_POST['Name'];
        
        $mail->msgHTML($body);
        
        if ($mail->send()) {
            
          $sendMessage='Email hase been send We contect you sorty.';
        
        } else {
          $errMsg = 'problems with email send. please inform our admin.';  
        }  
      }else{
          $errMsg = 'Robot verification failed, please try again.';
      }
  }else{
      $errMsg = 'Please click on the reCAPTCHA box.';
  } 
}
?>


<!DOCTYPE html>
<html>
<title>SpYhunter272 It Solutions</title>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="./assets/favicon.png">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/index.css">

  <script src='https://www.google.com/recaptcha/api.js'></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124536361-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-124536361-1');
  </script>
</head>

<body>

  <!-- Navbar (sit on top) -->
  <div class="w3-top">
    <div class="w3-bar w3-white w3-card nav-bar-theme" id="myNavbar">
      <a class="w3-bar-item w3-button brand-name logo">SpYHunter272 It Solutions</a>
      <!-- Right-sided navbar links -->
      <div class="w3-right  w3-hide-small">
        <a href="#about" class="w3-bar-item w3-button">
          <i class="fa fa-group"></i> ABOUT</a>

        <a href="#pricing" class="w3-bar-item w3-button">
          <i class="fa fa-desktop"></i> SOFTWARE</a>
        <a href="#contact" class="w3-bar-item w3-button">
          <i class="fa fa-envelope"></i> CONTACT</a>
        <a href="https://www.facebook.com/spyhunter272" class="w3-bar-item w3-button">
        <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>

          </a>
        </div>


      <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
  </div>

  <!-- Sidebar on small screens when clicking the menu icon -->
  <nav class="w3-sidebar w3-center w3-bar-block nav-bar-theme w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none"
    id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
    <!-- <a href="#team" onclick="w3_close()" class="w3-bar-item w3-button">TEAM</a> -->
    <!-- <a href="#work" onclick="w3_close()" class="w3-bar-item w3-button">WORK</a> -->
    <a href="#pricing" onclick="w3_close()" class="w3-bar-item w3-button">SOFTWARE</a>
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
    <a href="https://www.facebook.com/spyhunter272" class="w3-bar-item w3-button">
      <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
    </a>
  </nav>

  <!-- About Section -->
  <div class="w3-container  w3-center" style="padding:128px 0px 16px 16px" id="about">
    <img src="./assets/spyhunterLogo.png" class="w3-image w3-hover-opacity" style="max-width: 290px;" alt="SpyHunter IT Solutions">
    <p class="w3-center w3-large">Make Your Bussiness Faster Join Our Company.</p>
    <div class="w3-row-padding w3-center" style="margin-top:64px;padding-bottom:50px">
      <div class="w3-quarter">
        <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
        <p class="w3-large">
          <strong>Desktop App</strong>
        </p>
      </div>
      <div class="w3-quarter">
        <i class="fa fa-mobile w3-margin-bottom w3-jumbo"></i>
        <p class="w3-large">
          <strong>Mobile App</strong>
        </p>
      </div>
      <div class="w3-quarter">
        <i class="fa fa-sitemap w3-margin-bottom w3-jumbo"></i>
        <p class="w3-large">
          <strong>Web App</strong>
        </p>
      </div>
      <div class="w3-quarter">
        <i class="fa fa-handshake-o w3-margin-bottom w3-jumbo"></i>
        <p class="w3-large">
          <strong>Support / Help</strong>
        </p>
      </div>
    </div>
  </div>

  
  <!-- software Section -->
  <div class="w3-container w3-center w3-dark-grey" style="padding:128px 16px" id="pricing">
    <h3>
      <strong> SOFTWARE </strong>
    </h3>
    <p class="w3-large">If You Want To Customize Our Software Please Contact Our Group.</p>
    <div class="w3-row-padding" >
      <div class="w3-third w3-section">
        <ul class="w3-ul w3-white w3-hover-shadow">
          <li class="w3-green w3-xlarge w3-padding-32">Cash Memo</li>
          <li class="w3-light-grey w3-padding-24">
            <button class="w3-button w3-black w3-padding-large" disabled>Comming soon...</button>
          </li>
        </ul>
      </div>
      <div class="w3-third">
        <ul class="w3-ul w3-white w3-hover-shadow">
          <li class="w3-blue-grey w3-xlarge w3-padding-48">
            <strong>Store Manager</strong>
          </li>
          <li class="w3-padding-16">
            Manage Customer</li>
          <li class="w3-padding-16">
            Manage Products</li>
          <li class="w3-padding-16">
            Income / Expense (Chart)</li>
          <li class="w3-padding-16">
            Make Invoice /Bill </li>

          <li class="w3-light-grey w3-padding-24">
            <a href="./StoreManager/" class="w3-button w3-blue-grey w3-padding-large">Download & Info</a>
          </li>
        </ul>
      </div>
      <div class="w3-third w3-section">
        <ul class="w3-ul w3-white w3-hover-shadow">
          <li class="w3-teal w3-xlarge w3-padding-32">Store Manager Mobile Apps</li>
          <li class="w3-light-grey w3-padding-24">
            <button class="w3-button w3-black w3-padding-large" disabled>Comming soon...</button>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="w3-row w3-center theme-dark">
    <div class="w3-col m3 l3">
      <div class="card w3-margin">
        <img src="./assets/1.jpg" alt="John" style="width:100%">
        <h1>John Doe</h1>
        <p class="title">CEO & Founder, Example</p>
        <p>Harvard University</p>
        <a href="#"><i class="fa fa-dribbble w3-hover-text-blue"></i></a> 
        <a href="#"><i class="fa fa-twitter w3-hover-text-blue"></i></a> 
        <a href="#"><i class="fa fa-linkedin w3-hover-text-blue"></i></a> 
        <a href="#"><i class="fa fa-facebook w3-hover-text-blue"></i></a> 
        <p><button class="w3-btn w3-light-gray w3-hover-blue-gray">Contact</button></p>
      </div>
    </div>

    <div class="w3-col m3 l3">
      <div class="card w3-margin">
        <img src="./assets/1.jpg" alt="John" style="width:100%">
        <h1>John Doe</h1>
        <p class="title">CEO & Founder, Example</p>
        <p>Harvard University</p>
        <a href="#"><i class="fa fa-dribbble w3-hover-text-blue"></i></a> 
        <a href="#"><i class="fa fa-twitter w3-hover-text-blue"></i></a> 
        <a href="#"><i class="fa fa-linkedin w3-hover-text-blue"></i></a> 
        <a href="#"><i class="fa fa-facebook w3-hover-text-blue"></i></a> 
        <p><button class="w3-btn w3-light-gray w3-hover-blue-gray">Contact</button></p>
      </div>
    </div>

    <div class="w3-col m3 l3">
      <div class="card w3-margin">
        <img src="./assets/1.jpg" alt="John" style="width:100%">
        <h1>John Doe</h1>
        <p class="title">CEO & Founder, Example</p>
        <p>Harvard University</p>
        <a href="#"><i class="fa fa-dribbble w3-hover-text-blue"></i></a> 
        <a href="#"><i class="fa fa-twitter w3-hover-text-blue"></i></a> 
        <a href="#"><i class="fa fa-linkedin w3-hover-text-blue"></i></a> 
        <a href="#"><i class="fa fa-facebook w3-hover-text-blue"></i></a> 
        <p><button class="w3-btn w3-light-gray w3-hover-blue-gray">Contact</button></p>
      </div>
    </div>

    <div class="w3-col m3 l3">
      <div class="card w3-margin">
        <img src="./assets/1.jpg" alt="John" style="width:100%">
        <h1>John Doe</h1>
        <p class="title">CEO & Founder, Example</p>
        <p>Harvard University</p>
        <a href="#"><i class="fa fa-dribbble w3-hover-text-blue"></i></a> 
        <a href="#"><i class="fa fa-twitter w3-hover-text-blue"></i></a> 
        <a href="#"><i class="fa fa-linkedin w3-hover-text-blue"></i></a> 
        <a href="#"><i class="fa fa-facebook w3-hover-text-blue"></i></a> 
        <p><button class="w3-btn w3-light-gray w3-hover-blue-gray">Contact</button></p>
      </div>
    </div>
  </div>
  <!-- Contact Section -->
  <div class="w3-container " style="padding:128px 16px" id="contact">
    <h3 class="w3-center " style=" color: #464f60e6;">
      <strong> CONTACT</strong>
    </h3>
    <p class="w3-center w3-large" style=" color: #464f60e6;">Lets get in touch. Send us a message:</p>
    <div class="w3-row-padding" style="margin-top:64px">
      <div class="w3-half " style=" color: #464f60e6;">
        <p>
          <i class="fa fa-map-marker  fa-fw w3-xxlarge w3-margin-right"></i> Surat, IN</p>
        <p>
          <i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i>  +91 9099228842 &nbsp;&nbsp;<i class="fa fa-whatsapp"></i> </p>
        <p>
          <i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i>  spyhunter272help@gmail.com</p>
        
          <p>
        <i class="fa fa-facebook-official  fa-fw w3-xxlarge w3-margin-right"></i> 
          <a href="https://www.facebook.com/spyhunter272" style="color:blue">Spyhunter272 IT Solutions</a>
        </p>

        <br/>

      </div>
      <div class="w3-half">
        <form action="" method="POST" >
          <p>
            <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name" >
          </p>
          <p>
            <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email" >
          </p>
          <p>
            <input class="w3-input w3-border" type="text" placeholder="Subject" required name="Subject" >
          </p>
          <p>
            <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message" >
          </p>
          <p>
          <div class="g-recaptcha" data-sitekey="6Lc5m2kUAAAAAICqqXbcKJwxvttHqiCzjFV6cZKY"></div>
          </p>
          
            <?php
              if($sendMessage){
              echo '<p>';
              echo $sendMessage;
              echo '</p>';
              }
            ?>

            <?php
              if($errMsg){
              echo '<p>';
              echo $errMsg;
              echo '</p>';
              }
            ?>
          
          <p>
            <input class="w3-button w3-blue-grey " type="submit" name='submit' />
            
          </p>
        </form>
      </div>
    </div>
  </div>

  <div class="fotter theme-dark w3-center w3-padding-32">
    <h5>Created By:- SpyHunter272 IT Solutions</h5>    
  </div>

  <script>
    // Toggle between showing and hiding the sidebar when clicking the menu icon
    var mySidebar = document.getElementById("mySidebar");

    function w3_open() {
      if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
      } else {
        mySidebar.style.display = 'block';
      }
    }

    // Close the sidebar with the close button
    function w3_close() {
      mySidebar.style.display = "none";
    }
  </script>

  

</body>

</html>