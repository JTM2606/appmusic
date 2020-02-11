<?php
	$invoiceLineId=null;
			$stmt = $conn->prepare("SELECT MAX(invoicelineid) AS invoicelineid FROM INVOICELINE");
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
					
			foreach($stmt->fetchAll() as $row) {
				$invoiceLineId=($row["invoicelineid"])+1;
			}
?>