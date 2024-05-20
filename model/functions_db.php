<?php

function db_connect () {
	include(FILE_CONFIG);
	define('_CONFIG', $_config);
	$db = mysqli_connect(_CONFIG['db_host'], _CONFIG['db_username'], _CONFIG['db_password'], _CONFIG['db_name'], _CONFIG['db_port']);
	if (mysqli_connect_errno()) {
		echo "Neuspešno povezivanje na MySQL:" . $db->connect_error;
		exit();
	}
	return $db;
}

function db_close($db) {
	mysqli_close($db);

}
?>