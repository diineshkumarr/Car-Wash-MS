<?php
session_start();


function getHeader() {
$isAuthenticated = false;
$isAuthentication = false;

if(isset($_SESSION['isAuthenticated']) && $_SESSION['isAuthenticated']){
 
    $isAuthenticated = true;

}
if(isset($_SESSION['isAuthentication']) && $_SESSION['isAuthentication'] ){
 
    $isAuthentication = true;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>CWMS</title>
</head>
<body>
    <header>
        <nav>
            <div class="navbar">
                <div class="logo"><a href="./index.php"><img src="./img/LOGO.png" alt="LOGO"></a></div>
                <div class="logo1">
                    <div class="icon"><i class="fa-regular fa-clock"></i></div>
                    <div class="words">
                        <h5>Opening Hour</h5>
                        <p>Mon-Fri, 8:00AM-9:00PM</p>
                    </div>
                </div>
                <div class="logo1">
                    <div class="icon"><i class="fa-solid fa-phone"></i></div>
                    <div class="words">
                        <h5>Call Us</h5>
                        <p>+1234567890</p>
                    </div>
                </div>
                <div class="logo1">
                    <div class="icon"><i class="fa-regular fa-envelope"></i></div>
                    <div class="words">
                        <h5>Email Us</h5>
                        <p>carwashing@system.com</p>
                    </div>
                </div>
            </div>
            <div class="navbar1">
                <div class="nav">
                    <div class="home">
                        <a href="./index.php">Home</a>
                        <a href="./plan.php">Washing Plans</a>
                        <a href="./points.php">Washing Points</a>
                        <a href="./about.php">About</a>
                        <a href="./services.php">Contact</a>
                     </div>
                    <div class="btn" style="display:flex; justify-content:center; align-items:center;">
                        <?php
                        if ($isAuthentication) {
                        ?>
                        <a href="./registerlogout.php"><button style="cursor: pointer;">UserLogOut ↪️</button></a>
                        <?php 
                        } else {
                        ?>
                        <a href="./RegisterForm.php"><button style="cursor: pointer;">REGISTER USER</button></a>
                        <?php }  ?>
                    <div class="home">
                        <?php
                        if ($isAuthenticated) {
                        ?>
                        <a href="./logout.php" style="color: rgb(4, 4, 42); background-color: white; border-radius: 10px; margin-left: 40px;">LogOut ↪️</a>
                        <?php 
                        } else {
                        ?>
                        <a href="./adminlogin.php" style="color: rgb(4, 4, 42); background-color: white; border-radius: 10px; margin-left: 40px;">Admin LogIn</a>
                        <?php }  ?>
                    </div>
                    </div>
                </div>  
            </div>
        </nav>
    </header>
<?php
}

// Function to get the footer section
function getFooter() {
?>
    <footer>
        <div class="mainfoot">
            <div class="foot">
                <div class="left">
                    <table>
                        <tr>
                            <th>Get In Touch</th>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-location-dot"></i> 123 Street, New York, USA</td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-phone"></i> +1234567890</td>
                        </tr>
                        <tr>
                            <td><i class="fa-regular fa-envelope"></i> carwashing@system.com</td>
                        </tr>
                        <tr>
                            <td class="last">
                                <i class="fa-brands fa-twitter"></i>
                                <i class="fa-brands fa-facebook"></i>
                                <i class="fa-brands fa-youtube"></i>
                                <i class="fa-brands fa-instagram"></i>
                                <i class="fa-brands fa-linkedin"></i>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="right">
                    <h6>Popular Links</h6>
                    <a href="./index.php"><span>❯ Home</span></a>
                    <a href="./about.php"><span>❯ About Us</span></a> 
                    <a href="./plan.php"><span>❯ Washing Plans</span></a> 
                    <a href="./points.php"><span>❯ Washing Points</span></a>
                    <a href="./services.php"><span>❯ Contact Us</span></a>
                </div>
            </div>
            <a href="./index.php"><p>Car Wash Management System</p></a>
        </div>
    </footer>
</body>
</html>
<?php
}
?>

<?php

function plan(){
include "connection.php";

$query = "SELECT * FROM service";

$data = mysqli_query($conn,$query);

$rowcount = mysqli_num_rows($data);

// $rowcount;

?>
  <div class="plan1" style="padding:50px 0;">
  <?php  
if ($rowcount > 0) {
  while ($result = mysqli_fetch_assoc($data)) {
    ?>
     <div class="book" <?php echo ($result['id'] == 3) ? 'style="box-shadow: 0 0 30px #888888;"' : ''; ?>>
      <h5 style="text-align:center;"><?php echo $result['services']; ?> Cleaning</h5>
      <div class="dollar">
        <h3><?php echo $result['price']; ?></h3>
      </div>
      <div class="list">
        <div class="sign">
          <i class="fa-solid fa-check"></i>
          <span>Seats Washing</span>
        </div>
        <div class="sign">
          <i class="fa-solid fa-check"></i>
          <span>Vacuum Cleaning</span>
        </div>
        <div class="sign">
          <i class="fa-solid fa-check"></i>
          <span>Exterior Cleaning</span>
        </div>
        <div class="sign gray">
          <i class="fa-solid fa-xmark"></i>
          <span>Interior Wet Cleaning</span>
        </div>
        <div class="sign gray">
          <i class="fa-solid fa-xmark"></i>
          <span>Window Wiping</span>
        </div>
      </div>
      <a href="./book.php?id=<?php echo $result['id']; ?>">
  <button style="background-color: <?php echo ($result['id'] == 3) ? 'red' : '#08082f'; ?>; color:white;     padding: 10px 15px;
    border-radius: 20px;
    border: none;">
    Book Now
  </button>
</a>

    </div>
    <?php
  }
  }
?>
</div>

<?php
}
?>