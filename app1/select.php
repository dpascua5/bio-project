echo <table style='border: solid 1px black'>
echo <tr><th>Id</th><th>Nombre</th><th>Apellido</th><th>e-mail</th></tr>


<?php

$servername = "localhost";
$username = "app1";
$password = "app1";
$dbname = "app1";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT id, nombre,apellido, email FROM invitados");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach($stmt->fetchAll() as $linea) {
    #print_r($linea);
    echo "<tr>";
    echo "<td>" . $linea["id"] . "</td>";
    echo "<td>" . $linea["nombre"] . "</td>";
    echo "<td>" . $linea["apellido"] . "</td>";
    echo "<td>" . $linea["email"] . "</td>";
    echo "</tr>\n";
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;

?>
</table>
