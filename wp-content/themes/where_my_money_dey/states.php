<?php 
	$selectedSt = $_POST["states"];
	$rows = $row++;
							
	// if(isset($selectedSt = $_POST["states"])){// get method - should clean the data...
	$row = 0;
	$handle = fopen("$wmmd/data/states.csv", "r");//open file
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	    if ($row == 0) {//skip first row (headers)
	                $row++;} 
	                else {
	        $stAbbrev = $data[0];
	        if ($stAbbrev == $selectedSt){//show only selected state
	            $num = count($data);
	            $row++;
	            for ($c=0; $c < $num; $c++) {
	                if ($c==0){}
	                else{
	                    if ($data[$c]==""){}//if empty line
	                    else{echo $data[$c]."<br />";}}}//write array item
	                    echo "<br />";}}}//end it all with some white space
	    fclose($handle);      