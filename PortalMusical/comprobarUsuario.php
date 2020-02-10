<?php
function comprobarUsuario($conn) {
	
	$resultado=true;
	
	try {
		$usuario=$_POST['username'];
		$clave=$_POST['password'];
		$customer_id=null;
		
		$stmt = $conn->prepare("SELECT * FROM CUSTOMER WHERE EMAIL='$usuario' AND LASTNAME='$clave'");
		$stmt->execute();
		
		foreach($stmt->fetchAll() as $row) {
			$customer_id=$row["CustomerId"];
		}
		
		if(empty($customer_id)) {
			$resultado=false;
			throw new PDOException('Cliente no Registrado<br>');
		} else {
			$_SESSION['customer_id'] = $customer_id;
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