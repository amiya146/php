<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE payment SET advertiserid='$_POST[advertiserid]',paymenttype='$_POST[paymenttype]',paidamt='$_POST[paidamt]',cgst='$_POST[cgst]',sgst='$_POST[sgst]',igst='$_POST[igst]',paymentdate='$_POST[paymentdate]',note='$_POST[note]',status='$_POST[status]' WHERE paymentid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1)
		{
			echo "<script>alert('payment record updated successfully..');</script>";
			echo "<script>window.location='viewpayment.php';</script>";
		}
		//Update statement ends here
	}
	else
	{	
		$sql = "INSERT INTO payment(advertiserid,paymenttype,paidamt,cgst,sgst,igst,paymentdate,note,status) VALUES('$_POST[advertiserid]','$_POST[paymenttype]','$_POST[paidamt]','$_POST[cgst]','$_POST[sgst]','$_POST[igst]','$_POST[paymentdate]','$_POST[note]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1)
		{
			echo "<script>alert('payment record inserted successfully..');</script>";
			echo "<script>window.location='payment.php';</script>";
		}
	}
}
//2  - Selecting the record starts here..
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM  payment WHERE paymentid='$_GET[editid]'";
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
		Payment
	  </a>
	</h4>
  </div>
  <div id="collapseThree">
	<div class="panel-body">
	 
	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Advertiser Id:
			<select name="advertiserid" >
				<option value=''>Select Advertiser</option>
			</select>
		  </div>                             
		</div>
	  </div> 
	  
	  	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Payment type:
			<input type="text" value="<?php echo $rsedit['paymenttype']; ?>" name="paymenttype" placeholder="Payment type">
		  </div>                             
		</div>
	  </div>
	  	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Paid Amount:
			<input type="text" value="<?php echo $rsedit['paidamt']; ?>" name="paidamt" placeholder="Paid Amount">
		  </div>                             
		</div>
	  </div>
	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Central gst:
			<input type="text" value="<?php echo $rsedit['cgst']; ?>" name="cgst" placeholder="Central gst">
		  </div>                             
		</div>
	  </div>
	  
	   <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			State gst:
			<input type="text" value="<?php echo $rsedit['sgst']; ?>" name="sgst" placeholder="State gst">
		  </div>                             
		</div>
	  </div>
	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			International gst:
			<input type="text" value="<?php echo $rsedit['igst']; ?>" name="igst" placeholder="International gst">
		  </div>                             
		</div>
	  </div>
	  
	   <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Payment Date:
			<input type="date" value="<?php echo $rsedit['paymentdate']; ?>" name="paymentdate" placeholder="Payment Date">
		  </div>                             
		</div>
	  </div>
	  
	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			 Note:
		<textarea placeholder=" Description" value="<?php echo $rsedit['note']; ?>" name="note"></textarea>
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