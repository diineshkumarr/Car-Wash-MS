<?php
include("./header&footer.php");

// Include the header function to output the header section
getHeader();
?>
  <main>
        <div class="about">
          <div class="same">
              <img src="./img/about.jpg" alt="photo">
          </div>
          <div class="same">
              <span>About Us</span>
              <h2>Car Washing And Detailing</h2>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi provident accusantium iste quam aspernatur saepe temporibus quasi ipsa in quas cumque labore voluptatibus, dicta assumenda quia minus similique dolorum. Rem!</p>
              <div class="line">
                <i class="fa-solid fa-check"></i>
                <p>Seats Washing</p>
              </div>
              <div class="line">
                <i class="fa-solid fa-check"></i>
                <p>Vaccume Cleaning</p>
              </div>
              <div class="line">
                <i class="fa-solid fa-check"></i>
                <p>Interior Wet Cleaning</p>
              </div>
              <div class="line">
                <i class="fa-solid fa-check"></i>
                <p>Window Wipping</p>
              </div>
              <button>Learn More</button>
          </div>
       </div>
    </main>


<?php
// Include the footer function to output the footer section
getFooter();
?>