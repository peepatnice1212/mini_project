<?php include "connect.php" ;
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
    <title>หน้าหลัก</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./style/maineverypage.css">
    <link rel="stylesheet" href="./style/home_component.css">
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
        <a class="active" href="./home.php">หน้าหลัก</a>
        <div class="dropdown">
            <a class="dropbtn">
                <span class="icon">ประเภท CD-DVD
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
        <a href="./contactus.php">ติดต่อพวกเรา</a>
        <a href="./login-logout/logout.php">ออกจากระบบ</a>
    </nav>

    <form action="./component/detail.php">
        <div class="undernavsearch">
            <span class="textsearch">สามารถหาสินค้าของเราได้ที่นี่</span>
            <input type="text" name='ชื่อ_CD_DVD' placeholder="Search.." class="butt">
            <button type="submit" class="buttonn"><i class="fa fa-search"></i></button>
        </div>
    </form>

    <p>CD-DVD มาใหม่</p>
    <div style="display: flex;" class="everypic">
        <?php
            $stmt = $pdo->prepare("SELECT ชื่อ_CD_DVD,ราคา_CD_DVD,วันที่นำเข้า FROM `cd_dvd` ORDER BY วันที่นำเข้า DESC");
            $stmt->execute();
            ?>
        <?php while ($row = $stmt->fetch()): ?>
        <div class="eachpic2">
            <a href="./component/detail.php?ชื่อ_CD_DVD=<?=$row["ชื่อ_CD_DVD"]?>">
                <img src="./img/all/<?=$row["ชื่อ_CD_DVD"]?>.jpg" width='250px' height="250px"><br><br>
                <div><?=$row ["ชื่อ_CD_DVD"]?></div>
                <p><?=$row ["ราคา_CD_DVD"]?> บาท</p>
            </a>
        </div>
        <?php
            endwhile ?>
    </div>

    <p>Popular CD-DVD</p>
    <div style="display: flex;" class="everypic">
        <?php
            $stmt = $pdo->prepare("SELECT การเช่า.รหัส_CD_DVD , SUM(การเช่า.จำนวนที่เช่า) , cd_dvd.ชื่อ_CD_DVD , ราคา_CD_DVD
            FROM `การเช่า` join `cd_dvd`
            on การเช่า.รหัส_CD_DVD = cd_dvd.รหัส_CD_DVD
            GROUP BY รหัส_CD_DVD 
            ORDER BY SUM(การเช่า.จำนวนที่เช่า) DESC");
            $stmt->execute();
            ?>
        <?php while ($row = $stmt->fetch()): ?>
        <div class="eachpic2">
            <a href="./component/detail.php?ชื่อ_CD_DVD=<?=$row["ชื่อ_CD_DVD"]?>">
                <img src="./img/all/<?=$row["ชื่อ_CD_DVD"]?>.jpg" width='250px' height="250px"><br><br>
                <div><?=$row ["ชื่อ_CD_DVD"]?></div>
                <p><?=$row ["ราคา_CD_DVD"]?> บาท</p>
            </a>
        </div>
        <?php
            endwhile ?>
    </div>

    <p>ภาพยนตร์</p>
    <div style="display: flex;" class="everypic">
        <?php
            $stmt = $pdo->prepare("SELECT * FROM cd_dvd where รหัสประเภท_CD_DVD = 'MOVIE'");
            $stmt->execute();
            ?>
        <?php while ($row = $stmt->fetch()): ?>
        <div class="eachpic2">
            <a href="./component/detail.php?ชื่อ_CD_DVD=<?=$row["ชื่อ_CD_DVD"]?>">
                <img src='./img/all/<?=$row["ชื่อ_CD_DVD"]?>.jpg' width='250px' height="250px"><br><br>
                <div><?=$row ["ชื่อ_CD_DVD"]?></div>
                <p><?=$row ["ราคา_CD_DVD"]?> บาท</p>
            </a>
        </div>
        <?php
            endwhile ?>
    </div>

    <p>การ์ตูน</p>
    <div style="display: flex;" class="everypic">
        <?php
            $stmt = $pdo->prepare("SELECT * FROM cd_dvd where รหัสประเภท_CD_DVD = 'CARTOON'");
            $stmt->execute();
            ?>
        <?php while ($row = $stmt->fetch()): ?>
        <div class="eachpic2">
            <a href="./component/detail.php?ชื่อ_CD_DVD=<?=$row["ชื่อ_CD_DVD"]?>">
                <img src='./img/all/<?=$row["ชื่อ_CD_DVD"]?>.jpg' width='250px' height="250px"><br><br>
                <div><?=$row ["ชื่อ_CD_DVD"]?></div>
                <p><?=$row ["ราคา_CD_DVD"]?> บาท</p>
            </a>
        </div>
        <?php
            endwhile ?>
    </div>

    <p>เกมส์</p>
    <div style="display: flex;" class="everypic">
        <?php
            $stmt = $pdo->prepare("SELECT * FROM cd_dvd where รหัสประเภท_CD_DVD = 'GAMES'");
            $stmt->execute();
            ?>
        <?php while ($row = $stmt->fetch()): ?>
        <div class="eachpic2">
            <a href="./component/detail.php?ชื่อ_CD_DVD=<?=$row["ชื่อ_CD_DVD"]?>">
                <img src='./img/all/<?=$row["ชื่อ_CD_DVD"]?>.jpg' width='250px' height="250px"><br><br>
                <div><?=$row ["ชื่อ_CD_DVD"]?></div>
                <p><?=$row ["ราคา_CD_DVD"]?> บาท</p>
            </a>
        </div>
        <?php
            endwhile ?>
    </div>

    <p>เพลง</p>
    <div style="display: flex;" class="everypic">
        <?php
            $stmt = $pdo->prepare("SELECT * FROM cd_dvd where รหัสประเภท_CD_DVD = 'MUSIC'");
            $stmt->execute();
            ?>
        <?php while ($row = $stmt->fetch()): ?>
        <div class="eachpic2">
            <a href="./component/detail.php?ชื่อ_CD_DVD=<?=$row["ชื่อ_CD_DVD"]?>">
                <img src='./img/all/<?=$row["ชื่อ_CD_DVD"]?>.jpg' width='250px' height="250px"><br><br>
                <div><?=$row ["ชื่อ_CD_DVD"]?></div>
                <p><?=$row ["ราคา_CD_DVD"]?> บาท</p>
            </a>
        </div>
        <?php
            endwhile ?>
    </div>

    <p>ธรรมะ</p>
    <div style="display: flex;" class="everypic">
        <?php
            $stmt = $pdo->prepare("SELECT * FROM cd_dvd where รหัสประเภท_CD_DVD = 'DHARMA'");
            $stmt->execute();
            ?>
        <?php while ($row = $stmt->fetch()): ?>
        <div class="eachpic2">
            <a href="./component/detail.php?ชื่อ_CD_DVD=<?=$row["ชื่อ_CD_DVD"]?>">
                <img src='./img/all/<?=$row["ชื่อ_CD_DVD"]?>.jpg' width='250px' height="250px"><br><br>
                <div><?=$row ["ชื่อ_CD_DVD"]?></div>
                <p><?=$row ["ราคา_CD_DVD"]?> บาท</p>
            </a>
        </div>
        <?php
            endwhile ?>
    </div>
</body>

</html>