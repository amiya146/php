<?php
include("header.php");
//2  - Selecting the record starts here..
if(isset($_GET['webadid']))
{
	$sqledit = "SELECT * FROM  webads WHERE webadid='$_GET[webadid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
		if($rsedit['advtimg'] == "")
		{
			$imgname  = "img/noimage.jpg";
		}
		else if(file_exists("imgwebads/$rsedit[advtimg]"))
		{
			$imgname = "imgwebads/$rsedit[advtimg]";
		}
		else
		
		{
			$imgname  = "img/noimage.jpg";
		}
}
// 2 - Select the record ends here..

if(isset($_POST['submit']))
{
	$to = $rsedit['advtemail'];
	$subject = $_POST['subject'];
	$txt =  $txt . "Name - " . $_POST['name'] . "<br>";
	$txt =  $txt . "Email ID - " . $_POST['emailid'] . "<br>";
	$txt =  $txt . "Company - " . $_POST['company'] . "<br>";
	$txt = $txt . "Message - " . $_POST['message'];
	$headers = "From: relicforge@technopulse.online";
	mail($to,$subject,$txt,$headers);
	echo "<script>alert('Mail sent successfully..');</script>";
}
else
{
	$sql = "INSERT INTO payment(advertiserid,paymenttype,paidamt,cgst,sgst,paymentdate,note,status) VALUES('$rsedit[advertiserid]','$rsedit[advttype]','$rsedit[cpc]','0','0','$dt','','Active')";
	$qsql = mysqli_query($con,$sql);
}
?>
 
<!--  start contact section -->
 <section id="aa-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="aa-contact-area">
           <div class="aa-contact-top">
             <h2><?php echo $rsedit['advttitle']; ?></h2>
             <p><?php echo $rsedit['advtdescription']; ?></p>
           </div>
           <!--  contact map -->
           <div class="aa-contact-map">
            <a target="_blank" href="<?php echo $rsedit['advtwww'];?>"><img src="<?php echo $imgname; ?>" style="width: 100%;"></a>
           </div>
           <!--  Contact address -->
           <div class="aa-contact-address">
             <div class="row">
               <div class="col-md-8">
                 <div class="aa-contact-address-left">
                   <form class="comments-form contact-form" action="" method="post">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="Your Name" name="name" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="email" placeholder="Email" name="email" class="form-control">
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="Subject" name="subject" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="Company" name="company" class="form-control">
                        </div>
                      </div>
                    </div>                  
                     
                    <div class="form-group">                        
                      <textarea class="form-control" name="message" rows="3" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" name="submit" class="aa-secondary-btn">Send</button>
                  </form>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="aa-contact-address-right">
                   <address>
                     <h4><?php echo $rsedit['advttitle']; ?></h4>
                     <p><?php echo $rsedit['advtaddress']; ?></p>
                     <p><span class="fa fa-phone"></span>+91-<?php echo $rsedit['contactno']; ?></p>
                     <p><span class="fa fa-home"></span><a target="_blank" href="<?php echo $rsedit['advtwww'];?>"><?php echo $rsedit['advtwww']; ?></a></p>
                     <p><span class="fa fa-envelope"></span>Email: <?php echo $rsedit['advtemail']; ?></p>
                   </address>
		
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

 <?php
 include("footer.php");
 ?>