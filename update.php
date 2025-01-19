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
        display:grid;
        place-items:center
    }
    form{
        display:grid;
        gap:10px;
        font-size:20px;
    }
    form input{
        height:40px;
        width:300px;
    }
    .update-nav-btn{
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
    <div class="cantainer">
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            id no : <input type="text" name="sno">
            <input type="submit" name="btn">
        </form>
        <?php
        if(isset($_POST["btn"])){
            include "protect.php";
            $stdid = intval($_POST["sno"]);
            $sql =  "SELECT * FROM `information` WHERE `s.no` = $stdid";;
            $result = mysqli_query($connect , $sql);
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_array($result);
        ?>
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <input type="hidden" name="studentid" value ="<?php echo htmlspecialchars($row["s.no"])?>">
                Name <input type="text" name="stdname" value ="<?php echo htmlspecialchars($row["Name"])?>">
                Addreas <input type="text" name="myaddreas" value ="<?php echo htmlspecialchars($row["addreas"])?>">
                class <input type="text" name="myclass" value ="<?php echo htmlspecialchars($row["class"])?>">
                number <input type="text" name="mynumber" value ="<?php echo htmlspecialchars($row["number"])?>">
                <input type="submit" value="update" name="update">
                </form>
        <?php
                }else{
                    echo "not found";
                }
            }
            include "protect.php";
            if(isset($_POST["update"])){
                $id = $_POST["studentid"];
                $name = $_POST["stdname"];
                $addreas = $_POST["myaddreas"];
                $class = $_POST["myclass"];
                $phone_number = $_POST["mynumber"];
                $sql1 = "UPDATE `information` SET `Name`='$name',`addreas`='$addreas',`class`='$class',`number`='$phone_number  ' WHERE `s.no`= '$id'";
                $result1 = mysqli_query($connect , $sql1);
                if($result1 == true){
                    echo "Done";
                }else{
                    echo "not submit";
                }
                header("Location: http://localhost/career%20projects/practice003/home.php");
            }
            
        ?>
    </div>
</body>
</html>