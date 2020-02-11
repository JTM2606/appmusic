<?php
	try {
			
			$nombreCancion=$_POST["cancion"];
			$trackId=null;
			$unitPrice=null;
			$stmt = $conn->prepare("SELECT trackid,unitprice FROM TRACK WHERE NAME='$nombreCancion'");
			$stmt->execute();
				
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
				
			foreach($stmt->fetchAll() as $row) {
				$trackId=$row["trackid"];
				$unitPrice=$row["unitprice"];
			}
			
				if (!isset($_SESSION['carrito'])) {
					$_SESSION['carrito']=array();
				}
				
				$array_productos=array();
		
				$array_productos['trackId']=$trackId;
				$array_productos['unitPrice']=$unitPrice;
				
				$i=0;
				$repetido=false;
				var_dump($array_productos);
				while ($i<count($_SESSION['carrito']) && $repetido==false) {
					
					if ($_SESSION['carrito'][$i]['trackId']==$array_productos['trackId']) {
						
						throw new PDOException('Ya has descargado esta canción');
						
						$repetido=true;
					}
					$i++;
				}
				
				if ($repetido==false) {
					array_push($_SESSION['carrito'],$array_productos);
				}
				
			
		
		
		
		}
		
	catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}

	$conn = null;
?>