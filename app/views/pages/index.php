<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/index/index.css">
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <title>Welcome | RouteReady</title>
  </head>
  <body id="home">
    <nav>
      <div class="nav__logo">
        <a href="#home"><img src="<?php echo URLROOT; ?>/img/logo.jpg" alt="logo" /></a>
      </div>
      <ul class="nav__links">
        <li class="link"><a href="#home">Home</a></li>
        <li class="link"><a href="#about">About</a></li>
        <li class="link"><a href="#services">Services</a></li>
        <li class="link"><a href="#contact">Contact</a></li>
      </ul>
    </nav>

    <header class="section__container header__container" >
      <div class="header__content">
        <span class="bg__blur"></span>
        <span class="bg__blur header__blur"></span>
        
        <h1><span>Route</span> Ready</h1>
        <p>
          Welcome to RouteReady, Your portal to a world of hassle-free transport reservations, making corporate mobility a breeze for employees and organizations.
        </p>
        <a href="<?php echo URLROOT; ?>/users/register"><button class="btn_2">Sign-in</button></a>
        <a href="<?php echo URLROOT; ?>/users/login"><button class="btn_2">Log-in</button></a>
      </div>
    </header>
    
    <section class="section__container class__container" id="about">
      <div class="class__image">
        <span class="bg__blur"></span>
        <img src="<?php echo URLROOT; ?>/img/pic2.jpg" alt="class" class="class__img-1" />
        <img src="<?php echo URLROOT; ?>/img/pic1.jpg" alt="class" class="class__img-2" />
      </div>
      <div class="class__content">
        <h2 class="section__header">What is RouteReady?</h2>
        <p>
            Route Ready is your all-in-one solution for efficient transport management, simplifying vehicle reservations, empowering employees to effortlessly book business trips, and providing insightful fleet analytics, ushering in a new era of corporate mobility.
        </p>
      </div>
    </section>

    <section class="section__container explore__container" id="services">
      <div class="explore__header">
        <h2 class="section__header">WHAT WE PROVIDE</h2>
      </div>
      <div class="explore__grid">
        <div class="explore__card">
          <span><i class="fa-solid fa-bus"></i></span>
          <h4>Reserve transport service</h4>
          <p>
            Experience seamless and hassle-free vehicle reservations with RouteReady's user-friendly service.
          </p>
          <a href="#">Join Now <i class="ri-arrow-right-line"></i></a>
        </div>
        <div class="explore__card">
          <span><i class="fa-solid fa-suitcase"></i></span>
          <h4>Reserve vehicles for work trips</h4>
          <p>
            Effortlessly request company vehicles for your business trips with RouteReady's convenient service
          </p>
          <a href="#">Join Now <i class="ri-arrow-right-line"></i></a>
        </div>
        <div class="explore__card">
          <span><i class="fa-solid fa-list-check"></i></span>
          <h4>Manage company vehicles</h4>
          <p>
            Efficiently oversee and maintain your company's vehicle details through RouteReady's dedicated service
          </p>
          <a href="#">Join Now <i class="ri-arrow-right-line"></i></a>
        </div>
      </div>
    </section>


    <section class="review" id="contact">
      <div class="section__container review__container">
        <span><i class="ri-double-quotes-r"></i></span>
        <div class="review__content">
          <h4>For Any Inquiry</h4>
          <p>
            If you encounter any difficulties while using the website, please reach out to the respective departments listed below for assistance.
          </p>
        </div> 
      </div>
      <div class="explore__grid__review">
        <div class="explore__card__review">
          <span><i class="fa-solid fa-phone-volume"></i></span>
          <h4>Call us</h4>
          <p>
            IT Department - 011-2546978 <br> HR Department - 011-2546977
          </p>
        </div>
        <div class="explore__card__review">
          <span><i class="fa-solid fa-envelope"></i></span>
          <h4>E-mail</h4>
          <p>
            IT Department - itdepartment@gmail.com <br> HR Department - hrdepartment@gmail.com
          </p>
        </div>
    </section>

    <footer class="section__container footer__container">
      <span class="bg__blur"></span>
      <span class="bg__blur footer__blur"></span>
      <div class="footer__col">
        <div class="footer__logo"><img src="<?php echo URLROOT; ?>/img/logo.jpg" alt="logo" /></div>
        <p>
          Embark on the journey towards streamlined transport management with our unbeatable plans. Let's coordinate, optimize, and conquer transportation challenges together!
        </p>
        <div class="footer__socials">
          <a href="#"><i class="ri-facebook-fill"></i></a>
          <a href="#"><i class="ri-instagram-line"></i></a>
          <a href="#"><i class="ri-twitter-fill"></i></a>
        </div>
      </div>
      <div class="footer__col">
        <h4>Home</h4>
        <a href="#home">Home</a>
      </div>
      <div class="footer__col">
        <h4>About Us</h4>
        <a href="#about">About us</a>
      </div>
      <div class="footer__col">
        <h4>Contact</h4>
        <a href="#contact">Contact Us</a>
      </div>
    </footer>
    <div class="footer__bar">
      Copyright © 2024 RouteReady. All rights reserved.
    </div>
  </body>
</html>
