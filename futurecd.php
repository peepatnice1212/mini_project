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
    <link rel="stylesheet" href="./style/contactus.css">
    <script>
    function componentpage(page) {
        let a = document.getElementById(page).innerHTML;
        console.log(a);
        document.location = "./component/pagetypecd.php?a=" + a;
    }

    async function getDataFromAPI() {
        let response = await fetch("movies.json");
        let rawData = await response.text();
        let objectData = JSON.parse(rawData);
        let result = document.getElementById("result");
        console.log(objectData);

        for (let i = 0; i < objectData.length; i++) {
            let content = "Title : " + objectData[i].title + "<br>";
            content += "Year : " + objectData[i].year + "<br>";
            content += "Description : " + objectData[i].description + "<br><hr>";
            let li = document.createElement("li");
            li.innerHTML = content;
            result.appendChild(li);
            console.log(content);
        }
    }
    getDataFromAPI();
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
        <a href="./checkgoods.php">check สินค้าที่ได้สั่งไป</a>
        <a class="active" href="./futurecd.php">สินค้าที่กำลังจะมา</a>
        <a href="./contactus.php">ติดต่อพวกเรา</a>
        <a href="./login-logout/logout.php">ออกจากระบบ</a>
    </nav>
    <div class="head">
        <div class="texthead">CD-DVD ที่กำลังจะมา</div>
        <ol id="result"></ol>
    </div>
</body>

</html>