	<script src="ajax_request.js"></script>
	<?php
	require_once('config.php');
	
	if(isset($_GET['year'])){
		$year = $_GET['year'];
		}else{
			$year = '2006';
		}
	?>
	<div style='float:left;display:inline;width:30%'>
		<form>
		<select style='width:70%' name="URL" onchange="window.location.href='?year='+this.form.URL.options[this.form.URL.selectedIndex].value">
			<option>Select Year</option>
			<option value='2006'>2006</option>
			<option value='2007'>2007</option>
			<option value='2008'>2008</option>
			<option value='2009'>2009</option>
			<option value='2010'>2010</option>
			<option value='2011'>2011</option>
		</select>
		</form>
		<div id="loading" align='center'>
			<img src='loader.gif'>
		</div>
		<script type="text/javascript">document.getElementById("loading").style.display = 'none';</script>
		<div id="context">
			
		</div>
	</div>
	<div style='float:right;display:inline;width:70%'>
		<?php
			include('map.php');
		?>
	</div>