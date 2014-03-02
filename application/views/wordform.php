
<div class="span8">
<div id="form_container">
<form id="wordinsertform" class="insertform"  method="post" action="">
			<legend>Add new Word</legend>

			<label class="" >Word </label>

			<div class="input-control text span8 " data-role="input-control"><input id="word" name="word" class="" type="text" maxlength="255" value=""/></div>

		

			<label class="">Meaning </label>

			<div class="input-control textarea span8" data-role="input-control"><textarea id="meaning" name="meaning" class=""></textarea> </div>

		

			<label>Simple meaning </label>

			<div class="input-control text span8 "><input id="simplemeaning" name="simplemeaning" type="text" maxlength="255" value=""/></div>

			
			<label >Synonyms </label>
		
			<div class="input-control text span8 "><input id="synonyms" name="synonyms"  type="text" maxlength="255" value=""/> </div>
		
			<div class="row">

			<div class="span4">

			<label  >Pronounciation </label>
		
			<div class="input-control text "><input id="pronounciation" name="pronounciation" type="text" maxlength="255" value=""/> </div>
		
		
		
			<label  >Usage </label>
		
			<div class="input-control textarea "><textarea id="usage" name="usage" ></textarea> </div>
		

		
		
			<label >Date </label>
		
			<div class="input-control text " data-role="datepicker" data-format="yyyy-m-d" data-position="top" data-effect='slide'><input class="element text medium hasDatepicker"  id="date" name="date"  type="text" maxlength="255" value=""/> </div>
		
		
		
			<label  >Notes </label>
		
			<div class="input-control text "><input id="notes" name="notes"  type="text" maxlength="255" value=""/> </div>
		
		
			</div>
			<div class="span4">
		
			<label >Source </label>
		
			<div class="input-control text "><input id="source" name="source" type="text" maxlength="255" value=""/> </div>
		
		
		
		
			<label >Tags </label>
		
			<div class="input-control text "><input id="tags" name="tags" type="text" maxlength="255" value=""/> </div>
		

		
		
		
		
			<label >Antonyms </label>
		
			<div class="input-control text "><input id="antonyms" name="antonyms" type="text" maxlength="255" value=""/> </div>
		

		
		
			<label >Related Word forms </label>
		
			<div class="input-control text "><input id="relatedwordforms" name="relatedwordforms" class=" " type="text" maxlength="255" value=""/> </div>
		
		
		
			<!--
			<label >Wordlist ? </label>
		

			<span> <label class="input-control checkbox"><input id="wordlist" name="wordlist" class="element checkbox" type="checkbox" value="1" checked="checked" />
			 <span class="helper">Yes</span></span> 
		    -->
		
		
			</div>
			</div>
		
					
			<input id="saveForm" class="button_text bg-color-blue" type="submit" name="" value="Submit" />

		</form>	
</div>
</div>
<div class="span4" id="suggestionsdiv" style="margin-top:30px;display:none">
<h6>Meaning suggestions</h6>
<ul id="suggestionslist"></ul>
</div>