<?php
  include "../connect.php";
  
  session_start();

  $stmt = $pdo->prepare("SELECT * FROM สมาชิก WHERE Username_สมาชิก = ? AND Password_สมาชิก = ?");
  $stmt->bindParam(1, $_GET["username"]);
  $stmt->bindParam(2, $_GET["password"]);
  $stmt->execute();
  $row = $stmt->fetch();

  if (!empty($row)) { 
    $_SESSION["fullname"] = $row["ชื่อ_สกุล_สมาชิก"];   
    $_SESSION["username"] = $row["Username_สมาชิก"];
    echo "pass";
  } else {
    $stmt = $pdo->prepare("SELECT * FROM `admin` WHERE Username_Admin = ? AND Password_Admin = ?");
  $stmt->bindParam(1, $_GET["username"]);
  $stmt->bindParam(2, $_GET["password"]);
  $stmt->execute();
  $row = $stmt->fetch();

  if (!empty($row)) { 
    $_SESSION["fullname"] = $row["ชื่อ_สกุล_Admin"];   
    $_SESSION["username"] = $row["Username_Admin"];
    echo "pass_add";
  } else {
    echo "no pass";
  }
  }

  
?>