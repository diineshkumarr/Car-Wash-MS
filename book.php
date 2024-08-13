<?php
include("./header&footer.php");

// Include the header function to output the header section
getHeader();

if(isset($_GET['id']) && $_GET['id']) {
$id_param = $_GET['id'];
// echo $id_param;

include 'connection.php';

$query = "SELECT * FROM service WHERE id = $id_param";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);



// echo $result['services'];
// echo $result['price'];


?>
<main class="login">
    <section class="container">
        <header>BOOK PLAN</header>
        <h2 style="text-align: center; color:red; padding:10px 0;">If you're not registered than <a href="./RegisterForm.php" style="color:blue;">REGISTER</a> first.</h2>
        <form action="finalpayment.php?id=<?php echo $id_param;?>" method="post" class="form">
            <div class="input-box">
                <label for="fullname">Full Name</label>
                <input type="text" placeholder="Enter full name" name="fullname" minlength="4" required />
            </div>

            <div class="input-box">
                <label for="email">Email Address</label>
                <input type="email" placeholder="Enter email address" name="email" required pattern="^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$" />
            </div>
            <div class="column">
                <div class="input-box one">
                    <label for="phone">Phone Number</label>
                    <input type="number" placeholder="Enter phone number" name="phone" maxlength="10" required />
                </div>
                <div class="input-box one">
                    <label for="birthdate">Vahicle No.(PB23A0901)</label>
                    <input type="text" placeholder="Enter Vahicle No." name="number" required pattern="^[a-zA-Z]{2}\d{2}[a-zA-Z]\d{4}$" />
                </div>
                <div class="input-box one">
                    <label for="birthdate">Vahicle Name</label>
                    <input type="text" placeholder="Enter Vahicle Name" name="vehiclename" required />
                </div>
            </div>
                <div class="gender">
                    <label for="birthdate">Book Plan :- </label>
                    <select id="gender" name="book">
    <option value="" selected disabled>Select your Plan</option>
    <option value="Basic" <?php if($result['services'] == 'Basic') { echo 'selected'; } ?> >Basic Cleaning</option>
    <option value="Premium" <?php if($result['services'] == 'Premium') { echo 'selected'; } ?> >Premium Cleaning</option>
    <option value="Complex" <?php if($result['services'] == 'Complex') { echo 'selected'; } ?> >Complex Cleaning</option>
</select>

                </div>
            
            <button name="amount"  type="submit" value = "<?php echo  $result['price'];?>">Book for <?php echo  $result['price'];?></button>

        </form>
    </section>
</main>


<?php
}
else{

   


    ?>
    <main class="login">
    <section class="container">
        <header>BOOK PLAN</header>
        <h2 style="text-align: center; color:red; padding:10px 0;">If you're not registered than <a href="./RegisterForm.php" style="color:blue;">REGISTER</a> first.</h2>
        <form action="finalpayment.php" method="post" class="form">
            <div class="input-box">
                <label for="fullname">Full Name</label>
                <input type="text" placeholder="Enter full name" value="<?php
                echo $_SESSION['fullname'];
                ?>" name="fullname" minlength="4" required/>
            </div>

            <div class="input-box">
                <label for="email">Email Address</label>
                <input type="email" placeholder="Enter email address" value="<?php
                echo $_SESSION['email'];
                ?>"  name="email" required pattern="^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$" />
            </div>
            <div class="column">
                <div class="input-box one">
                    <label for="phone">Phone Number</label>
                    <input type="text" placeholder="Enter phone number" value="<?php
                echo $_SESSION['phone'];
                ?>"  name="phone" maxlength="10" required />
                </div>
                <div class="input-box one">
                    <label for="birthdate">Vehicle No.(PB23A0901)</label>
                    <input type="text" placeholder="Enter Vahicle No." name="number" required pattern="^[a-zA-Z]{2}\d{2}[a-zA-Z]\d{4}$" />
                </div>
                <div class="input-box one">
                    <label for="birthdate">Vahicle Name</label>
                    <input type="text" placeholder="Enter Vahicle Name" name="vehiclename" required />
                </div>
            </div>
            <div class="gender">
                <label for="book">Book Plan :- </label>
                <select id="bookSelect" name="book">
                    <option value="" selected disabled>Select your Plan</option>
                    <option value="Basic">Basic Cleaning</option>
                    <option value="Premium">Premium Cleaning</option>
                    <option value="Complex">Complex Cleaning</option>
                </select>
            </div>
            
            <button type="submit" id="bookButton" name = "amount" value ="<?php echo  $result['price'];?>">Book</button>

        </form>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var bookSelect = document.getElementById('bookSelect');
        var bookButton = document.getElementById('bookButton');

        // Add event listener to select element
        bookSelect.addEventListener('change', function() {
            // Set button text and value based on selected option
            switch (bookSelect.value) {
                case 'Basic':
                    bookButton.textContent = 'Book for $10';
                    bookButton.value = '10'; // Set the value to '10' for Basic
                    break;
                case 'Premium':
                    bookButton.textContent = 'Book for $20';
                    bookButton.value = '20'; // Set the value to '20' for Premium
                    break;
                case 'Complex':
                    bookButton.textContent = 'Book for $30';
                    bookButton.value = '30'; // Set the value to '30' for Complex
                    break;
                default:
                    bookButton.textContent = 'Book'; // Default text if no valid option selected
                    bookButton.value = ''; // Reset value
                    break;
            }
        });
    });
</script>

    <?php }

// Include the footer function to output the footer section
getFooter();
?>