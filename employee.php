<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE employee SET emptype='$_POST[emptype]',empname='$_POST[empname]',loginid='$_POST[loginid]'";
		if($_POST['password'] != "")
		{
		$sql = $sql . ",password='" . md5($_POST['password']) . "'";
		}
		$sql = $sql . ",status='$_POST[status]' WHERE employeeid ='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1)
		{
			echo "<script>alert('employee record updated successfully..');</script>";
			echo "<script>window.location='viewemployee.php';</script>";
		}
		//Update statement ends here
	}
	else
	{
		$sql = "INSERT INTO employee(emptype,empname,loginid,password,status) VALUES('$_POST[emptype]','$_POST[empname]','$_POST[loginid]','" . md5($_POST['password']) . "','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1)
		{
		
			echo "<script>alert('employee record inserted successfully..');</script>";
			echo "<script>window.location='employee.php';</script>";
		}
	}
}
//2  - Selecting the record starts here..
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM  employee WHERE employeeid='$_GET[editid]'";
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
          <form action="" method="post"name="formform" onsubmit="return validateform()">
            <div class="row">
			
<?php
include("sidebar.php");
?>		
			
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">

<!--  Billing Details -->
<div class="panel panel-default aa-checkout-billaddress">
  <div class="panel-heading">
	<h4 class="panel-title">
	  <a  data-parent="#accordion" >
		Employee Detail
	  </a>
	</h4>
  </div>
  <div id="collapseThree">
	<div class="panel-body">
	 
	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Employee Type:
			<select placeholder="emptype" name="emptype">
			  <option value="0">Select Employee Type</option>
			  <?php
				$arr = array("Admin","Employee");
				foreach($arr as $val)
				{
					if($val == $rsedit['emptype'])
					{
						echo "<option selected value='$val'>$val</option>";
					}
					else
					{
						echo "<option value='$val'>$val</option>";
					}
				}
			  ?>
			</select>
		  </div>                             
		</div>
	  </div> 
	  
	  	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Employee Name:<span id="idempname" class="errmsg"></span>
			<input type="text" name="empname" value="<?php echo $rsedit['empname']; ?>"placeholder="Employee Name">
		  </div>                             
		</div>
	  </div>
	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			 Login Id:<span id="idloginid" class="errmsg"></span>
			<input type="text" name="loginid" value="<?php echo $rsedit['loginid']; ?>"placeholder="Login Id ">
		  </div>                             
		</div>
	  </div>
	  
	 <div class="row">
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			 Password:<span id="idpassword" class="errmsg"></span>
			<input type="password" name="password"  placeholder=" Password">
		  </div>                             
		</div>
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			 Confirm Password:<span id="idcpassword" class="errmsg"></span>
			<input type="password" name="cpassword" placeholder="Confirm Password">
		  </div>                             
		</div>
	  </div>
	  

	  <div class="row">
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
		  Status
			<select placeholder="Status" name="status">
			  <option value="0">Select Status</option>
			  <?php
				$arr = array("Active","Inactive");
				foreach($arr as $val)
				{
					if($val == $rsedit['status'])
				{
					echo "<option selected value='$val'>$val</option>";
				}
				else
				{
					echo "<option value='$val'>$val</option>";
				}
				}
			  ?>
			</select>
		  </div>                             
		</div>
	  </div>
	  
	  <div class="row">
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill col-md-6">
			<input type="submit" name="submit" value="Click here to Submit" class="aa-browse-btn">
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
	 $('.errmsg').html('');
	 var alphaspaceExp = /^[a-zA-Z\s]+$/;
    var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;	 
	 var checkcondition = "true";
	 if(!document.formform.empname.value.match(alphaspaceExp))
	 {
		 document.getElementById("idempname").innerHTML = "Advertiser name should not contain digits and special characters..";
		 checkcondition = "false";
	 }
	  if(document.formform.empname.value=="")
	 {
		 document.getElementById("idempname").innerHTML = "Advertiser name should not be empty..";
		 checkcondition = "false";
	 } 
	 if(!document.formform.loginid.value.match(emailExp))
	 {
		 document.getElementById("idloginid").innerHTML = "Entered EMail ID is not valid..";
		 checkcondition = "false";
	 }
	  if(document.formform.loginid.value=="")
	 {
		 document.getElementById("idloginid").innerHTML = "Email ID should not be empty..";
		 checkcondition = "false";
	 }
	 if(document.formform.password.value != document.formform.cpassword.value)
	 {
		 document.getElementById("idcpassword").innerHTML = "Password and Confirm Password not matching...";
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