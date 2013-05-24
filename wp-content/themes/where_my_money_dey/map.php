<?php
function map(){
	if(isset($_GET['period'])){
		$year = $_GET['period'];
		}else{
			$year = '2006';
		}
	?>
	
			<form>
		<select name="URL" onchange="window.location.href='?period='+this.form.URL.options[this.form.URL.selectedIndex].value">
			<option>Select Year</option>
			<option value='2006'<?php if((isset($_GET['period']))&&(($_GET['period'])==2006)){ echo " selected='selected'";}?>>2006</option>
			<option value='2007'<?php if((isset($_GET['period']))&&(($_GET['period'])==2007)){ echo " selected='selected'";}?>>2007</option>
			<option value='2008'<?php if((isset($_GET['period']))&&(($_GET['period'])==2008)){ echo " selected='selected'";}?>>2008</option>
			<option value='2009'<?php if((isset($_GET['period']))&&(($_GET['period'])==2009)){ echo " selected='selected'";}?>>2009</option>
			<option value='2010'<?php if((isset($_GET['period']))&&(($_GET['period'])==2010)){ echo " selected='selected'";}?>>2010</option>
			<option value='2011'<?php if((isset($_GET['period']))&&(($_GET['period'])==2011)){ echo " selected='selected'";}?>>2011</option>
		</select>
		</form>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/leaflet.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/leaflet.ie.css" /><![endif]-->

	<style>
		#map {
			width: 320px;
			height: 280px;
			background-color:#fafafa;

		}

		.info {
			padding: 1px 1px;
			font: 12px/14px Arial, Helvetica, sans-serif;
			background: white;
			background: rgba(255,255,255,0.8);
			box-shadow: 0 0 15px rgba(0,0,0,0.2);
			border-radius: 5px;
		}
		.info h4 {
			margin: 0 0 5px;
			color: #777;
		}

		.legend {
			display:none;
			text-align: left;
			line-height: 18px;
			color: #555;
		}
		.legend i {
		
			width: 18px;
			height: 18px;
			float: left;
			margin-right: 8px;
			opacity: 0.7;
		}
	</style>

	<div id="map"></div>
	<script src="<?php echo get_template_directory_uri(); ?>/leaflet.js"></script>
		    <script src="http://maps.google.com/maps/api/js?v=3.2&sensor=false"></script>
    <script src="https://gist.github.com/raw/4504864/c9ef880071f959398b7cf0b687d4f37c352ea86d/leaflet-google.js"></script>
			<script type="text/javascript">
		<?php
		
		print 'var amountR ={
		"type": "FeatureCollection",                                                                      
		"features": [';
		$data2 = array();
		$sql = mysql_query("SELECT * FROM regions LEFT JOIN amounts ON regions.id=amounts.id");
		while($row=mysql_fetch_array($sql)){
			$amountr = $year.'r';
			$total = $row[$amountr];
			$data2[]= '{ "type": "Feature", "id": '.$row['id'].', "properties": {"OBJECTID": '.$row['id'].', "EDNAME": "'.$row['district'].'", "TOTAL": '.$total.'}, "geometry": { "type": "Polygon", "coordinates": [['.$row['polygon'].']]}}';	
		}

		$data2 = implode(',', $data2);
		print $data2;
		print ']};';
		
		print 'var amountD ={
		"type": "FeatureCollection",                                                                      
		"features": [';
		$data2 = array();
		$sql = mysql_query("SELECT * FROM regions LEFT JOIN amounts ON regions.id=amounts.id");
		while($row=mysql_fetch_array($sql)){
			$amountd = $year.'d';
			$total = $row[$amountd];
			$data2[]= '{ "type": "Feature", "id": '.$row['id'].', "properties": {"OBJECTID": '.$row['id'].', "EDNAME": "'.$row['district'].'", "TOTAL": '.$total.'}, "geometry": { "type": "Polygon", "coordinates": [['.$row['polygon'].']]}}';	
		}

		$data2 = implode(',', $data2);
		print $data2;
		print ']};';
		?>
		</script>
		<script type="text/javascript">
	
			var map = L.map('map').setView([6.2, -1.50], 9);
			var googleLayer = new L.Google('ROADMAP');
			//map.addLayer(googleLayer);
				// control that shows state info on hover
			var info = L.control();
	
			info.onAdd = function (map) {
				this._div = L.DomUtil.create('div', 'info');
				this.update();
				return this._div;
			};
		function commaSeparateNumber(val){
	    while (/(\d+)(\d{3})/.test(val.toString())){
	      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
	    }
	    return val;
	  }
			info.update = function (props) {
				this._div.innerHTML = (props ?
					'<b>' + props.EDNAME + '</b>: ' + commaSeparateNumber(props.TOTAL): 'Hover over a region');
			};
	
			info.addTo(map);

			// get color depending on population density value
			function getColor(d) {
			return d > 150000 ? '#000000' :
			       d > 125000 ? '#BD0026' :
			       d > 100000  ? '#FC4E2A' :
			       d > 50000   ? '#FD8D3C' :
			       d > 25000   ? '#FEB24C' :
			       d > 10000   ? '#FED976' :
			                  '#FFEDA0';
		}
	
			function style(feature) {
				return {
					weight: 2,
					opacity: 1,
					color: 'white',
					dashArray: '3',
					fillOpacity: 0.7,
					fillColor: getColor(feature.properties.TOTAL)
				};
			}
	
			function highlightFeature(e) {
				var layer = e.target;
	
				layer.setStyle({
					weight: 5,
					color: '#666',
					dashArray: '',
					fillOpacity: 0.7
				});
	
				if (!L.Browser.ie && !L.Browser.opera) {
					layer.bringToFront();
				}
	
				info.update(layer.feature.properties);
			}
	
			var geojson;
			var consituencies;
			
			function resetHighlight(e) {
				geojson.resetStyle(e.target);
				info.update();
			}
	
			function zoomToFeature(e) {
				//map.fitBounds(e.target.getBounds());
				var layer = e.target;
				var ed_id;
				var edType;
					ed_id = layer.feature.properties.OBJECTID;
				
				//ajaxrequest('process.php', ed_id);
			}
	
			function onEachFeature(feature, layer) {
				layer.on({
					mouseover: highlightFeature,
					mouseout: resetHighlight,
					click: zoomToFeature
				});
			}
	
		geojson = L.geoJson(amountR, {
			style: style,
			onEachFeature: onEachFeature
		}).addTo(map);
	
		consituencies = L.geoJson(amountD, {
			style: style,
			onEachFeature: onEachFeature
		});
		
		</script>

	
	<?php
	}
	?>