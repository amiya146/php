<?php
include("header.php");
//author email comment
if(isset($_POST['submit']))
{
  $dttim = date("Y-m-d H:i:s");
  $sqlins = "INSERT INTO comment(`newsid`, `comment_type`, `name`, `email`, `comment_dttim`, `comment_status`,comment_message) VALUES('$_GET[newsid]','Comment','$_POST[author]','$_POST[email]','$dttim','Active','"  . mysqli_real_escape_string($con,$_POST['comment'])  . "')";
  $qsql = mysqli_query($con,$sqlins);
  if(mysqli_affected_rows($con))
  {
    echo "<script>alert('Comment published successfully...');</script>";
    echo "<script>window.location='newsdetailed.php?newsid=" . $_GET['newsid'] . "&newstype=" . $_GET['newstype'] . "&newscategoryid=" . $_GET['newscategoryid'] . "';</script>";
  }
}
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
$sql= "SELECT newscontent.*,newscategory.category FROM newscontent LEFT JOIN newscategory ON newscontent.newscategoryid=newscategory.newscategoryid WHERE newscontent.status='Active' ";	
if($_GET['newstype'] != "")
{
	$sql = $sql . " AND newscontent.newstype='$_GET[newstype]'";
}	
if($_GET['newscategoryid'] != "")
{
	$sql = $sql . " AND newscontent.newscategoryid='$_GET[newscategoryid]'";
}
	$sql = $sql . " AND newscontent.newsid='$_GET[newsid]'";
$qsql = mysqli_query($con,$sql);
$rs = mysqli_fetch_array($qsql);
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
  
 
  <!--  catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php echo $_GET['newstype']; ?></h2>
        <ol class="breadcrumb">
          <li><a href="#"><?php echo $rsarticle['category']; ?></a></li>
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
                <!--  Blog details -->
                <div class="aa-blog-content aa-blog-details">
                  
                
                  <article class="aa-blog-content-single">                        
                    <h2><a href="#"><?php echo $rs['title']; ?></a></h2>
                     <div class="aa-article-bottom">
                      <div class="aa-post-author">
                        Category <a href="#"><?php   echo  $_GET['newstype']; ?></a>  | 
                      </div>
                      <div class="aa-post-date">
                        Published on <?php echo date("d-M-Y", strtotime($rs['newsdate'])); ?>
                      </div>
                    </div>
                    <figure class="aa-blog-img">
                      <a href="#"><img src="<?php echo $img; ?>" style="width: 100%;"></a>
                    </figure>
                    <p>
						<?php echo $rs['newsdescription']; ?>
					
<?php include("socialshare.php"); ?>
					</p>  
                  </article>
                  <!--  Blog Comment threats -->
                  <div id="respond">
                    <h3 class="reply-title">Leave a Comment</h3><hr>
                    <form id="commentform" method="post" action="">
                      <p class="comment-form-author">
                        <label for="author">Name <span class="required">*</span></label>
                        <input type="text" name="author" value="" size="30" required="required">
                      </p>
                      <p class="comment-form-email">
                        <label for="email">Email <span class="required">*</span></label>
                        <input type="email" name="email" value="" aria-required="true" required="required">
                      </p>
                      <p class="comment-form-comment">
                        <label for="comment">Comment</label>
                        <textarea name="comment" cols="45" rows="8" aria-required="true" required="required"></textarea>
                      </p>
                      <p class="form-submit">
                        <input type="submit" name="submit" id="submit" class="aa-browse-btn" value="Post Comment">
                      </p>        
                    </form>
                  </div>
<?php
$sqlcomment = "SELECT * FROM comment where newsid='" . $_GET['newsid'] . "' and comment_status='Active' ORDER BY comment_id DESC";
$qsqlcomment = mysqli_query($con,$sqlcomment);
echo mysqli_error($con);
?>
                                  <!--  Blog Comment threats -->
                                  <div class="aa-blog-comment-threat">
                    <h3>Comments (<?php echo mysqli_num_rows($qsqlcomment); ?>)</h3>
                    <div class="comments">
                      <ul class="commentlist">
<?php
while($rscomment = mysqli_fetch_array($qsqlcomment))
{
?>                        
                        <li>
                          <div class="media">
                            <div class="media-body">
                             <h4 class="author-name"><?php echo $rscomment['name']; ?> </h4>
                             <span class="comments-date"> <?php echo date("d-m-Y h:i A",strtotime($rscomment['comment_dttim'])); ?></span>
                             <p><?php echo $rscomment['comment_message']; ?></p>
                            </div>
                          </div>
                        </li>
<?php
}
?>
                        </ul>
                      </ul>
                    </div>
                  </div>
                  <!--  blog comments form -->
                  
				        </div>          

              </div>

              <!--  blog sidebar -->
              <div class="col-md-3">
					<?php
					include("sidebarads.php");
					?>			  
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