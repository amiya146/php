<?php
include("header.php");
?>

  <!--  catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Blog Archive</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>         
          <li class="active">Blog Archive</li>
        </ol>
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
                  <div class="row">
	<?php
	$sql= "SELECT webads.*,advertiser.advertiserid FROM webads LEFT JOIN advertiser ON webads.webadid=advertiser.advertiserid WHERE webads.status='Active' ";	
	if($_GET['advttitle'] != "")
	{
		$sql = $sql . " AND webads.advttitle='$_GET[advttitle]'";
	}	
	if($_GET['advertiserid'] != "")
	{
		$sql = $sql . " AND webads.webadid='$_GET[advertiserid]'";
	}
	$qsql = mysqli_query($con,$sql);
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
                      <article class="aa-blog-content-single">    	
                        <figure class="aa-blog-img">
                          <a href="#"><img src="<?php echo $img; ?>" ></a>
                        </figure>
						                    
                        <h4><a href="#"><?php echo $rs['title']; ?></a></h4>
                        <p><?php echo substr($rs["newsdescription"], 0, 100); ?></p>
                        <div class="aa-article-bottom">
                          <div class="aa-post-author">
                            Category -<a href="#"><?php echo $rs['category']; ?></a> 
                          </div>
                          <div class="aa-post-date">
                            Read more>>
                          </div>
                        </div>
                      </article>
                    </div>
	<?php
	}
	?>	
				
                  </div>
                </div>
                <!--  Blog Pagination -->

              </div>
              <div class="col-md-3">
                <aside class="aa-blog-sidebar">
                  <div class="aa-sidebar-widget">
                    <h3>Category</h3>
                    <ul class="aa-catg-nav">
                      <li><a href="#">Men</a></li>
                      <li><a href="">Women</a></li>
                      <li><a href="">Kids</a></li>
                      <li><a href="">Electornics</a></li>
                      <li><a href="">Sports</a></li>
                    </ul>
                  </div>
                  <div class="aa-sidebar-widget">
                    <h3>Tags</h3>
                    <div class="tag-cloud">
                      <a href="#">Fashion</a>
                      <a href="#">Ecommerce</a>
                      <a href="#">Shop</a>
                      <a href="#">Hand Bag</a>
                      <a href="#">Laptop</a>
                      <a href="#">Head Phone</a>
                      <a href="#">Pen Drive</a>
                    </div>
                  </div>
                  <div class="aa-sidebar-widget">
                    <h3>Recent Post</h3>
                    <div class="aa-recently-views">
                      <ul>
                        <li>
                          <a class="aa-cartbox-img" href="#"><img src="img/woman-small-2.jpg" alt="img"></a>
                          <div class="aa-cartbox-info">
                            <h4><a href="#">Lorem ipsum dolor sit amet.</a></h4>
                            <p>March 26th 2016</p>
                          </div>                    
                        </li>
                        <li>
                          <a class="aa-cartbox-img" href="#"><img src="img/woman-small-1.jpg" alt="img"></a>
                          <div class="aa-cartbox-info">
                            <h4><a href="#">Lorem ipsum dolor.</a></h4>
                            <p>March 26th 2016</p>
                          </div>                    
                        </li>
                         <li>
                          <a class="aa-cartbox-img" href="#"><img src="img/woman-small-2.jpg" alt="img"></a>
                          <div class="aa-cartbox-info">
                            <h4><a href="#">Lorem ipsum dolor.</a></h4>
                            <p>March 26th 2016</p>
                          </div>                    
                        </li>                                      
                      </ul>
                    </div>                            
                  </div>
                </aside>
              </div>
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
  