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
		View Payment
	  </a>
	</h4>
  </div>
  <div id="collapseThree">
	<div class="panel-body">
<table id="myTable"  class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Advertiser</th>
			<th>Payment Date</th>
			<th>Particulars</th>
			<th>Paid Amount</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql= "SELECT payment.*,advertiser.*  FROM payment LEFT JOIN advertiser ON payment.advertiserid=advertiser.advertiserid WHERE payment.status!='' ";
	if(isset($_GET['paidfor']))
	{
		$sql = $sql . " AND payment.paymenttype='$_GET[paidfor]'";
	}
	if(isset($_SESSION['advertiserid']))
	{
		$sql = $sql . " AND payment.advertiserid='" . $_SESSION['advertiserid'] . "' ";
	}
	//echo $sql;
	//paymenttype
	$totcollection = 0;
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	while($rs = mysqli_fetch_array($qsql))
	{
		$totcollection = $totcollection +  $gtotal ;
		$cgst = ($rs['cgst'] * $rs['paidamt'])/100;
		$sgst = ($rs['sgst'] * $rs['paidamt'])/100;
		$gtotal = $rs['paidamt'] + ($cgst + $sgst);
		echo "<tr>
			<td>$rs[advertisername]</td>
			<td>$rs[paymentdate]</td>
			<td>$rs[transaction_type]</td>
			<td>Total  - ₹$rs[paidamt]<br>CGST - ₹$cgst<br>SGST - ₹$sgst <br><b>Grand Total - ₹$gtotal</b></td>
		</tr>";
	}
	?> 
	</tbody>
	<tfoot>
		<tr>
			<th></th>
			<th></th>
			<th>Grand Total</th>
			<th> ₹<?php echo $totcollection; ?></th>
		</tr>
	</tfoot>
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