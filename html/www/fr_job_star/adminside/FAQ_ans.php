<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
}
if(!isset($_SESSION["email"]))
{
header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include 'add_ons_head.php'; ?>
    <?php
    include_once("connection.php");
    $con = new JobClass;
    $err_img="";
    ?>
    <style type="text/css">
    .erText{
    font-family: Arial;
    font-size: 15px;
    color:#cc0000;
    text-decoration: none;
    font-weight: normal;
    }
    </style>
  </head>
  <?php
  if(isset($_GET['uid']))
  {
    if(isset($_POST['supdate']))
    {
      $data="";
      $data["ans"]=$_POST["ans"];
      $id=$_GET['uid'];
      $s=$con->updatation('faq',$data,'id',$id);
      if ($s) {
        $to=$_REQUEST["cnd_email"];
        $subject="FAQ Answare";
        $msg = "<strong>Subject :</strong>\n<p>".$_POST["sub"]."</p>\n\n<strong>Description :</strong>\n<p>".$_POST["des"]."</p>\n\n<strong>Answare :</strong>\n<p>".$_POST["ans"]."</p>";
        $headers="From: vaghelajanak97145@gmail.com\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        if(mail($to,$subject,$msg,$headers)){
          echo "<script>alert('SuccessFully Sent Mail.');window.location.href='FAQinfo.php';</script>";
        }else{
          echo "<script>alert('Mail Not Send.Somthing Is Wrong.May be Your connection is slow.');</script>";
        }
      }
    }
  }
  ?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include 'header.php'; ?>
      <?php include 'left_sidebar.php'; ?>
      
      <!-- Content Wrapper.z Contains page content -->
      <br><br>
      <div class="content-wrapper" style="height: 1300px">
        <div class="col-md-12">
          <h2>FAQ Answare</h2>
          <div class="text-right">
            <a href="FAQinfo.php"><h2><i class="fa fa-hand-o-right"></i></i> <span>show record</span></h2></a>
          </div>
          <?php
          if(isset($_GET['uid'])){
          $id = $_GET['uid'];
          $row_sel=$con->select_up('faq','id',$id);
          $cnd=$con->select_up('candidate_master','cnd_id',$row_sel[1]);
          }
          ?>
          <form method="post">
            <div class="form-group">
              <label for="type_name">Candidate Name</label>
              <input type="text" class="form-control" placeholder="Name" name="name" value="<?php if(isset($_GET['uid'])){ echo $cnd['f_name'].' '.$cnd['l_name']; } ?>" readonly>
            </div>
            <div class="form-group">
              <label for="type_name">Candidate Email</label>
              <input type="text" class="form-control" placeholder="Email" name="cnd_email" value="<?php if(isset($_GET['uid'])){ echo $cnd['email_id'];;} ?>" readonly>
            </div>
            <div class="form-group">
              <label for="type_name">Subject</label>
              <input type="text" class="form-control" placeholder="Subject" name="sub" value="<?php if(isset($_GET['uid'])){ echo $row_sel[2]; } ?>" readonly>
            </div>
            <div class="form-group">
              <label for="type_name">Description</label>
              <textarea class="form-control" placeholder="Description" name="des" readonly><?php if(isset($_GET['uid'])){ echo $row_sel[3]; } ?></textarea>
            </div>
            <div class="form-group">
              <label for="type_name">Answare</label>
              <textarea class="form-control" placeholder="Answare" name="ans" required=""><?php if(isset($_GET['uid'])){ echo $row_sel[4]; } ?></textarea>
            </div>
            <div>
               <?php
              if(isset($_GET['uid'])){
              //echo $_GET['uid'];
              ?>
              <input type="submit" class="btn btn-default" name="supdate" value="Update"><br><br>
              <?php
              }
              else
              {
              ?>
              <input type="submit" class="btn btn-default" name="sinsert"><br><br>
              <?php
              }
              ?>
            </div>
          </form>
          
        </div>
      </div>
      <!-- /.content-wrapper -->
      <?php include 'footer.php'; ?>
      <?php include 'right_sidebar.php'; ?>
    </div>
    <!-- ./wrapper -->
    <?php include 'add_ons_body.php'; ?>
  </body>
</html>