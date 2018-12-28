<!DOCTYPE html>
<html>
  <head>
    <title></title>
  </head>
  <body>
    <div class="wrapper">
      <div class="content-wrapper">
        <div class="container">
          <?php echo "hii"; ?>
          <div class="col-md-3 col-sm-3 col-xs-12">
            <?php echo "hii"; ?>
            
          </div>
        </div>
        
      </div>
    </di
   <body class="hold-transition skin-blue sidebar-mini">
    
    <div class="wrapper">
      <?php include 'header.php'; ?>
      <?php include 'left_sidebar.php'; ?>
      <!-- Content Wrapper.z Contains page content -->
      <div class="content-wrapper">
        <div class="container">
          <div class="col-md-3 col-sm-3 col-xs-12">

        <div class="col-md-12 col-sm-12" style="margin: auto; text-align: center">
          <h2> Profile </h2>
          <div style="align-self: center;">
            <div class="box box-primary">
              <form method="post">
                <div>
                  <img src="assets/image/profile/<?php /*echo $row[3];*/ ?>" height='100px' width='100px'>
                </div>
                <div class="form-group">
                  <label for="user_id" style="font-size: 20px;">User Name :  </label>
                  <?php /*echo $row[1];*/ ?>
                </div>
                <div class="form-group">
                  <label for="email_id" style="font-size: 20px;">Email : </label>
                  <?php /*echo $row[2];*/ ?>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
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