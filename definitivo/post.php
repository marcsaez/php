<?php
// Configuración de la base de datos
$host = 'localhost';
$usuario = 'marc';
$contrasena = 'password';
$base_de_datos = 'php';

// Conectarse a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error al conectarse a la base de datos: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$correu = $_POST['correu'];
$url = $_POST['url'];
$data = $_POST['data'];
$temps = $_POST['temps'];
$datahora = $_POST['datahora'];
$mes = $_POST['mes'];
$setmana = $_POST['setmana'];
$numero = $_POST['numero'];
$telefon = $_POST['telefon'];
$cerca = $_POST['cerca'];
$color = $_POST['color'];




// Preparar la consulta SQL para insertar los datos en la base de datos
$sql = "INSERT INTO datess (nom, correu_electronic, url, data, temps, data_i_hora, mes, setmana, numero, telefon, paraula_de_recerca, color) VALUES ('$nombre', '$correu', '$url', '$data', '$temps', '$datahora', '$mes', '$setmana', '$numero', '$telefon', '$cerca', '$color')";
#echo $nombre,$correu,$url,$data
// Ejecutar la consulta SQL
if ($conexion->query($sql) === TRUE) {
    echo "Los datos se han guardado correctamente en la base de datos";
} else {
    echo "Error al guardar los datos en la base de datos: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>