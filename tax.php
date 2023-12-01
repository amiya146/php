<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE tax SET taxtype='$_POST[taxtype]',taxamt='$_POST[taxamt]',description='$_POST[description]',status='$_POST[status]' WHERE taxid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1)
		{
			echo "<script>alert('tax record updated successfully..');</script>";
			echo "<script>window.location='viewtax.php';</script>";
		}
		//Update statement ends here
	}
	else
	{	
	$sql = "INSERT INTO tax(taxtype,taxamt,description,status) VALUES('$_POST[taxtype]','$_POST[taxamt]','$_POST[description]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) ==1)
	{
		echo "<script>alert('tax record inserted successfully..');</script>";
		echo "<script>window.location='tax.php';</script>";
	}
}
}
//2  - Selecting the record starts here..
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM  tax WHERE taxid='$_GET[editid]'";
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
		Tax
	  </a>
	</h4>
  </div>
  <div id="collapseThree">
	<div class="panel-body">
	 
	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Tax Type:
			<input type="text" value="<?php echo $rsedit['taxtype']; ?>" name="taxtype" placeholder="Tax Type">
		  </div>                             
		</div>
	  </div> 
	  
	  	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Tax Amount:
			<input type="text" value="<?php echo $rsedit['taxamt']; ?>" name="taxamt" placeholder="Tax Amount">
		  </div>                             
		</div>
	  </div>
	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Description:
     <textarea name="description" value="<?php echo $rsedit['description']; ?>" placeholder="Description"></textarea>
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