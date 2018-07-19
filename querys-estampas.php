<?php 

 switch($_SERVER["REQUEST_METHOD"]) {
 	 case "GET":
 	 	$result = array('No' => 0, 'Clase' => 'Rusia 80' , 'Precio' => 8000 , 'Inventario' => 20, 'Married' => false  );
 	 	
 	 	
	break;
 	
 	case "POST":

 	break;

 	case 'PUT':
 	 	$result = array('No' => 0, 'Clase' => 'Rusia 80' , 'Precio' => 8000 , 'Inventario' => 20, 'Married' => false  );
 	 	
 	 	
 	break;

 	case "DELETE":

 	break;

 }

	header("Content-Type: application/json");
	echo json_encode($result);



 ?>