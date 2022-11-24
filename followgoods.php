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
    <title>การติดตามการส่งสินค้า</title>
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
        <a class="active" href="./followgoods.php">การติดตามการส่งสินค้า</a>
        <a href="./checkgoods.php">check สินค้าที่ได้สั่งไป</a>
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
                <th>รหัสการจัดส่ง</th>
                <th>สถานะการจัดส่ง</th>
                <th>เลขที่ใบเสร็จ</th>
                <th>ยอดชำระทั้งหมด</th>
                <th>จำนวนที่ซื้อ</th>
                <th>วันที่สินค้าจะถึง</th>
            </tr>

            <?php  
        $stmt = $pdo->prepare("SELECT การจัดส่ง.รหัส_การจัดส่ง,การจัดส่ง.สถานะการจัดส่ง,การจัดส่ง.วันที่สินค้าจะถึง,ใบเสร็จ.เลขที่ใบเสร็จ,ใบเสร็จ.ยอดชำระทั้งหมด,ใบเสร็จ.จำนวนที่ซื้อ,สมาชิก.Username_สมาชิก,สมาชิก.ชื่อ_สกุล_สมาชิก,สมาชิก.ที่อยู่_สมาชิก,สมาชิก.เบอร์โทร_สมาชิก
        FROM การจัดส่ง JOIN ใบเสร็จ JOIN สมาชิก join การเช่า
        ON การจัดส่ง.รหัส_สมาชิก = ใบเสร็จ.รหัส_สมาชิก AND การจัดส่ง.รหัส_สมาชิก = สมาชิก.รหัส_สมาชิก
        WHERE Username_สมาชิก = ? and การเช่า.วันเวลาที่เช่า = การจัดส่ง.เวลาในการบันทึกสถานะ and ใบเสร็จ.เลขที่ใบเสร็จ = การเช่า.เลขที่ใบเสร็จ
        group by การจัดส่ง.รหัส_การจัดส่ง
        ");
        if(!empty($_SESSION)){
            $value = $_SESSION["username"];
        }
        $stmt->bindParam(1,$value);
        $stmt->execute();
    ?>
            <?php while ($row = $stmt->fetch()) : ?>
            <tr>
                <td><?=$row["รหัส_การจัดส่ง"]?></td>
                <td><?=$row["สถานะการจัดส่ง"]?></td>
                <td><?=$row["เลขที่ใบเสร็จ"]?></td>
                <td><?=$row["ยอดชำระทั้งหมด"]?></td>
                <td><?=$row["จำนวนที่ซื้อ"]?></td>
                <td><?=$row["วันที่สินค้าจะถึง"]?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>

</html>