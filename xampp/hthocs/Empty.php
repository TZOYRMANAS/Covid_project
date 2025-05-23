<?php
 
	$db=new MyDB();
	$sql = "DROP DATABASE IF EXISTS `ergasia`;";
	$result = $db->mysqli_($sql);
	$sql = "CREATE DATABASE `ergasia`;";
	$result = $db->mysqli_($sql);
	$db->change_db("ergasia");
	$sql = "DROP TABLE IF EXISTS `testing_data`;";
	$result = $db->mysqli_($sql);
	$sql = "CREATE TABLE `ergasia`.`testing_data` ( `id` INT(20) NOT NULL , `country` VARCHAR(50) NOT NULL , `week` VARCHAR(10) NOT NULL , `new_cases` INT(16) NOT NULL , `tests_done` INT(16) NOT NULL , `population` INT(16) NOT NULL , `testing_rate` FLOAT(16) NOT NULL , `positivity_rate` FLOAT(16) NOT NULL , `testing_data_source` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;";
	$result = $db->mysqli_($sql);
		$sql = "DROP TABLE IF EXISTS `death_data`;";
	$result = $db->mysqli_($sql);
	$sql = "CREATE TABLE `death_data` ( `id` INT(20) NOT NULL , `country` VARCHAR(50) NOT NULL , `year` INT(4) NOT NULL , `month` INT(2) NOT NULL , `day` INT(2) NOT NULL , `date` VARCHAR(10) NOT NULL , `cases` INT(16) NOT NULL , `deaths` INT(16) NOT NULL , `population` INT(16) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM; ";
	$result = $db->mysqli_($sql);
	echo 'Last error: ', json_last_error_msg(), PHP_EOL, PHP_EOL;
?>

