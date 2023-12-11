<?php

error_reporting(0);

$first = "'".$_POST['firstname']."'";
$last = "'".$_POST['lastname']."'";
$username = "'".$_POST['user']."'";
$pass = "'".$_POST['pass']."'";
$phone = "'".$_POST['phone']."'";

$conn = new mysqli('localhost', 'root', '','atharv');

echo'<!DOCTYPEhtml><html><body style="background:url(\'back.jpg\'); background-size:cover;
                          padding:8%; font-size:30px; color:#fff; text-align:center; backdrop-filter:brightness(50%)"';

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM signup WHERE username = $username";
$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
  echo "<p>Username already signed up. Please choose a different username.</p>";
}

$sql = "SELECT username FROM signup WHERE phone = $phone";
$result = mysqli_query($conn,$sql);

if ($result != $username) {
  echo "<p>Phone number is already linked with existed username.</p>";
}

$sql = "INSERT INTO `signup` (`firstname`,`lastname`,`username`, `phone`, `password`) VALUES ($first, $last, $username, $phone, $pass);";

$result = mysqli_query($conn,$sql);

if ($result) {
  echo '<p>Signed up successfully. Please <a href="login.html"><button style=\"border:0px; cursor:pointer;\">Login</button></a></p></body></html>';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
