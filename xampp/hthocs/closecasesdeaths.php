<h3 >f. Ζεύγη χωρών με πολύ κοντινούς αριθμούς κρουσμάτων ή θανάτων (π.χ. με διαφορά μικρότερη από 10%) μέσα σε μια χρονική περίοδο που δίνεται από το χρήστη</h3>
<form method="post">
		<div class="input-daterange input-group" id="datepicker">
			<input <?php if (! is_null($_POST['start'])) { echo ' value="'.$_POST['start'].'" ';  };?> type="text" placeholder="Ημερομηνία έναρξης: π.χ. 01/03/2021" class="input-sm form-control" name="start" id="Startl"/>
				<span class="input-group-addon">έως</span>
			<input <?php if (! is_null($_POST['end'])) { echo ' value="'.$_POST['end'].'" ';  };?> type="text" placeholder="Ημερομηνία τέλους: π.χ. 13/03/2021" class="input-sm form-control" name="end" id="Endl"/>
    </div>
	<input class="btn btn-primary" type="submit" value="Submit">
</div>
</form>



<?php
$StartDate=$_POST["start"];
$EndDate=$_POST["end"];

if ($StartDate=="" || is_null($StartDate)) {
	$StartDate = "";
}
else {
	$StartDate=$_POST["start"];
}
if ($EndDate=="" || is_null($EndDate)) {
	$EndDate = "";
}
else {
	$EndDate=$_POST["end"];
}
$db=new MyDB();
$db->change_db("ergasia");
$sql="SELECT 
		country, SUM(cases) as totalcases, SUM(deaths) as totaldeaths
	FROM
		death_data
	WHERE
		STR_TO_DATE(date, '%d/%m/%Y') BETWEEN STR_TO_DATE('".$StartDate."','%d/%m/%Y') and STR_TO_DATE('".$EndDate."', '%d/%m/%Y')
	GROUP BY country;";

	$result = $db->mysqli_($sql);
	//echo $sql;
	$totalcases=mysqli_fetch_all($result);
	//var_dump($totalcases);
	//Correlation matches <10%
	$matches=array();
	foreach ($totalcases as $i=>&$val1){
		foreach ($totalcases as $j=>&$val2){
			if ($j>$i) {
				if ($val1[0]!= $val2[0]){
					if ((($val1[1]+$val2[1])==0) or (($val1[2]+$val2[2])==0)){
						array_push($matches,array($val1[0],$val2[0],$val1[1], $val2[1], $val1[2],$val2[2]));
					}
					elseif (abs($val1[1]-$val2[1])/($val1[1]+$val2[1])<=0.1 or abs($val1[2]-$val2[2])/($val1[2]+$val2[2])<=0.1){
						array_push($matches,array($val1[0],$val2[0],$val1[1], $val2[1], $val1[2],$val2[2]));
					}
					else {
					}
				}
			}
		}
	}
	//$matches=array_unique ($matches,SORT_REGULAR);
	echo '<table class="table table-striped">
  <thead>
    <tr>
	  <th scope="col">#</th>
      <th scope="col">Country 1</th>
	  <th scope="col">Country 2</th>
      <th scope="col">Cases Country 1</th>
	  <th scope="col">Cases Country 2</th>
	  <th scope="col">Deaths Country 1</th>
	  <th scope="col">Deaths Country 2</th>
    </tr>
  </thead><tbody>';
  $i=1;
  foreach ($matches as &$val_tz) {
		  echo '
  
    <tr>
      <td scope="row">'.$i.'</td>
      <td>'.$val_tz[0].'</td>
      <td>'.$val_tz[1].'</td>
	  <td>'.$val_tz[2].'</td>
	  <td>'.$val_tz[3].'</td>
	  <td>'.$val_tz[4].'</td>
	  <td>'.$val_tz[5].'</td>
    </tr> ';
		$i++;
  }
	echo '</tbody></table>';
	// Testing data
	echo 'Last error: ', json_last_error_msg(), PHP_EOL, PHP_EOL;
?>
