<?php include "../../connect.php"; 
session_start();
if(empty($_SESSION["username"])){
    header("location:../../beforehome.html");
}
?>
<?php
$stmt = $pdo->prepare("SELECT รหัส_Admin from `admin` where รหัส_Admin = ?");
$stmt->bindParam(1,$_GET["รหัส_Admin"]);
$stmt->execute(); 
$row = $stmt->fetch();
if(empty($row)){
    $stmt = $pdo->prepare("INSERT INTO `admin`(`รหัส_Admin`, `Username_Admin`, `Password_Admin`, `ชื่อ_สกุล_Admin`, `เบอร์โทร_Admin`) VALUES (?,?,?,?,?)");
    $stmt->bindParam(1,$_GET["รหัส_Admin"]);
    $stmt->bindParam(2,$_GET["Username_Admin"]);
    $stmt->bindParam(3,$_GET["Password_Admin"]);
    $stmt->bindParam(4,$_GET["ชื่อ_สกุล_Admin"]);
    $stmt->bindParam(5,$_GET["เบอร์โทร_Admin"]);
    $stmt->execute();

    header("location:../admin.php");
}
else{
    echo "<script>
    alert('รหัส Admin ซ้ำ กรุณากรอกใหม่');
    window.location = '../addadmin.php';
        </script>";
}

?>