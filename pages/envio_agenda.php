<?php
// Endpoint para recibir los datos del evento
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $title = $data['title'];
    $start = $data['start'];
    $end = $data['end'];

    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nombre_base_datos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La conexión ha fallado: " . $conn->connect_error);
    }

    // Insertar el evento en la base de datos
    $sql = "INSERT INTO eventos (title, start, end) VALUES ('$title', '$start', '$end')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }

    $conn->close();
}
?>