<html>
<head>
<title><?php echo $title?></title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="modern-responsive.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>includes/styles/form.css" /> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>includes/styles/master.css" /> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>includes/styles/modern.css" /> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>includes/styles/modern-responsive.css" /> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>includes/styles/site.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>includes/css/smoothness/jquery-ui-1.10.0.custom.css">
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>includes/js/view.js" ></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>includes/js/jquery.js" ></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>includes/js/jquery.form.min.js" ></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>includes/js/jqueryui-min.js" ></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>includes/js/wordmaster.js" ></script> 
</head> 

<body>
<div class="page">
<div class="page [secondary] with-sidebar">
<div class="page-header" >
	 <div class="page-header-content">
		
		 <a href="/" class="back-button big page-back"></a>
		 <h1>Word Master<small>preems</small></h1>
		 <!--
		 <div class="progress-bar">
			<div class="bar bg-color-blue" style="width: <?php // echo $progress?>%"></div>
		</div>
		-->
	 </div>
</div>     
<div class="page-sidebar" style="padding-left:10px" >
	<ul>
		<li>
			<ul class="sub-menu">
				<li><a href="<?php echo site_url(''); ?>">Home </a></li>
			</ul>
		</li>
		<li>Words
			<ul class="sub-menu">
				<li><a href="<?php echo site_url('word/insert'); ?>">Insert </a></li>
				<li><a href="<?php echo site_url('word/search'); ?>">Search </a></li>
			</ul>
		</li>
		<li>Roots
			<ul class="sub-menu">
				<li><a href="<?php echo site_url('word/rootinsert'); ?>">Insert </a></li>
				<li><a>Search </a></li>
			</ul>
		</li>
		
		<li>Revise
			<ul class="sub-menu">
				<li><a href="<?php echo site_url('word/today'); ?>">Today </a></li>
				<li><a href="<?php echo site_url('word/yesterday'); ?>">Yesterday </a></li>
				<li><a href="<?php echo site_url('word/daybefore'); ?>">A Day before </a></li>
				<li><a href="<?php echo site_url('word/weekbefore'); ?>">A week Before </a></li>
				<li><a href="<?php echo site_url('word/starred'); ?>">Starred </a></li>
				<li><a href="<?php echo site_url('word/genius'); ?>">Genius List (Beta) </a></li>
				<!--<li><a>This week </a></li>
				<li><a>Last week </a></li>-->
			</ul>
		</li>
		<li>Calender
			<ul class="sub-menu">
				<li><a href="<?php echo site_url('word/calender/2013/7'); ?>">Jul </a></li>
				<li><a href="<?php echo site_url('word/calender/2013/6'); ?>">Jun </a></li>
				<li><a href="<?php echo site_url('word/calender/2013/5'); ?>">May </a></li>
				<li><a href="<?php echo site_url('word/calender/2013/4'); ?>">Apr </a></li>
				<li><a href="<?php echo site_url('word/calender/2013/3'); ?>">Mar </a></li>
				
				
				
			</ul>
		</li>

	</ul>
</div>
     
<div class="page-region" >
<?php echo $child_page?>
</div>
</div>
</div>
</body>
</html>