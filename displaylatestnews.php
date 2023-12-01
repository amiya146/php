<?php
include("header.php");
	$sqlarticle= "SELECT newscontent.*,newscategory.category FROM newscontent LEFT JOIN newscategory ON newscontent.newscategoryid=newscategory.newscategoryid WHERE newscontent.status='Active' ";	
	if($_GET['newstype'] != "")
	{
		$sqlarticle = $sqlarticle . " AND newscontent.newstype='$_GET[newstype]'";
	}	
	if($_GET['newscategoryid'] != "")
	{
		$sqlarticle = $sqlarticle . " AND newscontent.newscategoryid='$_GET[newscategoryid]'";
	}
	$qsqlarticle = mysqli_query($con,$sqlarticle);
	$rsarticle = mysqli_fetch_array($qsqlarticle);
?>
    <!--  catg header banner section -->
    <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <p style="background-image:url('bitl.jpg');">
        <h2>Latest News and Articles</h2>
      </div>
     </div>
   </div>
  </section>
  <!--  / catg header banner section -->
  <!--  Blog Archive -->
  <section id="aa-blog-archive">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-blog-archive-area">
            <div class="row">
              <div class="col-md-9">
                <div class="aa-blog-content">
                  
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
    if($i == 0)
    {
	?>
  <div class="row">
    <?php
    }
    ?>
                    <div class="col-md-4 col-sm-4">
                      <article class="aa-blog-content-single">    	
                        <figure class="aa-blog-img">
                          <a href="newsdetailed.php?newsid=<?php echo $rs['newsid']; ?>&newstype=<?php   echo  $rs['newstype']; ?>&newscategoryid=<?php echo $rs['newscategoryid']; ?>"><img src="<?php echo $img; ?>" style="heighT: 200px;width: 100%;" ></a>
                        </figure>
						                    
                        <h4><a href="newsdetailed.php?newsid=<?php echo $rs['newsid']; ?>&newstype=<?php echo  $rs['newstype']; ?>&newscategoryid=<?php echo $rs['newscategoryid']; ?>"><?php echo $rs['title']; ?></a></h4>
                        <p><?php echo substr($rs["newsdescription"], 0, 100); ?></p>
                        <div class="aa-article-bottom">
                          <div class="aa-post-author">
                            Category -<a href="#"><?php echo $rs['category']; ?></a> 
                          </div>
                          <div class="aa-post-date">
                          <a href="newsdetailed.php?newsid=<?php echo $rs['newsid']; ?>&newstype=<?php   echo  $rs['newstype']; ?>&newscategoryid=<?php echo $rs['newscategoryid']; ?>">Read more>></a>
                          </div>
                        </div>
                      </article>
                    </div>
    <?php
    if($i == 2)
    {
    ?>                
      </div>
  <?php
  $i =0;
    }
    else
    {
      $i++;
    }
  ?>
	<?php
	}
	?>	
				
                </div>
                <!--  Blog Pagination -->

              </div>
              <div class="col-md-3"><?php
					include("sidebarads.php");
					?></div>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  / Blog Archive -->



  <?php
  include("footer.php");
  ?>
  