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
 	     
		$sql = "INSERT INTO payment(advertiserid,paymenttype,paidamt,cgst,sgst,paymentdate,note,status) VALUES('$_SESSION[advertiserid]','WebAds','$_POST[paidamt]','$_POST[cgst]','$_POST[sgst]','$dt','Paymment Type - $_POST[paymenttype] <br>Card holder - $_POST[cardholder] <br> Card Number - $_POST[cardno] <br> CVV No. - $_POST[cvvno] <br>Expiry Date $_POST[cardexpires]','Active')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1)
		{
			echo "<script>alert('Payment done successfully..');</script>";
			echo "<script>window.location='viewwebadspaymentreport.php';</script>";
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
          <form action="" method="post" name="frmform" onsubmit="return validateform()">
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
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			How much amount Do you Pay?<span id="idpaidamt" class="errmsg"></span>
			<input type="text" value="<?php echo $rsedit['paidamt']; ?>" name="paidamt" id="paidamt" placeholder="Payable Amount" onkeyup="calculatetax(this.value)">
		  </div>                             
		</div>
	  </div>
	  
	  <div class="row">
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			CGST (5%):
			<input type="text" value="<?php echo $rsedit['cgst']; ?>" name="cgst" id="cgst" placeholder="CGST" readonly style="background-color:yellow;">
		  </div>                             
		</div>
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			SGST (5%):
			<input type="text" value="<?php echo $rsedit['sgst']; ?>" name="sgst" id="sgst" placeholder="SGST" readonly style="background-color:yellow;">
		  </div>                             
		</div>
	  </div>
	  
	   <div class="row">
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			<b>Total Amount:</b>
			<input type="text" name="totamt" id="totamt" placeholder="Total Amount" readonly style="background-color:yellow;">
		  </div>                             
		</div>
	  </div>
	  
	  	  	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
<hr>	
<b>Payment Detail:	</b>
		</div>                             
		</div>
	  </div>
	  
	  <div class="row">
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			Payment type:<span id="idpaymenttype" class="errmsg"></span>
			<select  name="paymenttype" >
				
				<?php
				$arr = array("Credit card","Debit Card","Digital wallet");
				foreach($arr as $val)
				{
				if($val == $rsedit['note'])
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
			Card Holder:<span id="idcardholder" class="errmsg"></span>
			<input type="text" value="<?php echo $rsedit['note']; ?>" name="cardholder" placeholder="Card Holder">
		  </div>                             
		</div>
	  </div> 
	 
	  <div class="row">
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			Card No:<span id="idcardno" class="errmsg"></span>
			<input type="text" value="<?php echo $rsedit['note']; ?>" name="cardno" placeholder="Card No">
		  </div>                             
		</div>
		
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			CVV No:<span id="idcvvno" class="errmsg"></span>
			<input type="text" value="<?php echo $rsedit['note']; ?>" name="cvvno" placeholder="CVV No">
		  </div>                             
		</div>
	  </div>
	  
	   <div class="row">
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			Card Expires on:<span id="idcardexpires" class="errmsg"></span>
			<input type="month" name="cardexpires" value="<?php echo $rsedit['note']; ?>" placeholder="Expiry Date">
		  </div>                             
		</div>
	  </div>
	  

	  

	  
	  <div class="row">
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill col-md-6">
			<input type="submit" name="submit" value="Make payment" class="aa-browse-btn">
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
 function calculatetax(totalpayable)
 {
	 //sgst cgst paidamt totamt
	 document.getElementById("sgst").value =(parseFloat(totalpayable) * 5) / 100;
	 document.getElementById("cgst").value =(parseFloat(totalpayable) * 5) / 100;
	 document.getElementById("totamt").value =((parseFloat(totalpayable) * 5) / 100) + ((parseFloat(totalpayable) * 5) / 100) + parseFloat(totalpayable);
	 
 }
 </script>

 <script>
 function validateform()
 {	
	//validation part
	$('.errmsg').html('');
	 var checkcondition = "true";
	 var numericExpression = /^[0-9]+$/;
     var alphaspaceExp = /^[a-zA-Z\s]+$/;		 
	 var alphanumericExp = /^[0-9a-zA-Z]+$/;	
	 if(!document.frmform.paidamt.value.match(numericExpression))
	 {
		 document.getElementById("idpaidamt").innerHTML = "Amount should not contain characters..";
		 checkcondition = "false";
	 }
	 if(document.frmform.paidamt.value=="")
	 {
		 document.getElementById("idpaidamt").innerHTML = "Amount should not be empty..";
		 checkcondition = "false";
	 }
	 if(document.frmform.paymenttype.value=="")
	 {
		 document.getElementById("idpaymenttype").innerHTML = "Payment type should not be empty..";
		 checkcondition = "false";
	 }
	  if(!document.frmform.cardholder.value.match(alphaspaceExp))
	 {
		 document.getElementById("idcardholder").innerHTML = "Card holder name should not contain digits and special characters..";
		 checkcondition = "false";
	 }
	 if(document.frmform.cardholder.value=="")
	 {
		 document.getElementById("idcardholder").innerHTML = "Card holder name should not be empty..";
		 checkcondition = "false";
	 }
	 if(document.frmform.cardno.value.length != 16 )
	 {
		 document.getElementById("idcardno").innerHTML = "Card Number should contain 16 digits.."; 
		 checkcondition = "false";
	 }
	 if(!document.frmform.cardno.value.match(numericExpression))
	 {
		 document.getElementById("idcardno").innerHTML = "Card number should not contain characters..";
		 checkcondition = "false";
	 }
	 if(document.frmform.cardno.value=="")
	 {
		 document.getElementById("idcardno").innerHTML = "Card number should not be empty..";
		 checkcondition = "false";
	 }
	 
	 if(document.frmform.cvvno.value.length != 3 )
	 {
		 document.getElementById("idcvvno").innerHTML = "Cvv should contain 3 digits.."; 
		 checkcondition = "false";
	 }
	 if(!document.frmform.cvvno.value.match(numericExpression))
	 {
		 document.getElementById("idcvvno").innerHTML = "Cvv should not contain characters..";
		 checkcondition = "false";
	 }
	 if(document.frmform.cvvno.value=="")
	 {
		 document.getElementById("idcvvno").innerHTML = "CVV Number should not be empty..";
		 checkcondition = "false";
	 }
	 if(document.frmform.cardexpires.value=="")
	 {
		 document.getElementById("idcardexpires").innerHTML = "Mension the Expiry date";
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