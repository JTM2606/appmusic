<?php
function comprobarUsuario($conn) {
	
	$resultado=true;
	
	try {
		$usuario=$_POST['username'];
		$clave=$_POST['password'];
		$customer_id=null;
		$billingAddress=null;
		$billingCity=null;
		$billingState=null;
		$billingCountry=null;
		$billingPostalCode=null;
		
		$stmt = $conn->prepare("SELECT * FROM CUSTOMER WHERE EMAIL='$usuario' AND LASTNAME='$clave'");
		$stmt->execute();
		
		foreach($stmt->fetchAll() as $row) {
			$customer_id=$row["CustomerId"];
			$billingAddress=$row["Address"];
			$billingCity=$row["City"];
			$billingState=$row["State"];
			$billingCountry=$row["Country"];
			$billingPostalCode=$row["PostalCode"];
		}
		
		if(empty($customer_id)) {
			$resultado=false;
			throw new PDOException('Cliente no Registrado<br>');
		} else {
			$_SESSION['customer_id'] = $customer_id;
			$_SESSION['billingAddress'] = $billingAddress;
			$_SESSION['billingCity'] = $billingCity;
			$_SESSION['billingState'] = $billingState;
			$_SESSION['billingCountry'] = $billingCountry;
			$_SESSION['billingPostalCode'] = $billingPostalCode;
		}
		
		
	}	
	catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}

	$conn = null;
	
	return $resultado;
}
?>