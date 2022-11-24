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
    <title>แก้ไขข้อมูลการจัดส่ง</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/maineverypage.css">
    <link rel="stylesheet" href="../style/homeadmin.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://รับเขียนโปรแกรม.net/jquery_datepicker_thai/jquery-ui.js"></script>
    <script>
    // function send() {
    //     alert("แก้ไขข้อมูล การจัดส่ง เรียบร้อยแล้ว");
    //     let a = document.getElementById("รหัส_การจัดส่ง").value
    //     // let b = document.getElementById("สถานะการจัดส่ง").value
    //     let b = document.getElementById("วันที่สินค้าจะถึง").value
    //     // let b = document.getElementById("เวลาที่เริ่มบันทึกสถานะ").value
    //     let c = document.getElementById("รหัส_Admin").value
    //     document.location = "./update/tracking.php?a=" + a + "&b=" + b + "&c=" + c;
    // }

    function componentpage(page) {
        let a = document.getElementById(page).innerHTML;
        console.log(a);
        document.location = "./pagetypecd.php?a=" + a;
    }

    function test() {
        let a = document.getElementById("datepicker").value;
        let b = document.getElementById("รหัส_การจัดส่ง").value;
        let c = document.getElementById("รหัส_Admin").value;
        let d = document.getElementById("สถานะการจัดส่ง").value;
        if (a == "") {
            alert("กรุณาใส่วันที่ที่สินค้าจะถึง");
        } else if (b == "") {
            alert("กรุณาใส่รหัสการจัดส่ง");
        } else {
            console.log("a = " + a);
            // console.log("year = " + year);
            // console.log("full = " + full);

            console.log("b = " + b);
            console.log("c = " + c);
            console.log("d = " + d);
            document.location = "./update/tracking.php?date=" + a + "&รหัส_การจัดส่ง=" + b + "&รหัส_Admin=" + c +
                "&สถานะการจัดส่ง=" + d;
        }
    }

    function set_cal(ele) { //function สร้างตัวเลือกปฎิทิน
        $(ele).datepicker({
            onSelect: (date_text) => {
                let arr = date_text.split("/");
                let new_date = arr[0] + "-" + arr[1] + "-" + (parseInt(arr[2]) + 543).toString();
                $(ele).val(new_date);
                $(ele).css("color", "");
            },
            beforeShow: () => {
                if ($(ele).val() != "") {
                    let arr = $(ele).val().split("/");
                    let new_date = arr[0] + "-" + arr[1] + "-" + (parseInt(arr[2]) - 543).toString();
                    $(ele).val(new_date);
                }
                $(ele).css("color", "white");
            },
            onClose: () => {
                $(ele).css("color", "");
                if ($(ele).val() != "") {
                    let arr = $(ele).val().split("-");
                    if (parseInt(arr[2]) < 2500) {
                        let new_date = arr[0] + "-" + arr[1] + "-" + (parseInt(arr[2]) + 543).toString();
                        $(ele).val(new_date);
                    }
                }
            },
            dateFormat: "dd-mm-yy", //กำหนดรูปแบบวันที่เป็น วัน/เดือน/ปี
            changeMonth: true, //กำหนดให้เลือกเดือนได้
            changeYear: true, //กำหนดให้เลือกปีได้
            showOtherMonths: true, //กำหนดให้แสดงวันของเดือนก่อนหน้าได้
        });
    }

    $(document).ready(function() {
        //เรียก function set_cal เมื่อเปิดหน้าเว็บ โดยส่ง object element ที่มี id เป็น datepicker เป็นพารามิเตอร์
        set_cal($("#datepicker"));
    })
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
    <div class="texts">แก้ไขข้อมูลการจัดส่ง</div>
    <div class="form">
        <form action="" method="get">
            <p>รหัสการจัดส่ง : <input type="text" name="รหัส_การจัดส่ง" id="รหัส_การจัดส่ง"></p>
            <p>วันที่สินค้าจะถึง : <input type="text" name="วันที่สินค้าจะถึง" id="datepicker"></p><br>
            <p>สถานะการจัดส่ง</p>
            <select name="สถานะการจัดส่ง" id="สถานะการจัดส่ง" style="font-size: larger;">
                <option value="ready">ready</option>
                <option value="received">received</option>
            </select><br><br>
            <p>Admin ผู้ดูแลการจัดส่งนี้</p>
            <select name="" id="รหัส_Admin" style="font-size: larger;">
                <?php 
            $stmt = $pdo->prepare("SELECT * from `admin`");
            $stmt->execute();
            while($row = $stmt->fetch()) : ?>
                <option value="<?=$row["รหัส_Admin"]?>"><?=$row["ชื่อ_สกุล_Admin"]?></option>
                <?php endwhile ?>
            </select>
            <!-- <p>ใส่เวลาที่เริ่มบันทึกสถานะ : <input type="text" name="เวลาที่เริ่มบันทึกสถานะ" id="เวลาที่เริ่มบันทึกสถานะ">
        </p>
        <p>ใส่ รหัสลูกค้า : <input type="text" name="รหัส_สมาชิก" id="รหัส_สมาชิก"></p> -->
            <br><br><br><br>
            <input type="button" value="แก้ไขข้อมูล" onclick="test()" style="font-size: larger;">
        </form>

    </div>
</body>

</html>