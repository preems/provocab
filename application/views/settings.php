<div class="span8">
<div id="settings_container">
<form id="settingsform" class="settingsform"  method="post" action="">

	<legend>Settings</legend>
    <input type="hidden" name="hidden" value="hidden"/>
	<div class="input-control checkbox margin10" data-role="input-control" style="width:100%">
    	<label>
        	<input type="checkbox" name="showtutorial"
        	<?php echo ($showtutorial) ? 'checked=""' : '' ; ?>
        	value="1"></input>
        	<span class="check"></span>
                Show tutorial on startup
    	</label>
	</div>
	<div class="input-control checkbox margin10" data-role="input-control" style="width:100%">
    	<label>
        	<input type="checkbox" name="sendweeklyreport"
        	<?php echo ($sendweeklyreport) ? 'checked=""' : '' ; ?>
        	value="1"></input>
        	<span class="check"></span>
                Send weekly reports
    	</label>
	</div>
	<br/>
	<input type="submit" value="Save"></input>


</form>
</div>
</div>