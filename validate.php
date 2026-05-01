<?php
session_start();
if(isset($_POST['g-recaptcha-response'])){
    $secretkey = "6LfCa1EqAAAAAOfOudUF69EL8p-8M8LauwN_-L87"; 
    $ip = $_SERVER['REMOTE_ADDR'];
    $response = $_POST['g-recaptcha-response'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$response&remoteip=$ip";
    $fire = file_get_contents($url);
    $data = json_decode($fire);

    if($data->success == true)
    {
         
        echo "success";
        header("Location : login.php");
     }
} else {
    echo "Recaptcha Error";
}
