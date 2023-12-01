<?php
include("header.php");
if(isset($_POST['submit']))
{
	$sqledit = "UPDATE advertiser set password='" . md5($_POST['npassword']) . "' WHERE password='" . md5($_POST['opassword']) . "' AND advertiserid='$_SESSION[advertiserid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Password updated successfully');</script>";
	}
	else
	{
		echo "<script>alert('Failed to Update password');</script>";
	}
}
?>
 
  <!--  catg header banner section -->
  <section id="aa-catg-head-banner">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Change Password</h2>
      </div>
     </div>
   </div>
  </section>
  <!--  / catg header banner section -->

 <!--  Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
          <form action="" method="post" name="frmform" onsubmit="return validateform()">
            <div class="row">
			
<?php
//include("sidebar.php");
?>		
			
              <div class="col-md-12">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">

<!--  Billing Details -->
<div class="panel panel-default aa-checkout-billaddress">
  <div class="panel-heading">
	<h4 class="panel-title">
	  <a  data-parent="#accordion" >
		Change Password
	  </a>
	</h4>
  </div>
  <div id="collapseThree">
	<div class="panel-body">

	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Old Password:<span id="idopassword" class="errmsg"></span>
			<input type="password" name="opassword"  placeholder="Password">
		  </div>                             
		</div>
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			New Password:<span id="idnpassword" class="errmsg"></span>
			<input type="password" name="npassword"  placeholder="Password">
		  </div>                             
		</div>
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Confirm Password:<span id="idcpassword" class="errmsg"></span>
			<input type="password" name="cpassword" placeholder="Confirm Password">
		  </div>                             
		</div>
	  </div>
	  
	  
	  <div class="row">
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill col-md-6">
			<input type="submit" name="submit" value="Click here to Register" class="aa-browse-btn">
		  </div>
		</div>		
	  </div>                                    
	</div>
  </div>
</div>
                   
				   </div>
                </div>
              </div>
             </div>
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!--  / Cart view section -->

 <?php
 include("footer.php");
 ?>
 
 <script>
 function validateform()
 {	  
	 var checkcondition = "true";
	 $('.errmsg').html('');
	 if(document.frmform.opassword.value=="")
	 {
		 document.getElementById("idopassword").innerHTML = "Old password should be entered";
		 checkcondition = "false";
	 }
	 if(document.frmform.npassword.value=="")
	 {
		 document.getElementById("idnpassword").innerHTML = "New password should be entered";
		 checkcondition = "false";
	 }
	 if(document.frmform.npassword.value.length < 6 )
	 {
		 document.getElementById("idnpassword").innerHTML = " New password should contain more than 6 characters.."; 
		 checkcondition = "false";
	 }
	 if(document.frmform.cpassword.value=="")
	 {
		 document.getElementById("idcpassword").innerHTML = "Confirm the password";
		 checkcondition = "false";
	 }
	 if(document.frmform.npassword.value != document.frmform.cpassword.value)
	 {
		 document.getElementById("idcpassword").innerHTML = " New password and Confirm Password not matching...";
		 checkcondition = "false";
	 }
	  if(checkcondition == "true")
	 {
		 return true;
	 }
	 else
	 {
		 return false;
	 }
 }
 </script>