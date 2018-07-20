<?php 

 switch($_SERVER["REQUEST_METHOD"]) {
 	 case "GET":
 	 	$result = array('No' => 0, 'Clase' => 'Rusia 80' , 'Precio' => 8000 , 'Inventario' => 20, 'Married' => false  );
 	 	
	break;
 	
 	case "POST":

 	break;

 	case 'PUT':
 		parse_str(file_get_contents("php://input"), $_PUT);
 		//querys
 		$Precio = $_PUT["Precio"] + 1000;

 	 	$result = array('No' => 0, 'Clase' => 'Rusia 80' , 'Precio' => $Precio , 'Inventario' => 20, 'Married' => false  );
 	 	
 	 	
 	break;

 	case "DELETE":
 		 parse_str(file_get_contents("php://input"), $_DELETE);

 		 //$result = $clients->remove(intval($_DELETE["id"]));

 		 $result = mysqli_query($mysqli, "DELETE FROM estampa WHERE id_estampa=$id");


 	break;

 }

	header("Content-Type: application/json");
	echo json_encode($result);



 ?>