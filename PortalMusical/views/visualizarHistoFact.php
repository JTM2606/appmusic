<?php


foreach($stmt->fetchAll() as $row) {
				echo "ID_Factura: ".$row["INVOICEID"].", Fecha: ".$row["INVOICEDATE"].", Precio: ".$row["TOTAL"];
				echo "<br>";
			}


?>