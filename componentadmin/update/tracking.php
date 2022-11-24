<?php include "../../connect.php" ;
session_start();
if(empty($_SESSION["username"])){
    header("location:../../beforehome.html");
}
?>
<?php
$a = $_GET["รหัส_การจัดส่ง"];
$stmt = $pdo->prepare("SELECT รหัส_การจัดส่ง from การจัดส่ง where รหัส_การจัดส่ง = ?");
$stmt->bindParam(1,$a);
$stmt->execute();
// $row = $stmt->fetch();
if($stmt->fetch()){
    $stmt = $pdo->prepare("UPDATE `การจัดส่ง` SET `สถานะการจัดส่ง`= ?,`วันที่สินค้าจะถึง`= ? , รหัส_Admin = ? WHERE รหัส_การจัดส่ง = ?");
    $stmt->bindParam(1,$_GET["สถานะการจัดส่ง"]);
    $stmt->bindParam(2,$_GET["date"]);
    $stmt->bindParam(3,$_GET["รหัส_Admin"]);
    $stmt->bindParam(4,$_GET["รหัส_การจัดส่ง"]);
    // $stmt->bindParam(4,$_GET["d"]);
    // $stmt->bindParam(5,$_GET["e"]);
    $stmt->execute();

    header("location:../tracking.php");
}
else{
    echo "<script>
    alert('ไม่มีข้อมูลของ รหัสการจัดส่งนี้ กรุณากรอกใหม่');
    window.location = '../edittracking.php';
        </script>";
}


?>