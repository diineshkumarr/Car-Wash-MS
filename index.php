<?php
include_once("./header&footer.php");
getHeader();
// Include the header function to output the header section

?>

<main>
        <div class="slideshow-container">

            <div class="mySlides fade">
              <img src="./img/carousel-1.jpg" style="width:100%">
              <div class="text">
                <p>WASHING & DETAILING</p>
                <h1>Exterior & Interior <br>Washing</h1></div>
            </div>
            
            <div class="mySlides fade">
              <img src="./img/carousel-2.jpg" style="width:100%">
              <div class="text">
                <p>WASHING & DETAILING</p>
                <h1>Exterior & Interior <br>Washing</h1></div>
            </div>
            
            <div class="mySlides fade">
              <img src="./img/carousel-3.jpg" style="width:100%">
              <div class="text">
                <p>WASHING & DETAILING</p>
                <h1>Exterior & Interior <br>Washing</h1></div>
            </div>
            
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
            
            </div>
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
           <div class="services">
            <p>WHAT WE DO ?</p>
            <h2>Premium Washing Services</h2>
            <div class="box">
            <div class="box1">
              <div class="boxtwo">
                <img src="./img/Wash.png" alt="photo">
                <h5>Exterior Washing</h5>
              </div>
              <div class="boxtwo">
                <img src="./img/Wash.png" alt="photo">
                <h5>Interior Washing</h5>
              </div>
              <div class="boxtwo">
                <img src="./img/Wash.png" alt="photo">
                <h5>Vaccune Cleaning</h5>
              </div>
              <div class="boxtwo">
                <img src="./img/Wash.png" alt="photo">
                <h5>Seat Washing</h5>
              </div>
            </div>
            <div class="box2">
              <div class="boxtwo">
                <img src="./img/Wash.png" alt="photo">
                <h5>Window Wipping</h5>
              </div>
              <div class="boxtwo">
                <img src="./img/Wash.png" alt="photo">
                <h5>Wet Cleaning</h5>
              </div>
              <div class="boxtwo">
                <img src="./img/Wash.png" alt="photo">
                <h5>Oil Changing</h5>
              </div>
              <div class="boxtwo">
                <img src="./img/Wash.png" alt="photo">
                <h5>Break Repairing</h5>
              </div>
            </div>
           </div>
           </div>
           <div class="working">
            <div class="work1">
              <div class="icon1"><i class="fa-solid fa-location-dot"></i></div>
                <div class="words1">
                  <h3>25</h3>
                  <p>Service Points</p>
                </div>
                <div class="plus">
                  <i class="fa-solid fa-plus"></i>
                </div>
              </div>
          <div class="work1">
              <div class="icon1"><i class="fa-solid fa-user"></i></div>
                <div class="words1">
                  <h3>350</h3>
                  <p>Engineer Workers</p>
                </div>
                <div class="plus">
                  <i class="fa-solid fa-plus"></i>
                </div>
              </div>
          <div class="work1">
              <div class="icon1"><i class="fa-solid fa-user-group"></i></div>
                <div class="words1">
                  <h3>1500</h3>
                  <p>Most Happy Clients  </p>
                </div>
                <div class="plus">
                  <i class="fa-solid fa-plus"></i>
                </div>
          </div>
          <div class="work1">
              <div class="icon1"><i class="fa-solid fa-check"></i></div>
                <div class="words1">
                  <h3>5000</h3>
                  <p>Projects Completed</p>
                </div>
                <div class="plus">
                  <i class="fa-solid fa-plus"></i>
                </div>
          </div>
          </div>
         <?php  
          plan();
         ?>
</main>

<script>
        // Your JavaScript for slideshow
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = 'none';  
            }
            slides[slideIndex-1].style.display = 'block';  
            setTimeout(function() {
                plusSlides(1);
            }, 3000);
        }
</script>


<?php
// Include the footer function to output the footer section
include_once 'header&footer.php';
getFooter();
?>
