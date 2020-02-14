<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Musica</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
<h1>Realiza tu Pedido - JoseTorres</h1>
<?php
require("../db/conexion.php");


require("obtenerCanciones.php");
$canciones=obtenerCanciones($conn);

var_dump($_SESSION);



if (!isset($_POST) || empty($_POST)) { 

	
	
    /* Se inicializa la lista valores*/
	echo '<form action="" method="post">';
?>
<div class="container ">
<!--Aplicacion-->
<div class="card border-success mb-3" style="max-width: 30rem;">
<?php
	require("../views/mostrarCanciones.phtml");
?>
	</BR>
<?php
	echo '<div><input name="descargar" type="submit" value="Añadir Cancion" ></div>
	</form>';
	echo '<div><input name="finalizar" type="submit" value="Finalizar Compra"></div>';
} else { 

	// Aquí va el código al pulsar submit
    try {
	
		
		
		if ($_POST!=null) {
			if (isset($_POST["finalizar"])) {
				require("finalizarCompra.php");
			} else if ($_POST["descargar"]) {
				require("descargarCancion.php");
				header("location:downmusic.php");
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