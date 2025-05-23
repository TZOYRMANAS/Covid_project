<?php
// Σύνδεση στη βάση
$mysqli = new mysqli("root", "username", "", "ergasia");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Testing data
$json_tz = file_get_contents('https://opendata.ecdc.europa.eu/covid19/testing/json/');
$jsondata_tz = json_decode($json_tz, true);

$i = 1;
foreach ($jsondata_tz as $value_tz) {
    if ($value_tz['level'] == "national") {
        $stmt = $mysqli->prepare("INSERT INTO testing_data (id, country, week, new_cases, tests_done, population, testing_rate, positivity_rate, testing_data_source) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issiiidds", 
            $i,
            $value_tz['country'],
            $value_tz['year_week'],
            $value_tz['new_cases'],
            $value_tz['tests_done'],
            $value_tz['population'],
            $value_tz['testing_rate'],
            $value_tz['positivity_rate'],
            $value_tz['testing_data_source']
        );
        $stmt->execute();
        $stmt->close();
        $i++;
    }
}

// Daily death data
$json_tz = file_get_contents('https://opendata.ecdc.europa.eu/covid19/nationalcasedeath_eueea_daily_ei/json/');
$jsondata_tz = json_decode($json_tz, true);

$i = 1;
foreach ($jsondata_tz['records'] as $value_tz) {
    $stmt = $mysqli->prepare("INSERT INTO death_data (id, country, year, month, day, date, cases, deaths, population) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isiiissiii",
        $i,
        $value_tz['countriesAndTerritories'],
        $value_tz['year'],
        $value_tz['month'],
        $value_tz['day'],
        $value_tz['dateRep'],
        $value_tz['cases'],
        $value_tz['deaths'],
        $value_tz['popData2020']
    );
    $stmt->execute();
    $stmt->close();
    $i++;
}

echo "Εισαγωγή δεδομένων ολοκληρώθηκε.";
?>
