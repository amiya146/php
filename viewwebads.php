<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql="DELETE FROM webads WHERE webadid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('webads record deleted successfully...');</script>";
		echo "<script>window.location='viewwebads.php';</script>";
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
if(isset($_SESSION["advertiserid"]))
{
include("sidebar.php");
?>	
			
              <div class="col-md-8">
<?php
}
else
{
?>
<div class="col-md-12">
<?php
}
?>
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">

<!--  Billing Details -->
<div class="panel panel-default aa-checkout-billaddress">
  <div class="panel-heading">
	<h4 class="panel-title">
	  <a  data-parent="#accordion" >
		View Web Advertisement Report
	  </a>
	</h4>
  </div>
  <div id="collapseThree">
	<div class="panel-body">
<table id="myTable"  class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Image</th>
			<?php
			if(isset($_SESSION["employeeid"]))
			{
				echo "<th>Advertiser</th>";
			}
			?>			
			<th>Advertiser Title</th>
			<th>Type</th>
			<th>Status</th>
			<th>Action</th
		</tr>
	</thead>
	<tbody>
	<?php
	$sql= "SELECT webads.*,advertiser.advertisername FROM webads LEFT JOIN advertiser ON webads.advertiserid=advertiser.advertiserid WHERE webads.webadid!='0' ";
	if(isset($_SESSION['advertiserid']))
	{
		$sql= $sql . " AND webads.advertiserid='$_SESSION[advertiserid]'";
	}
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		if($rs['advtimg'] == "")
		{
			$imgname  = "img/noimage.jpg";
		}
		else if(file_exists("imgwebads/$rs[advtimg]"))
		{
			$imgname = "imgwebads/$rs[advtimg]";
		}
		else
		{
			$imgname  = "img/noimage.jpg";
		}
		echo "<tr>
		<td><img src='$imgname' width='75' height='50' ></td>";
		if(isset($_SESSION["employeeid"]))
		{
			echo "<td>$rs[advertisername]</td>";
		}
		echo "<td><b>$rs[advttitle]</b></td>
			<td>$rs[advttype] <br> <b>CPC</b> - ₹$rs[cpc] </td>
			<td>$rs[status]</td>
			<td><a href='webads.php?editid=$rs[0]' class='btn  btn-info' style='width: 70px;' >Edit</a> <br> <a href='viewwebads.php?delid=$rs[0]' onclick='return confirmdelete()' style='width: 70px;' class='btn btn-danger'>Delete</a></td>
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