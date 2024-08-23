<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome</title>
    <style>
        body {
            display: flex;
            background-image: url('images/footer.jpg'); 
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .form-container {
            display: flex;
            justify-content: space-around;
            width: 600px;
            margin-top: 40px;
        }

        .form-box {
            background-color: #fff;
            padding: 50px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border: 2px solid black; 
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            width: 110%;
            padding: 10px;
            margin-top: 20px;
            background-color: #FC4100; 
            color: white; 
            border: none; 
            border-radius: 5px; 
        }

        input[type="submit"]:hover {
            background-color: #F8D082;
        }
    </style>
</head>
<body>
    
<div class="form-container">
    <div class="form-box">
        <h2>Login</h2>
        <form name="form" action="loginconn.php" onsubmit="return isvalid()" method="POST">
            <input type="text" name="username" placeholder="ENTER YOUR USERNAME"><br>
            <input type="password" name="password" placeholder="ENTER YOUR PASSWORD"><br>
            <input type="submit" value="Login">
            <p class="text-center">Haven't created an account? <a href="register.php">Register here</a></p>
        </form>
    </div>

    <script>
        function isvalid(){
            var username = document.form.username.value;
            var password = document.form.password.value;
            if (username.length=="" && password.length==""){
                alert ("Username and password field cannot be empty!");
                return false
            }
            else{
                if (username.length==""){
                    alert ("Username cannot be empty!");
                    return false
                }
                if (password.length==""){
                    alert ("Password is empty!");
                    return false
                }
            }
        }
    </script>

    <!-- <div class="form-box">
        <h2>Register</h2>
        <form action="registerconn.php" method="POST">
            <input type="text" name="username" placeholder="USERNAME"><br>
            <input type="text" name="tel" placeholder="TEL NO."><br>
            <input type="text" name="email" placeholder="EMAIL"><br>
            <input type="password" name="password" placeholder="ENTER YOUR PASSWORD"><br>
            <input type="password" name="cpassword" placeholder="CONFIRM YOUR PASSWORD"><br>
            <p class="text-center">Already have an account? <a href="admin-login.php">Login here</a></p>
            <input type="submit" value="Register Now">
        </form>
    </div> -->
</div>

</body>
</html>