
                <aside class="aa-blog-sidebar">

                  <div class="aa-sidebar-widget">
                    <h3>Advertisement</h3>
            <div class="row">
              <div class="col-md-12">
                <div class="aa-blog-content">
                  <div class="row">
	<?php
	$sqlwebads= "SELECT webads.*,advertiser.advertisername FROM webads LEFT JOIN advertiser ON webads.advertiserid=advertiser.advertiserid WHERE webads.status='Active' ORDER BY webads.cpc desc ";
	$qsqlwebads = mysqli_query($con,$sqlwebads);
	echo mysqli_error($con);
	while($rswebads = mysqli_fetch_array($qsqlwebads))
	{
		if($rswebads[3] == "")
		{
			$imgname  = "img/noimage.jpg";
		}
		else if(file_exists("imgwebads/$rswebads[3]"))
		{
			$imgname = "imgwebads/$rswebads[3]";
		}
		else
		
		{
			$imgname  = "img/noimage.jpg";
		}
		//#################################################
			$sql= "SELECT sum(payment.paidamt) FROM payment LEFT JOIN advertiser ON advertiser.advertiserid=payment.advertiserid WHERE payment.paymenttype='WebAds'   ";
			$sql = $sql . " AND payment.advertiserid='$rswebads[advertiserid]'";
			$qsql = mysqli_query($con,$sql);
			$rs = mysqli_fetch_array($qsql);
			$totamt = $rs[0];
		//#################################################
			$sql= "SELECT ifnull(sum(payment.paidamt),0) FROM payment LEFT JOIN advertiser ON advertiser.advertiserid=payment.advertiserid WHERE (payment.paymenttype='Banner Ads' OR  payment.paymenttype='Text Ads') ";
			$sql = $sql . " AND payment.advertiserid='$rswebads[advertiserid]'";
			$qsql = mysqli_query($con,$sql);
			$rs = mysqli_fetch_array($qsql);
			$spentamt = $rs[0];
		//#################################################
			$balamt = $totamt - $spentamt;
		//#################################################
		   if($balamt > 0 )
		   {
			   if($rswebads['advttype'] == "Banner Ads")
			   {
			   ?>
			   <div class="col-md-12 col-sm-12 table table-bordered">
				  <article class="aa-blog-content-single">  
										
					<h4><a href="linkadvertisement.php?webadid=<?php echo $rswebads['webadid']; ?>" target="_blank"><?php echo $rswebads['advttitle']; ?></a></h4>
					
					<figure class="aa-blog-img">
					  <a href="linkadvertisement.php?webadid=<?php echo $rswebads['webadid']; ?>" target="_blank"><img src="<?php echo $imgname; ?>" ></a>
					</figure>
					
				  </article>
				</div>
				<?php
				  }
			   if($rswebads['advttype'] == "Text Ads")
			   {
			   ?>
				<div class="col-md-12 col-sm-12 table table-bordered">
				  <article class="aa-blog-content-single">       
					<h4><a href="linkadvertisement.php?webadid=<?php echo $rswebads['webadid']; ?>" target="_blank"><?php echo $rswebads['advttitle']; ?></a></h4>
					<p><?php echo substr($rswebads["advtdescription"], 0, 100); ?></p>
				  </article>
				</div>
				<?php
				}
			}
	}
	?>	
				
                  </div>
                </div>
                <!--  Blog Pagination -->

              </div>
            </div>                            
                  </div>
                </aside>
              