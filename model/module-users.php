<?php


if	(
	!(
		is_admin()
		|| (int)(is_user() && $_action == 'edit')
		|| (!is_user() && $_action == 'submit')
	)
)
	redirect(FILE_ERROR_404);

function users_test_data() {
		global $_error;
		$username = htmlspecialchars($_POST['username'] ?? '');
		$password = $_POST['password'] ?? '';
		$password_confirm = $_POST['password-confirm'] ?? '';
		$gender = $_POST['gender'];
			
		if ($username == '')
				$_error[] = 'Unesite korisničko ime';
		else if (preg_match('#[^a-z0-9_]+#', $username))
				$_error[] = 'U korisničkom su dozvoljena samo slova, brojevi i donja crta';			
			if ($password == '')
				$_error[] = 'Unesite lozinku';
	//		else if (strlen($password) < 8)
	//			$_error[] = 'Lozinka mora imati više od 8 karaktera';
				
			if ($password_confirm == '')
				$_error[] = 'Unesite potrvdu lozinke';
			else if ($password != $password_confirm)
				$_error[] = 'Potvrda lozinke nije korektna';
			
			if ($gender == '')
				$_error[] = 'Unesite svoj pol';
		

		return empty($_error)
			? true
			: false;

	}
switch ($_action) {
	case 'submit' :
		//print "Registracija korisničkog naloga";
		$page_title = "Registracija";
		$module_view_filename = 'module-users-submit.php';
		if ($_POST) {
			if (users_test_data()) {
				$users_date = date('Y-m-d H:i:s');
				$sql = "INSERT INTO `users` 
						(`users_username`, `users_password`, `users_date`, `users_gender`) VALUES 
						('{$_POST['username']}', '{$_POST['password']}', '{$users_date}', '{$_POST['gender']}')";
				$result = mysqli_query($_db, $sql);
				if ($result === false)
					$_error[] = 'Podaci nisu ubačeni u bazu podataka';
				else
					$_message[] = 'Vaš korisnički nalog je uspešno kreiran';
			}
		}
		break;
	case 'edit' :
		//print "Izmena korisničkog naloga";
		if ($_POST) {
			if (users_test_data()) {
				$sql = "UPDATE `users` 
						SET 
							`users_username` = '{$_POST['username']}', 
							`users_password` = '{$_POST['password']}'
						WHERE 
							`users_id` = {$_id}
						LIMIT 1";
				$result = mysqli_query($_db, $sql);
				if ($result === false)
					$_error[] = 'Podaci nisu ubačeni u bazu podataka';
				else
					$_message[] = 'Vaš korisnički nalog je izmenjen';
				
			}
		}
		
		$page_title = "Izmena korisničkog naloga";
		$module_view_filename = 'module-users-submit.php';
		
		$row = [];
		$sql = "SELECT * 
				FROM `users` 
				WHERE 
					`users_id`= $_id 
					AND `users_username` = '{$_SESSION['username']}'				
				LIMIT 1";
		$result= mysqli_query($_db, $sql);
		$row = mysqli_fetch_assoc($result);
		if (empty($row)) {
			redirect(FILE_ERROR_404);
			break;
		}
		$username = $row['users_username'];
		$password = $row['users_password'];
		break;
	case 'delete' :
		//print "Brisanje korisničkog naloga";
		if (isset($_POST['confirmation'])) { 
			$confirmation = $_POST['confirmation'];
			if ($confirmation) {
				$sql = "DELETE FROM `users` WHERE `users_id` = $_id LIMIT 1";
				mysqli_query($_db, $sql);
			}
				redirect(FILE_INDEX . "?module=users");
		}
		else {	
		$page_title = "Potvrda";
		$module_view_filename = 'page-action-delete-confirm.php';
		}
		break;
	case 'view' :
		//print "Pregled korisničkog naloga";
		$page_title = "Profil korisnika";
		$module_view_filename = 'module-users-article.php';
		if (!$_id) {
			redirect(FILE_ERROR_404);
			break;
		}
		$sql = "SELECT * FROM `users` WHERE `users_id` = {$_id} LIMIT 1";
		$result = mysqli_query($_db, $sql);
		$row = mysqli_fetch_assoc($result);
		if ($result === false || empty($row) || mysqli_num_rows($result) == 0) {
			$_error[] = 'Traženi podatak ne postoji';
			break;
		}			
		break;
	case '' :
		//print "Listing korisničkih naloga";
		$page_title = "Spisak korisnika";
		$module_view_filename = 'module-users-view.php';
		$data = [];
		$sql = "SELECT * FROM `users`";
		$result = mysqli_query($_db, $sql);
		while ($row = mysqli_fetch_assoc($result))
			$data[] = $row;
		break;
	default:
		redirect(FILE_ERROR_404);
		break;
}

$_page_output = [
	'page_title' => $page_title != '' ? $page_title : 'Registracija',
	'view' => $module_view_filename != '' ? $module_view_filename : 'module-users.php',
	'breadcrumbs' => [
		FILE_INDEX => 'Početna',
		FILE_INDEX . '?module=users' => 'Korisnici',
		
	]
];

?>