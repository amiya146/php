<?php
if(!isset($_SESSION)) { session_start(); }
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
$dt = date("Y-m-d");
include("databaseconnection.php");
$pagename = basename($_SERVER['PHP_SELF']);
if(isset($_POST['advtsubmit']))
{
	$sql="SELECT * FROM advertiser WHERE emailid='$_POST[advtemailid]' AND password='" . md5($_POST['advtpassword']) . "' AND status='Active'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		$rs= mysqli_fetch_array($qsql);
		$_SESSION["advertiserid"] = $rs[0];
		echo "<script>alert('Logged in successfully..');</script>";
		echo "<script>window.location='$pagename';</script>";
	}
	else
	{
		echo "<script>alert('Failed to Login.');</script>";	
	}
}
if(isset($_POST['empsubmit']))
{
    $sql="SELECT * FROM employee WHERE loginid='$_POST[emploginid]' AND password='" . md5($_POST['emppassword']) . "' AND status='Active'";
    $qsql = mysqli_query($con,$sql);
    if(mysqli_affected_rows($con) == 1)
    {
      $rs= mysqli_fetch_array($qsql);
      $_SESSION["employeeid"] = $rs[0];
      $_SESSION["emptype"] = $rs['emptype'];
      echo "<script>alert('Logged in successfully..');</script>";
      echo "<script>window.location='dashboard.php';</script>";
    }
    else
    {
      echo "<script>alert('Failed to Login.');</script>";	
    }
}
function convertNumberToWord($num = false)
{
    $num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Online News Portal</title>
    <!--  Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!--  Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">   
    <!--  SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!--  Product view slider --> 
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">    
    <!--  slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!--  price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!--  Theme color -->
    <link id="switcher" href="css/theme-color/dark-red-theme.css" rel="stylesheet">
    <!--  <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!--  Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!--  Main style sheet -->
    <link href="css/style.css" rel="stylesheet">      

    <link href="css/jquery.dataTables.min.css" rel="stylesheet">
	<style>
	.errmsg
	{
		color: red;
	}
	</style>
  <style>
.marquee {
  width: 100%;
  overflow: hidden;
  white-space: nowrap;
}
.marquee:hover .marquee__item {
  -webkit-animation-play-state: paused;
          animation-play-state: paused;
}
.marquee__seperator {
  margin: 0 2rem;
}
.marquee__item {
  display: inline-block;
  will-change: transform;
  -webkit-animation: marquee 50s linear infinite;
          animation: marquee 50s linear infinite;
}

@-webkit-keyframes marquee {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-100%);
  }
}

@keyframes marquee {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-100%);
  }
}
.marquee {
  background-color: red;
  padding: 1rem 0;
  color: #fff;
}
</style>
  </head>
  <body> 
   <!--  wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!--  / wpf loader Two -->       
  <!--  SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!--  END SCROLL TOP BUTTON -->


  <!--  Start header section -->
  <header id="aa-header">
    <!--  start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!--  start header top left -->
              <div class="aa-header-top-left">
              
                <!--  start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-calendar"></span> <?php echo date("d-m-Y"); ?> | 
                  <span class="fa fa-clock-o"></span> <span id="idclock"></span><script type="text/javascript" charset="utf-8">
function myClock() {         
  setTimeout(function() {   
    const d = new Date();
    const n = d.toLocaleTimeString();
    document.getElementById("idclock").innerHTML = n; 
    myClock();             
  }, 1000)
}
myClock();
  </script></p>
                </div>
                <!--  / cellphone -->
              </div>
              <!--  / header top left -->
        
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <?php
                    $sql = "SELECT * FROM newscategory WHERE status='Active' AND category_type='Article'";
                    $qsql= mysqli_query($con,$sql);
                    while($rs = mysqli_fetch_array($qsql))
                    {
                      echo "<li class='hidden-xs'><a href='displayarticle.php?newstype=Article&newscategoryid=$rs[newscategoryid]'>" . strtoupper($rs['category'])  . "</a></li>";
                    }
                  ?> 
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--  / header top  -->

    <!--  start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!--  logo  -->
              <div class="aa-logo">
                <!--  Text based logo -->
                <a href="index.php">
                  <span class="fa fa-newspaper-o"></span>
                  <div style="width:550px;">&nbsp;<strong>Online</strong> <strong> News </strong> <strong>Portal</strong> </div>
                </a>
                <!--  img based logo -->
                <!--  <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!--  / logo  -->
              <!--  search box -->
              <div class="aa-search-box">
                <form action="searchnewsandarticles.php" method="get">
                  <input type="text" name="txtsearch" id="txtsearch" placeholder="Search  News here ">
                  <button type="submit" ><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!--  / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--  / header bottom  -->
  </header>
  <!--  / header section -->
  <!--  menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!--  Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!--  Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="index.php">HOME</a></li>
              <li><a href="displaylatestnews.php">LATEST NEWS</a></li>
          <?php
						$sql = "SELECT * FROM newscategory WHERE status='Active' AND category_type='News'";
						$qsql= mysqli_query($con,$sql);
						echo mysqli_error($con);
						while($rs = mysqli_fetch_array($qsql))
						{
							echo "<li><a href='displayarticle.php?newstype=News&newscategoryid=$rs[newscategoryid]' >" . strtoupper($rs['category'])  . "</a></li>";
						}
					?>			  
            </ul>
<?php
if(isset($_SESSION['employeeid']))
{
?> 
<ul class="nav navbar-nav btn btn-info">
              <li STYLE="padding: 10px 15px;background-color: red;">EMPLOYEE MENU >></li>			  
			  
              <li><a href="#">|</a></li>

              <li ><a href="dashboard.php">Dashboard</a></li>	

              <li>
			          <a href="#">My Account<span class="caret"></span></a>
                <ul class="dropdown-menu">             
                  <li><a href="empprofile.php">Profile</a></li>
  				        <li><a href="employeechangepassword.php">Change Password</a></li>
                </ul>
              </li>

              <li>
			          <a href="#">News<span class="caret"></span></a>
                <ul class="dropdown-menu">                
                      <li><a href="news.php?type=News">Publish News </a></li>
                      <li><a href="viewnews.php?type=News">View Published News</a></li>
                      <?php
                      if($_SESSION["emptype"] == "Admin")					
                      {
                      ?>
                                <li><a href="category.php?type=News">Add News Category</a></li>
                                <li><a href="viewcategory.php?type=News">View News category</a></li>          
                      <?php
                      }
                      ?>
                </ul>
              </li>
              
              <li>
			          <a href="#">Article<span class="caret"></span></a>
                <ul class="dropdown-menu">                
                      <li><a href="news.php?type=Article">Publish Article </a></li>
                      <li><a href="viewnews.php?type=Article">View Published Articles</a></li>
                      <?php
                      if($_SESSION["emptype"] == "Admin")					
                      {
                      ?>
                                <li><a href="category.php?type=Article">Add Article Category</a></li>
                                <li><a href="viewcategory.php?type=Article">View Article category</a></li>          
                      <?php
                      }
                      ?>
                </ul>
              </li>	
				
				<li>
				  <a href="#">View Report<span class="caret"></span></a>
					<ul class="dropdown-menu">  
						<li><a href="viewwebads.php">Ads Listing Report</a></li> 
						<li><a href="viewpaymentreport.php">Ads Payment Report</a></li> 
						<li><a href="viewcomments.php">Comments Report</a></li> 
					</ul>
				</li>
				
			<li>
			  <a href="#">Users<span class="caret"></span></a>
                <ul class="dropdown-menu">           
<?php
if($_SESSION["emptype"] == "Admin")					
{
?>				
					<li><a href="employee.php">Add Employee</a></li>
					<li><a href="viewemployee.php">View Employee</a></li> 
<?php
}
?>					
					<li><a href="advertiser.php">Add Advertiser</a></li>
					<li><a href="viewadvertiser.php">View Advertiser</a></li>           
                </ul>
              </li>
<?php
	if($_SESSION["emptype"] == "Admin")					
	{
?>	    
			  <li>
					<a href="#">Settings<span class="caret"></span></a>
					<ul class="dropdown-menu">                
					<li><a href="viewtax.php">Tax settings</a></li>      
					</ul>
              </li>

              
            
<?php
	}
?>
<li><a href="logout.php" >Logout</a></li>
</ul>
<?php
}
?>			
<?php
if(isset($_SESSION["advertiserid"]))
{
?>
<ul class="nav navbar-nav btn btn-info">
              <li STYLE="padding: 10px 15px;background-color: red;">ADVERTISER MENU >></li>			  
			  
              <li><a href="#">|</a></li>				  

                  <li><a href="account.php">My Account</a></li>
                  <li class="hidden-xs"><a href="advertiserprofile.php"> Profile</a></li>
                  <li class="hidden-xs"><a href="advertiserchangepassword.php"> Change Password</a></li>
                  <li class="hidden-xs"><a href="viewwebads.php">Advertisement</a></li>	  
                  <li class="hidden-xs"><a href="viewpayment.php">Payment Report</a></li>
                  <li><a href="logout.php" >Logout</a></li>
</ul>
<?php
}
?>  
          </div><!-- /.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!--  / menu -->
  <div class="marquee">
  <div class="marquee__item">
  <?php
  $sqlscroller= "SELECT newscontent.*,newscategory.category FROM newscontent LEFT JOIN newscategory ON newscontent.newscategoryid=newscategory.newscategoryid WHERE newscontent.status='Active' ";	
	if($_GET['newstype'] != "")
	{
		$sqlscroller = $sqlscroller . " AND newscontent.newstype='$_GET[newstype]'";
	}	
	if($_GET['newscategoryid'] != "")
	{
		$sqlscroller = $sqlscroller . " AND newscontent.newscategoryid='$_GET[newscategoryid]'";
	}
	if($_GET['txtsearch'] != "")
	{
		$sqlscroller = $sqlscroller . " AND newscontent.title";
	}
  $sqlscroller = $sqlscroller . "  ORDER BY  newscontent.newsid DESC LIMIT 9";
	$qsqlscroller = mysqli_query($con,$sqlscroller);
  $i=0;
	while($rsscroller = mysqli_fetch_array($qsqlscroller))
	{
    echo "<a style='color: white;' href='newsdetailed.php?newsid=$rsscroller[newsid]&newstype=$rsscroller[newstype]&newscategoryid=$rsscroller[newscategoryid]'>";
    echo $rsscroller['title'] . " <span class='marquee__seperator'>+++</span>";
    echo "</a>";
  }
  ?>
</div>
</div>