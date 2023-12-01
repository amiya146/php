  <!--  footer -->  
  <footer id="aa-footer">
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <span style="color: white;">Copyright @ <?php echo date('Y'); ?> Online News Portal
			</span>
            <div class="aa-footer-payment">
			<?php
			if(!isset($_SESSION["employeeid"]))
			{
				if(!isset($_SESSION["advertiserid"]))
				{
			?>
			<span><a style="color: white;" href="" data-toggle="modal" data-target="#login-modal">Advertiser Login</a></span> 
      <span style="color: white;">|</span> 
      <span><a  style="color: white;" href="" data-toggle="modal" data-target="#adminlogin-modal">Employee Login Panel</a></span>
			<?php
				}
			}
			?>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!--  / footer -->

  <!--  Customer Login Modal starts here -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Advertiser Login Control</h4>
          <form class="aa-login-form" method="post" action="" name="frmlogin" onsubmit="return validateloginform()">
            <label for="">Email address<span>*</span><span class="errmsg" id="idadvtemailid"></span></label>
            <input type="text" name="advtemailid" placeholder="Username or email">
            <label for="">Password<span>*</span><span class="errmsg" id="idadvtpassword"></span></label>
            <input type="password" name="advtpassword" placeholder="Password">
            <button class="aa-browse-btn" name="advtsubmit" type="submit">Login</button>
			<p class="aa-lost-password">&nbsp;</p>
            <div class="aa-register-now">
              &nbsp;
            </div>
          </form>
        </div>                        
      </div><!--  /.modal-content -->
    </div><!--  /.modal-dialog -->
  </div>    
  <!--  Customer Login Modal ends here-->  
  
    <!--  Employee Login Modal starts here -->  
  <div class="modal fade" id="adminlogin-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Employee Login Panel</h4><hr>
          <form class="aa-login-form" method="post" action="">
            <label for="">Username or Email address<span>*</span><span id="idemploginid" class="errmsg"></span></label>
            <input type="text" name="emploginid" placeholder="Login ID">
            <label for="">Password<span>*</span><span id="idemppassword" class="errmsg"></span></label>
            <input type="password" name="emppassword" placeholder="Password">
            <button class="aa-browse-btn" name="empsubmit" type="submit">Login</button>
           <br>  <br>  <br>  <br>
          </form>
        </div>                        
      </div><!--  /.modal-content -->
    </div><!--  /.modal-dialog -->
  </div>   
  <!--  Employee Login Modal ends here-->  

  <!--  jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!--  Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>  
  <!--  SmartMenus jQuery plugin -->
  <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
  <!--  SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>  
  <!--  To Slider JS -->
  <script src="js/sequence.js"></script>
  <script src="js/sequence-theme.modern-slide-in.js"></script>  
  <!--  Product view slider -->
  <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
  <!--  slick slider -->
  <script type="text/javascript" src="js/slick.js"></script>
  <!--  Price picker slider -->
  <script type="text/javascript" src="js/nouislider.js"></script>
  <!--  Custom js -->
  <script src="js/custom.js"></script> 

  <script src="js/jquery.dataTables.min.js"></script> 
  
  <script>
  function validateloginform()
  {
	  $('.errmsg').html('');
	 var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	 var checkcondition = "true";
	  
	  if(document.frmlogin.advtemailid.value=="")
	  {
		 document.getElementById("idadvtemailid").innerHTML = "Email ID should not be empty..";
		 checkcondition = "false";
	  }
	  
	
	  if(document.frmlogin.advtpassword.value=="")
	  {
		 document.getElementById("idadvtpassword").innerHTML = "Password should not be empty..";
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
  
  </body>
</html>