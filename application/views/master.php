<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title?></title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>includes/styles/form.css" /> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>includes/styles/metro-bootstrap.css" /> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>includes/styles/metro-responsive.min.css" /> 
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>includes/styles/site.css" />-->
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>includes/css/smoothness/jquery-ui-1.10.0.custom.css"> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>includes/styles/master.css" /> 
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>includes/js/view.js" ></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>includes/js/jquery.js" ></script> 
<!--<script language="javascript" type="text/javascript" src="<?php echo base_url();?>includes/js/jquery-ui.min.js" ></script> -->
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>includes/js/jquery.widget.min.js" ></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>includes/js/metro.min.js" ></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>includes/js/metro-dropdown.js" ></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>includes/js/metro-calendar.js" ></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>includes/js/metro-datepicker.js" ></script> 

<script language="javascript" type="text/javascript" src="<?php echo base_url();?>includes/js/jquery.form.min.js" ></script> 

<script language="javascript" type="text/javascript" src="<?php echo base_url();?>includes/js/wordmaster.js" ></script> 
</head> 

<body class="metro">
<!-- ClickTale Top part -->
<script type="text/javascript">
var WRInitTime=(new Date()).getTime();
</script>
<!-- ClickTale end of Top part -->


		
		 
<nav class="navigation-bar dark fixed-top shadow" style="z-index:500">
	<nav class="navigation-bar-content container">
		<a class="element" href="<?php echo site_url(''); ?>">Vocab Tracker</a>
		<span class="element-divider"></span>
		<a class="element" href="<?php echo site_url('word/insert'); ?>"><span class="icon-plus-2 on-left"></span>Insert </a>
		<a class="element" href="<?php echo site_url('word/search'); ?>"><i class="icon-search on-left"></i>Search</a>
		<div class="element">
			<a class="dropdown-toggle" href="#"><i class="icon-book on-left"></i>Revise</a>
			<ul class="dropdown-menu" data-role="dropdown">
				<li><a href="<?php echo site_url('word/today'); ?>">Today </a></li>
				<li><a href="<?php echo site_url('word/yesterday'); ?>">Yesterday </a></li>
				<li><a href="<?php echo site_url('word/daybefore'); ?>">A Day before </a></li>
				<li><a href="<?php echo site_url('word/weekbefore'); ?>">A week Before </a></li>
				<li><a href="<?php echo site_url('word/starred'); ?>">Starred </a></li>
				<li><a href="<?php echo site_url('word/genius'); ?>">Genius List (Beta) </a></li>
			</ul>
		</div>
		<a class="element place-right" href="<?php echo site_url('settings'); ?>" title="Settings">
    		<span class="icon-cog"></span>
		</a>
		<span class="element-divider place-right"></span>
		<button class="element image-button image-left place-right">
			<?php echo $fullname ?>
			<img src="<?php echo $ppic ?>">
		</button>
		<span class="element-divider place-right"></span>
			<a class="element  place-right" href="<?php echo $logouturl?>">Logout</a>
			


	</nav>
</nav>

<div class="page-header" >
	 <div class="page-header-content container" style="margin-top:55px;">
		<a href="/" class="back-button big page-back"></a>
		 <h1>Pro Vocab<small>beta</small></h1>
		 <!--
		 <div class="progress-bar">
			<div class="bar bg-color-blue" style="width: <?php // echo $progress?>%"></div>
		</div>
		-->

	 </div>
</div>  


<div class=" container" >

   

<nav class=" span3 sidebar light" style="float:left"  >
	<ul class="">
		
				<li><a href="<?php echo site_url(''); ?>"><i class="icon-home"></i>Home </a></li>
				<li><a href="<?php echo site_url('word/insert'); ?>"><i class="icon-plus-2"></i>Insert </a></li>
				<li><a href="<?php echo site_url('word/search'); ?>"><i class="icon-search"></i>Search</a></li>
			<li class="">
				<a class="dropdown-toggle" href="#">
				<i class="icon-book"></i>Revise</a>
				<ul class="dropdown-menu" data-role="dropdown">
					<li><a href="<?php echo site_url('word/today'); ?>">Today </a></li>
					<li><a href="<?php echo site_url('word/yesterday'); ?>">Yesterday </a></li>
					<li><a href="<?php echo site_url('word/daybefore'); ?>">A Day before </a></li>
					<li><a href="<?php echo site_url('word/weekbefore'); ?>">A week Before </a></li>
					<li><a href="<?php echo site_url('word/starred'); ?>">Starred </a></li>
					<li><a href="<?php echo site_url('word/genius'); ?>">Genius List (Beta) </a></li>	
				</ul>
			</li>
			<li class="">
				<a class="dropdown-toggle" href="#">
				<i class=" icon-calendar"></i>Calender</a>
				<ul class="dropdown-menu" data-role="dropdown">
					<li><a href="<?php echo site_url('word/calender/2014/3'); ?>">Mar </a></li>
					<li><a href="<?php echo site_url('word/calender/2014/2'); ?>">Feb </a></li>
					<li><a href="<?php echo site_url('word/calender/2014/1'); ?>">Jan </a></li>
					<li><a href="<?php echo site_url('word/calender/2013/12'); ?>">Dec </a></li>
					<li><a href="<?php echo site_url('word/calender/2013/11'); ?>">Nov </a></li>
				</ul>
			</li>
			<li><a href="<?php echo site_url('word/howtouse'); ?>"><i class="icon-help"></i>How to use</a></li>
	</ul>
</nav>
<div class=" grid maincontentgrid" >
<div class="row" style="margin-top:0">
<div class=" span12" >
<?php echo $child_page?>
</div>
</div><!-- row -->
</div><!-- page [secondary] with-sidebar grid -->
</div><!-- page container -->
</body><!-- Metro -->
</html>
<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=9553510; 
var sc_invisible=1; 
var sc_security="f8f41c21"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="hits counter"
href="http://statcounter.com/" target="_blank"><img
class="statcounter"
src="http://c.statcounter.com/9553510/0/f8f41c21/1/"
alt="hits counter"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->

  
<!-- ClickTale Bottom part -->

<script type='text/javascript'>
// The ClickTale Balkan Tracking Code may be programmatically customized using hooks:
// 
//   function ClickTalePreRecordingHook() { /* place your customized code here */  }
//
// For details about ClickTale hooks, please consult the wiki page http://wiki.clicktale.com/Article/Customizing_code_version_2

document.write(unescape("%3Cscript%20src='"+
(document.location.protocol=='https:'?
"https://clicktalecdn.sslcs.cdngc.net/www02/ptc/f8a6a322-1de1-4b2e-b46b-27645e6a987a.js":
"http://cdn.clicktale.net/www02/ptc/f8a6a322-1de1-4b2e-b46b-27645e6a987a.js")+"'%20type='text/javascript'%3E%3C/script%3E"));
</script>

<!-- ClickTale end of Bottom part -->
