<?php
include("header.php");
if(isset($_POST['submit']))
{
	//Upload image starts
	$filename= rand(). $_FILES['advtimg']['name'];
	move_uploaded_file($_FILES['advtimg']['tmp_name'],"imgwebads/".$filename);
	//Upload image ends
	
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE webads SET advttitle='$_POST[advttitle]'";
		if($_FILES['advtimg']['name'] != "")
		{
		$sql = $sql .",advtimg='$filename'";
		}
		
	    $sql = $sql . ",advtdescription='" . mysqli_real_escape_string($con,$_POST['advtdescription']) . "',advtemail='$_POST[advtemail]',advtwww='$_POST[advtwww]',advtaddress='$_POST[advtaddress]',advttype='$_POST[advttype]',status='$_POST[status]',contactno='$_POST[contactno]',cpc='$_POST[cpc]' WHERE webadid ='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1)
		{
			echo "<script>alert('Web Advertisement template record updated successfully..');</script>";
			echo "<script>window.location='viewwebads.php';</script>";
		}
		//Update statement ends here
	}
	else
	{
		$sql = "INSERT INTO webads(advertiserid,advttitle,advtimg,advtdescription,advtemail,advtwww,advtaddress,advttype,status,contactno,cpc) VALUES('$_SESSION[advertiserid]','$_POST[advttitle]','$filename','" . mysqli_real_escape_string($con,$_POST['advtdescription']) . "','$_POST[advtemail]','$_POST[advtwww]','$_POST[advtaddress]','$_POST[advttype]','$_POST[status]','$_POST[contactno]','$_POST[cpc]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1)
		{
			echo "<script>alert('Web Advertisement template inserted successfully..');</script>";
			echo "<script>window.location='webads.php';</script>";
		}
	}
}
//2  - Selecting the record starts here..
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM  webads WHERE webadid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
		if($rsedit['advtimg'] == "")
		{
			$imgname  = "img/noimage.jpg";
		}
		else if(file_exists("imgwebads/$rsedit[advtimg]"))
		{
			$imgname = "imgwebads/$rsedit[advtimg]";
		}
		else
		
		{
			$imgname  = "img/noimage.jpg";
		}
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
          <form action="" method="post" enctype="multipart/form-data" name="frmform" onsubmit="return validateform()">
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
		Website Advertisements
	  </a>
	</h4>
  </div>
  <div id="collapseThree">
	<div class="panel-body">
	 
	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			 Advertisement Title:<span id="idadvttitle" class="errmsg"></span>
			<input type="text" value="<?php echo $rsedit['advttitle']; ?>" name="advttitle" placeholder="Advertisement Title ">
		  </div>                             
		</div>
	  </div>
	  
	 <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			 Advertisement Image:<span id="idadvtimg" class="errmsg"></span>
			<input type="file" name="advtimg">
			<?php
			if($rsedit['advtimg'] != "")
			{
			?>
			<img src="<?php echo $imgname; ?>" >
			<?php
			}
			?>
		  </div>                             
		</div>
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			 Advertisement Description:<span id="idadvtdescription" class="errmsg"></span>
			<textarea name="advtdescription" placeholder=" Advertisement Description"><?php echo $rsedit['advtdescription']; ?></textarea>
		  </div>                             
		</div>
	  </div>
	  
	  <div class="row">
		<div class="col-md-4">
		  <div class="aa-checkout-single-bill">
			 Email ID:<span id="idadvtemail" class="errmsg"></span>
			<input type="text" value="<?php echo $rsedit['advtemail']; ?>" name="advtemail" placeholder="Advertisement Email ">
		  </div>                             
		</div>
		
		<div class="col-md-4">
		  <div class="aa-checkout-single-bill">
			 Contact No.:<span id="idcontactno" class="errmsg"></span>
			<input type="text" value="<?php echo $rsedit['contactno']; ?>" name="contactno" placeholder="Contact No.">
		  </div>                             
		</div>
		
		<div class="col-md-4">
		  <div class="aa-checkout-single-bill">
			 Website name:<span id="idadvtwww" class="errmsg"></span>
			<input type="url" value="<?php echo $rsedit['advtwww']; ?>" name="advtwww" placeholder="example: http://www.companyname.com">
		  </div>                             
		</div>
		
	  </div>
	  
	   <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			 Advertisement  Address:<span id="idadvtaddress" class="errmsg"></span>
			<textarea name="advtaddress" placeholder="Advertisement  Address"><?php echo $rsedit['advtaddress']; ?></textarea>
		  </div>                             
		</div>
	  </div>
	  
	  	  
	   <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			 Cost per Click (CPC):<span id="idcpc" class="errmsg"></span>
			<input type="text" value="<?php echo $rsedit['cpc']; ?>" name="cpc" placeholder="Cost per Click (CPC)">
		  </div>                             
		</div>
	  </div>
	  
	  <div class="row">
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			 Advertisement Type:<span id="idadvttype" class="errmsg"></span>
			 <select placeholder="Advertisement type" name="advttype">
			  <option value="0">Select Status</option>
			  <?php
				$arr = array("Banner Ads","Text Ads");
				foreach($arr as $val)
				{
					if($val == $rsedit['advttype'])
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
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
		  Status:<span id="idstatus" class="errmsg"></span>
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
	 var checkcondition = "true";
	 var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	 var alphaspaceExp = /^[a-zA-Z\s]+$/;
	 
	 if(document.frmform.advttitle.value=="")
	 {
		 document.getElementById("idadvttitle").innerHTML = "Advertiser title should not be empty..";
		 checkcondition = "false";
	 }
	  if(document.frmform.advtimg.value=="")
	 {
		 document.getElementById("idadvtimg").innerHTML = "image file should not be empty..";
		 checkcondition = "false";
	 }
	 if(document.frmform.advtdescription.value=="")
	 {
		 document.getElementById("idadvtdescription").innerHTML = "Description should not be empty..";
		 checkcondition = "false";
	 }
	  if(!document.frmform.advtemail.value.match(emailExp))
	 {
		 document.getElementById("idadvtemail").innerHTML = "Entered EMail ID is not valid..";
		 checkcondition = "false";
	 }
	 if(document.frmform.advtemail.value=="")
	 {
		 document.getElementById("idadvtemail").innerHTML = "Email ID  should not be empty..";
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
	  if(document.frmform.advtwww.value=="")
	 {
		 document.getElementById("idadvtwww").innerHTML = "Website Name should not be empty..";
		 checkcondition = "false";
	 }
	 if(document.frmform.advtaddress.value=="")
	 {
		 document.getElementById("idadvtaddress").innerHTML = "Address should not be empty..";
		 checkcondition = "false";
	 }
	  if(document.frmform.cpc.value=="")
	 {
		 document.getElementById("idcpc").innerHTML = "Cost per Click should not be empty..";
		 checkcondition = "false";
	 }
	 if(document.frmform.advttype.value=="")
	 {
		 document.getElementById("idadvttype").innerHTML = "Type should not be empty..";
		 checkcondition = "false";
	 }
	 if(document.frmform.status.value=="")
	 {
		 document.getElementById("idstatus").innerHTML = "Status should not be empty..";
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