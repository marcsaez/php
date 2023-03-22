<?php
    // Comprobamos si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conectamos a la base de datos
    $servername = "localhost";
    $username = "marc";
    $password = "password";
    $dbname = "project";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Comprobamos si la conexión es correcta
    if ($conni->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
        }

    // Obtenemos el nombre de usuario y la contraseña del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta SQL para buscar al usuario en la base de datos
    $sql = "SELECT * FROM users WHERE nombre_usuario = '$username' AND contra = '$password'";
    $result = $conn->query($sql);

    // Comprobamos si se ha encontrado al usuario
    if ($result->num_rows > 0) {
            // Iniciamos la sesión y redirigimos al usuario a la página principal
            session_start();
            $_SESSION['username'] = $username;
            header('Location: main.php');
            exit;
    } 
    
    else {
            // Si el usuario no se encuentra en la base de datos, mostramos un mensaje de error
            echo '<p>Usuario o contraseña incorrectos.</p>';
    }

        // Cerramos la conexión a la base de datos
        $conn->close();
    }
?>