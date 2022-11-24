<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <link rel="stylesheet" href="../style/formlogin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script>
    var httpRequest;

    function send() {
        httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = showResult;
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var url = "checklogin.php?username=" + username + "&password=" + password;
        httpRequest.open("GET", url);
        httpRequest.send();
    }

    function setCookie(cName, cValue, expDays) {
        let date = new Date();
        date.setTime(date.getTime() + (expDays * 24 * 60 * 60 * 1000));
        const expires = "expires=" + date.toUTCString();
        document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
    }

    function showResult() {
        let username2 = document.getElementById("username").value;
        let password2 = document.getElementById("password").value;
        var check = document.getElementById("remember");
        if (httpRequest.readyState == 4 && httpRequest.status == 200) {
            console.log(httpRequest.responseText);
            if (httpRequest.responseText == "pass") {
                if(check.checked == true ){            
                    setCookie('username', username2, 30);
                    setCookie('password', password2, 30);        
                }else{
                    document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
                    document.cookie = "password=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
                }
                document.location = "../home.php"
                document.getElementById("result").innerHTML = "";
            } else if (httpRequest.responseText == "pass_add") {
                if(check.checked == true ){    
                    setCookie('username', username2, 30);
                    setCookie('password', password2, 30);        
                }else{
                    document.cookie = "username=; password=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
                    document.cookie = "password=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
                }
                document.location = "../homeadmin.php"
                document.getElementById("result").innerHTML = "";
            } else {
                document.getElementById("result").innerHTML = "โปรดตรวจสอบ username และ password ของคุณให้ถูกต้อง";
            }
        }
    }
    </script>
</head>

<body>
    <div class="navbar">
        <li class="logo"><img src="../img/logo.png"></li>
    </div>
    <div class="main">
        <div class="sqare">
            <b>เข้าสู่ระบบ</b><br>
            <div class="data">
                <input type="text" name="username" id="username" class="box" placeholder="username" required
                    minlength="1" maxlength="30" size="20" 
                    value="<?php if(isset($_COOKIE["username"])){
                        echo $_COOKIE["username"];
                    } ?>"></br>

                <span class="eyes" >
                <input type="password" name="password" id="password" class="box" placeholder="password" required
                    minlength="1" maxlength="30" size="20"
                    value="<?php if(isset($_COOKIE["password"])){
                        echo $_COOKIE["password"];
                    } ?>">
                    <i class="far fa-eye" id="togglePassword"></i>
                </span>

                <p>Remember me <input type="checkbox" name="remember" id="remember" class=""></p>
                </br>
                <p id="result"></p>
                <button class="buttons  start" onclick="send()"> เข้าสู่ระบบ</button>
            </div>
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





