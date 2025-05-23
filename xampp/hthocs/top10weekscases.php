<!--<form method="post">
  <div class="form-group">
	<label for="Country">Επιλέξτε χώρα:</label>
    <select class="form-control form-control-lg" name="Country" id="Country" onchange="this.form.submit();">
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
</form>
-->
<h3 >e. Ο αριθμός των εβδομάδων που κάθε χώρα της ΕΕ βρέθηκε στο top-10 των χωρών με τα περισσότερα κρούσματα</h3>

<?php
$Country=$_POST["Country"];
//if ($Country=="" || is_null($Country)) {
//	$Country = "";
//}
//else {
//	$Country=$_POST["Country"];
//}
$db=new MyDB();
$db->change_db("ergasia");

$sql="SELECT country, count(country) as counttop
FROM
(
SELECT
    week,
    country,
    new_cases
FROM
(
    SELECT
        week,
        country,
        new_cases,
        @rn := IF(@prev = week, @rn + 1, 1) AS rn,
        @prev := week
    FROM testing_data
    JOIN (SELECT @prev := NULL, @rn := 0) AS vars
    ORDER BY week ASC, new_cases DESC
) AS T1
WHERE rn <= 10
) AS T2
GROUP BY country";

	$result = $db->mysqli_($sql);
	// echo $sql;
	$totaltests=mysqli_fetch_all($result);
	//echo $totaltests['totaltests'];
	
	echo '<table class="table table-striped">
  <thead>
    <tr>
	  <th scope="col">#</th>
	  <th scope="col">Country</th>
      <th scope="col">Top Weeks</th>
    </tr>
  </thead><tbody>';
  $i=1;
  foreach ($totaltests as &$val_tz) {
		  echo '
  
    <tr>
      <td scope="row">'.$i.'</td>
      <td>'.$val_tz[0].'</td>
      <td>'.$val_tz[1].'</td>
    </tr> ';
		$i++;
  }
	echo '</tbody></table>';
	// Testing data
	echo 'Last error: ', json_last_error_msg(), PHP_EOL, PHP_EOL;
?>
