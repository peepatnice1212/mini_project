<?php include "../../connect.php" ;
session_start();
if(empty($_SESSION["username"])){
    header("location:../../beforehome.html");
}
?>
<?php
$a = $_GET["เลขที่ใบเสร็จ"];
$stmt = $pdo->prepare("SELECT * from การเช่า where เลขที่ใบเสร็จ = ?");
$stmt->bindParam(1,$a);
$stmt->execute();
if($stmt->fetch()){
    $stmt = $pdo->prepare("UPDATE `การเช่า` SET `รหัส_Admin`= ? WHERE เลขที่ใบเสร็จ = ?");
    $stmt->bindParam(1,$_GET["รหัส_Admin"]);
    $stmt->bindParam(2,$_GET["เลขที่ใบเสร็จ"]);
    // $stmt->bindParam(3,$_GET["c"]);
    // $stmt->bindParam(4,$_GET["d"]);
    $stmt->execute();
    ?>
<?php
    // $stmt = $pdo->prepare("UPDATE `ใบเสร็จ` SET `เลขที่ใบเสร็จ`= ? WHERE `เวลาในการชำระเงิน`= ? and รหัส_สมาชิก = ?");
    // $stmt->bindParam(1,$_GET["a"]);
    // $stmt->bindParam(2,$_GET["c"]);
    // $stmt->bindParam(3,$_GET["d"]);
    // $stmt->execute();
    ?>
<?php
    // $stmt = $pdo->prepare("UPDATE `การจัดส่ง` SET `รหัส_Admin`= ? WHERE `เวลาในการบันทึกสถานะ`= ? and รหัส_สมาชิก = ?");
    // $stmt->bindParam(1,$_GET["b"]);
    // $stmt->bindParam(2,$_GET["c"]);
    // $stmt->bindParam(3,$_GET["d"]);
    // $stmt->execute();
    header("location:../rent.php");
}
else{
    echo "<script>
    alert('ไม่มีข้อมูลของ เลขที่ใบเสร็จนี้ กรุณากรอกใหม่');
    window.location = '../editrent.php';
        </script>";
}

?>