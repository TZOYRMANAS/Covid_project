
<h3 >g. Φόρμα εισαγωγής νέων δεδομένων για μια χώρα και ημερομηνία (όλα τα στοιχεία και με έλεγχο λαθών) στον πίνακα death_date</h3>
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
			<span class="input-group-addon">Day:</span><input <?php if (! is_null($_POST['day'])) { echo ' value="'.$_POST['day'].'" ';  };?> type="text" placeholder="π.χ. 01" class="input-sm form-control" name="day" id="Day"/>
				<span class="input-group-addon">Month:</span>
			<input <?php if (! is_null($_POST['month'])) { echo ' value="'.$_POST['month'].'" ';  };?> type="text" placeholder="π.χ. 01" class="input-sm form-control" name="month" id="Monthl"/>
				<span class="input-group-addon">Year:</span>
			<input <?php if (! is_null($_POST['year'])) { echo ' value="'.$_POST['year'].'" ';  };?> type="text" placeholder="π.χ. 2021" class="input-sm form-control" name="year" id="Yearl"/>
		</div>
		<div class="input-daterange input-group" id="DeathData">
			<span class="input-group-addon">Cases:</span><input <?php if (! is_null($_POST['casesf'])) { echo ' value="'.$_POST['casesf'].'" ';  };?> type="text" placeholder="π.χ. 145" class="input-sm form-control" name="casesf" id="Casesfl"/>
				<span class="input-group-addon">Deaths:</span>
			<input <?php if (! is_null($_POST['deathsf'])) { echo ' value="'.$_POST['deathsf'].'" ';  };?> type="text" placeholder="π.χ. 35" class="input-sm form-control" name="deathsf" id="Deathsfl"/>
		</div>
		<input class="btn btn-primary" name="insert" type="submit" value="Insert"  >
</form>

<?php

if (isset($_POST['insert'])){
	$allok=True;
	if ($_POST['day'] < 1 or $_POST['day']>31 or !( is_int($_POST['day']-'0')) or ! is_numeric($_POST['day'])){
		echo "<h5> Το πεδίο <b>Day</b> πρέπει να είναι ακέραιος 1 - 31</h5>";
		$allok=false;
	}
	if ( ($_POST['year'] % 4 == 0 AND $_POST['month'] == 2 AND $_POST['day']>28)) {
		echo "<h5>  Η ημερομηνία δεν είναι σωστή γιατί ο φεβρουάριος έχει 28 μέρες τα δίσεκτα έτη.</h5>";
		$allok=false;
	}
	if ( ($_POST['year'] % 4 != 0 AND $_POST['month'] == 2 AND $_POST['day']>29)) {
		echo "<h5>  Η ημερομηνία δεν είναι σωστή γιατί ο φεβρουάριος έχει 29 μέρες.</h5>";
		$allok=false;
	}
	if (($_POST['month'] == 4 OR $_POST['month'] == 6 OR $_POST['month'] == 9 OR $_POST['month'] == 11) AND $_POST['day']>30) {
		echo "<h5>  Η ημερομηνία δεν είναι σωστή γιατί ο μήνας αυτός έχει 30 μέρες.</h5>";
		$allok=false;
	}
	if ($_POST['month'] < 1 or $_POST['month']>12 or !( is_int($_POST['month']-'0')) or ! is_numeric($_POST['month'])){
		echo "<h5> Το πεδίο <b>Month</b> πρέπει να είναι ακέραιος 1 - 12</h5>";
		$allok=false;
	}
	if ($_POST['year'] < 2020 or $_POST['year']>2021 or !( is_int($_POST['year']-'0')) or ! is_numeric($_POST['year'])){
		echo "<h5> Το πεδίο <b>Year</b> πρέπει να είναι ακέραιος 2020 - 2021</h5>";
		$allok=false;
	}
	if ($_POST['casesf'] < 0 or !is_int($_POST['casesf']-'0') or ! is_numeric($_POST['casesf'])){
		echo "<h5> Το πεδίο <b>cases</b> πρέπει να είναι ακέραιος μεγαλύτερο ή ίσο με το 0</h5>";
		$allok=false;
	}
	if ($_POST['deathsf'] < 0 or !is_int($_POST['deathsf']-'0') or ! is_numeric($_POST['deathsf'])){
		echo "<h5> Το πεδίο <b>deaths</b> πρέπει να είναι ακέραιος μεγαλύτερο ή ίσο με το 0</h5>";
		$allok=false;
	}

	$Country=$_POST['Country'];
}

if ($allok==True) {
$db=new MyDB();
$db->change_db("ergasia");
$sql="SELECT 
		population
	FROM
		death_data
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
		death_data;";
	$result = $db->mysqli_($sql);
	//echo $sql;
	$allid=mysqli_fetch_all($result);
	//print_r($allid);
	foreach($allid as $lasttz){
		$lastid=$lasttz[0];
	}
	//echo $lastid[0];
	$dayf=intval($_POST['day']);
	$monthf=intval($_POST['month']);
	$yearf=intval($_POST['year']);
	$deathsf=$_POST['deathsf']-'0';
	$casesf=$_POST['casesf']-'0';
	$datef="";
	if ($dayf<10){
		$datef.="0".$dayf;
	} else {
		$datef.=$dayf;
	}
	if ($monthf<10){
		$datef.="/0".$monthf;
	} else {
		$datef.="/".$monthf;
	}
	$datef .="/".$yearf;
	$lastid=intval($lastid)+1;
$sql="INSERT INTO `death_data`  
	(`id`,`country`,`year`,`month`,`day`,`date`,`cases`,`deaths`,`population`)
	VALUES
	(".$lastid.", '".$Country."',".$yearf.", ".$monthf.", ".$dayf.", '".$datef."', ".$casesf.", ".$deathsf.", ".$population.");";
	// echo $sql;
	$result = $db->mysqli_($sql);
	echo 'Επιτυχής εισαγωγή εγγραφής!<br>';
	// Testing data
	echo 'Last error: ', json_last_error_msg(), PHP_EOL, PHP_EOL;
}
?>
