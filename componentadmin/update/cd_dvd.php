<?php include "../../connect.php" ;
session_start();
if(empty($_SESSION["username"])){
    header("location:../../beforehome.html");
}
?>
<?php
$a = $_GET["รหัส_CD_DVD"];
$stmt = $pdo->prepare("SELECT * from cd_dvd where รหัส_CD_DVD = ?");
$stmt->bindParam(1,$a);
$stmt->execute();
if($stmt->fetch()){
    $stmt = $pdo->prepare("UPDATE `cd_dvd` SET `ราคา_CD_DVD`= ? ,`จำนวน_CD_DVD`= ? WHERE `รหัส_CD_DVD`= ?");
$stmt->bindParam(1,$_GET["ราคา_CD_DVD"]);
$stmt->bindParam(2,$_GET["จำนวน_CD_DVD"]);
$stmt->bindParam(3,$_GET["รหัส_CD_DVD"]);
$stmt->execute();

header("location:../../homeadmin.php");
}
else{
    echo "<script>
    alert('ไม่มีข้อมูลของ รหัส CD-DVD นี้ กรุณากรอกใหม่');
    window.location = '../editcd.php';
        </script>";
}

?>