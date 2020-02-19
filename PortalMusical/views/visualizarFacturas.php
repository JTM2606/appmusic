<?php


foreach($stmt->fetchAll() as $row) {
				echo "Nombre Cancion: ".$row["NAME"]." Fecha: ".$row["INVOICEDATE"]." Numero Descargas: ".$row["TOTAL"];
				echo "<br>";
			}


?>