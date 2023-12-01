<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE adsprogram SET videoadvtid='$_POST[videoadvtid]',scrolleradvtid='$_POST[scrolleradvtid]',tvprogramid='$_POST[tvprogramid]' WHERE adsprogramid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1)
		{
			echo "<script>alert('adsprogram record updated successfully..');</script>";
			echo "<script>window.location='viewadsprogram.php';</script>";
		}
		//Update statement ends here
	}
	else
	{
	$sql = "INSERT INTO adsprogram(videoadvtid,scrolleradvtid,tvprogramid) VALUES('$_POST[adsprogramid]','$_POST[videoadvtid]','$_POST[scrolleradvtid]','$_POST[tvprogramid]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) ==1)
	{
		echo "<script>alert('adsprogram record inserted successfully..');</script>";
		echo "<script>window.location='adsprogram.php';</script>";
	}
}
}
//2  - Selecting the record starts here..
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM  adsprogram WHERE adsprogramid='$_GET[editid]'";
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
		Advertisement Program
	  </a>
	</h4>
  </div>
  <div id="collapseThree">
	<div class="panel-body">
	 
	  	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Video Advertisement:
			<select name="videoadvtid" >
				<option value=''>Select Video advertisement</option>
				<?php
				$sqladsprogram  = "SELECT * FROM videoads WHERE status='Active'";
				$qsqladsprogram = mysqli_query($con,$sqladsprogram);
				while($rsadsprogram = mysqli_fetch_array($qsqladsprogram))
				{
					if($rsedit['videoaddid'] == $rsadsprogram['videoaddid'])
					{
					echo "<option value='$rsadsprogram[videoaddid]' selected>$rsadsprogram[advttitle]</option>";
					}
					else
					{
					echo "<option value='$rsadsprogram[videoaddid]'>$rsadsprogram[advttitle]</option>";
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
			Scoller Advertisement:
			<select name="scrolleradvtid" >
				<option value=''>Select Scoller Advertisement</option>
				<?php
				$sqladsprogram  = "SELECT * FROM scrolleradvt WHERE status='Active'";
				$qsqladsprogram = mysqli_query($con,$sqladsprogram);
				while($rsadsprogram = mysqli_fetch_array($qsqladsprogram))
				{
					if($rsedit['scrolleradvtid'] == $rsadsprogram['scrolleradvtid'])
					{
					echo "<option value='$rsadsprogram[scrolleradvtid]' selected>$rsadsprogram[advttitle]</option>";
					}
					else
					{
					echo "<option value='$rsadsprogram[scrolleradvtid]'>$rsadsprogram[advttitle]</option>";
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
			Tv Program:
			<select name="tvprogramid" >
				<option value=''>Select Tv Program</option>
				<?php
				$sqladsprogram  = "SELECT * FROM tvprogram WHERE status='Active'";
				$qsqladsprogram = mysqli_query($con,$sqladsprogram);
				while($rsadsprogram = mysqli_fetch_array($qsqladsprogram))
				{
					if($rsedit['tvprogramid'] == $rsadsprogram['tvprogramid'])
					{
					echo "<option value='$rsadsprogram[tvprogramid]' selected>$rsadsprogram[title]</option>";
					}
					else
					{
					echo "<option value='$rsadsprogram[tvprogramid]'>$rsadsprogram[title]</option>";
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