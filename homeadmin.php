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
    <title>ข้อมูล CD-DVD</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./style/maineverypage.css">
    <link rel="stylesheet" href="./style/homeadmin.css">
    <script>
    function componentpage(page) {
        let a = document.getElementById(page).innerHTML;
        console.log(a);
        document.location = "./componentadmin/pagetypecd.php?a=" + a;
    }
    </script>
</head>

<body>
    <header class="logo"><img src="./img/logo.png"></header>
    <nav>
        <div class="dropdown">
            <a class="dropbtn">
                <span class="icon">ข้อมูลทั้งหมด
                </span>
            </a>
            <div class="dropdown-content">
                <a href="./homeadmin.php" id="list">CD-DVD</a>
                <a href="./componentadmin/typecd.php" id="list">ประเภท CD</a>
                <a href="./componentadmin/admin.php" id="list">Admin</a>
                <a href="./componentadmin/customer.php" id="list">ลูกค้า</a>
                <a href="./componentadmin/tracking.php" id="list">การจัดส่ง</a>
                <a href="./componentadmin/receiptcus.php" id="list">ใบเสร็จ</a>
                <a href="./componentadmin/rent.php" id="list">การเช่า</a>
            </div>
        </div>
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
                <!-- <a href="./componentadmin/cartoon.php" id="list">การ์ตูน</a>
                <a href="./componentadmin/games.php" id="list">เกมส์</a>
                <a href="./componentadmin/dharma.php" id="list">ธรรมะ</a>
                <a href="./componentadmin/music.php" id="list">เพลง</a>
                <a href="./componentadmin/movie.php" id="list">ภาพยนตร์</a> -->
            </div>
        </div>
        <div class="dropdown">
            <a class="dropbtn">
                <span class="icon">เพิ่ม - ลบ ข้อมูล
                </span>
            </a>
            <div class="dropdown-content">
                <a href="./componentadmin/addcd.php" id="list">เพิ่ม CD-DVD</a>
                <a href="./componentadmin/delcd.php" id="list">ลบ CD-DVD</a>
                <a href="./componentadmin/addadmin.php" id="list">เพิ่ม Admin</a>
                <a href="./componentadmin/deladmin.php" id="list">ลบ Admin</a>
                <a href="./componentadmin/addtypecd.php" id="list">เพิ่ม ประเภท CD</a>
                <a href="./componentadmin/deltypecd.php" id="list">ลบ ประเภท CD</a>
                <a href="./componentadmin/delcustomer.php" id="list">ลบ ลูกค้า</a>
            </div>
        </div>
        <div class="dropdown">
            <a class="dropbtn">
                <span class="icon">Update ข้อมูล
                </span>
            </a>
            <div class="dropdown-content">
                <a href="./componentadmin/edittracking.php" id="list">การจัดส่ง</a>
                <a href="./componentadmin/editcd.php" id="list">CD-DVD</a>
                <a href="./componentadmin/editrent.php" id="list">การเช่า</a>
            </div>
        </div>

        <a href="./login-logout/logout.php">ออกจากระบบ</a>
    </nav>
    <div class="texts">ข้อมูล CD-DVD</div>
    <!-- <div class="scrolltable"> -->
    <?php
        $stmt = $pdo->prepare("SELECT *  FROM cd_dvd");
        $stmt->execute();
        $num_produce=0;
        while ($row = $stmt->fetch()){
            $num_produce++;
        }
        if(isset($_GET['page'])){
            $page=$_GET['page'];
        }else{
            $page=1;
        }
        $record_show = 10;
        $offset = ($page - 1) * $record_show; //เลขตัวแรก
        $page_total = ceil($num_produce/$record_show);
    ?>

    <div class="">
        <table class="center">
            <tr>
                <th>รหัส CD-DVD</th>
                <th>ชื่อ CD-DVD</th>
                <th>ราคา CD-DVD</th>
                <th>จำนวน CD-DVD</th>
                <th>รหัสประเภท CD-DVD</th>
            </tr>

            <?php
    $stmt = $pdo->prepare("SELECT * from cd_dvd  limit $offset,$record_show ");
    $stmt->execute();
    while($row = $stmt->fetch()) : ?>
            <tr>
                <th><?=$row["รหัส_CD_DVD"]?></th>
                <th><?=$row["ชื่อ_CD_DVD"]?></th>
                <th><?=$row["ราคา_CD_DVD"]?></th>
                <th><?=$row["จำนวน_CD_DVD"]?></th>
                <th><?=$row["รหัสประเภท_CD_DVD"]?></th>
            </tr>
            <?php endwhile ?>
        </table>
    </div>
    <!-- </div> -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?=$page >1 ? '' : 'disabled' ?>">
                <a class="page-link" href="?page=<?=$page-1?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php for($i=1; $i <= $page_total; $i++):?>
            <li class="page-item"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
            <?php endfor?>
            <li class="page-item <?=$page < $page_total ? '' : 'disabled' ?>">
                <a class="page-link" href="?page=<?=$page+1?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</body>

</html>