<?php

session_start();

include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD']== "POST"){
    //something was posted
    $user_name = $_POST['user_name'];
    $password= $_POST['password'];

    if(!empty($user_name)&& !empty($password)&& !is_numeric($user_name))
    {
        //read to database
        if(!$con){
            die("Connection failed:" . mysqli_connect_error());
        }
        
        $user_id =1;
        $user_name = "leah";
        $password = "hashed_password";
        
        //SQL query
        $query = "INSERT INTO users(user_id,user_name,password) values('$user_id','$user_name','$password')";
        
        //Perform the query
       
        
        //Check for errors
        if(!$result){
            die("Error in query:" . mysqli_error($con));
        }
        
        

       if ($result) {

        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);

            if($user_data['password']===$password)
            {

                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index.php");
                die;
            }
         }
       }

       echo "Wrong username or password!";
    }else
    {
        echo "Please enter some valid information!";
    }
}


?>



<DOCTYPE html>
<html>
        <head>
            <title>Login</title>
        </head>
        <body>
            <style type="text/css">
                #text{
                    height: 25px;
                    border-radius: 5px;
                    padding: 4px;
                    border: solid thin #aaa;
                    width: 100%;
                }
                #button{
                    padding: 10px;
                    width:100px;
                    color:white;
                    background-color: lightblue;
                    border: none;
                }
                #box{
                    background-color: grey;
                    margin: auto;
                    width: 300px;
                    padding: 20px;
                }
            </style>
            <div id ="box">
                
                <form method="post">
                    <div style= "font-size:20px; margin: 10px;">Login</div>
                    <input id="text" type="text" name ="user_name">
                    <br><br>
                    <input id="text" type="password" name ="password"><br><br>

                    <input id="button" type="submit" value ="Login"><br><br>

                    <a href = "signup.php">Click to Sign Up</a><br><br>

                </form>
            </div>
        
        </body>
</html>
