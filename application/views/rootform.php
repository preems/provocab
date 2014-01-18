<?php if($_POST): ?>     
	 <div class="notices">
    <div class="bg-color-blue">
    <a href="#" class="close"></a>
<div class="notice-icon"> <i class="icon-checkmark"></i> </div>
    <!--<div class="notice-image"> <img/> </div> -->
    <div class="notice-header"> <?php echo $_POST['root'] ?> Added </div>
   <!-- <div class="notice-text"> ... </div> -->
    </div>
    </div>
<?php endif; ?>

<div id="form_container">
<form id="rootinsertform" class="insertform"  method="post" action="">
								
		<table>	
		<tr><td>
			<label class="formlabel" for="element_1">Root </label>
		</td><td>
			<div class="input-control text span4"><input id="root" name="root" class="element text medium" type="text" maxlength="255" value=""/></div>
		</td></tr>
		
		<tr><td>
			<label class="formlabel" for="element_2">Meaning </label>
		</td><td>
			<div class="input-control textarea span6"><textarea id="meaning" name="meaning" class="element textarea small"></textarea> </div>
		</td></tr>
		
	
		
		<tr><td>
			<label class="formlabel" for="element_4">Examples </label>
		</td><td>
			<div class="input-control textarea span6"><textarea id="examples" name="examples" class="element textarea small"></textarea> </div>
		</td></tr>

		
		<tr><td>
			<label class="formlabel" for="element_5">Date </label>
		</td><td>
			<div class="input-control text span4"><input id="date" name="date" class="element text medium" type="text" maxlength="255" value=""/> </div>
		</td></tr>
		
	
		
		<tr><td>
			<label class="formlabel" for="element_7">Original Form </label>
		</td><td>
			<div class="input-control text span4"><input id="orginalform" name="originalform" class="element text medium" type="text" maxlength="255" value=""/> </div>
		</td></tr>
	
		
		<tr><td>
		</td><td>			
			<input id="saveForm" class="button_text bg-color-blue" type="submit" name="" value="Submit" />
		</td></tr>
		<table>
		</form>	
</div>