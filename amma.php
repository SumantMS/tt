<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $type = $_POST['type'];
  $area = $_POST['area'];

  $conn = new mysqli('localhost', 'root', '', 'sumanth');
  if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
  } else {
    $stmt = $conn->prepare("INSERT INTO feedback (name, mobile, email, gender, type, area) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sissss", $name, $mobile, $email, $gender, $type, $area);
    $execval = $stmt->execute();
    if ($execval) {
      echo "successful!";
    } else {
      echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
  }
}
?>
