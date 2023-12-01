<?php
include("header.php");
if(isset($_POST['submit']))
{

	$sql = "INSERT INTO advertiser(advertisername,emailid,password,contactno,status) VALUES('$_POST[advertisername]','$_POST[emailid]','$_POST[password]','$_POST[contactno]','Active')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) ==1)
	{
		echo "<script>alert('Advertiser Registration done successfully..');</script>";
		echo "<script>window.location='index.php';</script>";
	}
}
//2  - Selecting the record starts here..
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM  advertiser WHERE advertiserid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
// 2 - Select the record ends here..
?>
 
  <!--  catg header banner section -->
  <section id="aa-catg-head-banner">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Checkout Page</h2>
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
		Advertiser Registration Panel
	  </a>
	</h4>
  </div>
  <div id="collapseThree">
	<div class="panel-body">
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Advertiser Name: <span id="idadvertisername" class="errmsg"></span>
			<input type="text" name="advertisername" value="<?php echo $rsedit['advertisername']; ?>" placeholder="Advertiser Name">
		  </div>                             
		</div>
	  </div> 
	  
		<div class="row">
			<div class="col-md-6">
			  <div class="aa-checkout-single-bill">
				Email ID: <span id="idemailid" class="errmsg"></span>
				<input type="text" name="emailid" value="<?php echo $rsedit['emailid']; ?>" placeholder="Email ID">
			  </div>                             
			</div>
			<div class="col-md-6">
			  <div class="aa-checkout-single-bill">
				Contact No.: <span id="idcontactno" class="errmsg"></span>
				<input type="text" placeholder="Contact No." value="<?php echo $rsedit['contactno']; ?>" name="contactno">
			  </div>                             
			</div>
		</div>
	  
	  <div class="row">
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			Password: <span id="idpassword" class="errmsg"></span>
			<input type="password" name="password" value="<?php echo $rsedit['password']; ?>" placeholder="Password">
		  </div>                             
		</div>
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			Confirm Password: <span id="idcpassword" class="errmsg"></span>
			<input types="password" name="cpassword" value="<?php echo $rsedit['password']; ?>" placeholder="Confirm Password">
		  </div>                             
		</div>
	  </div>
	  
	  
	  <div class="row">
		<div class="col-md-12">
			<hr>
		</div>
		<div class="col-md-4">
		</div>	
		<div class="col-md-4">
		  <div class="aa-checkout-single-bill col-md-6">
			<input type="submit" name="submit" value="Click here to Register" class="aa-browse-btn">
		  </div>
		</div>	
		<div class="col-md-4">	
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
	 $('.errmsg').html('');
	 
	var numericExpression = /^[0-9]+$/; 
	var alphaExp = /^[a-zA-Z]+$/;	 
	var alphaspaceExp = /^[a-zA-Z\s]+$/;	
	var alphanumericExp = /^[0-9a-zA-Z]+$/;		
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	var checkcondition = "true";
	 
	 if(!document.frmform.advertisername.value.match(alphaspaceExp))
	 {
		 document.getElementById("idadvertisername").innerHTML = "Advertiser name should not contain digits and special characters..";
		 checkcondition = "false";
	 }
	 if(document.frmform.advertisername.value=="")
	 {
		 document.getElementById("idadvertisername").innerHTML = "Advertiser name should not be empty..";
		 checkcondition = "false";
	 } 
	 if(!document.frmform.emailid.value.match(emailExp))
	 {
		 document.getElementById("idemailid").innerHTML = "Entered EMail ID is not valid..";
		 checkcondition = "false";
	 }
	 if(document.frmform.emailid.value=="")
	 {
		 document.getElementById("idemailid").innerHTML = "Email ID should not be empty..";
		 checkcondition = "false";
	 }
	 if(document.frmform.password.value.length < 6 )
	 {
		 document.getElementById("idpassword").innerHTML = "Password should contain more than 6 characters.."; 
		 checkcondition = "false";
	 }
	 if(document.frmform.password.value=="")
	 {
		 document.getElementById("idpassword").innerHTML = "Password should not be empty..";
		 checkcondition = "false";
	 }
	 if(document.frmform.cpassword.value=="")
	 {
		 document.getElementById("idcpassword").innerHTML = "Confirm Password should not be empty..";
		 checkcondition = "false";
	 }
	 if(document.frmform.password.value != document.frmform.cpassword.value)
	 {
		 document.getElementById("idcpassword").innerHTML = "Password and Confirm Password not matching...";
		 checkcondition = "false";
	 }
	 if(document.frmform.contactno.value.length != 10 )
	 {
		 document.getElementById("idcontactno").innerHTML = "Contact Number should contain 10 digits.."; 
		 checkcondition = "false";
	 }
	 if(document.frmform.contactno.value=="")
	 {
		 document.getElementById("idcontactno").innerHTML = "Contact Number should not be empty..";
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