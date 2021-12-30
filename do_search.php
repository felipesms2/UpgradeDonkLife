<?php

include "./model-db-control.php";

	//$_POST['placeLive'] = "belo ho";
	//$conn = new mysqli('localhost', 'felipe', 'W3.org@//', 'u369732545_forum');
	if(isset($_POST['placeLive'])){

		
		$results = array('error' => false, 'data' => '');
		$placeLive = $_POST['placeLive'];
		if(empty($placeLive))
		{
			$results['error'] = true;
		}
		else
		{
			$separator = "' - '";
			$sqlGetType = "
			SELECT 
			c.id,
			c.nome,
			c.uf,
			e.uf,
			concat(c.nome, ". $separator .", e.uf) as fullTextSearch,
			c.ibge
		FROM 
			cidade AS c
		LEFT JOIN 
			estado AS e
		ON
			e.id = c.uf
		WHERE concat(c.nome, " . $separator . ", e.uf) LIKE 
			'%". $placeLive ."%'";
			$resultType = $pdo->query($sqlGetType);
			$rowCount = $resultType->rowCount();
			if($rowCount > 0)
			{
				$listSearched = $resultType->fetchAll(PDO::FETCH_ASSOC);
				//var_dump($listSearched);
				//echo "<pre>" , var_dump($listSearched) ;
				for ($i=0; $i < count($listSearched) ; $i++) 
				{ 
					$results['data'] .= "<li class='list-gpfrm-list' data-fullname='".$listSearched[$i]['fullTextSearch']."'>".$listSearched[$i]['fullTextSearch']."</li>";
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
