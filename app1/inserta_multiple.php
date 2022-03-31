<?php
$servername = "localhost";
$username = "app1";
$password = "app1";
$dbname = "app1";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // begin the transaction
  $conn->beginTransaction();
  // our SQL statements
  $conn->exec("INSERT INTO invitados (nombre, apellido, email)
  VALUES ('John', 'Doe', 'john@example.com')");
  $conn->exec("INSERT INTO invitados (nombre, apellido, email)
  VALUES ('Benito', 'Camela', 'beni@example.com')");
  $conn->exec("INSERT INTO invitados (nombre, apellido, email)
  VALUES ('Tocame', 'Roque', 'troc@example.com')");

  // commit the transaction
  $conn->commit();
  echo "New records created successfully";
} catch(PDOException $e) {
  // roll back the transaction if something failed
  $conn->rollback();
  echo "Error: " . $e->getMessage();
}

$conn = null;
?>
