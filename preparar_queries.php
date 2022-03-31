<?php
$servername = "localhost";
$username = "app1";
$password = "app1";
$dbname = "app1";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO invitados (nombre,apellido,email)
  VALUES (:firstname, :lastname, :email)");
  $stmt->bindParam(':firstname', $firstname);
  $stmt->bindParam(':lastname', $lastname);
  $stmt->bindParam(':email', $email);

  // insert a row
  $firstname = "Gegant";
  $lastname = "Pi";
  $email = "gegantpi@example.com";
  $stmt->execute();

  // insert another row
  $firstname = "Maria";
  $lastname = "Sangrienta";
  $email = "blodymary@example.com";
  $stmt->execute();

  // insert another row
  $firstname = "Aitor";
  $lastname = "Tilla";
  $email = "elargiñano@example.com";
  $stmt->execute();

  echo "New records created successfully";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>
