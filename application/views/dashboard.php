   <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        /*var data = google.visualization.arrayToDataTable([
          ['Day', 'Words'],
          ['Friday',  1],
          ['Thursday',  25],
          ['Wednesday',  4],
          ['Tuesday',  60],
          ['Tuesday',  40],
          ['Tuesday',  100],
          ['Monday',  12]
        ]);*/

        var data = google.visualization.arrayToDataTable(<?php echo $weeklycountstring; ?>);

        var options = {
          //title: 'Weekly Learning',
          legend: { position: "none" },
          animation: {duration:500,  easing: 'out'},
          chartArea:{left:10,width:'100%',top:0,height:'80%'},
          colors:['#919191']
          //hAxis: {title: 'Days',  titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
         //google.visualization.events.addListener(chart, 'animationfinish', drawChart);
        chart.draw(data, options);
      }


      //Tutorial Popup
      <?php if($showTutorialUserSet): ?>
      $(document).ready( function () {
        $.get('word/tutorialmodalcontent',function(data) {
          $.Dialog({
            overlay: true,
            shadow: true,
            flat: true,
            width:700,
            height:500,
            //icon: '<img src="images/excel2013icon.png">',
            title: 'Tutorial',
            content: data,
            onShow: function(_dialog){
              $('.carousel').carousel();
              ShowTutorialClickassign();
              }

            });
        });
      });
      <?php endif; ?>




    </script>


<div class="clearfix" id="dashboard"  style="">
<?php

if($total ==0 )
 echo "<p>You have not learnt any words. Start adding new words by Clicking <a href=".site_url('word/insert').">Insert </a>in the sidebar. Read <a href=".site_url('word/howtouse').">How to use</a></p>"

?>

<div class="row" style="margin-top:0">
<div class="span4">
	<div class="tile">
		<div class="tile-content" >
		<h5>Total</h5>
		<h1 ><?php echo $total ;?></h1>
		</div>
	</div>

	<div class="tile ">
		<div class="tile-content" >
		<h5>Starred</h5>
		<h1 ><?php echo $starred ;?></h1>
		</div>
	</div>
	<div class="tile ">
		<div class="tile-content" >
		<h5>Today</h5>
		<h1 ><?php echo $today ;?></h1>
		</div>
	</div>
	<div class="tile ">
		<div class="tile-content" >
		<h5 >Week</h5>
		<h1 ><?php echo $week ;?></h1>
		</div>
	</div>
</div>
     <div id="chart_div" class="tile quadro double-vertical "></div>
</div>
<div class="row">
  <div class="span5 ol-transparent bg-white  ">

      <div class="panel no-border">
        <div class="panel-header fg-white bg-lightBlue">What others are learning</div>
        <div class="panel-content fg-dark nlp nrp" style="overlow:auto">
          <?php
            foreach ($otherswords as $word) {
              echo ''.$word->{'word'}.'  ';
            } ?>
        </div>
      </div>
  </div>
  <div class="span5 ol-transparent bg-white">
    <div class="panel no-border">
        <div class="panel-header fg-white bg-green">Recently added</div>
        <div class="panel-content fg-dark nlp nrp" style="overlow:auto">
          <?php
            if(count($recentwords) > 0)
            {
              foreach ($recentwords as $word) 
              {
                echo ''.$word->{'word'}.'  ';
              } 
            }
            else
            {
              echo 'You have not added any words';
            }
            ?>
        </div>
      </div>
  </div>

</div>
</div>