<?php include "../connect.php" ?>
<?php session_start(); 
if(empty($_SESSION["username"])){
    header("location:../beforehome.html");
}
	if(empty($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดสินค้า</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/maineverypage.css">
    <link rel="stylesheet" href="../style/detail.css">
    <script>
    function update(idcd, name, price) {
        var qty = document.getElementById(idcd).value;
        document.location = "../aboutcart/cartaction.php?action=add&รหัส_CD_DVD=" + idcd + "&ชื่อ_CD_DVD=" + name +
            "&ราคา_CD_DVD=" + price + "&qty=" + qty;
        console.log("name : " + name)
        console.log("qty : " + qty)
        console.log("url : " + url)
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

    <div class="centerdata">
        <?php
        $stmt = $pdo->prepare("SELECT * FROM cd_dvd WHERE รหัสประเภท_CD_DVD = 'CARTOON' and ชื่อ_CD_DVD like '%".$_GET["ชื่อ_CD_DVD"]."%'");
        if (!empty($_GET)) {
            $value = $_GET["ชื่อ_CD_DVD"]; 
        }
        $stmt->execute();
    ?>
        <?php while ($row = $stmt->fetch()) : ?>
        <div class="img">
            <img src='../img/all/<?=$row["ชื่อ_CD_DVD"]?>.jpg' width="300" height="300"><br>
        </div>
        <div class="text">
            <?=$row ["ชื่อ_CD_DVD"]?><br>ราคา <?=$row ["ราคา_CD_DVD"]?> บาท
            <div class="butbot">
                <span>ต้องการซื้อ</span>
                <input type="number" name="qty" value="1" min="1" max="9" class="count" id="<?=$row["รหัส_CD_DVD"]?>">
                <span>จำนวน</span>
                <br>
                <input type="button" value="เพิ่มสินค้าลงในตะกร้าสินค้า" class="button"
                    onclick="update('<?=$row["รหัส_CD_DVD"]?>','<?=$row["ชื่อ_CD_DVD"]?>','<?=$row["ราคา_CD_DVD"]?>')">
            </div>
        </div>
        <?php endwhile; ?>

        <?php
        $stmt = $pdo->prepare("SELECT * FROM cd_dvd WHERE รหัสประเภท_CD_DVD = 'DHARMA' and ชื่อ_CD_DVD like '%".$_GET["ชื่อ_CD_DVD"]."%'");
        if (!empty($_GET)) {
            $value = $_GET["ชื่อ_CD_DVD"]; 
        }
        $stmt->execute();
    ?>
        <?php while ($row = $stmt->fetch()) : ?>
        <div class="img">
            <img src='../img/all/<?=$row["ชื่อ_CD_DVD"]?>.jpg' width="300" height="300"><br>
        </div>
        <div class="text">
            <?=$row ["ชื่อ_CD_DVD"]?><br>ราคา <?=$row ["ราคา_CD_DVD"]?> บาท
            <div class="butbot">
                <span>ต้องการซื้อ</span>
                <input type="number" name="qty" value="1" min="1" max="9" class="count" id="<?=$row["รหัส_CD_DVD"]?>">
                <span>จำนวน</span>
                <br>
                <input type="button" value="เพิ่มสินค้าลงในตะกร้าสินค้า" class="button"
                    onclick="update('<?=$row["รหัส_CD_DVD"]?>','<?=$row["ชื่อ_CD_DVD"]?>','<?=$row["ราคา_CD_DVD"]?>')">
            </div>
        </div>
        <?php endwhile; ?>

        <?php
        $stmt = $pdo->prepare("SELECT * FROM cd_dvd WHERE รหัสประเภท_CD_DVD = 'GAMES' and ชื่อ_CD_DVD like '%".$_GET["ชื่อ_CD_DVD"]."%'");
        if (!empty($_GET)) {
            $value = $_GET["ชื่อ_CD_DVD"]; 
        }
        $stmt->execute();
    ?>
        <?php while ($row = $stmt->fetch()) : ?>
        <div class="img">
            <img src='../img/all/<?=$row["ชื่อ_CD_DVD"]?>.jpg' width="300" height="300"><br>
        </div>
        <div class="text">
            <?=$row ["ชื่อ_CD_DVD"]?><br>ราคา <?=$row ["ราคา_CD_DVD"]?> บาท
            <div class="butbot">
                <span>ต้องการซื้อ</span>
                <input type="number" name="qty" value="1" min="1" max="9" class="count" id="<?=$row["รหัส_CD_DVD"]?>">
                <span>จำนวน</span>
                <br>
                <input type="button" value="เพิ่มสินค้าลงในตะกร้าสินค้า" class="button"
                    onclick="update('<?=$row["รหัส_CD_DVD"]?>','<?=$row["ชื่อ_CD_DVD"]?>','<?=$row["ราคา_CD_DVD"]?>')">
            </div>
        </div>
        <?php endwhile; ?>

        <?php
        $stmt = $pdo->prepare("SELECT * FROM cd_dvd WHERE รหัสประเภท_CD_DVD = 'MUSIC' and ชื่อ_CD_DVD like '%".$_GET["ชื่อ_CD_DVD"]."%'");
        if (!empty($_GET)) {
            $value = $_GET["ชื่อ_CD_DVD"]; 
        }
        $stmt->execute();
    ?>
        <?php while ($row = $stmt->fetch()) : ?>
        <div class="img">
            <img src='../img/all/<?=$row["ชื่อ_CD_DVD"]?>.jpg' width="300" height="300"><br>
        </div>
        <div class="text">
            <?=$row ["ชื่อ_CD_DVD"]?><br>ราคา <?=$row ["ราคา_CD_DVD"]?> บาท
            <div class="butbot">
                <span>ต้องการซื้อ</span>
                <input type="number" name="qty" value="1" min="1" max="9" class="count" id="<?=$row["รหัส_CD_DVD"]?>">
                <span>จำนวน</span>
                <br>
                <input type="button" value="เพิ่มสินค้าลงในตะกร้าสินค้า" class="button"
                    onclick="update('<?=$row["รหัส_CD_DVD"]?>','<?=$row["ชื่อ_CD_DVD"]?>','<?=$row["ราคา_CD_DVD"]?>')">
            </div>
        </div>
        <?php endwhile; ?>

        <?php
        $stmt = $pdo->prepare("SELECT * FROM cd_dvd WHERE รหัสประเภท_CD_DVD = 'MOVIE' and ชื่อ_CD_DVD like '%".$_GET["ชื่อ_CD_DVD"]."%'");
        if (!empty($_GET)) {
            $value = $_GET["ชื่อ_CD_DVD"]; 
        } 
        $stmt->execute();
    ?>
        <?php while ($row = $stmt->fetch()) : ?>
        <div class="img">
            <img src='../img/all/<?=$row["ชื่อ_CD_DVD"]?>.jpg' width="300" height="300"><br>
        </div>
        <div class="text">
            <?=$row ["ชื่อ_CD_DVD"]?><br>ราคา <?=$row ["ราคา_CD_DVD"]?> บาท
            <div class="butbot">
                <span>ต้องการซื้อ</span>
                <input type="number" name="qty" value="1" min="1" max="9" class="count" id="<?=$row["รหัส_CD_DVD"]?>">
                <span>จำนวน</span>
                <br>
                <input type="button" value="เพิ่มสินค้าลงในตะกร้าสินค้า" class="button"
                    onclick="update('<?=$row["รหัส_CD_DVD"]?>','<?=$row["ชื่อ_CD_DVD"]?>','<?=$row["ราคา_CD_DVD"]?>')">
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</body>

</html>