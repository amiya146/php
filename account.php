<?php
include("header.php");
?>
 
  <!--  catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="images/account.jpg">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Advertiser Account</h2>
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
          <form action="">
            <div class="row">
              <div class="col-md-12">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
				  
                    <!--  Coupon section -->
                    <div class="panel panel-default aa-checkout-coupon">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                           WEB ADS
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <?php
                                  echo "Number of Web ads - ";
                                  $sql = "SELECT * FROM webads WHERE advertiserid='$_SESSION[advertiserid]'";
                                  $qsql = mysqli_query($con,$sql);
                                  echo mysqli_num_rows($qsql);
                                ?>
                              </div>                             
                            </div>
                          </div>                                    
                        </div>
                      </div>
                    </div>
                   
				   <!--  Login section -->
      
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