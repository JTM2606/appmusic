<?php
function obtenerCanciones($conn) {
	
	try {
		$canciones=array();
		$stmt = $conn->prepare("SELECT * FROM TRACK");
		$stmt->execute();
		
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		foreach($stmt->fetchAll() as $row) {
			$canciones[]=$row["Name"];
		}
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	
	$conn = null;
	
	
	
	return $canciones;
	
	
}
?>