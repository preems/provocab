   <script type="text/javascript">




$(document).ready( function () {

	$.get('tutorialmodalcontent',function(data) {
		$.Dialog({
		overlay: true,
		shadow: true,
		flat: true,
		width:700,
		height:500,
		//icon: '<img src="images/excel2013icon.png">',
		title: 'Tutorial',
		content: data,
		onShow: function(_dialog){
			$('.carousel').carousel();
			ShowTutorialClickassign();
		}
	
		});
	});

	


});

   </script>