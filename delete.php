<?php error_reporting(0);
include "connection.php";
if ($con) {
    echo "connection established";
    // echo '<script type="text/javascript">';
    // echo 'var connectionStatus = document.getElementById("database")';
    // echo 'connectionStatus.style.color = "green"';
    // echo '</script>';   
} else {
    echo "connection failed";
}

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "delete from contact_details where id='$id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo "deleted";
        header('location:index.php');
    } else {
        die(mysqli_error($con));
    }
}
