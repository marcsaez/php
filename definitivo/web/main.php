<?php
    session_start();
    $user = $_SESSION['username'];
    $servername = "localhost";
    $username = "marc";
    $password = "password";
    $dbname = "project";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Comprobamos si la conexión es correcta
    if ($conni->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
        }

    // Consulta SQL para buscar al usuario en la base de datos
    $sql = "SELECT puntos FROM users WHERE nombre_usuario = '$user'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    // if (mysqli_num_rows($result)  0) {    
    //     echo "El usuario no tiene puntos.";
    // } //else {
        //echo "El usuario tiene " . $row['puntos'] . " puntos.";
    //       
    // }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Consultorio</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"></head>
</head>
<body>
    <p>username: <?php echo $user ?></p>
    <p>puntos: <?php echo $row['puntos'] ?> </p>    
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>