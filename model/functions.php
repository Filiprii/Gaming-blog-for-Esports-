<?php


function is_admin() { 
	return ($_SESSION['user_level'] ?? '') !== USER_ADMIN ? false : true;
}
function is_user() {
	return ($_SESSION['loggedin'] ?? '') == 1 ? true : false;
}	

function redirect ($uri) {
	global $_db;
	if ($uri == '') return;
	db_close($_db);
	header("Location: {$uri}");
	exit;
}	

?>