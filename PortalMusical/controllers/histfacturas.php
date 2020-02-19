<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Musica</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
<h1>Historial Facturas - JoseTorres</h1>
<?php
require("../db/conexion.php");
/* Se muestra el formulario la primera vez */
require("../models/obtenerIDS.php");
$customerids=obtenerIDS($conn);

if (!isset($_POST) || empty($_POST)) { 

	
	
    /* Se inicializa la lista valores*/
	echo '<form action="" method="post">';
?>
<div class="container ">
<!--Aplicacion-->
<div class="card border-success mb-3" style="max-width: 30rem;">
<div class="card-body">
	<div class="form-group">
	<label for="customerID">CustomerID:</label>
	<select name="customerID">
		<?php foreach($customerids as $id) : ?>
			<option> <?php echo $id ?> </option>
		<?php endforeach; ?>
	</select>
	</div>
</div>
	</BR>
<?php
	echo '<div><input type="submit" value="Consultar"></div>
	</form>';
} else { 

	// Aquí va el código al pulsar submit
    try {
	
		
			// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		
		if ($_POST!=null) {
			if (!isset($_POST['fecha_i']) || !isset($_POST['fecha_d'])) {
				require("../models/listarCompras.php");
				require("../views/visualizarHistoFact.php");
			} else {
				require("../models/listarCompras.php");
				require("../views/visualizarFacturas.php");
			}
		} else {
		
		}
    }
	catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
	
}
?>

<?php
// Funciones utilizadas en el programa


?>



</body>

</html>