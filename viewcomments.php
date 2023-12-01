<?php
include("header.php");
if(isset($_GET['comment_status']))
{
	echo $sql="UPDATE comment SET comment_status='$_GET[comment_status]' WHERE comment_id='$_GET[comment_id]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Comment Status updated successfully...');</script>";
		echo "<script>window.location='viewcomments.php';</script>";
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
		View Comments<hr>
	  </a>
	</h4>
  </div>
  <div id="collapseThree">
	<div class="panel-body">
<table id="myTable"  class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Type</th>
			<th>Title</th>
			<th>Author</th>
			<th>Comment</th>
			<th>Date Time</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sqlcomment = "SELECT comment.*,newscontent.title,newscontent.newstype, newscontent.newscategoryid FROM comment LEFT JOIN newscontent on comment.newsid=newscontent.newsid ORDER BY comment.comment_id DESC";
	$qsqlcomment = mysqli_query($con,$sqlcomment);
	echo mysqli_error($con);
	while($rs = mysqli_fetch_array($qsqlcomment))
	{
		echo "<tr>
			<td>$rs[newstype]</td>
			<td><a href='newsdetailed.php?newsid=$rs[newsid]&newstype=$rs[newstype]&newscategoryid=$rs[newscategoryid]' target='_blank' style='color: red;'>$rs[title]</a></td>
			<td>$rs[name] <br>($rs[email])</td>
			<td>$rs[comment_message]</td>
			<td>" . date("d-m-Y h:i A",strtotime($rs['comment_dttim'])) . "</td>
			<td>$rs[comment_status]</td>
			<td>";
		if($rs['comment_status'] == "Active")
		{
			echo "<a href='viewcomments.php?comment_id=$rs[0]&comment_status=Suspended' onclick='return confirmyesno()' class='btn btn-danger'>Suspend</a>";
		}
		if($rs['comment_status'] == "Suspended")
		{
			echo "<a href='viewcomments.php?comment_id=$rs[0]&comment_status=Active' onclick='return confirmyesno()'  class='btn  btn-info' >Accept</a>";

		}
		echo "</td></tr>";
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
 function confirmyesno()
 {
	 if(confirm('Are you sure?') == true)
	 {
		 return true;
	 }
	 else
	 {
		 return false;
	 }
 }
 </script>