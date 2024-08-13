<?php
include("./header&footer.php");

// Include the header function to output the header section
getHeader();
?>
<main class="login">
    <section class="container">
        <header>Registration Form</header>
        <form action="form.php" method="post" class="form">
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
                <div class="input-box two">
    <label for="birthdate">Booking Date</label>
    <input type="date" placeholder="Enter birth date" name="birthdate" min="<?php echo date('Y-m-d'); ?>" required />
</div>
            </div>
            <div class="gender">
                <label for="gender">Gender :-</label>
                <select id="gender" name="gender">
                    <option value="" selected disabled>Select your gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="single password">
                <label for="password">Password :-</label>
                <input type="password" placeholder="Enter Password" name="pasword" required />
            </div>
            <div class="password">
                <label for="password">ConfirmPassword :-</label>
                <input type="password" placeholder="Enter Password" name="confrmpassword" required />
            </div>
            <div class="age">
                <label for="age">Age :-</label>
                <input type="text" placeholder="Enter Age" name="age" required />
            </div>
            <div class="cmnt">
                <label for="cmnt">Comment :-</label>
                <input type="text" placeholder="   Type here something about you...." name="cmnt" minlength="10" required />
            </div>
            
            <button type="submit">Submit</button>
        </form>
    </section>
</main>
<?php
// Include the footer function to output the footer section
getFooter();
?>