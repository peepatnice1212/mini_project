<?php include "../connect.php" ?>
<?php
$stmt = $pdo->prepare("INSERT INTO สมาชิก (รหัส_สมาชิก, Username_สมาชิก, 
                    Password_สมาชิก, ชื่อ_สกุล_สมาชิก, ที่อยู่_สมาชิก, email, เบอร์โทร_สมาชิก) 
                    VALUES ('',?, ?, ?, ?, ?, ?)");
$stmt->bindParam(1, $_POST["Username_สมาชิก"]);
$stmt->bindParam(2, $_POST["Password_สมาชิก"]);
$stmt->bindParam(3, $_POST["ชื่อ_สกุล_สมาชิก"]);
$stmt->bindParam(4, $_POST["ที่อยู่_สมาชิก"]);
$stmt->bindParam(5, $_POST["email"]);
$stmt->bindParam(6, $_POST["เบอร์โทร_สมาชิก"]);
$stmt->execute(); 
echo $_POST["Username_สมาชิก"];
echo $_POST["Password_สมาชิก"];
echo $_POST["ชื่อ_สกุล_สมาชิก"];
echo $_POST["ที่อยู่_สมาชิก"];
echo $_POST["email"];
echo $_POST["เบอร์โทร_สมาชิก"];
header("location: ../login-logout/formlogin.php");
?>