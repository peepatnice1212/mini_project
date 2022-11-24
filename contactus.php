<?php include "./connect.php" ;
session_start(); 
if(empty($_SESSION["username"])){
    header("location:./beforehome.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ติดต่อพวกเรา</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./style/maineverypage.css">
    <link rel="stylesheet" href="./style/contactus.css">
    <script>
    function componentpage(page) {
        let a = document.getElementById(page).innerHTML;
        console.log(a);
        document.location = "./component/pagetypecd.php?a=" + a;
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
        <a href="./cart.php">ตะกร้าสินค้าของคุณ</a>
        <a href="./followgoods.php">การติดตามการส่งสินค้า</a>
        <a href="./checkgoods.php">check สินค้าที่ได้สั่งไป</a>
        <a href="./futurecd.php">สินค้าที่กำลังจะมา</a>
        <a class="active" href="./contactus.php">ติดต่อพวกเรา</a>
        <a href="./login-logout/logout.php">ออกจากระบบ</a>
    </nav>
    <div class="data">
        <p class="texthead">สถานที่ติดต่อ </p>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3874.3311658899715!2d100.51209911532966!3d13.819142199451399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29b877800c9af%3A0xd754c571fc7177b!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LmA4LiX4LiE4LmC4LiZ4LmC4Lil4Lii4Li14Lie4Lij4Liw4LiI4Lit4Lih4LmA4LiB4Lil4LmJ4Liy4Lie4Lij4Liw4LiZ4LiE4Lij4LmA4Lir4LiZ4Li34Lit!5e0!3m2!1sth!2sth!4v1665905052772!5m2!1sth!2sth"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <p class="texthead">หรือสามารถติดต่อ Admin ได้ที่นี่ </p>
        <div class="alltext">
            <?php
            $stmt = $pdo->prepare("SELECT * FROM `admin`");
            $stmt->execute();
            ?>
            <?php while ($row = $stmt->fetch()) : ?>
            <div class="text">
                <?=$row ["ชื่อ_สกุล_Admin"]?><br><?=$row ["เบอร์โทร_Admin"]?>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>