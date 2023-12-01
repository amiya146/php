<?php
include("header.php");
if(isset($_POST['submit']))
{
		//Update statement starts here
		$sql = "UPDATE employee SET empname='$_POST[empname]',loginid='$_POST[loginid]' WHERE employeeid ='$_SESSION[employeeid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1)
		{
			echo "<script>alert('Employee Profile updated successfully..');</script>";
		}
		//Update statement ends here

}
//2  - Selecting the record starts here..
if(isset($_SESSION['employeeid']))
{
	$sqledit = "SELECT * FROM  employee WHERE employeeid='$_SESSION[employeeid]'";
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
          <form action="" method="post">
            <div class="row">
	
			
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">

<!--  Billing Details -->
<div class="panel panel-default aa-checkout-billaddress">
  <div class="panel-heading">
	<h4 class="panel-title">
	  <a  data-parent="#accordion" >
		Employee
	  </a>
	</h4>
  </div>
  <div id="collapseThree">
	<div class="panel-body">
	 

	  	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Employee Name:
			<input type="text" name="empname" value="<?php echo $rsedit['empname']; ?>"placeholder="Employee Name">
		  </div>                             
		</div>
	  </div>
	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			 Login Id:
			<input type="text" name="loginid" value="<?php echo $rsedit['loginid']; ?>"placeholder="Login Id ">
		  </div>                             
		</div>
	  </div>
	  


	  
	  <div class="row">
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill col-md-6">
			<input type="submit" name="submit" value="Update profile" class="aa-browse-btn">
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