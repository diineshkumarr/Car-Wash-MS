<?php
    include 'connection.php';
    if(isset($_GET['id'])  && $_GET['id']){
    $idParam = $_GET['id'];
    $query = "DELETE FROM form WHERE id=$idParam";
    $data = mysqli_query($conn, $query);
    if($data){
        echo "<script>window.location.href='RegisterData.php'</script>";
    }}
    else{
    $querry = "TRUNCATE TABLE form";
    $daata = mysqli_query($conn, $querry);
    if($daata){
        echo "<script>window.location.href='RegisterData.php'</script>";
    }}
    ?>