<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

$servername = "localhost";
$username = "app1";
$password = "app1";
$dbname = "app1";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT id, nombre, apellido FROM invitados WHERE apellido='Pascual' and nombre='Maria'");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach($stmt->fetchAll() as $linea) {
    echo "<tr><td>". $linea["id"] . "</th><td>" . $linea["nombre"] . "</td><td>" . $linea["apellido"] . "</td></tr>";
  }
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
