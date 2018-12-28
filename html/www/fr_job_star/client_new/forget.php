<div class="container margin-top-70 margin-bottom-70">

		<div class="my-account">
			
			<ul class="tabs-nav">
				<li class=""><a href="#tab1">Step 1</a></li>
				<?php  
					if (isset($_POST['Next'])) 
					{
						$email=$_POST['txtemail'];	
						$str="select * from recruiter_master where email='$email'";
					    $res=mysqli_query($tblcon,$str);
					    $ans=mysqli_num_rows($res);
					    if($ans==1)
					    {
					    	$_SESSION['newpass']=$email;
					       echo "<li ><a href='#tab2'>Step 2</a></li>";
					    }
					    else
					    {
					    	?><label style="color: red; font-size: 18px;"><?php
					    	echo"
				                <div class='notification error closeable'>
									<p><span>Error!</span> invelid email address.</p>
									<a class='close' href='#'></a>
								</div>
								";
								?></label><?php
					        // echo "invelid email address";					    

					    }

						//
					}
				?>
				
			</ul>

			<div class="tabs-container">
				<!-- Login -->
				<div class="tab-content" id="tab1" style="display: none;">
					<form method="post" class="login" action="#tab2">

						<p class="form-row form-row-wide">
							<label for="email2">Email Address:
								<i class="ln ln-icon-Mail"></i>
								<input type="email" class="input-text" name="txtemail" id="email2" value="" required="required" />
							</label>
						</p>

						<p class="form-row">
							<input type="submit" class="button border fw margin-top-10" name="Next" value="Next" />
						</p>

					</form>
				</div>

				<!-- Register -->
				<div class="tab-content" id="tab2" style="display: none;">

					<form method="post" class="register">

					<p class="form-row form-row-wide">
						<label for="password1">Enter Password:
							<i class="ln ln-icon-Lock-2"></i>
							<input class="input-text" type="password" maxlength="10" name="password1" id="password"/>
						</label>
					</p>

					<p class="form-row form-row-wide">
						<label for="password2">Re-enter Password:
							<i class="ln ln-icon-Lock-2"></i>
							<input class="input-text" type="password" maxlength="10" name="password2" id="confirm_password"/ >
						</label>
					</p>

					<p class="form-row">
						<input type="submit" class="button border fw margin-top-10" name="Changepassword" value="Change password" />
					</p>

					</form>
				</div>
			</div>
		</div>
	</div
