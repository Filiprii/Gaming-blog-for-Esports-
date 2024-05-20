<?php


if	(!is_admin() && !in_array($_action, ['', 'view']))
	redirect(FILE_ERROR_404);


switch ($_action) {
	case 'submit' :
		//print "Registracija tima";
		$page_title = "Ubaci novi tim";
		$module_view_filename = 'module-teams-submit.php';
		
		if ($_POST) {
				$teams_date = date('Y-m-d H:i:s');
				$sql = "INSERT INTO `teams` 
						(`teams_title`, `teams_short`, `teams_desc`, `teams_date`) VALUES 
						('{$_POST['title']}', '{$_POST['short']}', '{$_POST['desc']}', '{$teams_date}')";
				$result = mysqli_query($_db, $sql);
				$title = $_POST['title'];
				$short = $_POST['short'];
				$desc = $_POST['desc'];
				if ($result === false)
					$_error[] = 'Podaci nisu ubačeni u bazu podataka';
				else
					$_message[] = 'Tim je uspešno dodat';
			}
		break;
	case 'edit' :
		//print "Izmena tima";
		
		if ($_POST) {
				$teams_date = date('Y-m-d H:i:s');
				$sql = "UPDATE `teams` 
						SET 
							`teams_title` = '{$_POST['title']}', 
							`teams_short` = '{$_POST['short']}',
							`teams_desc` = '{$_POST['desc']}',
							`teams_date` = '$teams_date'
						WHERE 
							`teams_id` = {$_id}
						LIMIT 1";
				$title = $_POST['title'];
				$short = $_POST['short'];
				$desc = $_POST['desc'];		
				$result = mysqli_query($_db, $sql);
				if ($result === false)
					$_error[] = 'Podaci nisu ubačeni u bazu podataka';
				else
					$_message[] = 'Tim je izmenjen';
		}
		$page_title = "Izmena tima";
		$module_view_filename = 'module-teams-submit.php';
		
		$row = [];
		$sql = "SELECT * 
				FROM `teams` 
				WHERE 
					`teams_id`= $_id 			
				LIMIT 1";
		$result= mysqli_query($_db, $sql);
		$row = mysqli_fetch_assoc($result);
		if (empty($row)) {
			$_error[] = 'Traženi tim ne postoji';
			break;
		}
		$title = $row['teams_title'];
		$short = $row['teams_short'];
		$desc = $row['teams_desc'];
		break;
	case 'delete' :
		//print "Brisanje timova";
		if (isset($_POST['confirmation'])) { 
			$confirmation = $_POST['confirmation'];
			if ($confirmation) {
				$sql = "DELETE FROM `teams` WHERE `teams_id` = $_id LIMIT 1";
				mysqli_query($_db, $sql);
			}
				redirect(FILE_INDEX . "?module=teams");
		}
		else {	
		$page_title = "Potvrda";
		$module_view_filename = 'page-action-delete-confirm.php';
		}
		break;
	case 'view' :
		//print "Pregled tima";
		$module_view_filename = 'module-teams-article.php';
		if (!$_id) {
			redirect(FILE_ERROR_404);
			break;
		}
		$sql = "SELECT * FROM `teams` WHERE `teams_id` = {$_id} LIMIT 1";
		$result = mysqli_query($_db, $sql);
		$row = mysqli_fetch_assoc($result);
		if ($result === false || empty($row) || mysqli_num_rows($result) == 0) {
			$_error[] = 'Traženi tim ne postoji';
			break;
		}			
		$page_title =$row['teams_title'];
		$row['teams_desc'] = preg_replace("#[\r\n]+#", '<br><br>', $row['teams_desc']);
		break;
	case '' :
		//print "Listing timova";
		
		$page_title = "Tvoji e timovi";
		$module_view_filename = 'module-teams-view.php';
		$data = [];
		$sql = "SELECT * 
				FROM `teams` 
				ORDER BY `teams_date` 
				DESC";
		$result = mysqli_query($_db, $sql);
		while ($row = mysqli_fetch_assoc($result))
			$data[] = $row;
		if(empty($data))
			$_message[] = 'Trenutno nema nijednog tima'; 
		break;
	default:
		redirect(FILE_ERROR_404);
		break;
}


$_page_output = [
	'page_title' => $page_title != '' ? $page_title : 'E Timovi',
	'view' => $module_view_filename != '' ? $module_view_filename : 'module-teams.php',
	'breadcrumbs' => [
		FILE_INDEX => 'Početna',
		FILE_INDEX . '?module=teams' => 'E Timovi',
		
	]
];

?>