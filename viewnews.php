<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql="DELETE FROM newscontent WHERE newsid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('article record deleted successfully...');</script>";
		echo "<script>window.location='viewnews.php?type=$_GET[type]';</script>";
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
		View <?php echo $_GET['type']; ?> content
	  </a><hr>
	</h4>
  </div>
  <div id="collapseThree">
	<div class="panel-body">
<table id="myTable"  class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Images</th>
			<th>Category & Category</th>
			<th>Title</th>
			<th>Date</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql= "SELECT newscontent.*,newscategory.category FROM newscontent LEFT JOIN newscategory ON newscontent.newscategoryid=newscategory.newscategoryid WHERE newscontent.newstype='$_GET[type]' ";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		if($rs['images'] == "")
		{
			$imgname  = "img/noimage.jpg";
		}
		else if(file_exists("imgarticle/$rs[images]"))
		{
			$imgname = "imgarticle/$rs[images]";
		}
		else
		{
			$imgname  = "img/noimage.jpg";
		}
		echo "<tr>
			<td><img src='$imgname' width='75' height='50' ></td>
			<td>
				<b>Category:</b> $rs[category] 
			<br>
				<b>Content type:</b> $rs[newstype]
			</td>
			<td>$rs[title]</td>
			<td>
			<b>Published&nbsp;on:</b> <br> " . date("d-m-Y",strtotime($rs['publisheddate']))   . "<bR>
			<b>Written:</b>  <br>" . date("d-m-Y",strtotime($rs['newsdate']))   . "
			</td>
			<td>$rs[status]</td>
			<td><a href='news.php?editid=$rs[0]&type=$_GET[type]' class='btn  btn-info' >Edit</a> <br> <a href='viewnews.php?delid=$rs[0]&type=$_GET[type]' onclick='return confirmdelete()' class='btn btn-danger'>Delete</a></td>
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