<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generar Registro</title>
</head>
<body>
  <h1>BASE DE DATOS </h1>
  <BR></BR>
</body>
</html>
<?php
include("conecto_bd.php");

  if(isset($_POST['enviar'])){
     
   #   $nombre = $_POST['nombre'];
    # $apellido = $_POST['apellido'];
    #  $correo = $_POST['correo'];
   # $telefono = $_POST['telefono'];
      
   /*   $nombre = $_POST["nombre"];
     $apellido = $_POST["apellido"];
     $placa = $_POST["placa"];
     $telefono = $_POST["telefono"];
     $fecha_ingreso= $_POST["fecha_ingreso"];
     $numero_horas= $_POST["numero_horas"];
     $valor_pagar= $_POST["valor_pagar"];
 
      $insertar = "INSERT INTO datos Values ('$nombre','$apellido','$placa','$telefono','$fecha_ingreso','$numero_horas','$valor_pagar')";
    
      $coneccion = mysqli_query($coneccion,$insertar); */
    
      echo " ";
      
   #   
   include("conecto.php"); 
     # $sql = "SELECT nombre, apellido, placa, telefono, fecha_ingreso, numero_horas,valor_pagar FROM datos";
    
     $sql = "SELECT * FROM evento";
     
     $result = mysqli_query($coneccion,$sql);
    

 if ($result->num_rows > 0) {
    // Recorrer los resultados
    while ($row = $result->fetch_assoc()) {
        $columna1 = $row["cod_evento"];
        $columna2 = $row["nombre"];
        $columna3 = $row["descripcion"];
        $columna4 = $row["fecha_inicio"];
        $columna5 = $row["fecha_fin"];
        $columna6 = $row["lugar"];
        $columna7 = $row["tipo"];
        $columna8 = $row["modalidad"];
        $columna9 = $row["clasificacion"];
        $columna10 = $row["observaciones"];
        $columna11 = $row["cod_semillero"];
        
        // Realizar acciones con los datos recuperados
        echo " ";
        echo "Código del Evento: " . $columna1 . "<br>";
        echo "Nombre del Evento: " . $columna2 . "<br>";
        echo "Descripción del Evento: " . $columna3 . "<br>";
        echo "Fecha de inicio del Evento: " . $columna4 . "<br>";
        echo "Fecha de Finalización del Evento:: " . $columna5 . "<br>";
        echo "Lugar del Evento: " . $columna6 . "<br>";
        echo "Tipo de Evento: " . $columna7 . "<br>";
        echo "Modalidad de Evento: " . $columna8 . "<br>";
        echo "Clasificación del Evento: " . $columna9 . "<br>";
        echo "Observaciones del Evento: " . $columna10 . "<br>";
        echo "Código del semillero al que pertenece:: " . $columna11 . "<br>";
        echo "<br>";
    }
} else {
    echo "No se encontraron resultados.";
}

  }
 
?>
