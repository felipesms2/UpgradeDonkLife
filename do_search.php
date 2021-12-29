<?php

include "./model-db-control.php";

//$_POST['querystr'] = "s";
	if(isset($_POST['querystr'])){

		$conn = new mysqli('localhost', 'felipe', 'W3.org@//', 'u369732545_forum');
		$results = array('error' => false, 'data' => '');
		$querystr = $_POST['querystr'];
		if(empty($querystr))
		{
			$results['error'] = true;
		}
		else
		{
			$sqlGetType = "SELECT * FROM users WHERE `name` LIKE '%$querystr%'";
			$resultType = $pdo->query($sqlGetType);
			$rowCount = $resultType->rowCount();
			if($rowCount > 0)
			{
				$listSearched = $resultType->fetchAll(PDO::FETCH_ASSOC);
				//echo "<pre>" , var_dump($listSearched) ;
				for ($i=0; $i < count($listSearched) ; $i++) 
				{ 
					$results['data'] .= "<li class='list-gpfrm-list' data-fullname='".$listSearched[$i]['name']." ".$listSearched[$i]['sirname']."'>".$listSearched[$i]['name']." ".$listSearched[$i]['sirname']."</li>";
				}
			}
			else
			{
				$results['data'] = "
					<li class='list-gpfrm-list'>No found data matches Records</li>
				";
			}
		}
		echo json_encode($results);
		//var_dump($results);

	}

?>
