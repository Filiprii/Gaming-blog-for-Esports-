<?php
	

if ($_action == 'logout' && ($_SESSION['loggedin'] ?? '')== 1) {
	$_SESSION['loggedin'] = 0;
	$_SESSION['user_level'] = '';
	redirect(FILE_INDEX);
}

if($_POST) {
	$user = module_login_test_data();
	
	if (is_array($user) && !empty($user) && $user !== false) {
		$_SESSION['loggedin'] = 1;
		$_SESSION['username'] = $user['users_username'];
		$_SESSION['user_level'] = (int)$user['users_level'];
		redirect(FILE_INDEX);
	}
}				

$_page_output = [
	'page_title' => 'Prijava',
	'view' => 'module-login.php'	
];

?>