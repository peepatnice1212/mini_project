<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ออกจากระบบ</title>
    <link rel="stylesheet" href="../style/logout.css">
    <link rel="stylesheet" href="../style/maineverypage.css">
</head>

<body>
    <?php
	session_start();

    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );

	session_destroy(); // ทำลาย session
    ?>
    <header class="logo"><img src="../img/logo.png"></header>
    <h1>ออกจากระบบสำเร็จแล้ว<br></h1>
    <h2>หากต้องการเข้าสู่ระบบอีกครั้งโปรดคลิก
        <a href='../beforehome.html'>กลับเข้าสู่หน้าหลัก</a>
    </h2>
</body>

</html>