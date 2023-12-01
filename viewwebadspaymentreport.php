<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql="DELETE FROM payment WHERE paymentid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('payment record deleted successfully...');</script>";
		echo "<script>window.location='viewpayment.php';</script>";
	}
}
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
		View Web Ads Payment Report
	  </a>
	</h4>
  </div>
  <div id="collapseThree">
	<div class="panel-body">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Paid Amount.</th>
				<td>
<?php
	$sql= "SELECT sum(payment.paidamt) FROM payment LEFT JOIN advertiser ON advertiser.advertiserid=payment.advertiserid WHERE payment.paymenttype='WebAds'   ";
	if(isset($_SESSION['advertiserid']))
	{
		$sql = $sql . " AND payment.advertiserid='$_SESSION[advertiserid]'";
	}
	$qsql = mysqli_query($con,$sql);
	$rs = mysqli_fetch_array($qsql);
	echo "₹". $totamt = $rs[0];
?>				
				</td>
			</tr>
			<tr>
				<th>Amount spent for Advertisement</th>
				<td>
<?php
	$sql= "SELECT ifnull(sum(payment.paidamt),0) FROM payment LEFT JOIN advertiser ON advertiser.advertiserid=payment.advertiserid WHERE (payment.paymenttype='Banner Ads' OR  payment.paymenttype='Text Ads') ";
	if(isset($_SESSION['advertiserid']))
	{
		$sql = $sql . " AND payment.advertiserid='$_SESSION[advertiserid]'";
	}
	if(isset($_SESSION['advertiserid']))
	{
		$sql = $sql . " AND payment.advertiserid='$_SESSION[advertiserid]'";
	}
	//echo $sql;
	$qsql = mysqli_query($con,$sql);
	$rs = mysqli_fetch_array($qsql);
	echo "₹". $spentamt = $rs[0];
?>
				</td>
			</tr>
			<tr>
				<th>Balance Amount</th>
				<td>₹<?php echo  $totamt -$spentamt; ?> </td>
			</tr>
		</thead>
	</table>
	<hr>
  <div class="panel-heading">
	<h4 class="panel-title">
	  <a  data-parent="#accordion" >
		View Transaction Report
	  </a>
	</h4>
  </div>
<table id="myTable"  class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Bill No.</th>
			<th>Advertiser</th>
			<th>Payment Date</th>
			<th>Paid Amount</th>
			<th>Note</th>
<?php
			if(isset($_SESSION['employeeid']))
			{
?>				
			<th>Action</th>
<?php
			}
?>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql= "SELECT payment.*,advertiser.advertisername FROM payment LEFT JOIN advertiser ON advertiser.advertiserid=payment.advertiserid WHERE payment.paymenttype='WebAds' ";
	if(isset($_SESSION['advertiserid']))
	{
		$sql = $sql . " AND payment.advertiserid='$_SESSION[advertiserid]'";
	}
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[paymentid]</td>
			<td>$rs[advertisername]</td>
			<td> " . date("d-M-Y",strtotime($rs['paymentdate'])) . "</td>
			<td><b>Paid:</b> ₹$rs[paidamt]<br><b>CGST:</b> ₹$rs[cgst](5%)<br><b>SGST:</b> ₹$rs[sgst](5%)<br>";
			$total = $rs['paidamt'] + $rs['cgst'] + $rs['sgst'];
		echo "<label style='color:green;'><b>Total -</b> ₹" . $total . "</label>";
		echo "</td>
			<td>$rs[note]</td>";
			if(isset($_SESSION['employeeid']))
			{
		echo "<td><a href='viewpayment.php?delid=$rs[0]' onclick='return confirmdelete()' class='btn btn-danger'>Delete</a></td>";
			}
		echo "</tr>";
	}
	?> 
	</tbody>
</table>		
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
 $(document).ready( function () {
    $('#myTable').DataTable();
} );
 </script>
 <script>
 function confirmdelete()
 {
	 if(confirm('Are you sure want to delete this record?') == true)
	 {
		 return true;
	 }
	 else
	 {
		 return false;
	 }
 }
 </script>