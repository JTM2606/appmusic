<html>
<head>
<title>Pagina Login</title>
</head>
<body>
<?php
if(isset($_SESSION['usuario'])){
echo "<p>Usuario: " . $_SESSION['usuario'] . "";

echo "<p><a href='../models/downmusic.php'>Compra de Productos</a></p>";

echo "<p><a href='../view/pagina3.php'>Cerrar Sesion</a></p>";
}else {
?>
<form action="controllers/main.php" method="POST">
<h1> Login </h1>
<p>Username:<input type="text" name="username" required/></p>
<p>Password:<input type="password" name="password" required/></p><br />
<input type="submit" value="Login" />

</form>
<?php
}
?>
</body>
</html>