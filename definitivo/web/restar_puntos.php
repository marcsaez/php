<?php
function restar_puntos() {
  // Obtener los parámetros de la cadena de consulta
  $user_id = $_GET['user_id'];
  $points = $_GET['points'];
  $url = $_GET['url'];

  // Verificar si el usuario tiene suficientes puntos para restar
  $conn = mysqli_connect("localhost", "marc", "password", "project");
  $sql = "SELECT puntos FROM users WHERE nombre_usuario = '$user_id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $puntos = $row['puntos'];
  if ($puntos < $points) {
    echo "No tienes suficientes puntos para restar.";
    echo $puntos;
    echo $points;
    // sleep(5);
    // header("Location: main.php");
  } else {
    // Restar los puntos de la tabla de usuarios del usuario que tiene la sesión iniciada
    $sql = "UPDATE users SET puntos = puntos - $points WHERE nombre_usuario = '$user_id'";
    mysqli_query($conn, $sql);

    // Redirigir al usuario a la URL del video de YouTube
    header("Location: $url");
  }
  mysqli_close($conn);
}
restar_puntos();
?>
