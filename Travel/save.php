<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $where_to_go = test_input($_POST["where_to_go"]);
  $how_many_members = test_input($_POST["how_many_members"]);
  $arrivals = test_input($_POST["arrivals"]);
  $leaving = test_input($_POST["leaving"]);
  $name = test_input($_POST["name"]);
  $details = test_input($_POST["details"]);

  // Store the data in a database
  $servername = "localhost";
  $username = "username";
  $password = "password";
  $dbname = "myDB";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO MyGuests (where_to_go, how_many_members, arrivals, leaving, name, details)
  VALUES ('$where_to_go', '$how_many_members', '$arrivals', '$leaving', '$name', '$details')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>