<?php
    // Start the session
    session_start();
?>
<html>
<head>
	<title>Add Data</title>
	<?php include 'header.php';?>    
</head>

<body>
    
    <?php
        include_once("config.php");
        $id_clase = $_POST['id_clase'];
        $id_album = $_POST['id_album'];
        $valor    = $_POST['valor'];
        $_SESSION["id_clase"] = $id_clase;
        $_SESSION["id_album"] = $id_album;
        if($valor <= 0){
            echo "<font color='red'>La cantidad de modelos debe ser mayor a cero</font><br/>";
            echo "<meta http-equiv=Refresh content=0.00000001;URL=index2.php>";
        }
        $_SESSION["valor"] = $valor;
    ?>
	<a href="index2.php">Volver a Inicio</a>
	<br/><br/>

	<form action="query-add-estampa.php" method="post" name="form1">
    <?php 
    for($i = 0; $i < $valor; $i++){
        echo "<table width=25% border=0>";
            echo "<tr>"; 
                echo "<td>No.</td>";
                echo "<td><input type=string step=1 name=no".($i+1)."></td>";
            echo "</tr>";
            echo "<tr>"; 
                echo "<td>Precio</td>";
                if ($id_clase!=-1){  
            
                   echo "<td>";
                        //print_r($_POST);
                        
                            $sql = 'SELECT * FROM clase where id_clase='.$id_clase;
                            $query = mysqli_query($mysqli, $sql);

                            echo "<select name=precio".($i+1)." style=width: 200px>";
                                while ($row = mysqli_fetch_array($query)) {
                                    echo '<option value='.$row['valor'].' selected>'.$row['valor'].'</option>';
                                }
                            echo '</select>';
                        
                    echo "</td>";
            
                }
                else{
                    echo "<td><input type=number step=.1 name=precio".($i+1)."></td>";
                }
            
            echo "</tr>";
            echo "<tr>"; 
                echo "<td>Inventario</td>";
                echo "<td><input type=number step=1 name=inventario".($i+1)."></td>";
            echo "</tr>";
            echo "<tr>";

    
            echo "</tr>";
            echo "<br><br><br>";
    }
    ?>
            <tr>
                <td></td>
                <td><input type=submit name=Submit value=Agregar></td>
            </tr>
        </table>
	</form>
</body>
</html>
