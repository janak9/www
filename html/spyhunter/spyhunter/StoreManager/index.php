<?php

  // $cnn = mysqli_connect('localhost', 'z0dxb9lkvw0n_spy', 'BH[07.;RHBM7', 'spyhunter') or die(mysqli_connect_error()); // Establishing Connection with Server
  // $db = mysql_select_db("spyhunter", $connection); // Selecting Database from Server
  if($cnn)
    echo "done";
  else
    echo "not done";

  die;
  if(isset($_REQUEST['inquiry_submit'])){ // Fetching variables of the form which travels in URL
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    //Insert Query of SQL
    $query = mysql_query("insert into students(student_name, student_email, student_contact, student_address) values ('$name', '$email', '$contact', '$address')");
    echo "<br/><br/><span>Data Inserted successfully...!!</span>";
    // mysql_close($connection); // Closing Connection with Server
  }
?>
<!DOCTYPE html>
<html>

<head>
  <title>Store Manager Desktop App</title>
  <meta charset="UTF-8">
  <link rel="icon" href="./assets/favicon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">

  <link href="./css/index.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">

  <script type="text/javascript" src="../assets/jquery-3.3.1.min.js"></script>
  
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
  
  <div class="w3-container">

    <!-- Header -->
    <header class="w3-container w3-blue-grey top-header w3-animate-bottom w3-theme w3-padding">
      <div class="w3-center w3-margin-top" style="font-weight:700;">
        <img src="./assets/app.png" class="w3-image" style="height:150px" />
        <br/>
        <h1 class="w3-xxlarge">
          <strong> Store Manager Desktop App</strong>
        </h1>
        <!-- ./SoftWare/StoreManager_1.0.1_Win.exe -->
        <a href="#" class="w3-btn  w3-round-xlarge w3-margin w3-large w3-black inquiry-form">DOWNLOAD FOR WINDOWS</a>
      </div>
    </header>


    <div class="notice w3-padding w3-margin-top">
      <p>
        For demo call or whatsapp
        <a href="whatsapp://send?abid=9099228842&text=INEEDINFO" style="color:blue">
          <i class="fa fa-whatsapp"></i> +91 9099228842 </a> or send mail
        <a href="spyhunter272help@gmail.com " style="color:blue"> spyhunter272help@gmail.com </a> with your contact information.
      </p>

      <p>
        We are also modify software or add new invoice / report format as your need in lowest cost.
      </p>
    </div>


    <div class="w3-content w3-border w3-padding w3-section " style="max-width:100%;">

      <img class="mySlides  w3-animate-opacity" src="./assets/s1.png" style="width:100%">
      <img class="mySlides w3-animate-opacity" src="./assets/s2.png" style="width:100%">
      <img class="mySlides w3-animate-opacity" src="./assets/s3.png" style="width:100%">
      <img class="mySlides w3-animate-opacity" src="./assets/s4.png" style="width:100%">

    </div>

    <div class="w3-row theme-dark">

      <div class="w3-col l12 w3-margin-top m12 w3-center s12">
        <h2 class="w3-xxlarge  ">
          <strong>SOFTWARE SERVICES</strong>
        </h2>
      </div>

      <div class="w3-col l4 m6 s12">
        <div class="w3-card-4 card-home w3-teal w3-center " style="width:92%;max-width:300px;">
          <i class="fa fa-area-chart w3-margin" style="font-size:48px;"></i>
          <div class="w3-container">
            <h4>
              <b>Detail Reports</b>
            </h4>
            <p class="card-details">It’s now easier to review your invoices, products and clients and with just a few clicks see who’s behind on
              payments or check your sales for the last six month. </p>
          </div>
        </div>
      </div>


      <div class="w3-col l4 m6 s12">
        <div class="w3-card-4 card-home w3-green w3-center " style="width:92%;max-width:300px;">
          <i class="fa fa-gear w3-margin" style="font-size:48px;"></i>
          <div class="w3-container">
            <h4>
              <b>Settings</b>
            </h4>
            <p class="card-details">You can manage your Store Profile As well as there are many Settings for Invoices, Invoice Templates, Product
              Management, Customer Managment and many other settings which you can easily manage.</p>
          </div>
        </div>
      </div>


      <div class="w3-col l4 m6 s12">
        <div class="w3-card-4 w3-pale-blue card-home w3-center " style="width:92%;max-width:300px;">
          <i class="fa fa-file-picture-o w3-margin" style="font-size:48px;"></i>
          <div class="w3-container">
            <h4>
              <b>Print your bill</b>
            </h4>
            <p class="card-details">E-mail the documents, print or save them as PDFs with just a few clicks. Our Service for India is here to support
              your inventory management and billing needs. </p>
          </div>
        </div>
      </div>



      <div class="w3-col l4 m6 s12">
        <div class="w3-card-4 card-home w3-blue-grey w3-center " style="width:92%;max-width:300px;">
          <i class="fa fa-edit w3-margin" style="font-size:48px;"></i>
          <div class="w3-container">
            <h4>
              <b>Create your own Stunning Invoices</b>
            </h4>
            <p class="card-details">You can add your own invoices and can make them perfect as perfect bill or invoice, you can also change some
              contents in your stunning invoice.</p>
          </div>
        </div>
      </div>

      <div class="w3-col l4 m6 s12">
        <div class="w3-card-4 card-home w3-khaki w3-center " style="width:92%;max-width:300px;">
          <i class="fa fa-database w3-margin" style="font-size:48px;"></i>
          <div class="w3-container">
            <h4>
              <b>Backup / Restore Your Data</b>
            </h4>
            <p class="card-details">All your data is safely stored and secured on your PC. The backup and restore feature helps to protect your invoicing
              database form unfortunate events or to transfer it from one PC to another.</p>
          </div>
        </div>
      </div>


      <div class="w3-col l4 m6 s12">
        <div class="w3-card-4 card-home w3-dark-grey w3-center " style="width:92%;max-width:300px;">
          <i class="fa fa-calendar-o w3-margin" style="font-size:48px;"></i>
          <div class="w3-container">
            <h4>
              <b>GST Solutions</b>
            </h4>
            <p class="card-details">Our service is updated for all your GST billing needs: GSTIN, HSN , GST formats for all documents from invoices
              to purchase orders and more.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="w3-row">

      <div class="w3-col l12 w3-margin-top m12 w3-center s12">
        <h2 class="w3-xxlarge  ">
          <strong>HOW TO</strong>
        </h2>
      </div>

      <div class="w3-col l6 m6 w3-padding s12">
        <h4>
          <strong> Free and easy to use Billing Services</strong>
        </h4>
        <p style="text-align:justify">
          Yes, you heared right it's free and easy as well as fun to use. No complexity are there,In this market there are many billing
          software, which provide billing facility for small scale bussiness,but our aim is not focus on only facility, We
          have met all the types of requirements for billing services to small scale businesses.
        </p>
      </div>

      <div class="w3-col w3-card l6 m6 s12">
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/TrZ3G1nBnpg" frameborder="0" allow="autoplay; encrypted-media"
          allowfullscreen></iframe>
      </div>
    </div>
  </div>
  
  <div class="fotter theme-dark w3-center w3-padding-32">
    <h5>Created By:- SpyHunter272 IT Solutions</h5>    
  </div>

  <div id="inquiry-form" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom">
      <header class="w3-container w3-teal">
        <span onclick="document.getElementById('inquiry-form').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <h2>Inquiry Form</h2>
      </header>

      <div class="w3-container w3-margin-top">
        <center>
        <form action="" method="post">
          <table>
            <tr>
              <td>
                <span style="color:red;">*</span> Your Name</td>
              <td>
                <input type="text" style="w3-input w3-border" name="name" pattern="[A-Za-z ]+" title="Enter Only Character" required>
              </td>
            </tr>
            <tr>
              <td>
                <span style="color:red;">*</span>Email</td>
              <td>
                <input type="email" style="w3-input w3-border" name="email" required>
              </td>
            </tr>
            <tr>
              <td>
                <span style="color:red;">*</span>Phone</td>
              <td>
                <input type="text" style="w3-input w3-border" pattern="[0-9]{10}" title="Enter 10 digit Phone number" name="phone" required>
              </td>
            </tr>
            <tr>
              <td>
                <span style="color:red;">*</span>City</td>
              <td>
                <input type="text" style="w3-input w3-border" pattern="[A-Za-z ]+" title="Enter Only Character" name="city" required>
              </td>
            </tr>
            <tr>
              <td>your Comment</td>
              <td>
                <textarea name="comment" style="w3-input w3-border"></textarea>
              </td>
            </tr>
            <tr>
              <td>
                <br/>
                <button type="submit" name="inquiry_submit" class="w3-btn w3-padding w3-teal" style="width:120px">Send &nbsp; ❯</button>
              </td>
              <td></td>
            </tr>
          </table>
        </form>
        </center>
        </div>

        <footer class="w3-container w3-teal w3-margin-top">
          <p>Please fill the form for a better experience. This information is taken for just inquiry about software. Our staff will come to meet you and explain whole things in the best way. The great thing is that it's <b>Free</b> now.</p>
        </footer>

      </div>
    </div>
    <script>
      $(document).ready(function () {
        $(".inquiry-form").on("click", function () {
          $("#inquiry-form").css('display', 'block');
        });
      });
      var myIndex = 0;
      carousel();

      function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
          myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 6000); // Change image every 2 seconds
      }
    </script>
</body>

</html>