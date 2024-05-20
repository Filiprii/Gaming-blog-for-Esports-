<?php


if	(!is_admin() && !in_array($_action, ['', 'view']))
	redirect(FILE_ERROR_404);


switch ($_action) {
	case 'submit' :
		//print "Dodavanje turnira";
		$page_title = "Dodaj novi turnir";
		$module_view_filename = 'module-tours-submit.php';
		
		if ($_POST) {
			switch ($_FILES['image']['error']) {
				case UPLOAD_ERR_INI_SIZE:
				case UPLOAD_ERR_FORM_SIZE:
					$_error[] = 'Veličina slike je veća od dozvoljene';
					break;
				case UPLOAD_ERR_PARTIAL:
					$_error[] = 'Slika nije ubačena na server';
					break;
				case UPLOAD_ERR_NO_FILE:
					$_error[] = 'Nisi označio sliku sa upload';
					break;
				case UPLOAD_ERR_NO_TMP_DIR:
				case UPLOAD_ERR_CANT_WRITE:
				case UPLOAD_ERR_EXTENSION:
					$_error[] = 'Slika nije ubačena';
					break;
			}
			
			$title = $_POST['title'];
			$desc = $_POST['desc'];
				
			if ($title == '')
					$_error[] = 'Unesi naslov';
			if ($desc == '')
					$_error[] = 'Unesi opis';
				
			if (!empty($_error))
				break;
			
				$tours_date = date('Y-m-d H:i:s');
				$sql = "INSERT INTO `tours` 
						(`tours_title`, `tours_desc`, `tours_date`) VALUES 
						('{$title}', '{$desc}', '{$tours_date}')";
				$result = mysqli_query($_db, $sql);
				
				
				if ($result === false)
					$_error[] = 'Podaci nisu ubačeni u bazu podataka';
				else
					$_message[] = 'Turnir je uspešno dodat';
			}
		break;
	case 'edit' :
		//print "Izmena slike turnira";
		
		if ($_POST) {
				$tours_date = date('Y-m-d H:i:s');
				$title = $_POST['title'];
				$desc = $_POST['desc'];		
				$sql = "UPDATE `tours` 
						SET 
							`tours_title` = '{$title}', 
							`tours_desc` = '{$desc}',
							`tours_date` = '$tours_date'
						WHERE 
							`tours_id` = {$_id}
						LIMIT 1";
				$result = mysqli_query($_db, $sql);
				if ($result === false)
					$_error[] = 'Podaci nisu ubačeni u bazu podataka';
				else
					$_message[] = 'Turnir je izmenjen';
		}
		$page_title = "Izmena sadržaja turnira";
		$module_view_filename = 'module-tours-submit.php';
		
		$row = [];
		$sql = "SELECT * 
				FROM `tours` 
				WHERE 
					`tours_id`= $_id 			
				LIMIT 1";
		$result= mysqli_query($_db, $sql);
		$row = mysqli_fetch_assoc($result);
		if (empty($row)) {
			$_error[] = 'Tražena slike turnira ne postoji';
			break;
		}
		$title = $row['tours_title'];
		$desc = $row['tours_desc'];
		break;
	case 'delete' :
		//print "Brisanje turnira";
		if (isset($_POST['confirmation'])) { 
			$confirmation = $_POST['confirmation'];
			if ($confirmation) {
				$sql = "DELETE FROM `tours` WHERE `tours_id` = $_id LIMIT 1";
				mysqli_query($_db, $sql);
			}
				redirect(FILE_INDEX . "?module=tours");
		}
		else {	
		$page_title = "Potvrda";
		$module_view_filename = 'page-action-delete-confirm.php';
		}
		break;
	case 'view' :
		//print "Pregled turnira";
		$module_view_filename = 'module-tours-article.php';
		if (!$_id) {
			redirect(FILE_ERROR_404);
			break;
		}
		$sql = "SELECT * FROM `tours` WHERE `tours_id` = {$_id} LIMIT 1";
		$result = mysqli_query($_db, $sql);
		$row = mysqli_fetch_assoc($result);
		if ($result === false || empty($row) || mysqli_num_rows($result) == 0) {
			$_error[] = 'Traženi turnir ne postoji';
			break;
		}
		$row['img_filename'] = DIR_PUBLIC_TOURS . $row['tours_id'] . '.jpg';
		if (!file_exists($row['img_filename']))
			$_error[] = 'Slika ne postoji';
		$page_title =$row['tours_title'];
		break;
	case '' :
		//print "Listing turnira";
		
		$page_title = "Galerija turnira";
		$module_view_filename = 'module-tours-view.php';
		$data = [];
		$sql = "SELECT * 
				FROM `tours` 
				ORDER BY `tours_date` 
				DESC";
		$result = mysqli_query($_db, $sql);
		while ($row = mysqli_fetch_assoc($result))
			$data[] = $row;
		if(empty($data))
			$_message[] = 'Trenutno nema nijednog turnira'; 
		break;
	default:
		redirect(FILE_ERROR_404);
		break;
}


$_page_output = [
	'page_title' => ($page_title ?? '') != '' ? $page_title : 'Turniri',
	'view' => $module_view_filename != '' ? $module_view_filename : 'module-tours.php',
	'breadcrumbs' => [
		FILE_INDEX => 'Početna',
		FILE_INDEX . '?module=tours' => 'Ostali turniri',
		
	]
];

?>