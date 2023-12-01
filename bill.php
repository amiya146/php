<?php 
include("header.php");
//Step 2 - Update : Select record from database 

	$sqlpayment = "SELECT * FROM payment LEFT JOIN advertiser ON payment.advertiserid=advertiser.advertiserid WHERE payment.paymentid='$_GET[billid]'";
	$qsqlpayment = mysqli_query($con,$sqlpayment);
	$rspayment = mysqli_fetch_array($qsqlpayment);
	echo mysqli_error($con);
//Step 2 - Update : Select record from database ends here
/* */  ?>

	<!--  Main -->
		<div id="page">
				
			<!--  Main -->
			<div class="container">
				<div class="row">

				<div class="1u skel-cell-important">
				</div>
					<div class="10u skel-cell-important" id="divprint">
						<section>
							<header>
								<center><h2>Payment  receipt</h2></center>
							</header>
							<form method="post" action="" >

<table id="dataTables" class="table table-striped table-bordered" cellspacing="0" style="width:100%;">

<tr>
	<td colspan="2"><center>Bangalore<br>
<br>E-MAIL: CONTACT@TVADVT.COM</center></td></tr>
    <tr><td><b>Customer Name :</b> <?php echo $rspayment['advertisername']; /* */  ?></td><td><b>Bill Number :</b> <?php echo $rspayment['paymentid']; /* */  ?></td></tr>
	<tr><td><b>Customer Address :</b> <br><?php echo $rspayment['address']; /* */  ?>, <br><?php echo $rspayment['city']; /* */  ?><br>PIN - <?php echo $rspayment['pincode']; /* */  ?></td><td><b>Bill Date : </b><?php echo date("d-M-Y",strtotime($rspayment['paymentdate'])); /* */  ?></td></tr>
	<tr><td><b>Contact Number : </b><?php echo $rspayment['contactno']; /* */  ?></td><td> </td></tr>
	<tr Style="background-color:grey;color:white;"><th><b style='color:white'>Subject</b></th><th> <b style='color:white'>Amount</b></th></tr>
	<tr Style="background-color:white; height:100px;"><td><b>Advertisement</b><br><?php echo $rspayment['transaction_type'];

if($rspayment['transaction_type'] == "ScrollerAdvertisement")
{
	$sqlpayment = "SELECT * FROM payment LEFT JOIN advtorder ON payment.paymentid=advtorder.paymentid  LEFT JOIN scrolleradvt ON scrolleradvt.scrolleradvtid=advtorder.scrolleradvtid WHERE payment.status='Active' AND payment.transaction_type='ScrollerAdvertisement'  AND payment.paymentid='$_GET[billid]'";
	$qsqlpayment = mysqli_query($con,$sqlpayment);
	$rspayment = mysqli_fetch_array($qsqlpayment);
	echo "<bR><b>Title :</b> ". $rspayment['advttitle'];
	echo "<bR><b>Message :</b> ". $rspayment['advtdescription'];
}
if($rspayment['transaction_type'] == "VideoAdvertisement")
{
	 $sqlpayment = "SELECT * FROM payment LEFT JOIN advtorder on payment.paymentid=advtorder.paymentid LEFT JOIN videoads ON videoads.videoaddid=advtorder.videoadid WHERE payment.status='Active' AND  payment.transaction_type='VideoAdvertisement' AND payment.paymentid='$_GET[billid]' ";
		$qsqlpayment = mysqli_query($con,$sqlpayment);
	$rspayment = mysqli_fetch_array($qsqlpayment);
	echo  "<bR><b>Title :</b> ". $rspayment['advttitle'];
}
	/* */  ?></td><td>₹<?php echo $totamt = $rspayment['paidamt']; /* */  ?></td></tr>
	<tr Style="background-color:#fafafb;"><th><b>CGST @ <?php echo $rspayment['cgst']; /* */  ?>%</b></th><td>₹<?php echo $cgst = ($totamt*$rspayment['cgst'])/100; /* */  ?></td></tr>
    <tr Style="background-color:#fafafb;"><th><b>SGST @ <?php echo $rspayment['sgst']; /* */  ?>%</b></th><td>₹<?php echo $sgst =($totamt*$rspayment['sgst'])/100; /* */  ?></td></tr>
	
	<tr Style="background-color:#grey;"><th><b>Grand Total</b></th><td>₹<?php echo $grandtotal = $totamt + $cgst + $sgst; /* */  ?> </td></tr>
	<tr Style="background-color:#fafafb;"><th  colspan="2"><b>Amount (in words) :
	<?php 
	echo "Rupees ". convertNumberToWord($grandtotal) . " Only";
	/* */  ?></b></th></tr>
</table>
<hr>


<table id="dataTables" class="table table-striped table-bordered" cellspacing="0" style="width:100%;">

	<tr Style="background-color:grey;color:white; ">
		<th>Taxable value</th>
		<th>Central Tax <br>(<?php echo $rspayment['cgst']; ?>%)</th>
		<th>State tax <br>(<?php echo $rspayment['sgst'];  ?>%)</th>
		<th>Total</th>
	</tr>
	
	<tr Style="background-color:white;">
		<td><?php echo $totamt; /* */  ?></td>
		<td><?php echo $cgst ; /* */  ?></td>
		<td><?php echo $sgst ; /* */  ?></td>
		<td><?php echo $taxamt = $cgst + $sgst; /* */  ?></td>
	</tr>
	<tr>
		<th colspan='4'><b>Tax Amount(in words) : 	<?php 
	echo "Rupees ". convertNumberToWord($taxamt) . " Only";
	/* */  ?></b></th>		
	</tr>
	
</table>

<p align="right"><b>foR Media</b><br></align><br><br><br>
Authorised signatory</p>

<br>
<center> This is a computer Generated Invoice</center>

							</form>
							
						</section>
					</div>
					
<div class="10u skel-cell-important">
<hr>
<center><input type="button" onclick="printDiv('divprint')" class="form-control"  style="width: 250px;" value="Click here to print" /></center>
</div>
<br>
				<div class="1u skel-cell-important">
				</div>
				</div>
			</div>
			<!--  Main -->

		</div>
	<!--  /Main -->

	<?php include("footer.php");
	/* */  ?>
	<script>
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
	</script>