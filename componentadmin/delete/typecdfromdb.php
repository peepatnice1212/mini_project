<?php include "../../connect.php" ;
session_start();
if(empty($_SESSION["username"])){
    header("location:../../beforehome.html");
}
?>
<?php
$a = $_GET["ชื่อประเภท_CD_DVD"];
$stmt = $pdo->prepare("SELECT * from `ประเภท_cd_dvd` where ชื่อประเภท_CD_DVD = ?");
$stmt->bindParam(1,$a);
$stmt->execute();
if($stmt->fetch()){
    $stmt = $pdo->prepare("DELETE FROM `ประเภท_cd_dvd` WHERE ชื่อประเภท_CD_DVD = ?");
    $stmt->bindParam(1,$_GET["ชื่อประเภท_CD_DVD"]);
    $stmt->execute();

    header("location:../typecd.php");
}
else{
    echo "<script>
    alert('ไม่มีข้อมูลของ ประเภท CD-DVD นี้ กรุณากรอกใหม่');
    window.location = '../deltypecd.php';
        </script>";
}

?>