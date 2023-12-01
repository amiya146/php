<?php
include("sidebar.php");
if(isset($_SESSION['customerid']))
{
	echo "<script>window.location='customeraccount.php';</script>";
}
if(isset($_POST['button']))
{
	$sql ="SELECT * FROM customer WHERE (emailid='$_POST[email]' or contactnumber='$_POST[email]')  and status='Active'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_num_rows($qsql) == 1)
	{
		$rslogin = mysqli_fetch_array($qsql);
		$_SESSION['custnewpasswordid'] = $rslogin['customerid'];
		echo "<SCRIPT>alert('We have sent password recovery mail to your Registered Mail ID..')</SCRIPT>";
		$currenturl = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/newpassword.php";
		$to = $rslogin['emailid'];
		$subject = "Password Recovery Mail from RelicForge";
		$txt = "<b>Hello $rslogin[customername],</b> <br><br> We recently received a request to recover the relicForge Account $rslogin[emailid]. If you sent request, please click on this <a href='$currenturl'><b>Reset Link</b></a> to Change password. This password reset link will expire in 24 hours.";
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: relicforge@technopulse.online";
		include("mail.php");
		echo "<script>window.location='index.php';</script>";
	}
	else
	{
		echo "<SCRIPT>alert('You have entered invalid login credentials...')</SCRIPT>";
	}
}
?>

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Recover Password</h2>
                            </div>

<form action="" method="post" name="frm" onsubmit="return validateform()">
	
		<div class="col-12 mb-3">
		Enter Email ID to Recover password-
			<input type="text" class="form-control" id="email" name="email" placeholder="Email" >
			<span id="idemail" style="color:red;"></span>
		</div>
		
	   
	</div>
<hr>
<div class="col-md-6 mb-3">
<input type="submit" name="button" class="btn amado-btn w-100" value="Click here to Recover Password" >
		</div> 
</form>
                        </div>
                    </div>
					</div>
            </div>
        </div>
    </div>
    <!--  ##### Main Content Wrapper End ##### -->
<?php
include("footer.php");
?>
<script>
function validateform()
{
	var numericExpression = /^[0-9]+$/;
	var alphaExp = /^[a-zA-Z]+$/;
	var alphaspaceExp = /^[a-zA-Z\s]+$/;
	var alphanumericExp = /^[0-9a-zA-Z]+$/;
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	
	var passwordExp = /^((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%!^&*+-]).{6,25})/;

/*
(			# Start of group
  (?=.*\d)		#   must contains one digit from 0-9
  (?=.*[a-z])		#   must contains one lowercase characters
  (?=.*[A-Z])		#   must contains one uppercase characters
  (?=.*[@#$%])		#   must contains one special symbols in the list "@#$%"
              .		#     match anything with previous condition checking
                {6,20}	#        length at least 6 characters and maximum of 25
)			# End of group            : End
*/
var ivalidate = 0;
	 $('span').text('');
	 if(!document.frm.email.value.match(emailExp))
	{
		document.getElementById("idemail").innerHTML = "Entered Email ID is not in valid format..";
		ivalidate = 1;
	}
	if(document.frm.email.value == "")
	{
		document.getElementById("idemail").innerHTML = "Email ID should not be empty..";
		ivalidate = 1;
	}
	if(document.frm.password.value == "")
	{
		document.getElementById("idpassword").innerHTML = "Password should not be empty..";
		ivalidate = 1;
	}	
	if(ivalidate == 0)
	{
		return true;
	}
	else
	{
		return false;
	}
	
}
</script>	