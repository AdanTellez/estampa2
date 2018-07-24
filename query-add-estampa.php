<?php
    // Start the session
    session_start();
?>
<html>
<head>
	<title>Agregar estampa</title>
	<?php include 'header.php';?>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");
$estampas_sin_insertar = 0;
if(isset($_POST['Submit'])) {	
    $valor      = $_SESSION["valor"];
    $id_album   = $_SESSION["id_album"];
    $id_clase   = $_SESSION["id_clase"];
    for($i = 0; $i < $valor; $i++){
        $aux = "no";
        $aux .= ($i+1);
        $no         = mysqli_real_escape_string($mysqli, $_POST[$aux]);
        $aux = "precio";
        $aux .= ($i+1);
        $precio     = mysqli_real_escape_string($mysqli, $_POST[$aux]);
        $aux = "inventario";
        $aux .= ($i+1);
        $inventario = mysqli_real_escape_string($mysqli, $_POST[$aux]);
        //$sold = mysqli_real_escape_string($mysqli, $_POST['sold']);
        // checking empty fields
        
        /*print $id_clase;
        echo '<br>';
        print $id_album;
        echo '<br>';
        print $no;
        echo '<br>';
        print $precio;
        echo '<br>';
        print $inventario;
        echo '<br>';
        */
        
        if((empty($no) && $no!=0)  || empty($precio) || (empty($inventario) && $inventario!=0)){
                    
            echo "Debe llenar todos los campos";

            //link to the previous page
            echo "<br/><a href='index2.php'>Volver</a>";
        } else {
            /*echo "<br>";
            echo $no;
            echo "<br>";
            echo $precio;
            echo "<br>";
            echo $inventario;
            echo "<br>";*/
            $result = mysqli_query($mysqli, "SELECT no, id_album FROM estampa WHERE no='$no' and id_album='$id_album'");
            $res = mysqli_fetch_array($result);
            if($no==$res['no'] and $id_album==$res['id_album']){
                /*echo "<font color='red'>Ya exitse una estampa con ese número en ese album</font><br/>";
                echo "<br/><a href='index2.php'>Volver</a>";*/
                $arr_estampas[$estampas_sin_insertar] = $no;
                $estampas_sin_insertar +=1;
            }
            else{
                //if all the fields are filled (not empty) 
                
                //insert data to database   
                $result = mysqli_query($mysqli, "INSERT INTO estampa(id_estampa, id_clase, id_album, no, precio, inventario, sold) VALUES(0,'$id_clase','$id_album','$no','$precio','$inventario', 0)");
                
                //display success message
                /*echo "<font color='green'>Estampa agregada correctamente.";
                echo "<br/><a href='index2.php'>Regresar a Inicio</a>"; */
            }
            
        }
    }
    if ($estampas_sin_insertar == 0){
        echo "<font color='green'>Estampa(s) agregada(s) correctamente.";
        echo "<br/><a href='index2.php'>Regresar a Inicio</a>"; 
    }else{
        for($i = 0; $i < $estampas_sin_insertar; $i++){
            echo "<font color='red'>Ya existe una estampa con el modelo :".$arr_estampas[$i]." en el album y clase seleccionados</font><br/>";
            echo "<br>";
        }
    }
    echo "<br/><a href='index2.php'>Regresar a Inicio</a>";
}
    

// remove all session variables
session_unset(); 
// destroy the session 
session_destroy(); 

?>
</body>
</html>
