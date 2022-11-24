<?php include "../connect.php" ;
session_start();
if(empty($_SESSION["username"])){
    header("location:../beforehome.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลบข้อมูล Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/maineverypage.css">
    <link rel="stylesheet" href="../style/homeadmin.css">
    <script>
    // function send() {
    //     alert("ลบข้อมูล Admin เรียบร้อยแล้ว");
    //     let a = document.getElementById("Username_Admin").value
    //     document.location = "./delete/adminfromdb.php?a=" + a;
    // }

    function componentpage(page) {
        let a = document.getElementById(page).innerHTML;
        console.log(a);
        document.location = "./pagetypecd.php?a=" + a;
    }
    </script>
</head>

<body>
    <header class="logo"><img src="../img/logo.png"></header>
    <nav>
        <div class="dropdown">
            <a class="dropbtn">
                <span class="icon">ข้อมูลทั้งหมด
                </span>
            </a>
            <div class="dropdown-content">
                <a href="../homeadmin.php" id="list">CD-DVD</a>
                <a href="./typecd.php" id="list">ประเภท CD</a>
                <a href="./admin.php" id="list">Admin</a>
                <a href="./customer.php" id="list">ลูกค้า</a>
                <a href="./tracking.php" id="list">การจัดส่ง</a>
                <a href="./receiptcus.php" id="list">ใบเสร็จ</a>
                <a href="./rent.php" id="list">การเช่า</a>
            </div>
        </div>
        <div class="dropdown">
            <a class="dropbtn">
                <span>ประเภท CD-DVD
                    <i class="fa fa-caret-down"></i>
                </span>
            </a>
            <div class="dropdown-content">
                <?php
                $stmt = $pdo->prepare("SELECT * from ประเภท_cd_dvd");
                $stmt->execute();
                while($row = $stmt->fetch()) : ?>
                <a onclick="componentpage('<?=$row['ชื่อประเภท_CD_DVD']?>')"
                    id="<?=$row['ชื่อประเภท_CD_DVD']?>"><?=$row["ชื่อประเภท_CD_DVD"]?></a>
                <?php endwhile
                ?>
                <!-- <a href="./cartoon.php" id="list">การ์ตูน</a>
                <a href="./games.php" id="list">เกมส์</a>
                <a href="./dharma.php" id="list">ธรรมะ</a>
                <a href="./music.php" id="list">เพลง</a>
                <a href="./movie.php" id="list">ภาพยนตร์</a> -->
            </div>
        </div>
        <div class="dropdown">
            <a class="dropbtn">
                <span class="icon">เพิ่ม - ลบ ข้อมูล
                </span>
            </a>
            <div class="dropdown-content">
                <a href="./addcd.php" id="list">เพิ่ม CD-DVD</a>
                <a href="./delcd.php" id="list">ลบ CD-DVD</a>
                <a href="./addadmin.php" id="list">เพิ่ม Admin</a>
                <a href="./deladmin.php" id="list">ลบ Admin</a>
                <a href="./addtypecd.php" id="list">เพิ่ม ประเภท CD</a>
                <a href="./deltypecd.php" id="list">ลบ ประเภท CD</a>
                <a href="./delcustomer.php" id="list">ลบ ลูกค้า</a>
            </div>
        </div>
        <div class="dropdown">
            <a class="dropbtn">
                <span class="icon">Update ข้อมูล
                </span>
            </a>
            <div class="dropdown-content">
                <a href="./edittracking.php" id="list">การจัดส่ง</a>
                <a href="./editcd.php" id="list">CD-DVD</a>
                <a href="./editrent.php" id="list">การเช่า</a>
            </div>
        </div>

        <a href="../login-logout/logout.php">ออกจากระบบ</a>
    </nav>
    <div class="texts">ลบข้อมูล Admin</div>
    <div class="form">
        <form action="./delete/adminfromdb.php" method="get">
            <p>รหัส Admin : <input type="text" name="รหัส_Admin" id="รหัส_Admin" required placeholder="AM000"
                    pattern="[A][M][0-9]{3}"></p><br><br>
            <input type="submit" value="ลบข้อมูล" style="font-size: larger;">
        </form>
    </div>
</body>

</html>