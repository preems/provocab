<div class="clearfix" style="">
<?php

$html="";
$surl=site_url('word/wordview');
foreach($resultset as $row)
{
$url=$surl.'/'.$row->wordid;

$starticonclass = $row->starred?'icon-star-3':'icon-star';
$html .= '<a href="'.$url.'"><div class="tile double bg-color-blue">' 
.'<div class="tile-content">'
."<h2>$row->word</h2>"
."<h4><u>$row->simplemeaning</u></h4>"
."<h5>$row->meaning</h5>"
."<p>$row->usage</p>"
.'</div><div class="brand"><div class="badge" style="width:70px">'
.'<a value="'.$row->wordid.'" class="'.$starticonclass.' wordstaricon"></a>'
.'<a value="'.$row->wordid.'" class="icon-checkmark  wordremembericon"></a><a value="'.$row->wordid.'" class="icon-cancel-2  wordforgoticon"></a></div></div></div></a>';										
}

echo $html

?>
</div>