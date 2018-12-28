<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PayUMoney Gateway Integration | Codeigniter</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/bootstrap.min.js" />
</head>
<body>

<div class="container">
	<div class="row">	

        <div class="col-md-8">
        	<h4 class="display-5">Product Information <span class="text-danger hidden-md-up" style="font-size: 15px;">* All fields are required</span></h4>
        	
            <form method="post" id="product_info" enctype="multipart/form-data" action="<?php echo site_url(); ?>/Welcome/check">                                                                  
                <div class="form-group">                      
                  <input type="number"  name="payble_amount" id="payble_amount" class="form-control" placeholder="Enter Payble Amount" required />
                </div>
                <div class="form-group">
                    <input type="text" name="product_info" id="product_info" class="form-control"  Placeholder="Product info name" required />
                </div>
               <div class="form-group">                      
                  <input type="text"  name="customer_name" id="customer_name" class="form-control" placeholder="Full Name (Only alphabets)" required/>
                </div>
                <div class="form-group">                                   
                  <input type="number"  name="mobile_number" id="mobile_number" class="form-control" placeholder="Mobile Number(10 digits)" required/>
                </div>
                <div class="form-group">                                   
                  <input type="email"  name="customer_email" id="customer_email" class="form-control" placeholder="Email" required/>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="customer_address" id="customer_address" placeholder="Address" required></textarea>
                </div>
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
            </form>                 
        </div>
        <div class="col-md-4">
        	<div class="card">
        		<h6 class="card-header bg-primary text-white">
        			Some Help?
        		</h6>
        		<div class="card-body">
        			<p>Get some real help by browsing these guide from offical source.</p>
        			<ol>
        				<li> <a href="https://www.payumoney.com/dev-guide/" target="_blank">PayUMoney Dev Guide</a> </li>
        				<li> <a href="https://www.payumoney.com/pdf/PayUMoney-Technical-Integration-Document.pdf" target="_blank">PayUMoney Integration Guide</a></li>

        			</ol>
        		</div>
        	</div>

        </div>
    </div>
   

	<!-- Footer -->
	<hr>
	<footer>
		<p>Copyright &copy; <?php echo date('Y'); ?>  
			<span class="float-right">Coded with Love &hearts;	: <a href="https://facebook.com/anburocky3" target="_blank">Anbuselvan Rocky</a></span></p>
	</footer>
</div> 

</body>
</html>