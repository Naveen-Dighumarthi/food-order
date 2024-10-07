<?php

    //start session
    session_Start();
    //craete constant to store non repeating values
define('SITEURL', 'http://localhost/food-order/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','login_register');
$conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
$db_select=mysqli_select_db($conn,DB_NAME) or die(mysqli_error());  

?>

<html>

<head>
    <head>
        <style>
            *{
                margin:0;
                padding:0;
                box-sizing:border-box;
            }
            h1{
                color:;
            }
            body{
                display:flex;
                justify-content:center;
                align-items:center;
                min-height:100vh;
                background:#1e90ff;
            }
            .login{
                postion:relative;
                padding:50px;
                background:#fff;
                display:flex;
                flex-direction:column;
                gap:20px;
                box-shadow:0 25px 50px rgba(0,0,0,0.);
              }

            .login h2{
                 font-weight:500;
                 border-left:15px solid #1dd1a1;
                 line-height:1em;
                 padding-left:10px;
                 transition:0.5s;
                 color:#333;

            }
    

            .Login .inputBox 
            {
                psition:relative;
            }
            .Login .inputBox input
            {
                postion:relative;
                width:100%;
                padding:10px 15px;
                outline:None;
                border:2px solid #555;
                font-size:1em;
                color:#333;


            }


            input[type="submit"]
            {
                color:black;
                background-color:red;
            }

        </style>
    </head>
    <title>
        Login - Food order system
    </title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="login">
        <h2 class="text-center ">login</h2>
        <br><br>
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if (isset($_SESSION['no-login-message'])) {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>
        <br><br>

        <!-- login form starts here -->
        <div class="mycode">
        <form action="" method="POST" class="text-center">
            <div class="inputBox">
            Username:
            <input type="text" name="email" placeholder="enter username">
       <br>
            Password:
            <input type="password" name="password"  placeholder="enter password"><br><br>
            <input type="submit" name="submit" value="Login" class="btn-primary "><br>
            <br><br>
    </div>
        </form>
        <!-- login form ends here -->

        <p class="text-center">Created By -<a href="www.naveen.com">project done by NRJ Group</a></p>
    </div>
    </div>

</body>

</html>
<?php
// check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    // process for login
    // 1. get the data from login form
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    // 2. sql to check whether the user with username and password exists or not
    $sql = "select * from users where email='$email' AND  password='$password'";
    // 3. Execute the query
    $res = mysqli_query($conn, $sql);
    // 4. count rows to check if the user exists or not
    $count = mysqli_num_rows($res);
    $user = mysqli_fetch_array($res, MYSQLI_ASSOC);
    if ($user) {
        if (password_verify($password, $user["password"])) {
            session_start();
            $_SESSION["user"] = "yes";
            header("location:" .SITEURL.'food-order/');
            die();
        }else{
            echo "<div class='alert alert-danger'>Password does not match</div>";
        }
    }else{
        echo "<div class='alert alert-danger'>Email does not match</div>";
    }
    //if ($count == 1) {
        // user available and login success
        $_SESSION['login'] = "<div class='sucess'>Login successful.</div>";
        $_SESSION['user'] = $username; // to check whether the user is logged in or not, and logout will unset it
        header('location:' . SITEURL . 'food-order/');
    //} else {
        // user not available and login failed
        $_SESSION['login'] = "<div class='error text-center'></div>";
        // redirect to the login page
        header('location:' . SITEURL . 'index.php');
    }

?>
