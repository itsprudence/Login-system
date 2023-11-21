<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD']== "POST")
{
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
}
if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
{
    //save to database
    $user_id = random_num(20);
    $query = "insert into users (user_id,username,password) values ('$user_id','$user_name','$password')";

    mysqli_query($conn, $query);

    header("Location: login.php");
    die;
}else
{
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Signup</title>
    </head>
    <body>
        <style type="text/css">
            body {
  background:#856088;
  font-family: Assistant, sans-serif;
  display: flex;
  min-height: 90vh;
}
.login {
  color: white;
  background: : #856088;
  background: 
    -webkit-linear-gradient(to right, #856088, #136a8a);
  background: 
    linear-gradient(to right, #856088, #136a8a);
  margin: auto;
  box-shadow: 
    0px 2px 10px rgba(0,0,0,0.2), 
    0px 10px 20px rgba(0,0,0,0.3), 
    0px 30px 60px 1px rgba(0,0,0,0.5);
  border-radius: 8px;
  padding: 50px;
}
.login .head {
  display: flex;
  align-items: center;
  justify-content: center;
}
.login .head .company {
  font-size: 2.2em;
}
.login .msg {
  text-align: center;
}
.login .form input[type=text].text {
  border: none;
  background: none;
  box-shadow: 0px 2px 0px 0px white;
  width: 100%;
  color: white;
  font-size: 1em;
  outline: none;
}
.login .form .text::placeholder {
  color: #D3D3D3;
}
.login .form input[type=password].password {
  border: none;
  background: none;
  box-shadow: 0px 2px 0px 0px white;
  width: 100%;
  color: white;
  font-size: 1em;
  outline: none;
  margin-bottom: 20px;
  margin-top: 20px;
}
.login .form .password::placeholder {
  color: #D3D3D3;
}
.login .form .btn-login {
  background: none;
  text-decoration: none;
  color: white;
  box-shadow: 0px 0px 0px 2px white;
  border-radius: 3px;
  padding: 5px 2em;
  transition: 0.5s;
}
.login .form .btn-login:hover {
  background: white;
  color: dimgray;
  transition: 0.5s;
}
.login .forgot {
  text-decoration: none;
  color: white;
  float: right;
}

            #text{

                height: 25px;
                border-radius: 5px;
                padding: 4px;
                border: solid thin #aaa;
                width: 100%;
            }

            #button{
                padding: 10px;
                width: 100px;
                color: white;
                background-color: lightblue;
                border: none;
            }


            #box{

background-color:none;
margin: auto;
width: 300px;
padding: 20px;

}
</style>
<section class='login' id='login'>
  <div class='head'>
  <h1 class='company'>Signing  Up</h1>
  </div>
  <p class='msg'>Hi There!👋</p>
            <div class="form" id="box">
                <form method="post">
                    <div style="font-size: 20px;margin 10px;color: white;">Signup</div>
                    <input id="text" placeholder='Username'type="text"class='text'type="text" name="user_name"><br><br>
                    <input id="text" placeholder='••••••••••••••'type="password" class='password'type="password" name="password"><br><br>
                    
                    <input class='btn-login'id='do-login' type="submit" value="Signup"><br><br>

                    <a href="login.php">Click to Login</a><br><br>
                </form>
            </div>
</section>
    </body>
</html>