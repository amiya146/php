<?php
include("header.php");
?><script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
<?php
if(isset($_POST['submit']))
{
	//Upload image starts
	$filename= rand(). $_FILES['images']['name'];
	move_uploaded_file($_FILES['images']['tmp_name'],"imgarticle/".$filename);
	//Upload image ends
	$newsdescription = mysqli_real_escape_string($con,$_POST['newsdescription']);
	$title = mysqli_real_escape_string($con,$_POST['title']);
	
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE newscontent SET newscategoryid='$_POST[newscategoryid]',title='$title',newsdescription='$newsdescription'";
		if($_FILES['images']['name'] != "")
		{
		$sql = $sql .",images='$filename'";
		}
		$sql = $sql . ",publisheddate='$_POST[publisheddate]',status='$_POST[status]' WHERE newsid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1)
		{
			echo "<script>alert('$_GET[type] record updated successfully..');</script>";
		}
		//Update statement ends here
	}
	else
	{
		$sql = "INSERT INTO newscontent(newscategoryid,newstype,newsdate,title,newsdescription,images,publisheddate,status) VALUES('$_POST[newscategoryid]','$_GET[type]','$dt','$title','$newsdescription','$filename','$_POST[publisheddate]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1)
		{
			echo "<script>alert('$_GET[type] published  successfully..');</script>";
			//echo "<script>window.location='viewnews.php';</script>";
		}
	}
}
//2  - Selecting the record starts here..
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM  newscontent WHERE newsid='$_GET[editid]'";
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
          <form action="" method="post" name="frmform" onsubmit="return validateform()" enctype="multipart/form-data">
            <div class="row">
			
<?php
include("sidebar.php");
?>		
			
              <div class="col-md-12">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">

<!--  Billing Details -->
<div class="panel panel-default aa-checkout-billaddress">
  <div class="panel-heading">
	<h4 class="panel-title">
	  <a  data-parent="#accordion" >
		Publish / Update <?php echo $_GET['type']; ?>
	  </a>
	</h4>
  </div>
  <div id="collapseThree">
	<div class="panel-body">
	 
	 

	   
	   <div class="row">
		<div class="col-md-8">
		  <div class="aa-checkout-single-bill">
		  <?php echo $_GET['type']; ?> Title:<span id="idtitle" class="errmsg"></span>
			<input type="text" name="title" value="<?php echo $rsedit['title']; ?>" placeholder="Title">
		  </div>                             
		</div>
		<div class="col-md-4">
		  <div class="aa-checkout-single-bill">
		  <?php echo $_GET['type']; ?> Category: <span id="idnewscategoryid" class="errmsg"></span>
			<select name="newscategoryid" >
				<option value=''>Select Category</option>
				<?php
				$sqlnewscategory  = "SELECT * FROM newscategory WHERE status='Active' AND category_type='$_GET[type]'";
				$qsqlnewscategory = mysqli_query($con,$sqlnewscategory);
				while($rsnewscategory = mysqli_fetch_array($qsqlnewscategory))
				{
					if($rsedit['newscategoryid'] == $rsnewscategory['newscategoryid'])
					{
					echo "<option value='$rsnewscategory[newscategoryid]' selected>" . strtoupper($rsnewscategory['category']) . "</option>";
					}
					else
					{
					echo "<option value='$rsnewscategory[newscategoryid]'>" . strtoupper($rsnewscategory['category']) . "</option>";
					}
				}
				?>
			</select>
		  </div>                             
		</div>
	  </div>
	  
	  

	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			<?php echo $_GET['type']; ?> Description:<span id="idnewsdescription" class="errmsg"></span>
			<textarea name="newsdescription" placeholder=" Enter News Content here"  id="editor"><?php echo $rsedit['newsdescription']; ?></textarea>
		  </div>                             
		</div>
	  </div>
	  <div class="row">
		<div class="col-md-4">
		  <div class="aa-checkout-single-bill">
			Images:<span id="idimages" class="errmsg"></span>
			<input type="file" name="images">
<?php
if(isset($_GET['editid']))
{
	echo "<a href='imgarticle/" . $rsedit['newsdescription'] . "' download>Download</a>";
}
?>			
		  </div>                             
		</div>
		<div class="col-md-4">
		  <div class="aa-checkout-single-bill">
			Publish Date:
			<input type="date" name="publisheddate" value="<?php
			if(isset($_GET['editid']))
			{
				echo $rsedit['newsdate'];
			}
			else
			{
				echo date("Y-m-d"); 
			}
			?>" 
			
			<?php
			if(isset($_GET['editid']))
			{
			?>
			<?php
			}
			else
			{
			?>
			 min="<?php echo date("Y-m-d"); ?>" 
			<?php
			}
			?>

			placeholder="Published Date" >
		  </div>                             
		</div>
		<div class="col-md-4">
		  <div class="aa-checkout-single-bill">
		  Status <span id="idstatus" class="errmsg"></span>
			<select placeholder="Status" name="status">
			  <option value="">Select Status</option>
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
		  <hr>
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill col-md-12">
			<input type="submit" name="submit" value="Publish" class="aa-browse-btn">
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
CKEDITOR.replace('editor', {
  skin: 'moono',
  enterMode: CKEDITOR.ENTER_BR,
  shiftEnterMode:CKEDITOR.ENTER_P,
  toolbar: [{ name: 'basicstyles', groups: [ 'basicstyles' ], items: [ 'Bold', 'Italic', 'Underline', "-", 'TextColor', 'BGColor' ] },
             { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
             { name: 'scripts', items: [ 'Subscript', 'Superscript' ] },
             { name: 'justify', groups: [ 'blocks', 'align' ], items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
             { name: 'paragraph', groups: [ 'list', 'indent' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },
             { name: 'links', items: [ 'Link', 'Unlink' ] },
             { name: 'insert', items: [ 'Image'] },
             { name: 'spell', items: [ 'jQuerySpellChecker' ] },
             { name: 'table', items: [ 'Table' ] }
             ],
});

</script>
 <script>
 function validateform()
 { 
 $('.errmsg').html('');
    var checkcondition = "true";
	
	 if(document.frmform.newstype.value=="")
	 {
		 document.getElementById("idnewstype").innerHTML = " Kindly select newscontent type....";
		 checkcondition = "false";
	 }
	 if(document.frmform.newscategoryid.value=="")
	 {
		 document.getElementById("idnewscategoryid").innerHTML = " Kindly select newscontent Category..";
		 checkcondition = "false";
	 }
	 if(document.frmform.title.value=="")
	 {
		 document.getElementById("idtitle").innerHTML = "Title should not be empty..";
		 checkcondition = "false";
	 }//             status 
	 if(document.frmform.newsdescription.value=="")
	 {
		 document.getElementById("idnewsdescription").innerHTML = "Description should not be empty..";
		 checkcondition = "false";
	 }
	 if(document.frmform.images.value=="")
	 {
		 document.getElementById("idimages").innerHTML = "Kindly upload the image.";
		 checkcondition = "false";
	 }
	 if(document.frmform.status.value=="")
	 {
		 document.getElementById("idstatus").innerHTML = "Kindly select the status...";
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