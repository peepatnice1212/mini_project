<?php include "../../connect.php" ;
session_start();
if(empty($_SESSION["username"])){
    header("location:../../beforehome.html");
}
?>
<?php
$a = $_GET["รหัส_สมาชิก"];
$stmt = $pdo->prepare("SELECT * from `สมาชิก` where รหัส_สมาชิก = ?");
$stmt->bindParam(1,$a);
$stmt->execute();
if($stmt->fetch()){
    $stmt = $pdo->prepare("DELETE FROM `สมาชิก` WHERE รหัส_สมาชิก = ?");
    $stmt->bindParam(1,$_GET["รหัส_สมาชิก"]);
    $stmt->execute();

    header("location:../customer.php");
}
else{
    echo "<script>
    alert('ไม่มีข้อมูลของ ลูกค้าคนนี้ กรุณากรอกใหม่');
    window.location = '../delcustomer.php';
        </script>";
}
?>