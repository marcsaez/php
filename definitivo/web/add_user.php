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
	if ($conn->connect_error) {
		die("Error de conexión a la base de datos: " . $conn->connect_error);
	}

	// Obtenemos los datos del formulario
	$user = $_POST['nombre_usuario'];
	$email = $_POST['correo'];
	$contra = $_POST['contrasena'];

	// Consulta SQL para comprobar si el usuario ya existe en la base de datos
	$sql = "SELECT * FROM users WHERE nombre_usuario = '$user'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// Si el usuario ya existe en la base de datos, mostramos un mensaje de error
		echo '<p>El nombre de usuario ya está en uso. Por favor, elige otro.</p>';
	} else {
		// Si el usuario no existe en la base de datos, lo insertamos
		$sql = "INSERT INTO users (nombre_usuario, correo, contra) VALUES ('$user', '$email', '$contra')";

	if ($conn->query($sql) === TRUE) {
		// Si se ha insertado el usuario correctamente, mostramos un mensaje de éxito
		header("Location: index.html");
	} else {
		// Si ha habido un error al insertar el usuario, mostramos un mensaje de error
		echo '<p>Error al registrar el usuario: ' . $conn->error . '</p>';
	}
    }

	// Cerramos la conexión a la base de datos
	$conn->close();
	}
?>
