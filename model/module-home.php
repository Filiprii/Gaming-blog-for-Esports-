<?php
		//print "Listing početne - timovi";
		$data_teams = [];
		$sql = "SELECT * 
				FROM `teams` 
				ORDER BY `teams_date` DESC
				LIMIT 5";
		$result = mysqli_query($_db, $sql);
		while ($row = mysqli_fetch_assoc($result))
			$data_teams[] = $row;
		if(empty($data_teams))
			$_message[] = 'Trenutno nema nijednog tima';
		
		//print "Listing početne - turniri";
		$data_tours = [];
		$sql = "SELECT * 
				FROM `tours` 
				ORDER BY `tours_date` DESC
				LIMIT 4";
		$result = mysqli_query($_db, $sql);
		while ($row = mysqli_fetch_assoc($result))
			$data_tours[] = $row;
		if(empty($data_tours))
			$_message[] = 'Trenutno nema nijednog turnira'; 



$_page_output = [
	'page_title' => ($page_title ?? '') != '' ? $page_title : 'DODBRODOŠLI',
	'view' => 'module-home-view.php'
];

?>