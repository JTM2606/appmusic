<?php
	session_start();
	try {
	
		$customerID=$_SESSION['customer_id'];
		if (!isset($_POST['fecha_i']) || !isset($_POST['fecha_d'])) {
				
			$stmt = $conn->prepare("SELECT INVOICE.INVOICEID,INVOICE.INVOICEDATE,INVOICE.TOTAL
								FROM INVOICE WHERE INVOICE.CUSTOMERID='$customerID'");
			$stmt->execute();
			
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			
				
		
		} else {
			
			$fecha_i=$_POST['fecha_i'];
			$fecha_d=$_POST['fecha_d'];
			if ($fecha_i>$fecha_d) {
				
				throw new PDOException('La fecha Desde es mayor que la fecha Hasta, IMPOSIBLE');			
			}
			$stmt = $conn->prepare("SELECT SUM(QUANTITY) AS TOTAL,NAME,INVOICE.INVOICEDATE FROM TRACK,INVOICELINE,INVOICE WHERE INVOICE.INVOICEID=INVOICELINE.INVOICEID AND INVOICELINE.TRACKID=TRACK.TRACKID 
								AND INVOICE.INVOICEDATE>='$fecha_i' AND INVOICE.INVOICEDATE<='$fecha_d' GROUP BY NAME ORDER BY TOTAL DESC");
			$stmt->execute();
		
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			
			
		}
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	
	$conn = null;
?>