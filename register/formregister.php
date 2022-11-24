<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ลงทะเบียน</title>
    <link rel="stylesheet" href="../style/formregister.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script>
    var xmlHttp;

    function checkUsername() {
        document.getElementById("username").className = "thinking";

        xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = showUsernameStatus;

        var username = document.getElementById("username").value;
        var url = "checkregister.php?username=" + username;
        console.log(username);
        xmlHttp.open("GET", url);
        xmlHttp.send();
    }

    function showUsernameStatus() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            console.log(xmlHttp.responseText);
            if (xmlHttp.responseText == "okay") {
                document.getElementById("username").className = "approved";
            } else {
                document.getElementById("username").className = "denied";
                document.getElementById("username").focus();
                document.getElementById("username").select();
            }
        }
    }
    </script>
</head>

<body>
    <div class="navbar">
        <li class="logo"><img src="../img//logo.png"></li>
    </div>
    <div class="main">
        <h1>ลงทะเบียนเพื่อเริ่มต้นการเป็นสมาชิก</h1>
        <div class="area">
            <form action="../register/addmember.php" method="POST">
                <label>ชื่อ-สกุล :</label> </br>
                <input type="text" id="name" name="ชื่อ_สกุล_สมาชิก" class="box" required minlength="1" maxlength="30"
                    size="20" pattern="[ก-๙][ก-๙\s]+$" title="ควรใส่ชื่อและนามสกุลภาษาไทยเท่านั้น"> </br><br>

                <label>ที่อยู่ :</label></br>
                <textarea id="address" class="box" name="ที่อยู่_สมาชิก" maxlength="100" rows="6" cols="40"
                    required></textarea></br><br>

                <label>username :</label> </br>
                <input type="text" name="Username_สมาชิก" id="username" title="ควรมีอย่างน้อย 3 ตัวอักษร"
                    onblur="checkUsername()" class="box" required minlength="1" maxlength="30" size="20"
                    pattern="\w{3,}"></br><br>

                <label>password :</label> </br>
                <input type="password" name="Password_สมาชิก" id="password" pattern="\w{5,}"
                    title="ควรมีอย่างน้อย 5 ตัวขึ้นไป" class="box" required minlength="1" maxlength="30" size="20"><i
                    class="far fa-eye" id="togglePassword" style="margin-left: -30px; 
                    cursor: pointer;margin-top: 25px;"></i></br><br>

                <label>email :</label><br>
                <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="box" required
                    minlength="1" maxlength="30" size="20" value="<?php echo $_POST["email"];?>"><br><br>

                <label>โทรศัพท์ :</label> </br>
                <input type="tel" pattern="[0-9]{10}" name="เบอร์โทร_สมาชิก" id="number" class="box" required
                    minlength="1" maxlength="10" size="20" pattern="[/d]*10"></br><br>

                <button class="start">ถัดไป</button>
            </form>
        </div>
    </div>
    <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

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