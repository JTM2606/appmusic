<?php
echo "Has iniciado Sesion: ".$_SESSION['usuario'];
		
		echo "<p><a href='../models/downmusic.php'>Descargar Musica</a></p>";
		echo "<p><a href='../models/histfacturas.php'>Historial Facturas</a></p>";
		echo "<p><a href='../models/facturas.php'>Facturas por Fecha</a></p>";
		echo "<p><a href='../models/ranking.php'>Ranking Canciones Mas Descargadas</a></p>";
		
		echo "<p><a href='../views/pagina3.php'>Cerrar Sesion</a></p>";
?>