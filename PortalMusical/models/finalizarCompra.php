<?php
	try {
		
		$invoiceDate=date('Y-m-d');
		$_SESSION['invoiceDate'] = $invoiceDate;
		
		
		//Esto va cuando se seleccione finalizar compra
			$invoiceId=null;
			$stmt = $conn->prepare("SELECT MAX(invoiceid) AS invoiceid FROM INVOICE");
			$stmt->execute();
				
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
				
			foreach($stmt->fetchAll() as $row) {
				$invoiceId=$row["invoiceid"];
				$invoiceId++;
			}
		
		
		$invoiceId;
		$customerId=$_SESSION['customer_id'];
		$billingAddress=$_SESSION['billingAddress'];
		$billingCity=$_SESSION['billingCity'];
		$billingState=$_SESSION['billingState'];
		$billingCountry=$_SESSION['billingCountry'];
		$billingPostalCode=$_SESSION['billingPostalCode'];
		$total=null;
		
		foreach($_SESSION['carrito'] as $producto) {
		
			$total+=$producto["unitPrice"];	
		
		}
		
		$sql = "INSERT INTO INVOICE (INVOICEID,CUSTOMERID,INVOICEDATE,BILLINGADDRESS,BILLINGCITY,BILLINGSTATE,BILLINGCOUNTRY,BILLINGPOSTALCODE,TOTAL) VALUES ('$invoiceId','$customerId','$invoiceDate','$billingAddress','$billingCity','$billingState','$billingCountry','$billingPostalCode','$total')";
		$conn->exec($sql);
		
		$trackId=null;
		$unitPrice=null;
		
		
		
		foreach($_SESSION['carrito'] as $producto) {
			
			$trackId=$producto["trackId"];
			$unitPrice=$producto['unitPrice'];
			
			
			require("obtenerInvoidLineId.php");
			
			$sql = "INSERT INTO INVOICELINE (INVOICELINEID,INVOICEID,TRACKID,UNITPRICE,QUANTITY) VALUES ('$invoiceLineId','$invoiceId','$trackId',$unitPrice,1)";
			$conn->exec($sql);
			
		}
		
	
		echo "COMPRA REALIZA EXITOSAMENTE<br>";
		echo "<a href='../controllers/main.php'>Volver a la Pagina Inicio</a>";
		$_SESSION['carrito']=array();
	}
		
	catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}

	$conn = null;
?>