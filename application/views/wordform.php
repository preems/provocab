<?php if($_POST): ?>     
	 <div class="notices">
    <div class="bg-color-blue">
    <a href="#" class="close"></a>
<div class="notice-icon"> <i class="icon-checkmark"></i> </div>
    <!--<div class="notice-image"> <img/> </div> -->
    <div class="notice-header"> <?php echo $_POST['word'] ?> Added </div>
   <!-- <div class="notice-text"> ... </div> -->
    </div>
    </div>
<?php endif; ?>

<div id="form_container">
<form id="wordinsertform" class="insertform"  method="post" action="">
								
		<table>	
		<tr><td>
			<label class="formlabel" for="element_1">Word </label>
		</td><td>
			<div class="input-control text span4"><input id="word" name="word" class="element text medium" type="text" maxlength="255" value=""/></div>
		</td></tr>
		
		<tr><td>
			<label class="formlabel" for="element_2">Meaning </label>
		</td><td>
			<div class="input-control textarea span6"><textarea id="meaning" name="meaning" class="element textarea small"></textarea> </div>
		</td></tr>
		
		<tr><td>
			<label class="formlabel" for="element_1">Simple meaning </label>
		</td><td>
			<div class="input-control text span4"><input id="simplemeaning" name="simplemeaning" class="element text medium" type="text" maxlength="255" value=""/></div>
		</td></tr>
		
		<tr><td>
			<label class="formlabel" for="element_3">Pronounciation </label>
		</td><td>
			<div class="input-control text span4"><input id="pronounciation" name="pronounciation" class="element text medium" type="text" maxlength="255" value=""/> </div>
		</td></tr>
		
		<tr><td>
			<label class="formlabel" for="element_4">Usage </label>
		</td><td>
			<div class="input-control textarea span6"><textarea id="usage" name="usage" class="element textarea small"></textarea> </div>
		</td></tr>

		
		<tr><td>
			<label class="formlabel" for="element_5">Date </label>
		</td><td>
			<div class="input-control text span4"><input id="date" name="date" class="element text medium" type="text" maxlength="255" value=""/> </div>
		</td></tr>
		
		<tr><td>
			<label class="formlabel" for="element_6">Notes </label>
		</td><td>
			<div class="input-control text span4"><input id="notes" name="notes" class="element text medium" type="text" maxlength="255" value=""/> </div>
		</td></tr>
		
		
		<tr><td>
			<label class="formlabel" for="element_7">Source </label>
		</td><td>
			<div class="input-control text span4"><input id="source" name="source" class="element text medium" type="text" maxlength="255" value="B800"/> </div>
		</td></tr>
		
		
		<tr><td>
			<label class="formlabel" for="element_8">Tags </label>
		</td><td>
			<div class="input-control text span4"><input id="tags" name="tags" class="element text large" type="text" maxlength="255" value="b800"/> </div>
		</td></tr>

		
		<tr><td>
			<label class="formlabel" for="element_9">Synonyms </label>
		</td><td>
			<div class="input-control text span4"><input id="synonyms" name="synonyms" class="element text large" type="text" maxlength="255" value=""/> </div>
		</td></tr>
		
		<tr><td>
			<label class="formlabel" for="element_9">Antonyms </label>
		</td><td>
			<div class="input-control text span4"><input id="antonyms" name="antonyms" class="element text large" type="text" maxlength="255" value=""/> </div>
		</td></tr>

		
		<tr><td>
			<label class="formlabel" for="element_10">Realted Word forms </label>
		</td><td>
			<div class="input-control text span4"><input id="relatedwordforms" name="relatedwordforms" class="element text large" type="text" maxlength="255" value=""/> </div>
		</td></tr>
		
		
		<tr><td>
			<label class="formlabel" for="element_11">Wordlist ? </label>
		</td><td>
			<span> <label class="input-control checkbox"><input id="wordlist" name="wordlist" class="element checkbox" type="checkbox" value="1" checked="checked" />
			 <span class="helper">Yes</span></span> 
		</td></tr>
		
		
		
		<tr><td>
		</td><td>			
			<input id="saveForm" class="button_text bg-color-blue" type="submit" name="" value="Submit" />
		</td></tr>
		<table>
		</form>	
</div>