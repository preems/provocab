var hostaddress = "http://localhost/vocabtracker/";


//Brand init func
function brandinit()
{
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
		$.post(hostaddress+'ajax/remember/'+$(this).attr('value'),{},function(result) {
			
			if(result) {
				wordremembericon.addClass('colorblack');
				$.Notify.show("Word marked as recalled");
				}
				else
				{
					alert('Operation failed');
				}
		}
		);
	});	


	//Assign click handler to forgotten button
	$('.wordforgoticon').click(function() {
		var wordforogticon = $(this);
		$.post(hostaddress+'ajax/forgot/'+$(this).attr('value'),{},function(result) {
			
			if(result) {
				wordforogticon.addClass('colorblack');
				$.Notify.show("Word marked as forgotten");
				}
				else
				{
					alert('Operation failed');
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
			$.post(hostaddress+'ajax/addstar/'+$(this).attr('value'),{},function(result) {
				if(result) {
					wordstaricon.addClass('icon-star-3');
					wordstaricon.removeClass('icon-star');
					$.Notify.show("Added star to the word");
				}
				else
				{
					alert('Could not star this word');
				}
			});
		}
		else     //If starred, remove star
		{
			//alert('starred');
			$.post(hostaddress+'ajax/removestar/'+$(this).attr('value'),{},function(result) {
				if(result) {
					wordstaricon.addClass('icon-star');
					wordstaricon.removeClass('icon-star-3');
					$.Notify.show("Removed Star from the word");
				}
				else
				{
					alert('Could not unstar this word');
				}
			});
		}
	});


	//Assign Click handler for Delete icon
	$('.worddeleteicon').click(function() {
		var worddeleteicon = $(this);
		$.get(hostaddress+'ajax/deleteword/'+$(this).attr('value'),{},function(result) {
			if(result == 1 )
			{
				worddeleteicon.parent().parent().parent().hide();
				$.Notify.show("Deleted Successfully");
				//Remove the parent div tile from DOM
			}
			else
			{
				alert('Could not be deleted');
			}
		});
	});	

}

function setdate()
{
	var d = new Date();
	$('#date').val( d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate());
}




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

// Calling brandinit
brandinit();



//function to call ajax and display results
function ajax_search_call() {
	//$('.searchresults').load(hostaddress+'index.php/ajax/searchresults/'+$('.searchbox').val());   Old search results
	$('.searchresults').load(hostaddress+'word/searchresults/'+$('.searchbox').val(), function() {
			brandinit();
	});

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



//Set date
setdate();

//Datepicker format setting
//$("#date").val($.datepicker.formatDate('yy-mm-dd', new Date()));
//$("#date").datepicker();
//$("#date").datepicker({ dateFormat: "yy-mm-dd",autoSize: true,showAnim: "slideDown" });
//$( "#date" ).datepicker( "option", "defaultDate", 0 );


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
		
		setdate();
		$.Notify({
			caption: "Success",
			style:   "background-color:green",
			content: "Word Successfully added"
		});
    },
	error: function() {
		 $.Notify({
			content: "Word Insert Failed"
		});
	}
}; 

//alert('setting form options');
$('#wordinsertform').ajaxForm(options);
//$('#wordupdateform').ajaxForm(options);


//Word meaning suggestions fetch and display
$('#word').change(function(){
	$('#suggestionsdiv').show();
	$('#suggestionslist').load(hostaddress+'ajax/meaningsuggestions/'+$('#word').val(),{},function() {
		//In the callback of load assing the click handlers
		$('#suggestionslist li').click(function() {
			$('#meaning').val( $('#meaning').val()+this.innerHTML);
		});

	});


});


	
});//End of Document Ready

function ShowTutorialClickassign() {
	//Show Tutorial on startup settings
	$('#showtutorialcheckbox').change(function() {
		var val = this.checked ? 1 : 0;
		//alert(val);
		$.get(hostaddress+'ajax/updateusersettings/showtutorial/'+val,function(response) {
			//alert(response);
			if(response == "Success")
			{
				$.Notify({content: "Preference updated"});
			}
			else
			{
				alert("Error in updating the preference");
			}
		});
});

}

