<?php
//including the database connection file
include_once("config.php");



//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM album ORDER BY id_album DESC"); // using mysqli_query instead
$result_clase = mysqli_query($mysqli, "SELECT * FROM clase ORDER BY id_clase DESC");

?>
   <html>
    <body>
        <head>
            <title>Gestionar Estampas</title>
            <?php include 'header.php';?>
        </head>
        <section id="consultar">
   
            <div class="flex nowrap">
                <div class="center col three">
                   <h2>Nuevos Inventarios</h2>
                    <a href="add-album.php">Agregar Album</a>
                </div>

                <div class="center col three">
                    <form action="add-estampa.php" method="post" >
                               <h2>Modelo</h2>
                               <p>(elegir clase, elegir clase variable para precios únicos)</p>
                                <?php
                                    include_once("config.php");
                                    $sql = "SELECT * FROM album";
                                    $query = mysqli_query($mysqli, $sql);

                                    echo '<select name="id_album" class="mid-space">';
                                        while ($row = mysqli_fetch_array($query)) {
                                            echo '<option value='.$row['id_album'].'>'.$row['nombre'].'</option>';
                                        }
                                    echo '</select>';

                                    $sql = "SELECT * FROM clase";
                                    $query = mysqli_query($mysqli, $sql);

                                    echo '<select name="id_clase" class="mid-space">';
                                        while ($row = mysqli_fetch_array($query)) {
                                            echo '<option value='.$row['id_clase'].'>'.$row['color'].'</option>';
                                        }
                                    echo '</select>';
                                ?>
                                <br>
                                <input type="number" name="valor" step="1" Required>
                       <input type="submit" class="btn-green-small" name="class-selector" value="Añadir Modelo Nuevo" >
                    </form>
                </div>

                <div class="center col three">
                   <h2>Clase</h2>
                    <a href="add-category.php">Agregar clase</a>
                </div>
            </div>



            <div class="flex">
                <div class="col center three">
                    <h2>Inventarios</h2>
                    <table>

                    <tr>
                        <td>Nombre</td>
                    </tr>
                    <?php 
                    //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
                    while($res = mysqli_fetch_array($result)) { 		
                        echo "<tr>";
                        echo "<td>".$res['nombre']."</td>";
                    //id->id_album
                    //aux=2 == borrado de album
                        echo "<td><a href=\"edit.php?id=$res[id_album]\">Estampas</a> | <a href=\"delete.php?id=$res[id_album]&aux=2\" onClick=\"return confirm('¿Está seguro de querer eliminar?, todas las estampas del álbum serán eliminadas IRREVERSIBLEMENTE')\">Borrar</a></td>";		
                    }
                    ?>
                    </table>
                </div>
                <div class="col center three">
                    <h2>Clases</h2>
                  <table>

                  <tr>
                    <td><b>Color</b></td>
                  </tr>
                  <?php 
                  //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
                  while($res = mysqli_fetch_array($result_clase)) {  
                  if($res['id_clase']!=-1){   
                    echo "<tr>";
                    echo "<td>".$res['color']."</td>";
                    //id->id_clase
                      echo "<td><a href=\"edit-class.php?id=$res[id_clase]\">Editar clase</a></td>";
                    }    
                  }
                  ?>
                  </table>
                </div>

                <div class="center col three">
                   <h2>Estadísticas</h2>
                    <a href="estadisticas.php">Más Vendidas</a>
                </div>
            </div>
        </section>

    </body>
</html>