<?php

error_reporting(0);

$username = "'".$_POST['user']."'";
$pass = "'".$_POST['pass']."'";

$conn = new mysqli('localhost', 'root', '','atharv');

echo'<!DOCTYPEhtml><html><body style="background:url(\'back.jpg\'); background-size:cover;
                          padding:8%; font-size:30px; color:#fff; text-align:center; backdrop-filter:brightness(50%)"';

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM signup WHERE username = $username and password = $pass";
$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
  echo "<p>WELCOME TO OUR WEBPAGE!</p>";
}
else{
  echo '<p>Username & password didn\'t match.</p></body></html>';
}

$conn->close();
?>
