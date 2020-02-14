<?php
function obtenerIDS($conn) {
	
	try {
		$id=array();
		$stmt = $conn->prepare("SELECT CUSTOMERID FROM CUSTOMER");
		$stmt->execute();
		
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		foreach($stmt->fetchAll() as $row) {
			$id[]=$row["CUSTOMERID"];
		}
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	
	$conn = null;
	
	
	
	return $id;
	
	
}
?>