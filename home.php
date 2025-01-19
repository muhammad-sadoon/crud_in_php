
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
    .table-header{
        background-color:black;
        color:white;
    }
    .cantainer{
        height:75vh;
        width:100vw;
        display:grid;
        grid-template-rows:100px 100px;
    }
    .cantainer h2{
        position:relative;
        left:100px;
        top:50px
    }
    .cantainer table{
        position:relative;
        left:100px;
    }
    table tr td{
        height: 30px;
        width:200px;
        text-align:center;
    }
    .home-nav-btn{
        color:#03fc9d;
    }
    .btn-nav:hover{
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
    <section class="cantainer">
        <h2>All RECORDS</h2>
        <div>
            <table border="2px">
                <tr class="table-header">
                    <td>s.no</td>
                    <td>Name</td>
                    <td>Addreas</td>
                    <td>Class</td>
                    <td>Phone</td>
                </tr>
                <tr>
                    <?php
                    include "protect.php";
                    $sql = "SELECT * FROM `information` WHERE 1";
                    $result = mysqli_query($connect, $sql);
                        if($result){
                            while($row = mysqli_fetch_array($result)){
                                $id = $row["s.no"];
                                $name = $row["Name"];
                                $addreas = $row["addreas"];
                                $class = $row["class"];
                                $phone_number = $row["number"];
                                echo "<tr>";
                                    echo "<td> {$id} </td>";
                                    echo "<td> {$name} </td>";
                                    echo "<td> {$addreas} </td>";
                                    echo "<td> {$class} </td>";
                                    echo "<td> {$phone_number} </td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </tr>
            </table>   
        </div>
    </section>
</body>
</html>