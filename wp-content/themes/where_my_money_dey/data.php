<?php

$selectedDistrict = $_GET["district"];
$district_name = $selectedDistrict." District";



// Open our file containing the district data
$district_handle = fopen("wp-content/themes/where_my_money_dey/data/district.csv", "r");

	$district_row[] = fgetcsv($district_handle, 1024);

	$i = 0;
		while (!feof($district_handle) ) {

		$district_row[$i] = fgetcsv($district_handle, 1024);
			if ($selectedDistrict == $district_row[$i][0]){
				$DamountD = $district_row[$i][13];	// the total amount due in the corresponding district
				$DamountR = $district_row[$i][14]; // the total amount received in the corresponding district
				$Doverdue = $district_row[$i][15];
			}

		$district_dropdown .= '<option value="'.$district_row[$i][0].'">'. $district_row[$i][0]. '</option>';
		
		$i++;

		}

// Close the file
fclose($district_handle);	



// Open our file containing the region data
$region_handle = fopen("wp-content/themes/where_my_money_dey/data/ashanti.csv", "r");

	while (!feof($region_handle) ) {

	$region_row = fgetcsv($region_handle, 1024); 
	$RamountD = $region_row[0];	// total amount due in the Ashanti region
	$RamountR = $region_row[1]; // total amount received in the Ashanti region
	$Roverdue = $region_row[2]; 

	} 

// Close the file
fclose($region_handle);	



// Open our file containing the population data
$population_handle = fopen("wp-content/themes/where_my_money_dey/data/ghana_population.csv", "r");

	$j = 0;
	while (!feof($population_handle)) {
		$population_row[$j] = fgetcsv($population_handle, 1024);
		$column_header = $population_row[0];
		$key = array_search("Population", $column_header); // let's look for the column header named "Population"
		if ($district_name == $population_row[$j][0]) {
			$population = $population_row[$j][$key];	// total population in the corresponding district
		}

		if ($population_row[$j][0] == "Ashanti") {
			$ashanti_population = $population_row[$j][3];
			$area_size = $population_row[$j][2];
		}

		$j++;
	}

// Close the file
fclose($population_handle);


// Change values corresponding to dropdown
if($selectedDistrict !== "Ghana" && isset($selectedDistrict)) {
	$region = $selectedDistrict;
	$amountDue = $DamountD;
	$amountReceived = $DamountR;
	$overdue = $Doverdue;
}

else { 
	$region = "Ghana"; 
	$amountDue = $RamountD;
	$amountReceived = $RamountR;
	$overdue = $Roverdue;
	$district_name = $selectedDistrict;
	$population = $population_row[count($population_row)-1][$key];	// total population in Ghana
}


// Determine if company over or underpaid their royalties
if ((int)$overdue > 0) {
	$over_under = "Over Paid";
}
else {
	$over_under = "Under Paid";
}

