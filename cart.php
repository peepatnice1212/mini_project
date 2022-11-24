<?php 
include "./connect.php"; 
session_start(); 
if(empty($_SESSION["username"])){
    header("location:./beforehome.html");
}
?>
<html>

<head>
    <title>ตะกร้าสินค้า</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./style/maineverypage.css">
    <link rel="stylesheet" href="./style/cart.css">
    <script>
    window.onload = function() {
        httpRequest.onreadystatechange = showresult;
        var url = "./aboutcart/cartaction.php?action=update";
        httpRequest.open("GET", url);
        httpRequest.send();
    }

    function componentpage(page) {
        let a = document.getElementById(page).innerHTML;
        console.log(a);
        document.location = "./component/pagetypecd.php?a=" + a;
    }

    var httpRequest = new XMLHttpRequest();

    function update(name) {
        httpRequest.onreadystatechange = showresult;
        var qty = document.getElementById(name).value;
        var url = "./aboutcart/cartaction.php?action=update&ชื่อ_CD_DVD=" + name + "&qty=" + qty;
        httpRequest.open("GET", url);
        httpRequest.send();
    }

    let sumprice;
    let qtytotal;

    function showresult() {
        if (httpRequest.readyState == 4 && httpRequest.status == 200) {
            sumprice = httpRequest.responseText.split("-")[0];
            qtytotal = httpRequest.responseText.split("-")[1];
            console.log(sumprice);
            console.log(qtytotal);
            document.getElementById("result").innerHTML = httpRequest.responseText.split("-")[0];
        }
    }

    function datenow() {
        // alert("ทำรายการเสร็จสิ้น");
        // console.log(havefiles);
        let randoms = Math.floor(100000000 + Math.random() * 900000000);
        let randomtrack = "ST" + Math.floor(1000000000 + Math.random() * 9000000000);
        let date = new Date();
        let onlydate = (date.getFullYear() + 543) + "-" + (date.getMonth() + 1) + "-" + date.getDate();
        let now = (date.getFullYear() + 543) + "-" + (date.getMonth() + 1) + "-" + date.getDate() + " " + date
            .toLocaleTimeString();
        console.log(onlydate);
        document.location = "./receipt.php?date=" + now + "&sumprice=" + sumprice + "&qtytotal=" + qtytotal +
            "&randoms=" + randoms + "&randomtrack=" + randomtrack + "&onlydate=" + onlydate;
    }
    </script>
</head>

<body>
    <header class="logo"><img src="./img/logo.png"></header>
    <nav>
        <a href="./home.php">หน้าหลัก</a>
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
                <!-- <a href="./component/cartoon.php" id="list">การ์ตูน</a>
                <a href="./component/games.php" id="list">เกมส์</a>
                <a href="./component/dharma.php" id="list">ธรรมะ</a>
                <a href="./component/music.php" id="list">เพลง</a>
                <a href="./component/movie.php" id="list">ภาพยนตร์</a> -->
            </div>
        </div>
        <a class="active" href="./cart.php">ตะกร้าสินค้าของคุณ</a>
        <a href="./followgoods.php">การติดตามการส่งสินค้า</a>
        <a href="./checkgoods.php">check สินค้าที่ได้สั่งไป</a>
        <a href="./futurecd.php">สินค้าที่กำลังจะมา</a>
        <a href="./contactus.php">ติดต่อพวกเรา</a>
        <a href="./login-logout/logout.php">ออกจากระบบ</a>
    </nav>

    <form>
        <table>
            <tr>
                <th>ชื่อ CD-DVD</th>
                <th>ราคาแผ่นละ</th>
            </tr>
            <?php 
            if(!empty($_SESSION["cart"])) :
	// $sum = 0;
	foreach ($_SESSION["cart"] as $item) {
	// 	$sum += $item["price"] * $item["qty"];
?>
            <tr>
                <td><?=$item["name"]?></td>
                <td><?=$item["price"]?></td>
                <td>
                    <input type="number" id="<?=$item["name"]?>" value="<?=$item["qty"]?>" min="1" max="9" class="inp"
                        onchange="update('<?=$item["name"]?>')">
                    <!-- <a href="#"  class="buttoninp">คำนวณราคาใหม่</a> -->
                    <a href="./aboutcart/cartaction.php?action=delete&ชื่อ_CD_DVD=<?=$item["name"]?>"
                        class="butdel">ลบ</a>
                </td>
            </tr>
            <?php 
        } 
        ?>
            <tr>
                <td colspan="3">รวม <span id="result"></span> บาท</td>
            </tr>
            <?php endif ?>
        </table>
    </form>
    <div class="centar">
        <!-- <form action="./receipt.php" method="POST" enctype="multipart/form-data">
            <b>สามารถโอนเงินได้ที่เลขบัญชี</b> <br>
            <p>123-456789-5 ไทยพาณิชย์ <br> นาย ธนกฤต คิดไม่ซื่อ </p>
            <p>กรุณาแนบ slip หลักฐานการโอนเงิน : <input type="file" id="files"></p>
        </form> -->

        <!-- <a href="./home.php" class="buttonchoose">
            กลับไปที่หน้าเลือกสินค้า
        </a><br> -->
        <div class="buttonaccept">
            <a onclick="datenow()">ยืนยันการเช่า</a>
        </div>
    </div>
</body>

</html>