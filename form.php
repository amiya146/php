<?php
include("header.php");
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
          <form action="">
            <div class="row">
			
<?php
include("sidebar.php");
?>		
			
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">

<!--  Billing Details -->
<div class="panel panel-default aa-checkout-billaddress">
  <div class="panel-heading">
	<h4 class="panel-title">
	  <a  data-parent="#accordion" >
		Advertiser
	  </a>
	</h4>
  </div>
  <div id="collapseThree">
	<div class="panel-body">
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Advertiser Name:
			<input type="text" placeholder="First Name*">
		  </div>                             
		</div>
	  </div> 
	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			Email ID:
			<input type="text" placeholder="First Name*">
		  </div>                             
		</div>
	  </div> 
	  
	  <div class="row">
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			Password:
			<input type="password" placeholder="First Name*">
		  </div>                             
		</div>
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			Confirm Password:
			<input type="password" placeholder="First Name*">
		  </div>                             
		</div>
	  </div>
	  
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">		
			Address:
			<textarea></textarea>
		  </div>                             
		</div>
	  </div> 
	  
	  	  <div class="row">
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			City:
			<input type="text" placeholder="First Name*">
		  </div>                             
		</div>
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			Pin code:
			<input type="text" placeholder="First Name*">
		  </div>                             
		</div>
	  </div>
	  
	  <div class="row">
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			<input type="email" placeholder="Email Address*">
		  </div>                             
		</div>
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			<input type="tel" placeholder="Phone*">
		  </div>
		</div>
	  </div> 
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			<textarea cols="8" rows="3">Address*</textarea>
		  </div>                             
		</div>                            
	  </div>   
	  <div class="row">
		<div class="col-md-12">
		  <div class="aa-checkout-single-bill">
			<select>
			  <option value="0">Select Your Country</option>
			  <option value="1">Australia</option>
			  <option value="2">Afganistan</option>
			  <option value="3">Bangladesh</option>
			  <option value="4">Belgium</option>
			  <option value="5">Brazil</option>
			  <option value="6">Canada</option>
			  <option value="7">China</option>
			  <option value="8">Denmark</option>
			  <option value="9">Egypt</option>
			  <option value="10">India</option>
			  <option value="11">Iran</option>
			  <option value="12">Israel</option>
			  <option value="13">Mexico</option>
			  <option value="14">UAE</option>
			  <option value="15">UK</option>
			  <option value="16">USA</option>
			</select>
		  </div>                             
		</div>                            
	  </div>
	  <div class="row">
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			<input type="text" placeholder="Appartment, Suite etc.">
		  </div>                             
		</div>
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			<input type="text" placeholder="City / Town*">
		  </div>
		</div>
	  </div>   
	  <div class="row">
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			<input type="text" placeholder="District*">
		  </div>                             
		</div>
		<div class="col-md-6">
		  <div class="aa-checkout-single-bill">
			<input type="text" placeholder="Postcode / ZIP*">
		  </div>
		</div>
		<div class="row">
			<div class="col-md-12">
			  <div class="aa-checkout-single-bill">
				<input type="submit" value="Place Order" class="aa-browse-btn">
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