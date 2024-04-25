<?php
	require_once('../../define/config/constants.php');
	require_once('../../define/config/dbconnect.php');

	/* Execute the POST request is submitted */
	if(isset($_POST['itemNumber'])){
		
		$itemNumber = htmlentities($_POST['itemNumber']);
		
		$qItem = 'SELECT * FROM item WHERE itemNumber = :itemNumber';
		$itemStatement = $dbcon->prepare($qItem);
		$itemStatement->execute(['itemNumber' => $itemNum]);
		
		/* If data is found for the given item number, return it as a json object */
		if($itemStatement->rowCount() > 0) {
			$result = $itemStatement->fetch(PDO::FETCH_ASSOC);
			echo json_encode($result);
		}
		$itemStatement->closeCursor();
	}
?>