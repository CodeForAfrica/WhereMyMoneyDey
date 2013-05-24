<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.css" />
<!--[if lte IE 8]><link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.ie.css" /><![endif]-->

<script src="wp-content/themes/where_my_money_dey/mapthingy/ajax_request.js"></script>
<script src="wp-content/themes/where_my_money_dey/mapthingy/leaflet.js"></script>
	    <script src="http://maps.google.com/maps/api/js?v=3.2&sensor=false"></script>
<script src="https://gist.github.com/raw/4504864/c9ef880071f959398b7cf0b687d4f37c352ea86d/leaflet-google.js"></script>
	<script type="text/javascript">
		<?php

		if(!isset($_GET['year'])){
			$year = '2006';
		}
		else{
			$year = $_GET['year'];
		}
		
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

			var map = L.map('map').setView([6.2, -1.65], 10);
			var googleLayer = new L.Google('ROADMAP');
			map.addLayer(googleLayer);
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
				this._div.innerHTML = '<h4>Ashanti Region</h4>' +  (props ?
					'<b>' + props.EDNAME + '</b>: ' + commaSeparateNumber(props.TOTAL) + ' (GHC)': 'Hover over a region');
			};

			info.addTo(map);
		var legend = L.control({position: 'bottomright'});
	
			legend.onAdd = function (map) {

				var div = L.DomUtil.create('div', 'info legend'),
				// grades = [0, 10000, 25000, 50000, 100000, 125000, 150000],
				grades = [0, 50000, 100000, 150000],
				labels = ['<b>Amount (in GHC)</b>'],
				from, to;

				for (var i = 0; i < grades.length; i++) {
					from = grades[i];
					to = grades[i + 1];

					labels.push(
						'<i style="background:' + getColor(from + 1) + '"></i> ' +
						commaSeparateNumber(from) + (to ? ' &ndash; ' + commaSeparateNumber(to) : '+'));
				}

				div.innerHTML = labels.join('<br>');
				return div;
			};

			legend.addTo(map);
			// get color depending on population density value
			function getColor(d) {
			return d > 150000 ? '#225EA8' :
			       d > 100000  ? '#41B6C4' :
			       d > 50000   ? '#A1DAB4' :
			                  '#FFFFCC';
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
				map.fitBounds(e.target.getBounds());
				var layer = e.target;
				var ed_id;
				var edType;
					ed_id = layer.feature.properties.OBJECTID;
				
				ajaxrequest('wp-content/themes/where_my_money_dey/mapthingy/process.php', ed_id);
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
		
		var overlays = {
			"Recieved": consituencies,
			"Due": geojson
		};
		
		L.control.layers(overlays).addTo(map);
	</script>


