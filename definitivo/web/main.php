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
	<title>Market</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"></head>
    <link rel="shortcut icon" href="baixa.jpeg">
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
        <p>Wordpress en EC2 + RDS</p>
        <button onclick="location.href='restar_puntos.php?user_id=<?php echo $_SESSION['username']; ?>&points=50&url=https://github.com/marcsaez/wordpress'">50 puntos</button>
      </div>
      <div class="square">
        <img src="terraform-logo.png" alt="Imagen 2">
        <p>Hosting en AWS con terraform</p>
        <button onclick="location.href='restar_puntos.php?user_id=<?php echo $_SESSION['username']; ?>&points=50&url=https://github.com/marcsaez/cloud-msaez_vmerino/tree/main/01:apache_with_multipe_webs'">50 puntos</button>
      </div>
      <div class="square">
        <img src="terraform-logo.png" alt="Imagen 3">
        <p>Coming soon..</p>
      </div>
      <div class="square">
        <img src="yt.png" alt="Imagen 4">
        <p>Quieres escuchar al mejor cantante de España?</p>
        <button onclick="location.href='restar_puntos.php?user_id=<?php echo $_SESSION['username']; ?>&points=150&url=https://youtu.be/6LOuvYpwYvU'">150 puntos</button>
      </div>
      <div class="square">
        <img src="yt.png" alt="Imagen 5">
        <p>Un poco de mandanga</p>
        <button onclick="location.href='restar_puntos.php?user_id=<?php echo $_SESSION['username']; ?>&points=150&url=https://youtu.be/WosrUnjb2UQ'">150 puntos</button>
      </div>
      <div class="square">
        <img src="yt.png" alt="Imagen 5">
        <p>Aquí te pillo aquí temazo</p>
        <button onclick="location.href='restar_puntos.php?user_id=<?php echo $_SESSION['username']; ?>&points=150&url=https://youtu.be/3KZyy8Oc1QA'">150 puntos</button>
      </div>
    </div>
</body>
</html>