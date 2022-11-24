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
    <title>check สินค้าที่ได้สั่งไป</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./style/maineverypage.css">
    <link rel="stylesheet" href="./style/follow_checkgoods.css">
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
        <a class="active" href="./checkgoods.php">check สินค้าที่ได้สั่งไป</a>
        <a href="./futurecd.php">สินค้าที่กำลังจะมา</a>
        <a href="./contactus.php">ติดต่อพวกเรา</a>
        <a href="./login-logout/logout.php">ออกจากระบบ</a>
    </nav>
    <!-- <form>
        <div class="undernavsearch">
            <span class="textsearch">ใส่ username ของคุณ</span>
            <input type="text" name='Username_สมาชิก' placeholder="Search.." class="butt">
            <button type="submit" class="buttonn"><i class="fa fa-search"></i></button>
        </div>
    </form> -->
    <div class="managetable">
        <table>
            <tr>
                <th>เลขที่ใบเสร็จ</th>
                <th>ชื่อ-สกุล สมาชิก</th>
                <th>ยอดชำระทั้งหมด</th>
                <th>จำนวนที่ซื้อ</th>
                <th>ชื่อ CD-DVD</th>
            </tr>

            <?php  
        $stmt = $pdo->prepare("SELECT ใบเสร็จ.เลขที่ใบเสร็จ,สมาชิก.ชื่อ_สกุล_สมาชิก,สมาชิก.Username_สมาชิก,ใบเสร็จ.ยอดชำระทั้งหมด,ใบเสร็จ.จำนวนที่ซื้อ, GROUP_CONCAT(cd_dvd.ชื่อ_CD_DVD SEPARATOR ' , ') AS ชื่อ_CD_DVD
        FROM ใบเสร็จ JOIN การเช่า JOIN สมาชิก join cd_dvd ON ใบเสร็จ.รหัส_สมาชิก = การเช่า.รหัส_สมาชิก AND ใบเสร็จ.รหัส_สมาชิก = สมาชิก.รหัส_สมาชิก and การเช่า.รหัส_CD_DVD = cd_dvd.รหัส_CD_DVD
        where Username_สมาชิก = ? and ใบเสร็จ.เลขที่ใบเสร็จ = การเช่า.เลขที่ใบเสร็จ
        GROUP BY ใบเสร็จ.เลขที่ใบเสร็จ
        ");
        if(!empty($_SESSION)){
            $value = $_SESSION["username"];
        }
        $stmt->bindParam(1,$value);
        $stmt->execute();
    ?>
            <?php while ($row = $stmt->fetch()) : ?>
            <tr>
                <td><?=$row["เลขที่ใบเสร็จ"]?></td>
                <td><?=$row["ชื่อ_สกุล_สมาชิก"]?></td>
                <td><?=$row["ยอดชำระทั้งหมด"]?></td>
                <td><?=$row["จำนวนที่ซื้อ"]?></td>
                <td><?=$row["ชื่อ_CD_DVD"]?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>

</html>