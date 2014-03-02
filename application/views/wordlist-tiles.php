<div class="clearfix" id="wordtiles" style="">
<?php


if(count($resultset) > 0)
{

	$html="";
	$surl=site_url('word/wordview');
	foreach($resultset as $row)
	{
	$url=$surl.'/'.$row->wordid;

	$starticonclass = $row->starred?'icon-star-3':'icon-star';
	$staricontitle = $row->starred?'Unstar':'Star';
	$html .= '<a href="'.$url.'"><div class="tile double">' 
	.'<div class="tile-content">'
	."<h2>$row->word</h2>"
	."<h4><u>$row->simplemeaning</u></h4>"
	."<h5>$row->meaning</h5>"
	."<p>$row->usage</p>"
	.'</div><div class="brand">'
	.'<div class="badge" style="width:30px; left:10px"> <a title="Delete" value="'.$row->wordid.'" class="icon-remove worddeleteicon"></a> </div>'
	.'<div class="badge" style="width:70px">'
	.'<a title="'.$staricontitle.'" value="'.$row->wordid.'" class="'.$starticonclass.' wordstaricon"></a>'
	.'<a title="I know this" value="'.$row->wordid.'" class="icon-checkmark  wordremembericon"></a><a title="I dont know this" value="'.$row->wordid.'" class="icon-cancel-2  wordforgoticon"></a></div></div></div></a>';										
	}

	echo $html;
}
else
{	$link = site_url('word/insert');
	echo "<p>No words found for this selection. <a href=".$link.">Add a new word here</a>";
}

?>
</div>