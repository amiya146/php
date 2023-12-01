<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql="DELETE FROM advertiser WHERE advertiserid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('advertiser record deleted successfully...');</script>";
		echo "<script>window.location='viewadvertiser.php';</script>";
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
			
	
			
              <div class="col-md-12">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">

<!--  Billing Details -->
<div class="panel panel-default aa-checkout-billaddress">
  <div class="panel-heading">
	<h4 class="panel-title">
	  <a  data-parent="#accordion" >
		View Advertiser
	  </a>
	</h4>
  </div>
  <div id="collapseThree">
	<div class="panel-body">
<table id="myTable"  class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Advertiser Name</th>
			<th>Email ID</th>
			<th>Address</th>
			<th>City</th>
			<th>Pincode</th>
			<th>Contact No</th>
			<th>Note</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql= "SELECT * FROM advertiser";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[advertisername]</td>
			<td>$rs[emailid]</td>
			<td>$rs[address]</td>
			<td>$rs[city]</td>
			<td>$rs[pincode]</td>
			<td>$rs[contactno]</td>
			<td>$rs[note]</td>
			<td>$rs[status]</td>
			<td>
			<a href='advertiser.php?editid=$rs[0]' class='btn  btn-info' style='width: 100%;' >Edit</a> 
			<a href='viewadvertiser.php?delid=$rs[0]' onclick='return confirmdelete()' class='btn btn-danger' style='width: 100%;'>Delete</a></td>
		</tr>";
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