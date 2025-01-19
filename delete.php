<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:arial;
        overflow-x:hidden;
    }
    header{
        height:10vh;
        width:100vw;
        background-color:#03fc9d;
        display:flex;
        justify-content:center;
        align-items:center;
        color:white;
        font-size:25px;
    }
    aside{
        height:5vh;
        width:100vw;
        background-color:black;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    aside ul{
        list-style:none;
        display:flex;
        gap:40px
    }
    aside ul li{
        display:inline-block;
        
    }
    aside ul li a{
        text-decoration:none;
        color:white;
        font-weight:700;
        
    }
    .btn-nav:hover{
        color:#03fc9d;
    }
    .delete-nav-btn{
        color:#03fc9d;
    }
    .container{
        height:75vh;
        width:100vw;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    form{
        display:grid;
        gap:50px;
        font-size:20px;
    }
    form input{
        height:40px;
        width:300px;
    }
    .submit-btn{
        height:50px;
        width:100px;
        background-color:#03fc9d;
        border-radius:30px;
        border:none;
        cursor:pointer;
        font-size:18px;
    }
    .submit-btn:hover{
        opacity:0.9;
    }
</style>
<body>
<header>
        <h1><em>CURD</em></h1>
    </header>
    <aside>
        <nav>
            <ul>
                <li><a href="home.php" class="home-nav-btn btn-nav">HOME</a></li>
                <li><a href="update.php" class="update-nav-btn btn-nav">UPDATE</a></li>
                <li><a href="add.php" class="add-nav-btn btn-nav">ADD</a></li>
                <li><a href="delete.php" class="delete-nav-btn btn-nav">DELETE</a></li>
            </ul>
        </nav>
    </aside>
<div class="container">
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
  Serial Number<input type="text" name="stdid">
    <input type="submit" class="submit-btn" name="delete">
  </form>
</div>
    <?php 
    include "protect.php";
    if(isset($_POST["delete"])){
        $stdid =  $_POST["stdid"];
        $sql ="DELETE FROM `information` WHERE `s.no` =  '$stdid'";
        $reslt = mysqli_query($connect , $sql);
        if($reslt){
            echo "deleted";
        }else{
            echo "code error";
        }
        header("Location: http://localhost/career%20projects/practice003/home.php");      
    }
    ?>
</body>
</html>