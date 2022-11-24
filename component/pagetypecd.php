<?php include "../connect.php"; 
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
    <title>เพลง</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/maineverypage.css">
    <link rel="stylesheet" href="../style/home_component.css">
    <script>
    function componentpage(page) {
        let a = document.getElementById(page).innerHTML;
        console.log(a);
        document.location = "./pagetypecd.php?a=" + a;
    }
    </script>
</head>

<body>

    <body>
        <header class="logo"><img src="../img/logo.png"></header>
        <nav>
            <a href="../home.php">หน้าหลัก</a>
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
            <a href="../cart.php">ตะกร้าสินค้าของคุณ</a>
            <a href="../followgoods.php">การติดตามการส่งสินค้า</a>
            <a href="../checkgoods.php">check สินค้าที่ได้สั่งไป</a>
            <a href="../futurecd.php">สินค้าที่กำลังจะมา</a>
            <a href="../contactus.php">ติดต่อพวกเรา</a>
            <a href="../login-logout/logout.php">ออกจากระบบ</a>
        </nav>

        <form action="./detail.php">
            <div class="undernavsearch">
                <span class="textsearch">สามารถหาสินค้าของเราได้ที่นี่</span>
                <input type="text" name='ชื่อ_CD_DVD' placeholder="Search.." class="butt">
                <button type="submit" class="buttonn"><i class="fa fa-search"></i></button>
            </div>
        </form>

        <div class="everypic">
            <table>

                <?php 
                $page = $_GET["a"];
                $stmt = $pdo->prepare("SELECT * FROM cd_dvd where รหัสประเภท_CD_DVD in (SELECT รหัสประเภท_CD_DVD from ประเภท_cd_dvd where ชื่อประเภท_CD_DVD = ?)");
                $stmt->bindParam(1,$page);
                $stmt->execute();
                $count = 0;
                ?>
                <?php while ($row = $stmt->fetch()): 
                if($count==5) 
                {
                print "</tr>";
                $count = 0;
                }
                if($count==0)
                print "<tr>";
                print "<td>"; ?>
                <div class="eachpic">

                    <img src='../img/all/<?=$row["ชื่อ_CD_DVD"]?>.jpg' width='250px' height="250px"><br>
                    <?=$row ["ชื่อ_CD_DVD"]?><br><?=$row ["ราคา_CD_DVD"]?> บาท

                </div>
                <?php
                $count++;
                print "</td>";
                endwhile ?>
                <?php if($count>0)
                print "</tr>"; ?>
            </table>
        </div>
    </body>

</html>