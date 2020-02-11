<?php
session_start();
?>
<html>
<head>
<title>Men&uacute</title>
</head>
<body>
<?php
require("db/conexion.php");
var_dump($_POST);
if(isset($_POST['username']) && isset($_POST['password'])){
	
	require("comprobarUsuario.php");
	
	if (comprobarUsuario($conn)) {
		
		$_SESSION['usuario'] = $_POST['username'];
		
		require("mostrarMenu.php");
		
	}	
	}else{
	
		if(isset($_SESSION['usuario'])){
		
		require("mostrarMenu.php");
		
		}else{
			echo "Acceso Restringido debes hacer Login con tu usuario";
		}
	}
		

var_dump($_SESSION);

?>
</body>
</html>