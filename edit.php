<html>
<head>	
	<title>Estampas</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
	   
</head>
 
 <?php
// including the database connection file
include_once("config.php");

//getting id from url
$id_album = $_GET['id'];


//selecting data associated with this particular id
$result 	= mysqli_query($mysqli, "SELECT * FROM album WHERE id_album=$id_album");

while($res 	= mysqli_fetch_array($result))
{
	$name 	= $res['nombre'];
}
?>

 

<body>
    
    <a href="index2.php">Volver a Inicio</a>
    <?php echo "<h2>Album  ".$name."</h2>"; ?>

    <div id="jsGrid">
    </div>
    
         <?php 
         $total = 0;
        $result = mysqli_query($mysqli, "SELECT * FROM estampa WHERE id_album=$id_album");
        while($res = mysqli_fetch_array($result)) { 
            $total += $res['inventario'];   
        } 
    ?>
<?php echo "<h4 align= right>Total:  ".$total."</h4>"; ?>

    <h2>Edición Avanzada</h2>
    <table>

        <tr>
            <td>Estampas</td>
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        $result = mysqli_query($mysqli, "SELECT * FROM estampa WHERE id_album=$id_album");
        while($res = mysqli_fetch_array($result)) { 
            echo "<tr>";
            echo "<td>Estampa: ".$res['no']."</td>";
            //$id_clase = $res['id_clase'];
            //$class = mysqli_query($mysqli, "SELECT * FROM clase WHERE id_clase=$id_clase");
            //while($clase = mysqli_fetch_array($class)) {
                //echo "<td>Clase: ".$clase['color']."</td>";
            //}
            //echo "<td>Precio: ".$res['precio']."</td>";
            //echo "<td>Inventario: ".$res['inventario']."</td>";
        //id->id_estampa
            //aux=1 == borrado de estampa
            echo "<td><a href=\"edit-estampa.php?id=$res[id_estampa]\">Editar</a> | <a href=\"delete.php?id=$res[id_estampa]&aux=1\" onClick=\"return confirm('¿Seguro que desea eliminar?')\">Eliminar</a></td>";		
        }
        ?>
    </table>
    
    <script>
     jQuery(document).ready(function () {
         
         var results = [];
             
         <?php 
         $total = 0;
        $result = mysqli_query($mysqli, "SELECT * FROM estampa WHERE id_album=$id_album");
        while($res = mysqli_fetch_array($result)) { 
            
            $id_clase = $res['id_clase'];
            $total .= $res['inventario'];
             $class = mysqli_query($mysqli, "SELECT * FROM clase WHERE id_clase=$id_clase");
                $clase = mysqli_fetch_array($class);
                
        ?>
         
            results.push({"No": <?php echo json_encode($res['no']); ?>, "Clase": <?php echo json_encode($clase['color']); ?>, "Precio": <?php echo json_encode($res['precio']); ?>, "Inventario": <?php echo json_encode($res['inventario']); ?>, "id": <?php echo json_encode($res['id_estampa']); ?>});
          <?php  
               
        }

         
    ?>
      
         

        $("#jsGrid").jsGrid({
            width: "100%",
            height: "400px",

            inserting: false,
            editing: true,
            sorting: true,
            paging: false,

            //data: clients,
            data: results,

            controller: {
                /*
                    insertItem: function(item) {
                        return $.ajax({
                            type: "POST",
                            url: "/items",
                            data: item
                        });
                },
    
                */
                updateItem: function(item) {
                    //console.log(item) 
                    var result = $.ajax({
                        type: "PUT",
                        url: "querys-estampas.php",
                        data: item
                    });

                    return result;

                    //console.log (result)
                },

                
                     deleteItem: function(item) {
                        //console.log(item) 
                        return $.ajax({
                            type: "DELETE",
                            url: "querys-estampas.php",
                            data: item
                        });
                    }
                
            },

            fields: [
                { name: "No", type: "number", width: 50, validate: "required", editing: false },
                { name: "Clase", type: "text", width: 60, editing: false },
                { name: "Precio", type: "number", width: 60, editing: false},
                { name: "Inventario", type: "number", width: 50 },
                { type: "control" }
            ]

           
        });
         
     });
      
    </script>
	
</body>
</html>
