<?php
include("./header&footer.php");
// Include the header function to output the header section
getHeader();
?>
 <main>
      <form action="form1.php" method="post">
    <div class="maincenter">   
    <div class="in">
        <h2>Admin Log In</h2>
        <div class="inpt">
            <label>UserName:</label>
            <input type="text" placeholder="  Enter UserName..." name="email" required>
        </div>
        <div class="inpt">
            <label>PassWord:</label>
            <input type="password" placeholder="  Enter PassWord..." name="pasword" required>
        </div>
        <button class="signin" type="submit">Log In</button>
      </form>
        <p class="p">If you are not a user.<a href="./RegisterForm.php"><span style="text-decoration: underline;">  REGISTER HERE</span></a></p>
    </div>
</div> 
</main>


<?php
// Include the footer function to output the footer section
getFooter();
?>

