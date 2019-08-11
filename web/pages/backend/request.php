<?php
print_r($_POST);


if ($_POST['request']=="vps" && isset($_POST['size'])){
    
    include_once 'conf.php';

    $dbname = "users_requests";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $user   = $_POST['user'];   
    $tag    = $_POST['tag']; 
    $key    = $_POST['key']; 
    $size   = $_POST['size']; 
    $iam    = $_POST['image']; 
    $region = $_POST['region'];
    $string = $_POST['string'];

    $sql = "INSERT INTO request_by_user (user_id, user_key, request_type, request_string, request_tag, request_region, request_size, request_image, request_date, domain, done) VALUES ('$user', '$key', 'create', '$string', '$tag', '$region', '$size', '$iam', NOW(), '','waiting');";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
         exec('/var/www/html/pages/backend/create.sh '.$user.' '.$string." > log.txt");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

?> 