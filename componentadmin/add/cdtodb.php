<?php include "../../connect.php" ;
session_start();
if(empty($_SESSION["username"])){
    header("location:../../beforehome.html");
}
?>

<?php
$stmt = $pdo->prepare("SELECT รหัส_CD_DVD from cd_dvd where รหัส_CD_DVD = ?");
$stmt->bindParam(1,$_POST["รหัส_CD_DVD"]);
$stmt->execute();
$row = $stmt->fetch();
if(empty($row)){
    $filename = $_POST["ชื่อ_CD_DVD"].".jpg";
    $location = "../../img/all/".$filename;
    $year = date("Y")+543;
    $day = date("d")+1;
    $fullday = date("$year-m-d");
    if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
        $stmt = $pdo->prepare("INSERT INTO `cd_dvd`(`รหัส_CD_DVD`, `ชื่อ_CD_DVD`, `ราคา_CD_DVD`, `จำนวน_CD_DVD`, `รหัสประเภท_CD_DVD`,วันที่นำเข้า) VALUES (?,?,?,?,?,'$fullday')");
        $stmt->bindParam(1,$_POST["รหัส_CD_DVD"]);
        $stmt->bindParam(2,$_POST["ชื่อ_CD_DVD"]);
        $stmt->bindParam(3,$_POST["ราคา_CD_DVD"]);
        $stmt->bindParam(4,$_POST["จำนวน_CD_DVD"]);
        $stmt->bindParam(5,$_POST["รหัสประเภท_CD_DVD"]);
        $stmt->execute();
        echo "<script type='text/javascript'>alert('Add CD-DVD เสร็จสิ้น');</script>";
        header("location:../../homeadmin.php");
    }
    else{
        echo "<script type='text/javascript'>alert('Add CD-DVD ไม่สำเร็จ กรุณาเพิ่มข้อมูลใหม่');</script>";
        header("location:../addcd.php");
    }
}
else{
    echo "<script>
    alert('รหัส CD-DVD ซ้ำ กรุณากรอกใหม่');
    window.location = '../addcd.php';
        </script>";
}

?>