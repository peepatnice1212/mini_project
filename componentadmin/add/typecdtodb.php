<?php include "../../connect.php" ;
session_start();
if(empty($_SESSION["username"])){
    header("location:../../beforehome.html");
}
?>
<?php
$stmt = $pdo->prepare("SELECT รหัสประเภท_CD_DVD from cd_dvd where รหัสประเภท_CD_DVD = ?");
$stmt->bindParam(1,$_GET["รหัสประเภท_CD_DVD"]);
$stmt->execute();
$row = $stmt->fetch();

if(empty($row)){
    $stmt = $pdo->prepare("INSERT INTO `ประเภท_cd_dvd`(`รหัสประเภท_CD_DVD`, `ชื่อประเภท_CD_DVD`) VALUES (?,?)");
$stmt->bindParam(1,$_GET["รหัสประเภท_CD_DVD"]);
$stmt->bindParam(2,$_GET["ชื่อประเภท_CD_DVD"]);
$stmt->execute();

header("location:../typecd.php");
}

else{
    echo "<script>
    alert('รหัสประเภท CD-DVD ซ้ำ กรุณากรอกใหม่');
    window.location = '../addtypecd.php';
        </script>";
}
?>