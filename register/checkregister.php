<?php include "../connect.php" ?>
<?php
$stmt = $pdo->prepare("SELECT * FROM สมาชิก where Username_สมาชิก = ?");
$stmt->bindParam(1,$_GET["username"]);
$stmt->execute();
$row = $stmt->fetch();

sleep(1);

if (empty($row)) {
	echo "okay";
} else {
	echo "denied";
}

?>