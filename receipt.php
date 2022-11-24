<?php 
    include "./connect.php";
    session_start(); 
if(empty($_SESSION["username"])){
    header("location:./beforehome.html");
}

    $stmt = $pdo->prepare("INSERT INTO การเช่า(รหัส_CD_DVD,เลขที่ใบเสร็จ,รหัส_สมาชิก,จำนวนที่เช่า,วันเวลาที่เช่า) VALUES (?,?,(SELECT สมาชิก.รหัส_สมาชิก FROM สมาชิก WHERE สมาชิก.Username_สมาชิก = '".$_SESSION["username"]."'),?,?);");
    foreach($_SESSION["cart"] as $item){
        $stmt->bindParam(1,$item["id"]);
        $stmt->bindParam(2,$_GET["randoms"]);
        $stmt->bindParam(3,$item["qty"]);
        $stmt->bindParam(4,$_GET["date"]);
        $stmt->execute();  
    } 
?>

<?php 
    $stmt = $pdo->prepare("UPDATE cd_dvd SET จำนวน_CD_DVD = จำนวน_CD_DVD - ? where รหัส_CD_DVD = ?");
    foreach($_SESSION["cart"] as $item){
        $stmt->bindParam(1,$item["qty"]);
        $stmt->bindParam(2,$item["id"]);
        $stmt->execute();  
    } 
?>

<?php
    // $filename = $_SESSION["username"]."_".$_GET["onlydate"];
    // $location = "img/upload/".$filename;
        $stmt = $pdo->prepare("INSERT INTO ใบเสร็จ(เลขที่ใบเสร็จ,ยอดชำระทั้งหมด,จำนวนที่ซื้อ,รหัส_สมาชิก) values (?,?,?,(SELECT สมาชิก.รหัส_สมาชิก FROM สมาชิก WHERE สมาชิก.Username_สมาชิก = '".$_SESSION["username"]."'))");
        $stmt->bindParam(1,$_GET["randoms"]);
        $stmt->bindParam(2,$_GET["sumprice"]);
        // $stmt->bindParam(3,$_GET["date"]);
        $stmt->bindParam(3,$_GET["qtytotal"]);
        $stmt->execute();
?>

<?php
    $stmt = $pdo->prepare("INSERT INTO การจัดส่ง(รหัส_การจัดส่ง,สถานะการจัดส่ง,เวลาในการบันทึกสถานะ,รหัส_สมาชิก) values (?,'not_ready',?,(SELECT สมาชิก.รหัส_สมาชิก FROM สมาชิก WHERE สมาชิก.Username_สมาชิก = '".$_SESSION["username"]."'))");
    $stmt->bindParam(1,$_GET["randomtrack"]);
    $stmt->bindParam(2,$_GET["date"]);
    $stmt->execute();
    unset($_SESSION["cart"]);
    header("location:./home.php")
?>