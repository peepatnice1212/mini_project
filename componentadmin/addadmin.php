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
    <title>เพิ่มข้อมูล Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/maineverypage.css">
    <link rel="stylesheet" href="../style/homeadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script>
    // function send() {
    //     alert("เพิ่มข้อมูล Admin เรียบร้อยแล้ว");
    //     let a = document.getElementById("รหัส_Admin").value
    //     let b = document.getElementById("Username_Admin").value
    //     let c = document.getElementById("Password_Admin").value
    //     let d = document.getElementById("ชื่อ_สกุล_Admin").value
    //     let e = document.getElementById("เบอร์โทร_Admin").value
    //     console.log(a);
    //     console.log(b);
    //     console.log(c);
    //     console.log(d);
    //     console.log(e);
    //     document.location = "./add/admintodb.php?a=" + a + "&b=" + b + "&c=" + c + "&d=" + d + "&e=" + e;
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
    <div class="texts">เพิ่มข้อมูล Admin</div>
    <div class="form">
        <form action="./add/admintodb.php" method="get">
            <p>รหัส Admin : <input type="text" name="รหัส_Admin" id="รหัส_Admin" required placeholder="AM000"
                    pattern="[A][M][0-9]{3}"></p>
            <p>Username Admin : <input type="text" name="Username_Admin" id="Username_Admin" required
                    pattern="[a-zA-Z][a-z]{1,}"></p>
            <span>
                <span style="font-size: larger;">Password Admin : <input type="password" name="Password_Admin"
                        id="Password_Admin" required pattern="[Aa-Zz]+" style="font-size:larger;"></span>
                <i class="far fa-eye" id="togglePassword" style="margin-left: 10px; 
                    cursor: pointer;"></i>
            </span>
            <p>ชื่อ - สกุล Admin : <input type="text" name="ชื่อ_สกุล_Admin" id="ชื่อ_สกุล_Admin" required
                    pattern="^[ก-๏\s]+$"></p>
            <p>เบอร์โทร Admin : <input type="tel" name="เบอร์โทร_Admin" id="เบอร์โทร_Admin" required
                    placeholder="0999999999" pattern="\d{10}"></p><br><br>
            <input type="submit" value="เพิ่มข้อมูล" style="font-size: larger;">
        </form>
    </div>
    <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#Password_Admin');

    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
    </script>
</body>

</html>