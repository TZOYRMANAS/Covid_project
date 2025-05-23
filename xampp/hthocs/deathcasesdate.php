<h3 >b. Εμφάνιση αριθμού κρουσμάτων και θανάτων σε μια χρονική περίοδο και χώρα (2 ημερομηνίες ΑΡΧΗ-ΤΕΛΟΣ δίδονται από τον χρήστη και χώρα όπως πριν)</h3>
<form name="form1" method="post">
  <div class="form-group">
	<label for="Country">Επιλέξτε χώρα:</label>
    <select class="form-control form-control-lg" name="Country" id="Country">
		<option <?php if ($_POST['Country'] == 'Austria') { echo ' selected ';  };?> value="Austria">Austria</option>
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
			<input <?php if (! is_null($_POST['start'])) { echo ' value="'.$_POST['start'].'" ';  };?> type="text" placeholder="Ημερομηνία έναρξης: π.χ. 01/03/2021" class="input-sm form-control" name="start" />
				<span class="input-group-addon">έως</span>
			<input <?php if (! is_null($_POST['end'])) { echo ' value="'.$_POST['end'].'" ';  };?> type="text" placeholder="Ημερομηνία τέλους: π.χ. 13/03/2021" class="input-sm form-control" name="end" />
    </div>
	<input class="btn btn-primary" type="submit" value="Submit" />
</div>
</form>



<?php
$Country=$_POST["Country"];
$StartDate=$_POST["start"];
$EndDate=$_POST["end"];
if ($Country=="" || is_null($Country)) {
	$StrS = "&nbsp;";
	$StartDate="";
	$EndDate="";
}
else {
	$StrS = "1";
}
/*if ($StartDate=="" || is_null($StartDate)) {
	$StartDate = "01/03/2021";
}
else {
	$StartDate=$_POST["start"];
}
if ($EndDate=="" || is_null($EndDate)) {
	$EndDate = "02/03/2021";
}
else {
	$EndDate=$_POST["end"];
}*/
$db=new MyDB();
$db->change_db("ergasia");
$sql="SELECT 
		SUM(deaths)  totaldeath
	FROM
		death_data
	WHERE
		country = '".$Country."' and ( STR_TO_DATE(date, '%d/%m/%Y') BETWEEN STR_TO_DATE('".$StartDate."','%d/%m/%Y') and STR_TO_DATE('".$EndDate."', '%d/%m/%Y'));";
	$result = $db->mysqli_($sql);
	//echo $sql;
	$totaldeath=mysqli_fetch_array($result);
	//echo $totaldeath['totaldeath'];
$sql="SELECT 
		SUM(cases)  totalcases
	FROM
		death_data
	WHERE
		country = '".$Country."' and ( STR_TO_DATE(date, '%d/%m/%Y') BETWEEN STR_TO_DATE('".$StartDate."','%d/%m/%Y') and STR_TO_DATE('".$EndDate."', '%d/%m/%Y'));";

	$result = $db->mysqli_($sql);
	//echo $sql;
	$totalcases=mysqli_fetch_array($result);
	//echo $totalcases['totalcases'];
	
	echo '<table class="table table-striped">
  <thead>
    <tr>
	  <th scope="col">#</th>
      <th scope="col">Country</th>
      <th scope="col">Deaths</th>
      <th scope="col">Cases</th>
	  <th scope="col">Period</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row">1</td>
      <td>'.$Country.'</td>
      <td>'.$totaldeath["totaldeath"].'</td>
      <td>'.$totalcases["totalcases"].'</td>
	  <td>'.$StartDate.' - '.$EndDate.'</td>
    </tr>
  </tbody>
</table>';
	// Testing data
	echo 'Last error: ', json_last_error_msg(), PHP_EOL, PHP_EOL;
?>
