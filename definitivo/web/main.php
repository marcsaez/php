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
    <nav>
        <div>
            <p class="ses">username: <?php echo $user ?></p>
            <p class="ses">puntos: <?php echo $row['puntos'] ?> </p>    
        </div>
        <a href="logout.php">Cerrar sesión</a>
    </nav>
    <div class="container">
      <div class="square">
        <img src="terraform-logo.png" alt="Imagen 1">
        <p>Descripción de la imagen 1</p>

      </div>
      <div class="square">
        <img src="imagen2.jpg" alt="Imagen 2">
        <p>Descripción de la imagen 2</p>
      </div>
      <div class="square">
        <img src="imagen3.jpg" alt="Imagen 3">
        <p>Descripción de la imagen 3</p>
      </div>
      <div class="square">
        <img src="yt.png" alt="Imagen 4">
        <p>Descripción de la imagen 4</p>
      </div>
      <div class="square">
        <img src="yt.png" alt="Imagen 5">
        <p>Descripción de la imagen 5</p>
      </div>
      <div class="square">
        <img src="yt.png" alt="Imagen 5">
        <p>Descripción de la imagen 6</p>
      </div>
    </div>
</body>
</html>