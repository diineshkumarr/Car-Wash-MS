<?php
include("./header&footer.php");

// Include the header function to output the header section
getHeader();
?>

<style>
    .c{
        background: aquamarine;}
    .a{
        display: flex;
        justify-content: space-evenly;
        padding: 100px 0;
    }
    .b{
        padding: 10px;
        background: aqua;
        color: black;
        font-size: 30px;
        border-radius: 10px;
    }
</style>

<main class="c">
    <h1 style="text-align: center; padding: 50px 0;">DATA DETAILS</h1>
    <div class="a">
        <a href="./RegisterData.php"><button class="b">Register Data</button></a>
        <a href="./Record.php"><button class="b">Booking Data</button></a>
    </div>
</main>    

<?php
// Include the footer function to output the footer section
getFooter();
?>