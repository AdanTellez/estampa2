<?php
    // Start the session
    session_start();
?>
<html>
<head>
	<title>Buscar estampa</title>
	<?php include 'header.php';?>
</head>

<body>
<a href="index.php">Volver a Inicio</a>
<?php
//including the database connection file
include_once("config.php");

    $estampas = $_POST['estampas'];
    $id_album = $_POST['id_album'];
    $_SESSION['id_album'] = $id_album;
    $estampas = str_replace(' ', '', $estampas);
    if(empty($estampas) && $estampas!=0){
        echo "Debe ingresar las estampas a buscar";
    }else{
        
        //$estampas="16-123-8,12-66,3";  
        $estampas = trim($estampas);
        $tamaño   = strlen($estampas);
        $total[0] = 0;
        
        echo "<p>Datos ingresados: </p>";

        print "<p>".$estampas."</p>";
        
        echo "<br>";
        
        $cont=0;

        for ($i = 0; $i <= ($tamaño-1); $i++) {
             //contador para cada estampa
            $no_cantidad[$cont][1]=1; //para este arreglo, en su segunda dimensión, [0] es el no. de estampa
            $no_cantidad[$cont][2]=0;
            // y [1] es la cantidad de veces que se quiere dicha estampa.
            // [2] es el total de las estampas
            // [3] es el id de la clase
            

            //print $estampas[$i];

            if (is_numeric($estampas[$i]) ){ //or ctype_alpha($estampas[$i])
                if(isset($no_cantidad[$cont][0])){

                    $no_cantidad[$cont][0].=$estampas[$i];
                }else{
                    $no_cantidad[$cont][0]=$estampas[$i];
                }

                //.= append
            }
            else{
                //si es -
                if($estampas[$i]=="(" or $estampas[$i]=="["){
                    $no_cantidad[$cont][1]="";
                    $i++;
                    while (is_numeric($estampas[$i])){
                        $no_cantidad[$cont][1].=$estampas[$i]; //número de veces que quiere la estampa
                        $i++;
                        if($i >= $tamaño){
                            break;
                        }
                    } 
                }
                // cuando es OTRA COSA
                 $cont++;  
            }
            
        }
        
        
        echo '<pre>';
            //print_r($no_cantidad);
        echo '</pre>';

        
        $can_estampas = count($no_cantidad);


        $contador = 0;
        $nuevo_total =0;
        for($i = 0; $i <= ($can_estampas-1); $i++){
            $id_estampa = $no_cantidad[$i][0];
            $total[$i] = array();
            $result = mysqli_query($mysqli, "SELECT * FROM estampa WHERE no=$id_estampa AND id_album=$id_album");
            $totalFilas    =    mysqli_num_rows($result);
            if($totalFilas == 0){
                $faltante[$contador][0] =  $no_cantidad[$i][1];
                $faltante[$contador][1] =  $id_estampa;
                $faltante[$contador][3] =  0;
                $contador++;
            }

            while($res = mysqli_fetch_array($result)){
                if($res['inventario'] < $no_cantidad[$i][1]){
                    $no_cantidad[$i][2] += ($res['precio'])*$res['inventario'];
                    $no_cantidad[$i][3]  = $res['id_clase'];
                    $faltante[$contador][0] =  ($no_cantidad[$i][1])-$res['inventario'];
                    $faltante[$contador][1] =  $id_estampa;
                    $faltante[$contador][2] =  $res['id_clase'];
                    $faltante[$contador][3] =  1;
                    $contador++;
                    $no_cantidad[$i][1]  = $res['inventario'];
                    $can_total = count($total);
                    if($can_total == 1){
                        $total[0][0] = $no_cantidad[$i][3];
                        $total[0][1] = $no_cantidad[$i][2];
                        $total[0][2] = 1;
                        $nuevo_total = 1;
                    }else{
                        $nuevo_total = 0;
                        for($j = 0; $j <= ($can_total-2); $j++){
                            if(isset($total[$j][0])){
                                if($no_cantidad[$i][3] == $total[$j][0]){
                                    $total[$j][1] += $no_cantidad[$i][2];
                                    $total[$j][2] += 1;
                                    $nuevo_total = 1;
                                }
                            }
                        }
                        if($nuevo_total == 0){
                            $total[($can_total-1)][0] = $no_cantidad[$i][3];
                            $total[($can_total-1)][1] = $no_cantidad[$i][2];
                            $total[($can_total-1)][2] = 1;
                        }
                        $nuevo_total = 0;
                    }
                }else{
                    $no_cantidad[$i][2] += ($res['precio'])*$no_cantidad[$i][1];
                    $no_cantidad[$i][3] = $res['id_clase'];
                    $can_total = count($total);
                    if($can_total == 1){
                        $total[0][0] = $no_cantidad[$i][3];
                        $total[0][1] = $no_cantidad[$i][2];
                        $total[0][2] = 1;
                        $nuevo_total = 1;
                    }else{
                        $nuevo_total = 0;
                        for($j = 0; $j <= ($can_total-2); $j++){
                            if(isset($total[$j][0])){
                                if($no_cantidad[$i][3] == $total[$j][0]){
                                    $total[$j][1] += $no_cantidad[$i][2];
                                    $total[$j][2] += 1;
                                    $nuevo_total = 1;
                                }
                            }
                        }
                        if($nuevo_total == 0){
                            $total[($can_total-1)][0] = $no_cantidad[$i][3];
                            $total[($can_total-1)][1] = $no_cantidad[$i][2];
                            $total[($can_total-1)][2] = 1;
                        }
                        $nuevo_total = 0;
                    }
                }
            }
        }


        echo '<pre>';
            //arreglo de los totales por clase
            //print_r($no_cantidad);
            //print_r($faltante);
            $total_general = 0;
            $total[0][3] = 0;
        if(isset($can_total)){
            if($can_total == 1){
                    if(isset($total[0][0])){
                        $aux = $total[0][0];
                    }else{
                        $aux = -2;
                    }
                    if(isset($total[0][1])){
                        $total_general += $total[0][1];
                    }
                    $result = mysqli_query($mysqli, "SELECT * FROM clase WHERE id_clase=$aux");
                    if($result){
                        while($res = mysqli_fetch_array($result)){
                            for($j = 0; $j <= ($can_estampas-1); $j++){
                                if(isset($no_cantidad[$j][3])){
                                    if($no_cantidad[$j][3] == $aux){
                                        $id_estampa = $no_cantidad[$j][0];
                                        $costo_estampa = mysqli_query($mysqli, "SELECT * FROM estampa WHERE no=$id_estampa AND id_clase=$aux");
                                        while($costo_estm = mysqli_fetch_array($costo_estampa)){
                                            $precio = $costo_estm['precio'];
                                        }
                                        print "Modelo del número ".$no_cantidad[$j][0]." :".$no_cantidad[$j][1];
                                        //print $no_cantidad[$j][1]." estampas de número: ".$no_cantidad[$j][0]." con un costo individual de: ".$precio;
                                        echo "<br>";
                                    }
                                }
                            }
                            echo "<br>";
                            print "Total de estampas de la clase ".$res['color'].": ".$total[0][2];
                            echo "<br>";
                            print "Precio total: ".$total[0][1];
                            echo "<br>";echo "<br>";
                            $total[0][3] += $total[0][2];
                        }
                    }
            }else{
                for($i = 0; $i <= ($can_total-1); $i++){
                    if(isset($total[$i][0])){
                        $aux = $total[$i][0];
                    }else{
                        $aux = -2;
                    }
                    if(isset($total[$i][1])){
                        $total_general += $total[$i][1];
                    }
                    $result = mysqli_query($mysqli, "SELECT * FROM clase WHERE id_clase=$aux");
                    if($result){
                        while($res = mysqli_fetch_array($result)){
                            for($j = 0; $j <= ($can_estampas-1); $j++){
                                if(isset($no_cantidad[$j][3])){
                                    if($no_cantidad[$j][3] == $aux){
                                        $id_estampa = $no_cantidad[$j][0];
                                        $id_clase = $no_cantidad[$j][3];
                                        $costo_estampa = mysqli_query($mysqli, "SELECT * FROM estampa WHERE no=$id_estampa AND id_clase=$id_clase");
                                        while($costo_estm = mysqli_fetch_array($costo_estampa)){
                                            $precio = $costo_estm['precio'];
                                        }
                                        print "Modelo del número ".$no_cantidad[$j][0]." :".$no_cantidad[$j][1];
                                        //print $no_cantidad[$j][1]." estampas de número: ".$no_cantidad[$j][0]." con un costo individual de: ".$precio;
                                        echo "<br>";
                                    }
                                }
                            }
                            echo "<br>";
                            print "Total de estampas de la clase ".$res['color'].": ".$total[$i][2];
                            echo "<br>";
                            print "Precio total: ".$total[$i][1];
                            echo "<br>";echo "<br>";
                            $total[0][3] += $total[$i][2];
                        }
                    }
                }
            }
        }
        print "----------------------------------------------";
        echo "<br>";
        print "Total de estampas a vender: ".$total[0][3];
        echo "<br>";
        print "El total general es: ".$total_general;
            echo "<br>";echo "<br>";
            if(isset($faltante)){

                $fal_total = count($faltante);
                for($i = 0; $i <= ($fal_total-1) ; $i++){

                    if($faltante[$i][3] == 1){
                        print "*Faltan ".$faltante[$i][0]." estampas de número: ".$faltante[$i][1];
                        echo "<br>";
                    }else{
                        print "La estampa de número: ".$faltante[$i][1]." no pertenece al album indicado";
                        echo "<br>";
                    }
                }
            }
            //print_r($total);
            //print_r($no_cantidad);
            //clases que existen en la busqueda
            //print_r($clase);
        echo '</pre>';
        $_SESSION['estampasvendidas'] = $no_cantidad;

       /* $total_general=0;
        for($i = 0; $i < count($clase); $i++){
            $aux = $clase[$i];
            $result = mysqli_query($mysqli, "SELECT * FROM clase WHERE id_clase=$aux");

            while($res = mysqli_fetch_array($result))
            {
                
                print "Total de la clase ".$res['color'].": ".$total[$i];
                echo "<br>";
            }
            $total_general += $total[$i];
        }
        print "Total general: ".$total_general;*/


        //$result   = mysqli_query($mysqli, "SELECT no, id_album FROM estampa WHERE no='$no' and id_album='$id_album'");
        //$res      = mysqli_fetch_array($result);
        echo "<button onclick=location.href='index.php'>Cancelar</button>";
        if($total_general>0){
            echo "<button onclick=location.href='query-comprar-estampa.php'>Realizar compra</button>";
        }   
    }

?>

</body>
</html>
