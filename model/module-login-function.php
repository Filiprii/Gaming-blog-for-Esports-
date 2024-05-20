<?php

function module_login_test_data() {
	global $_db, $_error;
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if ($username == '' || $password == '') {
		$_error[] = 'Unesite korisničko ime i/ili lozinku';
		return false;
	}
	$sql = "SELECT * FROM users 
			WHERE 
				 `users_username` = '{$_POST['username']}' 
			LIMIT 1
		";
	$result = mysqli_query($_db, $sql);
	$row = mysqli_fetch_assoc($result);
	
	if (!empty($row)) {
	$test_data = (
			$row['users_username'] == $username
			&& $row['users_password'] == $password
		)
			? true
			: false;
	}
	
	if (!$result || mysqli_num_rows($result) == 0 || !$test_data ) {
		$_error[] = 'Parametri nisu dobro uneti';
		return false;
	}
	
	return $row;
}
?>