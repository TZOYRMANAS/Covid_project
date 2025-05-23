
<h3 >g. Φόρμα εισαγωγής νέων δεδομένων για μια χώρα και εβδομάδα (όλα τα στοιχεία και με έλεγχο λαθών) στον πίνακα testing_data</h3>
<form method="post">
  <div class="form-group">
	<label for="Country">Επιλέξτε χώρα:</label>
    <select class="form-control form-control-lg" name="Country" id="Country">
		<option <?php if ($_POST['Country'] == 'Austria' or !isset($_POST['Country'])) { echo ' selected ';  };?> value="Austria">Austria</option>
		<option <?php if ($_POST['Country'] == 'Belgium') { echo ' selected ';  };?> value="Belgium">Belgium</option>
		<option <?php if ($_POST['Country'] == 'Bulgaria') {  echo ' selected '; };?> value="Bulgaria">Bulgaria</option>
		<option <?php if ($_POST['Country'] == 'Croatia') { echo ' selected ';  };?> value="Croatia">Croatia</option>
		<option <?php if ($_POST['Country'] == 'Cyprus') { echo ' selected '; };?> value="Cyprus">Cyprus</option>
		<option <?php if ($_POST['Country'] == 'Czechia') { echo ' selected '; };?> value="Czechia">Czechia</option>
		<option <?php if ($_POST['Country'] == 'Denmark') { echo ' selected '; };?> value="Denmark">Denmark</option>
		<option <?php if ($_POST['Country'] == 'Estonia') { echo ' selected '; };?> value="Estonia">Estonia</option>
		<option <?php if ($_POST['Country'] == 'Finland') { echo ' selected '; };?> value="Finland">Finland</option>
		<option <?php if ($_POST['Country'] == 'France') { echo ' selected '; };?> value="France">France</option>
		<option <?php if ($_POST['Country'] == 'Germany') { echo ' selected '; };?> value="Germany">Germany</option>
		<option <?php if ($_POST['Country'] == 'Greece') { echo ' selected '; };?> value="Greece">Greece</option>
		<option <?php if ($_POST['Country'] == 'Hungary') { echo ' selected '; };?> value="Hungary">Hungary</option>
		<option <?php if ($_POST['Country'] == 'Iceland') { echo ' selected '; };?> value="Iceland">Iceland</option>
		<option <?php if ($_POST['Country'] == 'Ireland') { echo ' selected '; };?> value="Ireland">Ireland</option>
		<option <?php if ($_POST['Country'] == 'Italy') { echo ' selected '; };?> value="Italy">Italy</option>
		<option <?php if ($_POST['Country'] == 'Latvia') { echo ' selected '; };?> value="Latvia">Latvia</option>
		<option <?php if ($_POST['Country'] == 'Liechtenstein') { echo ' selected '; };?> value="Liechtenstein">Liechtenstein</option>
		<option <?php if ($_POST['Country'] == 'Lithuania') { echo ' selected '; };?> value="Lithuania">Lithuania</option>
		<option <?php if ($_POST['Country'] == 'Luxembourg') { echo ' selected '; };?> value="Luxembourg">Luxembourg</option>
		<option <?php if ($_POST['Country'] == 'Malta') { echo ' selected '; };?> value="Malta">Malta</option>
		<option <?php if ($_POST['Country'] == 'Netherlands') { echo ' selected '; };?> value="Netherlands">Netherlands</option>
		<option <?php if ($_POST['Country'] == 'Norway') { echo ' selected '; };?> value="Norway">Norway</option>
		<option <?php if ($_POST['Country'] == 'Poland') { echo ' selected '; };?> value="Poland">Poland</option>
		<option <?php if ($_POST['Country'] == 'Portugal') { echo ' selected '; };?> value="Portugal">Portugal</option>
		<option <?php if ($_POST['Country'] == 'Romania') { echo ' selected '; };?> value="Romania">Romania</option>
		<option <?php if ($_POST['Country'] == 'Slovakia') { echo ' selected '; };?> value="Slovakia">Slovakia</option>
		<option <?php if ($_POST['Country'] == 'Slovenia') { echo ' selected '; };?> value="Slovenia">Slovenia</option>
		<option <?php if ($_POST['Country'] == 'Spain') { echo ' selected '; };?> value="Spain">Spain</option>
		<option <?php if ($_POST['Country'] == 'Sweden') { echo ' selected '; };?> value="Sweden">Sweden</option>
	</select>
  </div>
  		<div class="input-daterange input-group" id="datepicker">
				<span class="input-group-addon">Week:</span>
			<input <?php if (! is_null($_POST['week'])) { echo ' value="'.$_POST['week'].'" ';  };?> type="text" placeholder="π.χ. 13" class="input-sm form-control" name="week" id="Weekl"/>
				<span class="input-group-addon">Year:</span>
			<input <?php if (! is_null($_POST['year'])) { echo ' value="'.$_POST['year'].'" ';  };?> type="text" placeholder="π.χ. 2021" class="input-sm form-control" name="year" id="Yearl"/>
		</div>
		<div class="input-daterange input-group" id="TestData1">
			<span class="input-group-addon">New Cases:</span><input <?php if (! is_null($_POST['newcasesf'])) { echo ' value="'.$_POST['newcasesf'].'" ';  };?> type="text" placeholder="π.χ. 145" class="input-sm form-control" name="newcasesf" id="NewCasesfl"/>
				<span class="input-group-addon">Tests Done:</span>
			<input <?php if (! is_null($_POST['testdonef'])) { echo ' value="'.$_POST['testdonef'].'" ';  };?> type="text" placeholder="π.χ. 35" class="input-sm form-control" name="testdonef" id="TestDonefl"/>
		</div>
		<div class="input-daterange input-group" id="TestData1">
			<span class="input-group-addon">Positivity Rate:</span><input <?php if (! is_null($_POST['posratef'])) { echo ' value="'.$_POST['posratef'].'" ';  };?> type="text" placeholder="π.χ. 145.0786" class="input-sm form-control" name="posratef" id="PosRatefl"/>
				<span class="input-group-addon">Testing Rate:</span>
			<input <?php if (! is_null($_POST['testratef'])) { echo ' value="'.$_POST['testratef'].'" ';  };?> type="text" placeholder="π.χ. 35.0567" class="input-sm form-control" name="testratef" id="TestRatefl"/>
		</div>
	
	<label for="Country">Test Data Source:</label>
    <select class="form-control form-control-lg" name="Testsource" id="TestSource">
		<option <?php if ($_POST['Testsource'] == 'Country API' or !isset($_POST['Testsource'])) { echo ' selected ';  };?> value="Country API">Country API</option>
		<option <?php if ($_POST['Testsource'] == 'Country GitHub') { echo ' selected ';  };?> value="Country GitHub">Country GitHub</option>
		<option <?php if ($_POST['Testsource'] == 'Country website') {  echo ' selected '; };?> value="Country website">Country website</option>
		<option <?php if ($_POST['Testsource'] == 'Manual webscraping') { echo ' selected ';  };?> value="Manual webscraping">Manual webscraping</option>
		<option <?php if ($_POST['Testsource'] == 'Other') { echo ' selected '; };?> value="Other">Other</option>
		<option <?php if ($_POST['Testsource'] == 'Survey') { echo ' selected '; };?> value="Survey">Survey</option>
		<option <?php if ($_POST['Testsource'] == 'TESSy') { echo ' selected '; };?> value="TESSy">TESSy</option>
	</select>
  </div>
  	<input class="btn btn-primary" name="insert" type="submit" value="Insert"  >
	  <div class="form-group">
</form>

<?php


if (isset($_POST['insert'])){
	$dt = new DateTime('December 28th, '.$_POST['year']);
	$MaxWeeks=intval($dt->format('W'));
	$allok=True;
	if ($_POST['week'] < 1 or $_POST['week']>$MaxWeeks or !( is_int($_POST['week']-'0')) or ! is_numeric($_POST['week'])){
		echo "<h5> Το πεδίο <b>Week</b> πρέπει να είναι ακέραιος 1 - ".$MaxWeeks."</h5>";
		$allok=false;
	}
	if ($_POST['year'] < 2020 or $_POST['year']>2021 or !( is_int($_POST['year']-'0')) or ! is_numeric($_POST['year'])){
		echo "<h5> Το πεδίο <b>έτος</b> πρέπει να είναι ακέραιος 2020 - 2021</h5>";
		$allok=false;
	}
	if ($_POST['newcasesf'] < 0 or !is_int($_POST['newcasesf']-'0') or ! is_numeric($_POST['newcasesf'])){
		echo "<h5> Το πεδίο <b>New Cases</b> πρέπει να είναι ακέραιος μεγαλύτερο ή ίσο με το 0</h5>";
		$allok=false;
	}
	if ($_POST['testdonef'] < 0 or !is_int($_POST['testdonef']-'0') or ! is_numeric($_POST['testdonef'])){
		echo "<h5> Το πεδίο <b>Test done</b> πρέπει να είναι ακέραιος μεγαλύτερο ή ίσο με το 0</h5>";
		$allok=false;
	}
	if ($_POST['posratef'] < 0 or !is_float($_POST['posratef']-'0') or ! is_numeric($_POST['posratef'])){
		echo "<h5> Το πεδίο <b>Positivity Rate</b> πρέπει να είναι αριθμός μεγαλύτερο ή ίσο με το 0</h5>";
		$allok=false;
	}
	if ($_POST['testratef'] < 0 or !is_float($_POST['testratef']-'0') or ! is_numeric($_POST['testratef'])){
		echo "<h5> Το πεδίο <b>Testing Rate</b> πρέπει να είναι αριθμός μεγαλύτερο ή ίσο με το 0</h5>";
		$allok=false;
	}
	$Country=$_POST['Country'];
}

if ($allok) {
$db=new MyDB();
$db->change_db("ergasia");
$sql="SELECT 
		population
	FROM
		testing_data
	WHERE
		country = '".$Country."';";

	$result = $db->mysqli_($sql);
	//echo $sql;
	$populations=mysqli_fetch_array($result);
	$population=$populations['population'];
	//echo $population;
$sql="SELECT 
		id
	FROM
		testing_data;";
	$result = $db->mysqli_($sql);
	//echo $sql;
	$allid=mysqli_fetch_all($result);
	//print_r($allid);
	foreach($allid as $lasttz){
		$lastid=$lasttz[0];
	}
	//echo $lastid[0];
	$weekf=intval($_POST['week']);
	$yearf=intval($_POST['year']);
	$newcasesf=$_POST['newcasesf']-'0'; 
	$testdonef=$_POST['testdonef']-'0';
	$posratef=floatval($_POST['posratef']-'0')+0.0;
	$testratef=floatval($_POST['testratef']-'0')+0.0;
	$testingdatasourcef=$_POST['Testsource'];
	$datef="".$yearf."-W";
	if ($weekf<10){
		$datef.="0".$weekf;
	} else {
		$datef.=$weekf;
	}
	$lastid=intval($lastid)+1;
$sql="INSERT INTO `testing_data`  
	(`id`,`country`,`week`,`new_cases`,`tests_done`,`population`,`testing_rate`,`positivity_rate`,`testing_data_source`)
	VALUES
	(".$lastid.", '".$Country."','".$datef."', ".$newcasesf.", ".$testdonef.", '".$population."', ".$testratef.", ".$posratef.", '".$testingdatasourcef."');";
	//echo $sql;
	$result = $db->mysqli_($sql);																								
	echo 'Επιτυχής εισαγωγή εγγραφής!<br>';
	// Testing data
	echo 'Last error: ', json_last_error_msg(), PHP_EOL, PHP_EOL;
}

?>
