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


    $SBP=$_POST["SBP"];  
    $LDL=$_POST["LDL"];
    $AL=$_POST["AL"];
    $gender=$_POST["gender"];


$url = 'http://localhost:5000/';
$ch = curl_init($url);

// $data = array(
//     'PatientEncounterID' => 346,
//     'PatientID' => '123456',
//     'SystolicBPNBR' => $SBP,
//     'LDLNBR' => $LDL,
//     'A1CNBR' => $AL,
//     'GenderFLG' => $gender
// );


$myObj->PatientEncounterID = 1;
$myObj->PatientID = 30;
$myObj->SystolicBPNBR = $SBP;
$myObj->LDLNBR = $LDL;
$myObj->A1CNBR = $AL;
$myObj->GenderFLG = $gender;
$myJSON = json_encode($myObj);

// $myJSON = json_encode($myObj);



echo "HELLLOOO".$SBP;
// $payload = json_encode(array($data));
curl_setopt($ch, CURLOPT_POSTFIELDS, $myJSON);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
echo $result;

// $sql="insert into diabetes values($contact,'$name',$alergies,'$email','$gender','$blood_type','$address')";

// $conn->query($sql);

?>