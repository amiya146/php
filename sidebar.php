<?php
if(basename($_SERVER['PHP_SELF']) == "webads.php" || basename($_SERVER['PHP_SELF']) == "viewwebads.php" || basename($_SERVER['PHP_SELF']) =="webadspayment.php" || basename($_SERVER['PHP_SELF']) == "viewwebadspaymentreport.php")
{
?>
  <div class="col-md-4">
	<div class="checkout-right">
	  <h4>Web Ads Menu</h4>
	  <div class="aa-payment-method">
		<input type="button" value="Add Web Ads" class="aa-browse-btn" style="width:100%;" onclick="window.location='webads.php'">  <hr>              
		<input type="button" value="View Web Ads" class="aa-browse-btn"  style="width:100%;" onclick="window.location='viewwebads.php'"><hr>                
		<input type="button" value="Make Payment for Web Ads" class="aa-browse-btn"  style="width:100%;" onclick="window.location='webadspayment.php'"><hr>
		<input type="button" value="View Web Ads Payment Report" class="aa-browse-btn"  style="width:100%;" onclick="window.location='viewwebadspaymentreport.php'">
	  </div>
	</div>
  </div>
<?php
}
?>