<?php




if (isset($_SESSION['carrito']) || !empty($_SESSION['carrito'])) {
	foreach ($_SESSION['carrito'] as $carrito) {
		
		//var_dump($carrito);
		echo "Producto: <br>";
		echo "ID producto:$carrito[trackId], Precio: $carrito[unitPrice]<br>";
	}
}


?>