<?php include "../../connect.php";
session_start();
if(empty($_SESSION["username"])){
    header("location:../../beforehome.html");
}
?>
<?php
$a = $_GET["รหัส_Admin"];
$stmt = $pdo->prepare("SELECT * from `admin` where รหัส_Admin = ?");
$stmt->bindParam(1,$a);
$stmt->execute();
if($stmt->fetch()){
    $stmt = $pdo->prepare("DELETE FROM `admin` WHERE รหัส_Admin = ?");
    $stmt->bindParam(1,$_GET["รหัส_Admin"]);
    $stmt->execute();

    header("location:../admin.php");
}
else{
    echo "<script>
    alert('ไม่มีข้อมูลของ รหัส Admin นี้ กรุณากรอกใหม่');
    window.location = '../deladmin.php';
        </script>";
}
?>