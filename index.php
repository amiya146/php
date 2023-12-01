<?php
include("header.php");
?>
  <!--  Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!--  single slide item -->

            <?php
	$sql= "SELECT newscontent.*,newscategory.category FROM newscontent LEFT JOIN newscategory ON newscontent.newscategoryid=newscategory.newscategoryid WHERE newscontent.status='Active' ";	
	if($_GET['newstype'] != "")
	{
		$sql = $sql . " AND newscontent.newstype='$_GET[newstype]'";
	}	
	if($_GET['newscategoryid'] != "")
	{
		$sql = $sql . " AND newscontent.newscategoryid='$_GET[newscategoryid]'";
	}
	if($_GET['txtsearch'] != "")
	{
		$sql = $sql . " AND newscontent.title";
	}
  $sql = $sql . "  ORDER BY  newscontent.newsid DESC LIMIT 9";
	$qsql = mysqli_query($con,$sql);
  $i=0;
	while($rs = mysqli_fetch_array($qsql))
	{
		if($rs['images'] != "")
		{
			if(file_exists("imgarticle/".$rs['images']))
			{
				$img = "imgarticle/".$rs['images'];
			}
		}
		else
		{
				$img = "img/testimonial-bg-1.jpg";
		}
  ?>
            <li>
              <div class="seq-model">
                <img data-seq src="<?php echo $img; ?>" alt="Men slide img" />
              </div>
              <div class="seq-title">
               <span data-seq><?php echo $rs['category']; ?></span>                
               <a href="newsdetailed.php?newsid=<?php echo $rs['newsid']; ?>&newstype=<?php echo  $rs['newstype']; ?>&newscategoryid=<?php echo $rs['newscategoryid']; ?>"><h2 data-seq><?php echo $rs['title']; ?></h2></a>               
              </div>
            </li>
<?php
  }
?>                 
          </ul>
        </div>
        <!--  slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!--  / slider -->
  
  
  <!--  Latest Blog -->
  <section id="aa-latest-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-latest-blog-area">
<hr>

            <h2>Latest News</h2>
            <div class="row">
			
	<?php
	$sql= "SELECT newscontent.*,newscategory.category FROM newscontent LEFT JOIN newscategory ON newscontent.newscategoryid=newscategory.newscategoryid WHERE newscontent.status='Active' ";	
	$sql = $sql . " AND newscontent.newstype='News'";
	$sql = $sql . " ORDER BY newscontent.newsid desc limit 0,3";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	while($rs = mysqli_fetch_array($qsql))
	{
		if($rs['images'] != "")
		{
			if(file_exists("imgarticle/".$rs['images']))
			{
				$img = "imgarticle/".$rs['images'];
			}
		}
		else
		{
				$img = "img/testimonial-bg-1.jpg";
		}
		?>

              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="<?php echo $img; ?>" alt="img" style="width: 100%;"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i><?php echo $rs['category']; ?></span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><?php echo $rs['title']; ?></h3>
                    <p><?php echo substr($rs["newsdescription"], 0, 100); ?></p> 
                    <a href="newsdetailed.php?newsid=<?php echo $rs[0]; ?>&newstype=<?php echo $rs['newstype']; ?>&newscategoryid=<?php echo $rs[1]; ?>" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
			  
	<?php
	}
	?>
             
             
            </div>
          </div>
        </div>    
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="aa-latest-blog-area">
<hr>

            <h2>Latest Articles</h2>
            <div class="row">
			
	<?php
	$sql= "SELECT newscontent.*,newscategory.category FROM newscontent LEFT JOIN newscategory ON newscontent.newscategoryid=newscategory.newscategoryid WHERE newscontent.status='Active' ";	
	$sql = $sql . " AND newscontent.newstype='article'";
	$sql = $sql . " ORDER BY newscontent.newsid desc limit 0,6";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	while($rs = mysqli_fetch_array($qsql))
	{
		if($rs['images'] != "")
		{
			if(file_exists("imgarticle/".$rs['images']))
			{
				$img = "imgarticle/".$rs['images'];
			}
		}
		else
		{
				$img = "img/testimonial-bg-1.jpg";
		}
		?>
              <!--  single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="<?php echo $img; ?>" alt="img" style="width: 100%;"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i><?php echo $rs['category']; ?></span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><?php echo $rs['title']; ?></h3>
                    <p><?php echo substr($rs["newsdescription"], 0, 100); ?></p> 
                    <a href="newsdetailed.php?newsid=<?php echo $rs[0]; ?>&newstype=<?php echo $rs['newstype']; ?>&newscategoryid=<?php echo $rs[1]; ?>" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
			  
	<?php
	}
	?>
             
             
            </div>
          </div>
        </div>    
      </div>
    </div>
  </section>
  <!--  / Latest Blog -->


<?php
include("footer.php");
?>