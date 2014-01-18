var hostaddress = "http://localhost/word/";

$(document).ready( function() {
/*
$('.wordtileflag').click( function() {
	if($(this).is('.selected'))
	{
			$(this).removeClass('selected');
			$(this).addClass('bg-color-blue');
			
	}
	else
	{
		$(this).removeClass('bg-color-blue');
		$(this).addClass('selected');
		
	}

}); */


//Hide all the Brand divs
$('.double').children('.brand').hide();

//Show Hide brand divs based on hover
$('.double').hover(function() {
	$(this).children('.brand').show();
	$(this).children().children('.tile-content').css('opacity','0.3');
	},
	function() {
	$(this).children('.brand').hide();
	$(this).children().children('.tile-content').css('opacity','1');
	});


//Assign click handler to remembered button
$('.wordremembericon').click(function() {
	var wordremembericon = $(this);
	$.post(hostaddress+'index.php/ajax/remember/'+$(this).attr('value'),{},function(result) {
		
		if(result) {
			wordremembericon.addClass('colorblack');
			}
	}
	);
});	


//Assign click handler to forgotten button
$('.wordforgoticon').click(function() {
	var wordforogticon = $(this);
	$.post(hostaddress+'index.php/ajax/forgot/'+$(this).attr('value'),{},function(result) {
		
		if(result) {
			wordforogticon.addClass('colorblack');
			}
	}
	);
});	


//Asign click handler for star button
$('.wordstaricon').click(function() {
	//alert('clicked');
	var wordstaricon = $(this);
	if($(this).is('.icon-star'))    //If not starred add star.  Call ajax function and add the icon-star-3 class in handler
	{
		//alert('notstarred');
		$.post(hostaddress+'index.php/ajax/addstar/'+$(this).attr('value'),{},function(result) {
			if(result) {
				wordstaricon.addClass('icon-star-3');
				wordstaricon.removeClass('icon-star');
			}
		});
	}
	else     //If starred, remove star
	{
		//alert('starred');
		$.post(hostaddress+'index.php/ajax/removestar/'+$(this).attr('value'),{},function(result) {
			if(result) {
				wordstaricon.addClass('icon-star');
				wordstaricon.removeClass('icon-star-3');
			}
		});
	}
});	



//function to call ajax and display results
function ajax_search_call() {
	$('.searchresults').load(hostaddress+'index.php/ajax/searchresults/'+$('.searchbox').val());
}

//Assign handler to search button
$('.searchbtn').click(function() {
	//var hostaddress = "http://localhost/word/";  //To be removed while uploading
	ajax_search_call();
});


//Assign handler to Feeling lucky button
$('.searchlucky').click(function() {
	alert('feeling lucky');
});

	
//Assign to Search box enter key
$('.searchbox').keyup(function(e) {
	if(e.keyCode==13) {
		ajax_search_call();
	}
});


//Datepicker format setting
$("#date").val($.datepicker.formatDate('yy-mm-dd', new Date()));
$( "#date" ).datepicker({ dateFormat: "yy-mm-dd",autoSize: true,showAnim: "slideDown" });
$( "#date" ).datepicker( "option", "defaultDate", 0 );


//Hide and show meanings
$(document).keypress (function(e)
{
	switch(e.which)
	{
	
	case 97: $('.tile-content h4').hide(); $('.tile-content p').hide(); $('.tile-content h5').hide();
		break;
	
	case 115: $('.tile-content h4').show(); $('.tile-content p').show(); $('.tile-content h5').show();
		break;
	}
});


//Ajax Form submit
var options = { 
	type: 'POST',
	resetForm: true,
    success:    function() {
		$("html, body").animate({ scrollTop: 0 }, 300);
		$("#source").val('MAG');
		//$("#tags").val('b800');
		$("#date").val($.datepicker.formatDate('yy-mm-dd', new Date()));
    },
	error: function() {
		alert('Insert failed');
	}
}; 

$('#wordinsertform').ajaxForm(options);
//$('#wordupdateform').ajaxForm(options);

	
});