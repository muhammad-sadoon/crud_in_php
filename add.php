<?php 
include "protect.php";
?>
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
    .cantainer{
        height:75vh;
        width:100vw;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    form{
        display:grid;
        gap:10px;
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
    .add-nav-btn{
        color:#03fc9d;
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
    <section class="add-input-form">
        
    <div class="cantainer">
        <form action="<?php echo $_SERVER["PHP_SLEF"]?>" method="post">
            Name:<input type="text" name="nyname">
            addreas: <input type="text" name="myaddreas">
            class: <input type="text" name="myclass">
            number: <input type="text" name="mynumber">
            <input type="submit" class="submit-btn" name="btn" value="Add Now">
        </form>
    </div>
    <?php
       include "protect.php";
        if(isset($_POST["btn"])){
            $name = mysqli_real_escape_string($connect , $_POST["nyname"]);
            $addreas = mysqli_real_escape_string($connect , $_POST["myaddreas"]);
            $class = mysqli_real_escape_string($connect , $_POST["myclass"]);
            $phone_number = mysqli_real_escape_string($connect , $_POST["mynumber"]);
            $sql ="INSERT INTO `information`(`Name`, `addreas`, `class`, `number`) VALUES ('$name','$addreas','$class','$phone_number')";
            $connection = mysqli_query($connect , $sql);
            if($connection == true){
                echo "connect";
            }else{
                echo "not connect";
            }
        header("Location: http://localhost/career%20projects/practice003/home.php");      
        };
    ?>
    </section>
</body>
</html>