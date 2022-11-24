<?php include "../../connect.php" ;
session_start();
if(empty($_SESSION["username"])){
    header("location:../../beforehome.html");
}
?>
<?php
$a = $_GET["ชื่อ_CD_DVD"];
$stmt = $pdo->prepare("SELECT * from `cd_dvd` where ชื่อ_CD_DVD = ?");
$stmt->bindParam(1,$a);
$stmt->execute();
if($stmt->fetch()){
    $stmt = $pdo->prepare("DELETE FROM `cd_dvd` WHERE ชื่อ_CD_DVD = ?");
    $stmt->bindParam(1,$_GET["ชื่อ_CD_DVD"]);
    $stmt->execute();

    header("location:../../homeadmin.php");
}
else{
    echo "<script>
    alert('ไม่มีข้อมูลของ ชื่อ CD-DVD นี้ กรุณากรอกใหม่');
    window.location = '../delcd.php';
        </script>";
}
?>