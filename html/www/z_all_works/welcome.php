<html>
<head>

<script src="jquery.js">
</script>
<title>Student Registration</title>

<style>

.info{
	position:relative;
}


body{
background:url(ye.jpeg)no-repeat fixed 100%;
height:100%;
width:100%;
}
#sub{
background-color:#FFD700;
border:none;
cursor:pointer;
border-radius:4px;
width:60px;
height:20px;
margin-left:7px;
}
#sub:hover{
background-color:#F0E68C;

}
#select1{
border:1px solid #BDB76B;
}
#d1{
height:100px;
width:110%;
 position: relative;
background-color:orange;
margin-top:-10px;
margin-left:-14px; 
}
#f1{
font-size:40px;
border:none;
position: absolute;
margin-left:40px;
margin-top:40px;
}
select:hover{
box-shadow:1px 2px 3px yellow;
background:transparent;

}
#f1:hover{

border-radius:10px;
margin-top:38px;	
box-shadow:1px 1px 2px  rgb(100,0,17);
}
#i1:hover{
box-shadow:1px 2px 3px yellow;
background:transparent;
text-color:white;
}
textarea:hover{
box-shadow:1px 2px 3px yellow;
background:transparent;
}
select:focus{
outline:none;
}
input:focus{
outline:none;
}
textarea:focus{
outline:none;
}

#i2:hover{
box-shadow:1px 2px 3px yellow;	
background:transparent;
}
#f1:active{
margin-top:43px;
}
#a1{
text-decoration:none;
color:darkorange;
outline:none;
}
#d2{
position:absolute;
margin-left:60%;
margin-right:10px;
margin-top:40px;
}
.same:hover{
box-shadow:1px 2px 3px yellow;	
background:transparent;
}
#dev{
margin-top:30px;
margin-left:40%;
width:60%;
height:30px;
border-radius:7px;
border:0px  transparent;
}
#dev:hover{
cursor:pointer;
transition-duration:1s;
border:1px solid orange;
box-shadow:1px 1px 7px orange;
    
}
#sub2{
margin-left:2px;
border:1px solid #FFD700;
}
 #sub2:active{
transform:translateY(1px);
}
#dd2{
position:absolute;
margin-left:-10px;
width:10px;
height:10px;

}
.warning{
	<!--background-color:#FF0000;-->
}

.tooltip{
	display:block;
	position:absolute;
	left:0;
	bottom:120%;
	width:150px;
	padding:5px;
	border-radius:10px;
	background-color:#ffa500;
	color:#ffffff;
	text-transform: none;
	font-size:12px;
	opacity: 0;
	transform: scaleY(0);
	transition: all 0.2s ease;
}
.tooltip:after{
	position:absolute;
	content: '';
	left:10px;
	bottom: -5px;
	width: 0;
	height: 0;
	border-top: 5px solid #ffa500;
	border-right: 5px solid transparent;
	border-left: 5px solid transparent;
}

.info:hover .tooltip{
	opacity:1;
	transform: scaleY(1);
}
.span2{
	display: none;
}
.runtime{
	border:5px solid #ff0000;
}
</style>

<script type="text/javascript">
var count = 0;
function validation2(){
	count = 0;
	var firstname = document.getElementById('fn');
	var lastname = document.getElementById('ln');
	var addr = document.getElementById('addr');
	var email = document.getElementById('email');
	var mn = document.getElementById('mn');
	var pwd = document.getElementById('pwd');
	var cpwd = document.getElementById('cpwd');
	
	allLetter(firstname);
	
	allLetterl(lastname);
	
	ValidateEmail(email);
	
	allnumeric(mn);
	
	alphanumeric(addr);
	
	if(pwd.value.length == 0){
		allnullpwd(pwd);
		if(cpwd.value.length == 0){
			allnullcpwd(cpwd);
		}
	}else{
		if(cpwd.value.length == 0){
			allnullcpwd(cpwd);
		}else{
			matchpwd(pwd,cpwd);
		}
	}
	
	if(count > 0)
		return false;
	else
		return true;
	
}

/*--------------------------------------------------------------------------------------*/

function allLetter(uname){
	var letters = /^[A-Za-z]+$/;
	if(uname.value.length == 0){
		$("#fndiv").html("<span class='tooltip'>Please Enter first name</span>");
		$("#fn").css("border","1.5px solid #ff0000");
		return;
	}
	if(uname.value.match(letters)){
		$("#fndiv").html("");
		$("#fn").css("border","1px solid #BDB76B");
	}
	else{
		
		$("#fndiv").html("<span class='tooltip'>Username must have alphabet character only</span>");
		$("#fn").css("border","1.5px solid #ff0000");
		count++;
		uname.focus();
	}
}

function allLetterl(uname){
	var letters = /^[A-Za-z]+$/;
	if(uname.value.length == 0){
		$("#lndiv").html("<span class='tooltip'>Please Enter Last name</span>");
		$("#ln").css("border","1.5px solid #ff0000");
		return;
	}
	if(uname.value.match(letters)){
		$("#lndiv").html("");
		$("#ln").css("border","1px solid #BDB76B");
	}
	else{
		
		$("#lndiv").html("<span class='tooltip'>Last name must have alphabet character only</span>");
		$("#ln").css("border","1.5px solid #ff0000");
		count++;
		uname.focus();
	}
}

function ValidateEmail(uemail){
	var mailformat = /^w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(uemail.value.length == 0){
		$("#emaildiv").html("<span class='tooltip'>Please enter Email</span>");
		$("#email").css("border","1.5px solid #ff0000");
		return;
	}
	if(uemail.value.match(mailformat)){
		$("#emaildiv").html("");
		$("#email").css("border","1px solid #BDB76B");
	}else{
		$("#emaildiv").html("<span class='tooltip'>You have entered an invalid email address!</span>");
		$("#email").css("border","1.5px solid #ff0000");
		count++;
		uemail.focus();
	}
}
function allnumeric(unum){
	var numbers = /^[0-9]+$/;
	if(unum.value.length == 0){
		$("#mndiv").html("<span class='tooltip'>Please Enter Mobile number</span>");
		$("#mn").css("border","1.5px solid #ff0000");
		return;
	}
	if(unum.value.match(numbers)){
		$("#mndiv").html("");
		$("#mn").css("border","1px solid #BDB76B");
		if(unum.value.length != 10){
			$("#mndiv").html("<span class='tooltip'>Please Enter 10 digit Mobile number</span>");
			$("#mn").css("border","1.5px solid #ff0000");
			return;
		}
	}else{
		$("#mndiv").html("<span class='tooltip'>Mobile number must have numeric characters only</span>");
		$("#mn").css("border","1.5px solid #ff0000");
		count++;
		uzip.focus();
	}
}
function alphanumeric(uadd){
	var letters = /^[0-9A-Za-z]+$/;
	if(uadd.value.length == 0){
		$("#addrdiv").html("<span class='tooltip'>Please Enter Address</span>");
		$("#addr").css("border","1.5px solid #ff0000");
		return;
	}
	if(uadd.value.match(letters)){
		$("#addrdiv").html("");
		$("#addr").css("border","1px solid #BDB76B");
	}else{
		$("#addrdiv").html("<span class='tooltip'>User address must have alphanumeric characters only</span>");
		$("#addr").css("border","1.5px solid #ff0000");
		count++;
		uadd.focus();
	}
}
function matchpwd(pwd1,pwd2){
	if(pwd1.value == pwd2.value){
		$("#cpwddiv").html("");
		$("#cpwd").css("border","1px solid #BDB76B");
	}else{
			$("#cpwddiv").html("<span class='tooltip'>Both password must be same</span>");
			$("#cpwd").css("border","1.5px solid #ff0000");
			$("#pwddiv").html("");
			$("#pwd").css("border","1px solid #BDB76B");
			count++;
			pwd2.focus();
	}
}
function allnullpwd(pwd){
	if(pwd.value.length==0){
		$("#pwddiv").html("<span class='tooltip'>Plese Enter Password</span>");
		$("#pwd").css("border","1.5px solid #ff0000");
		count++;
		pwd.focus();
	}
	else{
		$("#pwddiv").html("");
		$("#pwd").css("border","1px solid #BDB76B");
	}
}
function allnullcpwd(cpwd){
	if(cpwd.value.length==0){
		$("#cpwddiv").html("<span class='tooltip'>Plese Re-Enter Password</span>");
		$("#cpwd").css("border","1.5px solid #ff0000");
		count++;
		cpwd.focus();
	}
	else{
		$("#cpwddiv").html("");
		$("#cpwd").css("border","1px solid #BDB76B");
	}
}
</script>
</head>
<body bgcolor="#DCDCDC">
	<form name="form1" onSubmit="return validation1()" action="" method="post">
		<div id="d1">
			<div id="f1" ><a href="welcome.php" id="a1" ><b>Registration<b></a></div>
				<table id="d2" align="right">
					<tr>
						<td>Email</td>
						<td> Password</td>
					</tr>
					<tr>
						<td><input  type="text" id="em" style="border-radius:7px;" name="R-email" required></td>
						<td><input style="border-radius:7px;" type="password" name="pass" required></td>
						<td><input type="submit"  value="Log In" id="sub"></td>
					</tr>
					<tr>
						<td style="border-radius:6px;align:center;background-color:orange;"><font color="red"><div style="border-radius:6px;" id="dd1"></div></font></td>
					</tr>
				</table>

		</div>
	</form>

<form onsubmit='return validation2()' action="profile.php" name="form2" method="post">
<big>
	<h1 style="text-shadow:1px 1px 18px #8FBC8F;margin-left:65%;color:#F0E68C;">Create new account</h1>
</big>
<div style="margin-left:65%;">
	<table>
		<tr>
			<td class = 'info'>
				<input type="text" id="fn" name="fn" style="margin-left:3px;position:relative;padding:8px;font-size:4mm;color:darkorange;border-radius:10px;width:180px;height:30px;border:1px solid #BDB76B;" placeholder="First Name" required>
				<div id = 'fndiv'>
				</div>
			</td>
			<td class='info'>
				<input type="text" name="ln" id='ln' style="padding:8px;font-size:4mm;color:darkorange;margin-left:-90px;border-radius:10px;width:180px;border:1px solid #BDB76B;height:30px;" placeholder="Last Name" id="i2" required>
				<div id = 'lndiv'>
				</div>
			</td>
		</tr>
		<tr>
			<td class='info'>
				<textarea id="addr" placeholder="Address" name="addr" style="padding:8px;font-size:4mm;color:darkorange;margin-left:2px;border-radius:10px;border:1px solid #BDB76B;" rows=2 cols=30 required></textarea>
				<div id = 'addrdiv'>
				</div>
			</td>
		</tr>
		<tr>
			<td class='info'>
				<input type="text" id="mn" class="same" name="mn"placeholder="Mobile Number" style="padding:8px;font-size:4mm;color:darkorange;border-radius:10px;width:180px;height:30px;border:1px solid #BDB76B;margin-left:3px;" required>
				<div id = 'mndiv'>
				</div>
			</td>
			<td class='info'>
				<input type="text" id="email" class="same" name="email" placeholder="Email-Id"style="padding:8px;font-size:4mm;color:darkorange;border-radius:10px;width:180px;height:30px;margin-left:-90px;border:1px solid #BDB76B;" required>
				<div id = 'emaildiv'>
				</div>
			</td>
		</tr>
		<tr>
			<td class='info'>
				<input type="Password" id="pwd"  name="pwd" class="same"placeholder="Password" style="padding:8px;font-size:4mm;color:darkorange;border-radius:10px;width:180px;height:30px;border:1px solid #BDB76B;margin-left:3px;" required>
				<div id = 'pwddiv'>
				</div>
			</td>
		</tr>
		<tr>
			<td class='info'>
				<input type="Password" id="cpwd" name="cpwd" class="same"placeholder="Re-type Password"style="padding:8px;font-size:4mm;color:darkorange;border-radius:10px;width:180px;height:30px;border:1px solid #BDB76B;margin-left:3px;" required>
				<div id = 'cpwddiv'>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div id="dev"><input type="submit"  value="Sign Up" id="sub2" style="width:96%;cursor:pointer;background:transparent;border:none;font-size:6mm;color:orange;border-radius:8px;" onClick="return validation2()"></div>
			</td>
		</tr>
	</table>
</div>
</form>
</body>
</html>