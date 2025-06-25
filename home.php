<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>

    <style>
        body {
            background-image: url('https://resizer.otstatic.com/v2/photos/wide-huge/1/25694999.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Pizza House</a> </p>
        </div>

        <div class="right-links">

            <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
                $res_Mobile = $result['Mobile'];
            }
            
            echo "<a href='register.php?Id=$res_id'>Change Profile</a>";
            echo "<a href='home.html'><button class='btn'>Exit</button></a>";
            ?>

            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>

        </div>
    </div>
    <main>

       <div class="main-box top">
          <div class="top">
            <div class="box">
                <p>Hello <b><?php echo $res_Uname ?></b>, Welcome </p>
            </div>
            <div class="box">
                <p>Your email is <b><?php echo $res_Email ?></b>.</p>
            </div>
          </div>
        </br>
          <div class="top">
            <div class="box">
                <p>You are <b><?php echo $res_Age ?> years old</b>.</p> 
            </div>
            <div class="box">
                <p>Your Mobile : <b><?php echo $res_Mobile ?></b>.</p> 
            </div>
          </div>
       </div>

    </main>
</body>
</html>