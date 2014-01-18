<style type="text/css">

.element.text.medium
{
border-color:white;
}

.element.text.medium:hover , .element.text.medium:focus
{
border-color:black;
}

.element.textarea.small
{
border-color:white;
}

.element.textarea.small:hover , .element.textarea.small:focus
{
border-color:black;
}
</style>
<div id="form_container">
<form id="wordupdateform" class="updateform"  method="post" action="">
<table>	
		<tr><td>
			<label class="formlabel" for="element_1">Word </label>
		</td><td>
			<div class="input-control text span4"><input id="word" name="word" class="element text medium" type="text" maxlength="255" value="<?php echo $word ?>"/></div>
			
		</td></tr>
		
		<tr><td>
			<label class="formlabel" for="element_2">Meaning </label>
		</td><td>
			<div class="input-control textarea span6"><textarea id="meaning" name="meaning" class="element textarea small"><?php echo $meaning ?></textarea> </div>
			
		</td></tr>
		
		<tr><td>
			<label class="formlabel" for="element_2">Simple Meaning </label>
		</td><td>
			<div class="input-control text span4"><input id="simplemeaning" name="simplemeaning" class="element text medium" type="text" maxlength="255" value="<?php echo $simplemeaning ?>"/></div>
			
			</td></tr>
		
		<tr><td>
			<label class="formlabel" for="element_3">Pronounciation </label>
		</td><td>
			<div class="input-control text span4"><input id="pronounciation" name="pronounciation" class="element text medium" type="text" maxlength="255" value="<?php echo $pronounciation ?>"/> </div>
		</td></tr>
		
		<tr><td>
			<label class="formlabel" for="element_4">Usage </label>
		</td><td>
			<div class="input-control textarea span6"><textarea id="usage" name="usage" class="element textarea small"><?php echo $usage ?></textarea> </div>

		</td></tr>

		
		<tr><td>
			<label class="formlabel" for="element_5">Date </label>
		</td><td>
			<!--<div class="input-control text span4"><input id="date" name="date" class="element text medium" type="text" maxlength="255" value="<?php echo $date ?>"/> </div>-->
			<?php echo $date ?>

		</td></tr>
		
		<tr><td>
			<label class="formlabel" for="element_6">Notes </label>
		</td><td>
			<div class="input-control text span4"><input id="notes" name="notes" class="element text medium" type="text" maxlength="255" value="<?php echo $notes ?>"/> </div>

		</td></tr>
		
		
		<tr><td>
			<label class="formlabel" for="element_7">Source </label>
		</td><td>
			<div class="input-control text span4"><input id="source" name="source" class="element text medium" type="text" maxlength="255" value="<?php echo $source ?>"/> </div>
		</td></tr>
		
		
		<tr><td>
			<label class="formlabel" for="element_8">Tags </label>
		</td><td>
			<div class="input-control text span4"><input id="tags" name="tags" class="element text medium" type="text" maxlength="255" value="<?php echo $tags ?>"/> </div>
		</td></tr>

		
		<tr><td>
			<label class="formlabel" for="element_9">Synonyms </label>
		</td><td>
			<div class="input-control text span4"><input id="synonyms" name="synonyms" class="element text medium" type="text" maxlength="255" value="<?php echo $synonyms ?>"/> </div>
		</td></tr>
		
		<tr><td>
			<label class="formlabel" for="element_9">Antonyms </label>
		</td><td>
			<div class="input-control text span4"><input id="antonyms" name="antonyms" class="element text medium" type="text" maxlength="255" value="<?php echo $antonyms ?>"/> </div>
		</td></tr>

		
		<tr><td>
			<label class="formlabel" for="element_10">Realted Word forms </label>
		</td><td>
			<div class="input-control text span4"><input id="relatedwordforms" name="relatedwordforms" class="element text medium" type="text" maxlength="255" value="<?php echo $relatedwordforms ?>"/> </div>	
		</td></tr>
		
		
		<tr><td>
			<label class="formlabel" for="element_11">Wordlist ? </label>
		</td><td>
			<!--<span> <label class="input-control checkbox"><input id="wordlist" name="wordlist" class="element checkbox" type="checkbox" value="1" />
			 <span class="helper">Yes</span></span> -->
			 <p  class="body-secondary-text"><?php if($wordlist==1) echo "Yes"; else echo "No"; ?></p>
		</td></tr>
		
		
		
		<tr><td>
		</td><td>			
			<input id="saveForm" class="button_text" type="submit" name="" value="Update" />
		</td></tr>
		<table>
	</form>	
</div>