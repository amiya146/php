<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE advtorder SET paymentid='$_POST[paymentid]',tvprogramid='$_POST[tvprogramid]',advertiserid='$_POST[advertiserid]',webadid='$_POST[webadid]',videoadid='$_POST[videoadid]',scrolleradvtid='$_POST[scrolleradvtid]',fdate='$_POST[fdate]',tdate='$_POST[tdate]',cost='$_POST[cost]',costperclick='$_POST[costperclick]',note='$_POST[note]',status='$_POST[status]' WHERE advtorderid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1)
		{
			echo "<script>alert('advtorder record updated successfully..');</script>";
			echo "<script>window.location='viewadvtorder.php';</script>";
		}
		//Update statement ends here
	}
	else
	{
	$sql = "INSERT INTO advtorder(paymentid,tvprogramid,advertiserid,webadid,videoadid,scrolleradvtid,fdate,tdate,cost,costperclick,note,status) VALUES('$_POST[paymentid]','$_POST[tvprogramid]','$_POST[advertiserid]','$_POST[webadid]','$_POST[videoadid]','$_POST[scrolleradvtid]','$_POST[fdate]','$_POST[tdate]','$_POST[cost]','$_POST[costperclick]','$_POST[note]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) ==1)
	{
		echo "<script>alert('advtorder record inserted successfully..');</script>";
		echo "<script>window.location='advtorder.php';</script>";
	}
}
}
//2  - Selecting the record starts here..
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM  advtorder WHERE advtorderid='$_GET[editid]'";
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
		Advertisement Order
	  </a>
	</h4>
  </div>
  <div id="collapseThree">
	<div class="panel-body">
	 
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Payment Id:
			<select name="paymentid" >
			
				<option value=''>Select Payment</option>
				<?php
				$sqladvtorder  = "SELECT * FROM payment WHERE status='Active'";
				$qsqladvtorder = mysqli_query($con,$sqladvtorder);
				while($rsadvtorder = mysqli_fetch_array($qsqladvtorder))
				{
					if($rsedit['paymentid'] == $rsadvtorder['paymentid'])
					{
					echo "<option value='$rsadvtorder[paymentid]' selected>$rsadvtorder[note]</option>";
					}
					else
					{
					echo "<option value='$rsadvtorder[paymentid]'>$rsadvtorder[note]</option>";
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
			Tv Program Id:
			<select name="tvprogramid" >
			
				<option value=''>Select Tv Program</option>
				<?php
				$sqladvtorder  = "SELECT * FROM tvprogram WHERE status='Active'";
				$qsqladvtorder = mysqli_query($con,$sqladvtorder);
				while($rsadvtorder = mysqli_fetch_array($qsqladvtorder))
				{
					if($rsedit['tvprogramid'] == $rsadvtorder['tvprogramid'])
					{
					echo "<option value='$rsadvtorder[tvprogramid]' selected>$rsadvtorder[note]</option>";
					}
					else
					{
					echo "<option value='$rsadvtorder[tvprogramid]'>$rsadvtorder[note]</option>";
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
			Advertiser Id:
			<select name="advertiserid" >
				<option value=''>Select Advertiser</option>
				<?php
				$sqladvtorder  = "SELECT * FROM advertiser WHERE status='Active'";
				$qsqladvtorder = mysqli_query($con,$sqladvtorder);
				while($rsadvtorder = mysqli_fetch_array($qsqladvtorder))
				{
					if($rsedit['advertiserid'] == $rsadvtorder['advertiserid'])
					{
					echo "<option value='$rsadvtorder[advertiserid]' selected>$rsadvtorder[advertisername]</option>";
					}
					else
					{
					echo "<option value='$rsadvtorder[advertiserid]'>$rsadvtorder[advertisername]</option>";
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
			Website Advertisement Id:
			<select name="webadid" >
				<option value=''>Select Website advertisement</option>
				<?php
				$sqladvtorder  = "SELECT * FROM webads WHERE status='Active'";
				$qsqladvtorder = mysqli_query($con,$sqladvtorder);
				while($rsadvtorder = mysqli_fetch_array($qsqladvtorder))
				{
					if($rsedit['webadid'] == $rsadvtorder['webadid'])
					{
					echo "<option value='$rsadvtorder[webadid]' selected>$rsadvtorder[advttitle]</option>";
					}
					else
					{
					echo "<option value='$rsadvtorder[webadid]'>$rsadvtorder[advttitle]</option>";
					}
				}
				?>
			</select>
		  </div>                             
		</div
	  </div>
	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Video Advertisement Id:
			<select name="videoadid" >
				<option value=''>Select Video Advertisement</option>
				<?php
				$sqladvtorder  = "SELECT * FROM videoads WHERE status='Active'";
				$qsqladvtorder = mysqli_query($con,$sqladvtorder);
				while($rsadvtorder = mysqli_fetch_array($qsqladvtorder))
				{
					if($rsedit['videoaddid'] == $rsadvtorder['videoaddid'])
					{
					echo "<option value='$rsadvtorder[videoaddid]' selected>$rsadvtorder[advttitle]</option>";
					}
					else
					{
					echo "<option value='$rsadvtorder[videoaddid]'>$rsadvtorder[advttitle]</option>";
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
			Scroller Advertisement Id:
			<select name="scrolleradvtid" >
				<option value=''>Select Scroller advertisement</option>
				<?php
				$sqladvtorder  = "SELECT * FROM scrolleradvt WHERE status='Active'";
				$qsqladvtorder = mysqli_query($con,$sqladvtorder);
				while($rsadvtorder = mysqli_fetch_array($qsqladvtorder))
				{
					if($rsedit['scrolleradvtid'] == $rsadvtorder['scrolleradvtid'])
					{
					echo "<option value='$rsadvtorder[scrolleradvtid]' selected>$rsadvtorder[advttitle]</option>";
					}
					else
					{
					echo "<option value='$rsadvtorder[scrolleradvtid]'>$rsadvtorder[advttitle]</option>";
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
			From Date:
			<input type="date" name="fdate" value="<?php echo $rsedit['fdate']; ?>" placeholder="From Date">
		  </div>                             
		</div>
	  </div>
	   <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Till Date:
			<input type="date" name="tdate" value="<?php echo $rsedit['tdate']; ?>" placeholder="Till Date">
		  </div>                             
		</div>
	  </div>
	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Cost:
			<input type="text" name="cost" value="<?php echo $rsedit['cost']; ?>" placeholder="Cost">
		  </div>                             
		</div>
	  </div>
	   <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Cost Per Click:
			<input type="text" name="costperclick" value="<?php echo $rsedit['costperclick']; ?>" placeholder="Cost Per Click">
		  </div>                             
		</div>
	  </div>
	  
	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			 Note:
			<textarea placeholder=" Description" name="note" value="<?php echo $rsedit['note']; ?>" ></textarea>
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