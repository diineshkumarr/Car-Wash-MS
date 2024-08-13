<?php
    include 'connection.php';
    if(isset($_GET['id'])  && $_GET['id']){
    $idParam = $_GET['id'];
    $query = "DELETE FROM book WHERE id=$idParam";
    $data = mysqli_query($conn, $query);
    if($data){
        echo "<script>window.location.href='Record.php'</script>";
    }}
    else{
    $querry = "TRUNCATE TABLE book";
    $daata = mysqli_query($conn, $querry);
    if($daata){
        echo "<script>window.location.href='Record.php'</script>";
    }}
    ?>