<style type="text/css">
#cal td
{
padding:0px;

}
#cal td .tile
{
width:120px;
height:120px;

}

#cal td .tile .tile-content
{
padding:5px 10px;
}

</style>
<table id="cal" style="padding:0px"><tr>
<?php

$daycount =1;
$dayurl=site_url('word/day/');
$firstday = date('w',mktime(0,0,0,$month,1,$year));
$totalday = date('t',mktime(0,0,0,$month,1,$year));
$curpos=-1;

for($i=1;$i<$firstday;$i++)
{
echo '<td> - </td>';
$curpos = (++$curpos)%7;

}

while($daycount<=$totalday)
{

echo '<td> 
<a href='.'"'.$dayurl.'/'.$year.'/'.$month.'/'.$daycount.'"'.' >
<div class="tile bg-color-blue">

<div class=" caltile tile-content ">';

$query = $this->db->get_where('words',array('date'=>$year.'-'.$month.'-'.$daycount));
$result=$query->result();
foreach($result as $word)
{
echo "<p>$word->word</p>";
}

echo '</div>
<div class="brand">
<div class="badge">'
.$daycount
.'</div>
</div>
</div>
</a>
</td>';
$curpos = (++$curpos)%7;

if($curpos==6)
	echo"</tr><tr>";
$daycount++;
}

for($i=++$curpos;$i<7;$i++)
{

echo '<td> - </td>';
}





?>
</tr></table>