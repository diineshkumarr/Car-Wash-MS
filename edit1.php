<?php
include("./header&footer.php");

// Include the header function to output the header section
getHeader();
?>

<div style="text-align: center;">
    <h2>REGISTER Details</h2>
    <?php
    include 'connection.php';

    $idparam = $_GET['id'];
    $query = "SELECT * FROM form WHERE id=$idparam";
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

        <label for="number">Booking Date:</label><br>
        <input type="date" name="birthdate" value="<?php echo $row['birthdate']; ?>" min="<?php echo date('Y-m-d'); ?>" required /><br><br>

        <label for="vehicle_name">Gender:</label><br>
        <input type="text" name="gender" value="<?php echo $row['gender']; ?>"><br><br>

        <label for="vehicle_name">Password:</label><br>
        <input type="text" name="pasword" value="<?php echo $row['pasword']; ?>"><br><br>

        <label for="vehicle_name">Confirm Password:</label><br>
        <input type="text" name="confrmpassword" value="<?php echo $row['confrmpassword']; ?>"><br><br>

        <label for="vehicle_name">Age:</label><br>
        <input type="text" name="age" value="<?php echo $row['age']; ?>"><br><br>

        <label for="vehicle_name">Comments:</label><br>
        <input type="text" name="cmnt" value="<?php echo $row['cmnt']; ?>"><br><br>

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
        $birthdate = $_POST['birthdate'];
        $gender = $_POST['gender'];
        $pasword = $_POST['pasword'];
        $confrmpassword = $_POST['confrmpassword'];
        $age = $_POST['age'];
        $cmnt = $_POST['cmnt'];

        $query = "UPDATE form SET fullname='$fullname', email='$email', phone='$phone', birthdate='$birthdate', gender='$gender', pasword='$pasword', confrmpassword='$confrmpassword', age='$age', cmnt='$cmnt'  WHERE id=$idparam";
        $data = mysqli_query($conn, $query);   
        if($data){
            echo "<script>window.location.href='RegisterData.php'</script>";
        }   
        
        }
    $conn->close();
    ?>



<?php
// Include the footer function to output the footer section
getFooter();
?>
