<?php
include("./header&footer.php");

// Include the header function to output the header section
getHeader();
?>

<div style="text-align: center;">
    <h2>Booking Details</h2>
    <?php
    include 'connection.php';

    $idParam = $_GET['id'];
    $query = "SELECT * FROM book WHERE id=$idParam";
    $data = mysqli_query($conn, $query);
    $rowcount = mysqli_num_rows($data);
    if ($rowcount > 0) {
    while($row = mysqli_fetch_assoc($data)){
        ?>
        <form action="" method="post">
        <label for="fullname">Full Name:</label><br>
        <input type="text" id="fullname" name="fullname" value="<?php echo $row['fullname']; ?>" ><br><br>


        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br><br>

        <label for="phone">Phone:</label><br>
        <input type="number" id="phone" name="phone" value="<?php echo $row['phone']; ?>"><br><br>

        <label for="number">Number:</label><br>
        <input type="text" id="number" name="number" value="<?php echo $row['number']; ?>"><br><br>

        <label for="vehicle_name">Vehicle Name:</label><br>
        <input type="text" id="vehicle_name" name="vehiclename" value="<?php echo $row['vehiclename']; ?>"><br><br>

        <label for="vehicle_name">Booking:</label><br>
        <input type="text" id="vehicle_name" name="book" value="<?php echo $row['book']; ?>"><br><br>

        <input type="submit" value="Submit">
    </form>
</div>

<?php
    }
}
    // echo $idParam;
    
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process form data
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $number = $_POST['number'];
        $vehiclename = $_POST['vehiclename'];
        $book = $_POST['book'];

        $query = "UPDATE book SET fullname='$fullname', email='$email', phone='$phone', number='$number', vehiclename='$vehiclename', book='$book' WHERE id=$idParam";
        $data = mysqli_query($conn, $query);   
        if($data){
            echo "<script>window.location.href='Record.php'</script>";
        }   
        
        }
    $conn->close();
    ?>



<?php
// Include the footer function to output the footer section
getFooter();
?>
