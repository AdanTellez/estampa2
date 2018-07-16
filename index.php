<?php
//including the database connection file
include_once("config.php");



//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM album ORDER BY id_album DESC"); // using mysqli_query instead
$result_clase = mysqli_query($mysqli, "SELECT * FROM clase ORDER BY id_clase DESC");

?>
<!-- -->
<html>
<head>	
	<title> Gestor</title>
    <?php include 'header.php';?>
</head>

<body>
<!--<a href="add-estampa.php">Add New Data</a><br/><br/> -->

<section id="buscador">
    <div class="center">
       <h1>Gestor</h1>
       
        <form action="buscar-estampa.php" method="post" >
            <input type="text" class="big-space" name="estampas">
              <?php
                  include_once("config.php");
                  $sql = "SELECT * FROM album";
                  $query = mysqli_query($mysqli, $sql);

                  echo '<select name="id_album" class="mid-space">';
                      while ($row = mysqli_fetch_array($query)) {
                          echo '<option value='.$row['id_album'].'>'.$row['nombre'].'</option>';
                      }
                  echo '</select>';
              ?>
            <input type="submit" class="btn-green" name="class-selector" value="Cotizar modelo" >
        </form>
        
    </div>
    
</section>

<div class="center">
       <p>Para buscar inserte sin espacios el número de estampa, posteriormente, en caso de necesitarse
       más de una estampa del mismo número, añadir una "," después del número de estampa con el total 
       de estampas requeridas, en caso de solo necesitar una, no agregar nada. Separar con un "-" cada
       estampa a buscar <b class="black">ej. 16-123-8,12-66,3</b> (significa: una estampa del no. 16 y 123, <u class="black">doce</u> estampas del no. 8 y <u class="black">tres</u> del número 66). </p><br>
</div>



  
</body>
</html>
