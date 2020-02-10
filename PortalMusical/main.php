<?php
session_start();
?>
<html>
<head>
<title>Men&uacute</title>
</head>
<body>
<?php
require_once("db/conexion.php");
var_dump($_POST);
if(isset($_POST['username']) && isset($_POST['password'])){
	
	require_once("comprobarUsuario.php");
	
	if (comprobarUsuario($conn)) {
		
		$_SESSION['usuario'] = $_POST['username'];
		
		require_once("mostrarMenu.php");
		
		
	}	
	}else{
	
		if(isset($_SESSION['username'])){
		echo "Has iniciado Sesion: ".$_SESSION['username'];
		
		require_once("mostrarMenu.php");
		
		}else{
			echo "Acceso Restringido debes hacer Login con tu usuario";
		}
	}
		

var_dump($_SESSION);

?>
</body>
</html>