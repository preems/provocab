<?php $baseurl=base_url().'includes/images/tutorial/'; ?>

<div class="carousel bg-white" id="tutorialcarousel" data-role="carousel" data-period="7000" data-height="500px" style="padding-bottom:0">
	<div class="slide">
		<h2>What is ProVocab</h2>
		<br/>
		<p>ProVocab lets u <strong>Track, revise</strong> and <strong>never forget</strong> your daily vocab learnings</p>
		<p>Makes Learning hundreds of new words very easy</p>
		<p>Shows the words you have learn more and words u have learn less</p>
		<p>Tracks your <strong>Progress</strong></p>
	</div>
	<div class="slide">
		<h2>Add new Words</h2>
		<p>Add new words learnt daily into ProVocab</p>
		<p>Click on Insert button on left sidebar.</p>
		<img src="<?php echo $baseurl.'insertbutton.png' ;?>"/>
	</div> 
	<div class="slide">
		<h2>Enter word details </h2>
		<p>Pro Vocab shows meaning suggestions for your word. Click on the one you think is suitable or add your own</p>
		<p>Add other details like simple meaning,synonyms,usage</p>
		<img src="<?php echo $baseurl.'wordform.png' ;?>" width="350"/>
	</div>
	<div class="slide">
		<h2>Revise</h2>
		<p>Revise words learnt <strong>Today, Yesterday, Day before, Week before, Random</strong> or any day</p>
		<img src="<?php echo $baseurl.'revise.png' ;?>" width="200"/>
		<img src="<?php echo $baseurl.'wordtiles.png' ;?>" width="400"/>
	</div>
	<div class="slide">
		<h2>Word Actions</h2>
		<img src="<?php echo $baseurl.'wordactions.png' ;?>" width="400"/>
		<br/><br/>
		<p>Mark word <strong>Rememberred</strong> when u recall it</p>
		<p>Mark word <strong>Forgot</strong> when u cant recall it</p>
		<p>ProVocab will make intelligent suggestions based on your inputs</p>
		<p><strong>Star</strong> tough words to learn them again</p>
	</div>
	<div class="slide">
		<h2>Calender</h2>
		<p>Track your progress in the calender view</p>
		<br/>
		<img src="<?php echo $baseurl.'cal.png' ;?>" width="500"/>
	</div>
	<div class="slide">
		<h2>Dashboard</h2>
		<img src="<?php echo $baseurl.'dashboard.png' ;?>" width="500"/>
	</div>
	<div class="slide">
		<h2>Thanks for choosing Pro Vocab</h2>
		<p><a href="<?php echo site_url('word/insert')?>"> Click here to Add new word</a></p>
	</div>
	<a class="controls fg-blue left"><i class="icon-arrow-left-3"></i></a>
    <a class="controls fg-blue right"><i class="icon-arrow-right-3"></i></a>
</div>
<div class="input-control checkbox" id="showtutorialcheckboxdiv" data-role="input-control">
    <label>
        <input type="checkbox" id="showtutorialcheckbox" checked="" value="1"></input>
        <span class="check"></span>Show tutorial on startup.
    </label>
</div>
