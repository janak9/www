<!DOCTYPE html>
<html>
  <head>
    <?php include 'add_ons_head.php';
    include_once("connection.php");
    $con = new JobClass;
    $err_img="";
    ?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include 'header.php'; ?>
      <?php include 'left_sidebar.php'; ?>
      <!-- Content Wrapper.z Contains page content -->
      <div class="content-wrapper">
        <div class="col-md-12">
          <h2> Image </h2>
          <form method="post"  enctype="multipart/form-data">
            <div>
              <label for="cmp_img">Slider Image</label>
            </div>
            <div>
              <input type="file" id="img" name="img">
              <div class="errfont">
                <?php
                if($err_img != "") {
                echo "<p class='erText'>$err_img</p>";
                }
                ?>
              </div>
            </div><br>
            <div>
              <input type="submit" name="submit" value="Submit">
            </div>
          </form>
          <?php
        if(isset($_POST["submit"]))
        {
        $file_tmp=$_FILES["img"]["tmp_name"];
        $data_fl=$_FILES['img'];
        $data["img"]=$con->img_upload($data_fl,"assets/image/slider/");
              $con->insertion('slider_master',$data); 

        
        }
        ?>
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