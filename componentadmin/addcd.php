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
    <title>เพิ่มข้อมูล CD-DVD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/maineverypage.css">
    <link rel="stylesheet" href="../style/homeadmin.css">
    <script>
    function send() {
        let file = document.getElementById("file").value
        if (file == "") {
            alert("กรุณาใส่ไฟล์รูปภาพ");
        } else {
            alert("เพิ่มข้อมูล CD-DVD เรียบร้อยแล้ว");
            let a = document.getElementById("รหัส_CD_DVD").value
            let b = document.getElementById("ชื่อ_CD_DVD").value
            let c = document.getElementById("ราคา_CD_DVD").value
            let d = document.getElementById("จำนวน_CD_DVD").value
            let e = document.getElementById("รหัสประเภท_CD_DVD").value
            let f = document.getElementById("วันที่นำเข้า").value
            // console.log(a);
            // console.log(b);
            // console.log(c);
            // console.log(d);
            // console.log(e);
            // console.log(f);
            // console.log(file);
            document.location = "./add/cdtodb.php?a=" + a + "&b=" + b + "&c=" + c + "&d=" + d + "&e=" + e + "&f=" + f;
        }
    }

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
    <div class="texts">เพิ่มข้อมูล CD-DVD</div>
    <div class="form">
        <form action="./add/cdtodb.php" method="post" enctype="multipart/form-data">
            <p>รหัส CD-DVD : <input type="text" name="รหัส_CD_DVD" id="รหัส_CD_DVD" required pattern="[A-Z]{2}[0-9]{3}"
                    placeholder="XX999">
            </p>
            <p>ชื่อ CD-DVD : <input type="text" name="ชื่อ_CD_DVD" id="ชื่อ_CD_DVD" required></p>
            <p>ราคา CD-DVD : <input type="text" name="ราคา_CD_DVD" id="ราคา_CD_DVD" required pattern="[1-9][0-9]{1,4}">
            </p>
            <p>จำนวน CD-DVD : <input type="text" name="จำนวน_CD_DVD" id="จำนวน_CD_DVD" required
                    pattern="[1-9][0-9]{1,3}"></p>
            <p>รหัสประเภท CD-DVD : <input type="text" name="รหัสประเภท_CD_DVD" id="รหัสประเภท_CD_DVD" required></p>
            <!-- <p>วันที่นำ CD-DVD เข้ามา : <input type="text" name="วันที่นำเข้า" id="วันที่นำเข้า"></p> -->
            <p>Image : <input type="file" id="file" name="file" required></p>
            <br><br>
            <input type="submit" value="เพิ่มข้อมูล" style="font-size: larger;">
        </form>
        <!-- <a onclick="send()">เพิ่มข้อมูล</a> -->
    </div>
</body>

</html>