<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "clinicplus";
$flag = 0;
$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$name = "";

if(isset($_POST["name"])) {
    $name=$_POST["name"];  
}

$alergies=$_POST["alergies"];
$email=$_POST["email"];
$contact=$_POST["contact"];
$gender=$_POST["gender"];
$contact=$_POST["contact"];
$blood_type=$_POST["blood_type"];
$address=$_POST["address"];

echo "".$name;

$sql="insert into patient values($contact,'$name',$alergies,'$email','$gender','$blood_type','$address')";

$conn->query($sql);

?>