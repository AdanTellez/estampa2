<?php 
 include_once("config.php");
 switch($_SERVER["REQUEST_METHOD"]) {
 	 case "GET":
 	 	$result = array('No' => 0, 'Clase' => 'Rusia 80' , 'Precio' => 8000 , 'Inventario' => 20, 'Married' => false  );
 	 	
	break;
 	
 	case "POST":

 	break;

 	case 'PUT':
 		parse_str(file_get_contents("php://input"), $_PUT);
 		//querys
        $id_estampa = $_PUT["id"];
 		$Precio = $_PUT["Precio"];
        $no=$_PUT["No"];
        $clase=$_PUT["Clase"];
        $inventario=$_PUT["Inventario"];
        //$inventario = mysqli_real_escape_string($mysqli, $_PUT['inventario']);
        $res = mysqli_query($mysqli, "UPDATE estampa SET inventario='$inventario' WHERE id_estampa='$id_estampa'");
         
        //$conn = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
        //$sql = "UPDATE estampa SET inventario='$inventario' WHERE id_estampa='$id_estampa'";

 	 	$result = array('No' => $no, 'Clase' => $clase, 'Precio' => $Precio , 'Inventario' => $inventario);
 	 	
 	 	
 	break;

 	case "DELETE":
 		 parse_str(file_get_contents("php://input"), $_DELETE);
            $id_estampa = $_DELETE["id"];
 		 //$result = $clients->remove(intval($_DELETE["id"]));
         
 		 $res = mysqli_query($mysqli, "DELETE FROM estampa WHERE id_estampa=$id_estampa");


 	break;

 }

	header("Content-Type: application/json");
	echo json_encode($result);



 ?>