<?php
    include("koneksi.php");

    $request_id = $_POST['request_id'];

    if(isset($_POST['decline'])){

        $query = "UPDATE request SET approval = 'decline', updated_at = CURRENT_TIMESTAMP() WHERE request.request_id = '$request_id'";
        mysqli_query($config, $query) or die(mysqli_error());

        header("location:dashboard-superadmin.php");

    }
    else if(isset($_POST['approve'])){
        $query = "UPDATE request SET approval = 'approve', updated_at = CURRENT_TIMESTAMP() WHERE request.request_id = '$request_id'";
        mysqli_query($config, $query) or die(mysqli_error());

        header("location:dashboard-superadmin.php");
    }
    
?>