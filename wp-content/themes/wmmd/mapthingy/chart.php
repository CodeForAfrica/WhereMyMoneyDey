<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<?php

$link = mysql_connect("mysql.labs.openinstitute.com", "anne_oi", "anne@oi") or die("Could not connect");
mysql_select_db("wheremymoneydey", $link);
$region = $_GET['region'];

$sql = mysql_query("SELECT * FROM amounts WHERE id='$region'");
$row = mysql_fetch_array($sql);

$year_amounts = array();
for($i=2006;$i<2012;$i++){
	$j = $i.'r';
	$k = $i.'d';
	
	$j = $row[$j];
	$k = $row[$k];
	
	$year_amounts[] = "['$i', $j, $k]";
}

?>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Year', 'Received', 'Due'],
	<?php
		print implode(',', $year_amounts);
	?>
    ]);
    var options = {
       // colors: ['#c7cfc7', '#b2c8b2', '#d9e0de', '#cdded1'],
       // chartArea: {left:38,top:30, width:"75%",height:"70%"},
       // legendTextStyle: {color:'#666666'},
       // hAxis: {title: 'Year',
       // titleTextStyle: {color: '#5c5c5c'},
       // titlePosition: 'out'},
      hAxis: {fontSize: '14', baselineColor: '#ffffff'},
      vAxis: {format: '#,### k'},      
      backgroundColor: 'transparent',
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>
<div id="chart_div"></div>