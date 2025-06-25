<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="">
    <meta name="keywords" content="free SMS,OTP,phone email,free sms otp service">
    <meta name="author" content="">
    <title>Sign in to Pizza House</title>

    <style>
    .phem-container {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 50px 0;
    }

    .phem-input {
        padding: 12px 20px;
        display: inline-block;
        border: 10px solid #ccc;
        border-radius: 10px;
        box-sizing: border-box;
        margin-bottom: 50px;
    }  

    .phem-card {
        color: #024430 !important;
        text-align: center;
        background-color: #fff;
        padding: 23px;
        border-radius: 0.5rem;
        box-shadow: 0 1px 3px rgba(17, 24, 39, .09);
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        font-family: sans-serif, serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        line-height: 28px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    </style>
</head>


<body style="background-color: #f1f5f9;">

    <?php 
    
        $CLIENT_ID = '11292081729645434333';
        $REDIRECT_URL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $AUTH_URL = 'https://auth.phone.email/log-in?client_id='.$CLIENT_ID.'&redirect_url='.$REDIRECT_URL.'';
    ?>


    <?php
        if(!isset($_GET['access_token'])){
    ?>

    <!-- Display Login Button -->
    <div class="phem-container">
        <div class="phem-card">

            <img class="pizza house" width="250px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTY6ES79_HYWB9IkSrgjuN1qJ1hB4vS7ylWesRZ2D0cvhXfzzjy4OHcGDf43boo5NyhqVQ&usqp=CAU"
                alt="phone email login ">
            <h1 style="margin:10px;">Sign In</h1>
            <p style="color:#a6a6a6;">Welcome to Pizza House  </p>

            <button
                style="display: flex; align-items:center; justify-content:center; padding: 14px 20px; background-color: #02BD7E; font-weight: bold; color: #ffffff; border: none; border-radius: 3px; font-size: inherit;cursor:pointer; max-width:320px; width:100%"
                id="btn_ph_login" name="btn_ph_login" type="button"
                onclick="window.open('<?php echo $AUTH_URL; ?>', 'peLoginWindow', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0, width=500, height=560, top=' + (screen.height - 600) / 2 + ', left=' + (screen.width - 500) / 2);">
                <img src="https://storage.googleapis.com/prod-phoneemail-prof-images/phem-widgets/phem-phone.svg"
                    alt="phone email" style="margin-right:10px;">
                Sign In with Phone
            </button>
        </br>
            <a href="index.php" style="text-decoration: none;">
                <button style="display: flex; align-items:center; justify-content:center; padding: 14px 20px; background-color:tomato; font-weight: bold; color: #ffffff; border: none; border-radius: 3px; font-size: inherit;cursor:pointer; max-width:320px; width:100%">
                    Sign In with Password
                </button>
            </a>

        </div>
    </div>

    <?php } ?>


    <?php 

if(isset($_GET['access_token'])){
    /* To get verified phone number please call the getuser API */

    // Initialize cURL session
    $ch = curl_init();
    $url = "https://eapi.phone.email/getuser";
    $postData = array(
        'access_token' => $_GET['access_token'],
        'client_id' => $CLIENT_ID
    );

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url); // URL to submit the POST request
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string instead of outputting it directly
    curl_setopt($ch, CURLOPT_POST, true); // Set the request type to POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData); // Set the POST data
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Ignore SSL certificate verification

    $response = curl_exec($ch);

    if ($response === false) {
        echo "cURL error: " . curl_error($ch);
        header('Location: /'); // Redirect to home page if there's an error
        exit; // 
    } 

    curl_close($ch);

    $json_data = json_decode($response,true);

    if($json_data['status'] != 200) {
        header('Location: /'); // Redirect to home page if status is not 200
        exit; 
    }

    // Redirect after successful verification
    header('Location: home.html');
    exit; 
}
?>

</body>
</html>