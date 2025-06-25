<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>

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
    <div class="container">
        <div class="box form-box">
            <?php 
            session_start();
            include("php/config.php");
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $password = $_POST['password'];
                $mobile = $_POST['mobile'];

                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Check if mobile number or email already exists
                $verify_query = mysqli_query($con, "SELECT * FROM users WHERE Email='$email' OR Mobile='$mobile'");
                
                if(mysqli_num_rows($verify_query) != 0 ){
                    echo "<div class='message'>
                            <p>This email or mobile number is already registered. Please login with your credentials.</p>
                          </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Login Now</button>";
                } else {
                    mysqli_query($con,"INSERT INTO users(Username,Email,Age,Password,Mobile) VALUES('$username','$email','$age','$hashed_password','$mobile')") or die("Error Occurred");

                    echo "<div class='message'>
                            <p>Registration successful!</p>
                          </div> <br>";
                    echo "<a href='mob.php'><button class='btn'>Login Now</button>";
                }
            } else {
            ?>
            <header>Sign Up - Pizza House</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="mobile">Mobile Number</label>
                    <input type="text" name="mobile" id="mobile" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="index.php">Sign In</a>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>
