<?php include(APPPATH.'views/templates/front/header.php'); ?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  
}

* {
  box-sizing: border-box;
}

.row > .column {
  padding: 0 8px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.column {
  float: left;
  width: 25%;
}

/* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1200px;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

.mySlides {
  display: none;
}

.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

img {
  margin-bottom: -4px;
}

.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s;
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>
<body>

<h2 style="text-align:center">Photo Gallery</h2>

<div class="row">

  <div class="column">
    <img src="<?php echo base_url();?>assets/images/gallarey/p0001.jpg" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
  </div>

  <div class="column">
    <img src="<?php echo base_url();?>assets/images/gallarey/p0002.jpg" style="width:100%" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
  </div>

  <div class="column">
    <img src="<?php echo base_url();?>assets/images/gallarey/p0003.jpg" style="width:100%" onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
  </div>

  <div class="column">
    <img src="<?php echo base_url();?>assets/images/gallarey/p0004.jpg" style="width:100%" onclick="openModal();currentSlide(4)" class="hover-shadow cursor">
  </div>

</div>


<div class="row">

  <div class="column">
    <img src="<?php echo base_url();?>assets/images/gallarey/p0005.jpg" style="width:100%" onclick="openModal();currentSlide(5)" class="hover-shadow cursor">
  </div>

  <div class="column">
    <img src="<?php echo base_url();?>assets/images/gallarey/p0006.jpg" style="width:100%" onclick="openModal();currentSlide(6)" class="hover-shadow cursor">
  </div>

  <div class="column">
    <img src="<?php echo base_url();?>assets/images/gallarey/p0007.jpg" style="width:100%" onclick="openModal();currentSlide(7)" class="hover-shadow cursor">
  </div>

  <div class="column">
    <img src="<?php echo base_url();?>assets/images/gallarey/p0008.jpg" style="width:100%" onclick="openModal();currentSlide(8)" class="hover-shadow cursor">
  </div>

</div>


<div class="row">

  <div class="column">
    <img src="<?php echo base_url();?>assets/images/gallarey/p0009.jpg" style="width:100%" onclick="openModal();currentSlide(9)" class="hover-shadow cursor">
  </div>

  <div class="column">
    <img src="<?php echo base_url();?>assets/images/gallarey/p0010.jpg" style="width:100%" onclick="openModal();currentSlide(10)" class="hover-shadow cursor">
  </div>

  <div class="column">
    <img src="<?php echo base_url();?>assets/images/gallarey/p0011.jpg" style="width:100%" onclick="openModal();currentSlide(11)" class="hover-shadow cursor">
  </div>

  <div class="column">
    <img src="<?php echo base_url();?>assets/images/gallarey/p0012.jpg" style="width:100%" onclick="openModal();currentSlide(12)" class="hover-shadow cursor">
  </div>

</div>


<div class="row">

  <div class="column">
    <img src="<?php echo base_url();?>assets/images/gallarey/p0013.jpg" style="width:100%" onclick="openModal();currentSlide(13)" class="hover-shadow cursor">
  </div>

  <div class="column">
    <img src="<?php echo base_url();?>assets/images/gallarey/p0014.jpg" style="width:100%" onclick="openModal();currentSlide(14)" class="hover-shadow cursor">
  </div>

  <div class="column">
    <img src="<?php echo base_url();?>assets/images/gallarey/p0015.jpg" style="width:100%" onclick="openModal();currentSlide(15)" class="hover-shadow cursor">
  </div>

  <div class="column">
    <img src="<?php echo base_url();?>assets/images/gallarey/p0016.jpg" style="width:100%" onclick="openModal();currentSlide(16)" class="hover-shadow cursor">
  </div>

</div>



<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">

    <div class="mySlides">
      <div class="numbertext">1 / 16</div>
      <img src="<?php echo base_url();?>assets/images/gallarey/p0001.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 16</div>
      <img src="<?php echo base_url();?>assets/images/gallarey/p0002.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 16</div>
      <img src="<?php echo base_url();?>assets/images/gallarey/p0003.jpg" style="width:100%">
    </div>
    
    <div class="mySlides">
      <div class="numbertext">4 / 16</div>
      <img src="<?php echo base_url();?>assets/images/gallarey/p0004.jpg" style="width:100%">
    </div>

     <div class="mySlides">
      <div class="numbertext">5 / 16</div>
      <img src="<?php echo base_url();?>assets/images/gallarey/p0005.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">6 / 16</div>
      <img src="<?php echo base_url();?>assets/images/gallarey/p0006.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">7 / 16</div>
      <img src="<?php echo base_url();?>assets/images/gallarey/p0007.jpg" style="width:100%">
    </div>
    
    <div class="mySlides">
      <div class="numbertext">8 / 16</div>
      <img src="<?php echo base_url();?>assets/images/gallarey/p0008.jpg" style="width:100%">
    </div>


     <div class="mySlides">
      <div class="numbertext">9 / 16</div>
      <img src="<?php echo base_url();?>assets/images/gallarey/p0009.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">10 / 16</div>
      <img src="<?php echo base_url();?>assets/images/gallarey/p0010.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">11 / 16</div>
      <img src="<?php echo base_url();?>assets/images/gallarey/p0011.jpg" style="width:100%">
    </div>
    
    <div class="mySlides">
      <div class="numbertext">12 / 16</div>
      <img src="<?php echo base_url();?>assets/images/gallarey/p0012.jpg" style="width:100%">
    </div>


     <div class="mySlides">
      <div class="numbertext">13 / 16</div>
      <img src="<?php echo base_url();?>assets/images/gallarey/p0013.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">14 / 16</div>
      <img src="<?php echo base_url();?>assets/images/gallarey/p0014.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">15 / 16</div>
      <img src="<?php echo base_url();?>assets/images/gallarey/p0015.jpg" style="width:100%">
    </div>
    
    <div class="mySlides">
      <div class="numbertext">16 / 16</div>
      <img src="<?php echo base_url();?>assets/images/gallarey/p0016.jpg" style="width:100%">
    </div>
    
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>


    <div class="column">
      <img class="demo cursor" src="<?php echo base_url();?>assets/images/gallarey/p0001.jpg" style="width:80%" onclick="currentSlide(1)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="<?php echo base_url();?>assets/images/gallarey/p0002.jpg" style="width:80%" onclick="currentSlide(2)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="<?php echo base_url();?>assets/images/gallarey/p0003.jpg" style="width:80%" onclick="currentSlide(3)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="<?php echo base_url();?>assets/images/gallarey/p0004.jpg" style="width:80%" onclick="currentSlide(4)" alt="">
    </div>

<div class="column">
      <img class="demo cursor" src="<?php echo base_url();?>assets/images/gallarey/p0005.jpg" style="width:80%" onclick="currentSlide(5)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="<?php echo base_url();?>assets/images/gallarey/p0006.jpg" style="width:80%" onclick="currentSlide(6)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="<?php echo base_url();?>assets/images/gallarey/p0007.jpg" style="width:80%" onclick="currentSlide(7)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="<?php echo base_url();?>assets/images/gallarey/p0008.jpg" style="width:80%" onclick="currentSlide(8)" alt="">
    </div>


    <div class="column">
      <img class="demo cursor" src="<?php echo base_url();?>assets/images/gallarey/p0009.jpg" style="width:80%" onclick="currentSlide(9)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="<?php echo base_url();?>assets/images/gallarey/p0010.jpg" style="width:80%" onclick="currentSlide(10)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="<?php echo base_url();?>assets/images/gallarey/p0011.jpg" style="width:80%" onclick="currentSlide(11)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="<?php echo base_url();?>assets/images/gallarey/p0012.jpg" style="width:80%" onclick="currentSlide(12)" alt="">
    </div>

    <div class="column">
      <img class="demo cursor" src="<?php echo base_url();?>assets/images/gallarey/p0013.jpg" style="width:80%" onclick="currentSlide(13)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="<?php echo base_url();?>assets/images/gallarey/p0014.jpg" style="width:80%" onclick="currentSlide(14)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="<?php echo base_url();?>assets/images/gallarey/p0015.jpg" style="width:80%" onclick="currentSlide(15)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="<?php echo base_url();?>assets/images/gallarey/p0016.jpg" style="width:80%" onclick="currentSlide(16)" alt="">
    </div>




  </div>
</div>

<script>
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
    
</body>
</html>






  
<?php include(APPPATH.'views/templates/front/footer.php'); ?>

