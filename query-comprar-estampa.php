<?php
    // Start the session
    session_start();
?>
<html>
<head>
    <title>Comprar estampa</title>
    <?php include 'header.php';?>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");
   $id_album= $_SESSION['id_album'];

$estampas = $_SESSION['estampasvendidas'];
    
    $can_estampas = count($estampas);
    for($i = 0; $i <= ($can_estampas-1); $i++){
        $sold = 0;

        $id_estampa = $estampas[$i][0];
        $result = mysqli_query($mysqli, "SELECT * FROM estampa WHERE no=$id_estampa and id_album=$id_album");

        while($res = mysqli_fetch_array($result)){
            $resta = ($res['inventario'])-($estampas[$i][1]);
            $sold  = $res['sold'];
        }
        $sold += $estampas[$i][1];
        $result = mysqli_query($mysqli, "UPDATE estampa SET inventario=$resta WHERE no=$id_estampa and id_album=$id_album");
        $result = mysqli_query($mysqli, "UPDATE estampa SET sold=$sold WHERE no=$id_estampa and id_album=$id_album");
    }

        echo "<font color='green'>Compra realizada correctamente. <br>";
        //echo "UPDATE estampa SET inventario=$resta WHERE no=$id_estampa and id_album=$id_album <br>";
        echo "<br/><a href='index.php'>Volver al cotizador</a>";

// remove all session variables
session_unset(); 
// destroy the session 
session_destroy(); 

?>
</body>
</html>
