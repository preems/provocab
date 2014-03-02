
<div class="span9">
<div id="form_container">
<form id="wordupdateform" class="updateform"  method="post" action="">
			<legend>Update Word</legend>		
			<label class="" >Word </label>

			<div class="input-control text span9 " data-role="input-control"><input id="word" name="word" class="" type="text" maxlength="255" value="<?php echo $word ?>"/></div>

		

			<label class="">Meaning </label>

			<div class="input-control textarea span9" data-role="input-control"><textarea id="meaning" name="meaning" class=""><?php echo $meaning ?></textarea> </div>

		

			<label>Simple meaning </label>

			<div class="input-control text span9 "><input id="simplemeaning" name="simplemeaning" type="text" maxlength="255" value="<?php echo $simplemeaning ?>"/></div>

			
			
			
			<label >Synonyms </label>
		
			<div class="input-control text span9 "><input id="synonyms" name="synonyms"  type="text" maxlength="255" value="<?php echo $synonyms ?>"/> </div>
		
			<div class="row">

			<div class="span5">

			<label  >Pronounciation </label>
		
			<div class="input-control text "><input id="pronounciation" name="pronounciation" type="text" maxlength="255" value="<?php echo $pronounciation ?>"/> </div>
		
		
		
			<label  >Usage </label>
		
			<div class="input-control textarea "><textarea id="usage" name="usage" ><?php echo $usage ?></textarea> </div>
		

		
		
			<label >Date </label>
		
			<!--<div class="input-control text " data-role="datepicker" data-format="yyyy-m-d" data-position="top" data-effect='slide'><input class="element text medium hasDatepicker"  id="date" name="date"  type="text" maxlength="255" value="<?php echo $date ?>"/> </div>
		        -->
			<p><?php echo $date ?></p>
		
		
			<label  >Notes </label>
		
			<div class="input-control text "><input id="notes" name="notes"  type="text" maxlength="255" value="<?php echo $notes ?>"/> </div>
		
		
			</div>
			<div class="span4">
		
			<label >Source </label>
		
			<div class="input-control text "><input id="source" name="source" type="text" maxlength="255" value="<?php echo $source ?>"/> </div>
		
		
		
		
			<label >Tags </label>
		
			<div class="input-control text "><input id="tags" name="tags" type="text" maxlength="255" value="<?php echo $tags ?>"/> </div>
		

		
		
		
		
			<label >Antonyms </label>
		
			<div class="input-control text "><input id="antonyms" name="antonyms" type="text" maxlength="255" value="<?php echo $antonyms ?>"/> </div>
		

		
		
			<label >Related Word forms </label>
		
			<div class="input-control text "><input id="relatedwordforms" name="relatedwordforms" class=" " type="text" maxlength="255" value="<?php echo $relatedwordforms ?>"/> </div>
		
		
		
			<!--
			<label >Wordlist ? </label>
		

			<span> <label class="input-control checkbox"><input id="wordlist" name="wordlist" class="element checkbox" type="checkbox" value="1" checked="checked" />
			 <span class="helper">Yes</span></span> 
		    -->
		
		
			</div>
			</div>
		
					
			<input id="saveForm" class="button_text bg-color-blue" type="submit" name="" value="Update" />

		</form>	
</div>