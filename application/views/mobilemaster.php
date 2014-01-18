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
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>includes/js/jqueryui-min.js" ></script> 
<script language="javascript">
$(document).ready( function() {
	  $("#date").val($.datepicker.formatDate('yy-mm-dd', new Date()));
	$( "#date" ).datepicker({ dateFormat: "yy-mm-dd",autoSize: true,showAnim: "slideDown" });
	$( "#date" ).datepicker( "option", "defaultDate", 0 );
});
</script>
</head> 
<!--
<body>
<div id="masterwrapper" style="">
<div id="nav" class="fl"></div>
<div id="mainbody"  class="fl">
<?php// echo $child_page?>
</div>
</div>
</body>
-->





<div class="page">
<div class="page">
<div class="page-header" >
	 <div class="page-header-content">
		
		 <a href="/" class="back-button big page-back"></a>
		 <h1>Word Master<small>preems</small></h1>
		 <div class="progress-bar">
			<div class="bar bg-color-blue" style="width: <?php echo $progress?>%"></div>
		</div>
	 </div>
</div>     

 <!--  Remove the left margin for non mobile version    -->    
<div class="page-region" style="margin-left: 10px;" >
<?php echo $child_page?>
</div>
</div>
</div>
</html>