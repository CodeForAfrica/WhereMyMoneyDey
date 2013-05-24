<?php
	
	$region = $_POST['region'];
	
	$sql = mysql_query("SELECT * FROM regions LEFT JOIN amounts ON regions.id=amounts.id WHERE regions.id='$region'");
		while($row=mysql_fetch_array($sql)){
			print $row['district'];
			print "<br />";
			print $row['capital'];
			
			}
?>

<div id="chart"> 
	<iframe src= "wmmd/wp-content/themes/where_my_money_dey/mapthingy/chart.php?region=<?php echo $region;?>" frameborder='0' scrolling='no'></iframe>
</div> 