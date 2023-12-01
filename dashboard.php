<?php
include("header.php");
if(!isset($_SESSION["employeeid"]))
{
	echo "<script>window.location='index.php';</script>";
}
?>

  <!--  Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!--  start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                    <li class="active"><a href="#men" data-toggle="tab">Admin Dashboard</a></li>
                  </ul>
                  <!--  Tab panes -->
                  <div class="tab-content">
                    <!--  Start men product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                        <!--  start single product item -->
                       

						 
						 <li>
                          <figure>
                            <a class="aa-product-img" href="#"><img src="img/advertiser-stock.jpg" alt="polo shirt img" style="width:250px;height:300px;"></a>
                            <a class="aa-add-card-btn" href="viewadvertiser.php">View</a>
                          </figure>                        
                          <div class="aa-product-hvr-content">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Number of records"><?php
                            $sql ="SELECT * FROM advertiser";
                            $qsql=mysqli_query($con,$sql);
                            echo mysqli_num_rows($qsql);
                            ?></span></a>                          
                          </div>
                          <!--  product badge -->
                          <span class="aa-badge aa-sale" href="#">Advertiser!</span>
                        </li>
						
						
            <li>
              <figure>
                <a class="aa-product-img" href="#"><img src="images/news-2389226_1280.webp" alt="polo shirt img" style="width:250px;height:300px;"></a>
                <a class="aa-add-card-btn" href="viewnews.php?type=News">View</a>
              </figure>                        
              <div class="aa-product-hvr-content">
                <a href="#" data-toggle="tooltip" data-placement="top" title="Number of records"><?php
                $sql ="SELECT * FROM newscontent WHERE newstype='News'";
                $qsql=mysqli_query($con,$sql);
                echo mysqli_num_rows($qsql);
                ?></span></a>                          
              </div>
              <!--  product badge -->
              <span class="aa-badge aa-sale" href="#">News!</span>
            </li>
						
            <li>
              <figure>
                <a class="aa-product-img" href="#"><img src="images/article.png" alt="polo shirt img" style="width:250px;height:300px;"></a>
                <a class="aa-add-card-btn" href="viewnews.php?type=Article">View</a>
              </figure>                        
              <div class="aa-product-hvr-content">
                <a href="#" data-toggle="tooltip" data-placement="top" title="Number of records"><?php
                $sql ="SELECT * FROM newscontent WHERE newstype='Article'";
                $qsql=mysqli_query($con,$sql);
                echo mysqli_num_rows($qsql);
                ?></span></a>                          
              </div>
              <!--  product badge -->
              <span class="aa-badge aa-sale" href="#">Articles!</span>
            </li>            
						
						
						<li>
              <figure>
                <a class="aa-product-img" href="#"><img src="img/article category.jpg" alt="polo shirt img" style="width:250px;height:300px;"></a>
                <a class="aa-add-card-btn" href="viewcategory.php?type=News">View</a>
              </figure>                        
              <div class="aa-product-hvr-content">
                <a href="#" data-toggle="tooltip" data-placement="top" title="Number of records"><?php
                  $sql ="SELECT * FROM newscategory";
                  $qsql=mysqli_query($con,$sql);
                  echo mysqli_num_rows($qsql);
                ?></span></a>                          
              </div>
              <!--  product badge -->
              <span class="aa-badge aa-sale" href="#">News Category!</span>
            </li>

            <li>
              <figure>
                <a class="aa-product-img" href="#"><img src="img/article category.jpg" alt="polo shirt img" style="width:250px;height:300px;"></a>
                <a class="aa-add-card-btn" href="viewcategory.php?type=Article">View</a>
              </figure>                        
              <div class="aa-product-hvr-content">
                <a href="#" data-toggle="tooltip" data-placement="top" title="Number of records"><?php
                  $sql ="SELECT * FROM newscategory";
                  $qsql=mysqli_query($con,$sql);
                  echo mysqli_num_rows($qsql);
                ?></span></a>                          
              </div>
              <!--  product badge -->
              <span class="aa-badge aa-sale" href="#">Articles Category!</span>
            </li>
						

						<li>
              <figure>
                <a class="aa-product-img" href="#"><img src="img/employee.jpg" alt="polo shirt img" style="width:250px;height:300px;"></a>
                <a class="aa-add-card-btn" href="viewemployee.php">View</a>
              </figure>                        
              <div class="aa-product-hvr-content">
                <a href="#" data-toggle="tooltip" data-placement="top" title="Number of records"><?php
                $sql ="SELECT * FROM employee";
                $qsql=mysqli_query($con,$sql);
                echo mysqli_num_rows($qsql);
                ?></span></a>                          
              </div>
              <!--  product badge -->
              <span class="aa-badge aa-sale" href="#">Employee!</span>
            </li>
						
						<li>
                          <figure>
                            <a class="aa-product-img" href="#"><img src="img/payment.jpg" alt="polo shirt img" style="width:250px;height:300px;"></a>
                            <a class="aa-add-card-btn" href="viewpayment.php">View</a>
                          </figure>                        
                          <div class="aa-product-hvr-content">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Number of records"><?php
							$sql ="SELECT * FROM payment";
							$qsql=mysqli_query($con,$sql);
							echo mysqli_num_rows($qsql);
							?></span></a>                          
                          </div>
                          <!--  product badge -->
                          <span class="aa-badge aa-sale" href="#">Payment!</span>
                        </li>
						
						
						<li>
                          <figure>
                            <a class="aa-product-img" href="#"><img src="img/tax.jpg" alt="polo shirt img" style="width:250px;height:300px;"></a>
                            <a class="aa-add-card-btn" href="viewtax.php">View</a>
                          </figure>                        
                          <div class="aa-product-hvr-content">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Number of records"><?php
							$sql ="SELECT * FROM tax";
							$qsql=mysqli_query($con,$sql);
							echo mysqli_num_rows($qsql);
							?></span></a>                          
                          </div>
                          <!--  product badge -->
                          <span class="aa-badge aa-sale" href="#">Tax!</span>
                        </li>
						
						
						
						<li>
                          <figure>
                            <a class="aa-product-img" href="#"><img src="img/web.jpg" alt="polo shirt img" style="width:250px;height:300px;"></a>
                            <a class="aa-add-card-btn" href="viewwebads.php">View</a>
                          </figure>                        
                          <div class="aa-product-hvr-content">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Number of records"><?php
							$sql ="SELECT * FROM webads";
							$qsql=mysqli_query($con,$sql);
							echo mysqli_num_rows($qsql);
							?></span></a>                          
                          </div>
						  
						  
                          <!--  product badge -->
                          <span class="aa-badge aa-sale" href="#">Website Ads!</span>
                        </li>
             
                        <!--  start single product item -->
                                        
                      </ul>
                    </div>
                    <!--  / men product category -->
					
                  </div>
                  <!--  quick view modal -->     
				  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  / Products section -->

  
  
<?php
include("footer.php");
?>