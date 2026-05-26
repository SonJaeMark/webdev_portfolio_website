<?php
$assetsBase = '../../public/assets';
$publicBase = '../../public';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact Us | Barangay 404</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Mansalva|Roboto&display=swap" rel="stylesheet">
  <link rel="icon" href="<?= $assetsBase ?>/images/dinoraur.jpg">

  <link rel="stylesheet" href="<?= $assetsBase ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $assetsBase ?>/css/animate.min.css">
  <link rel="stylesheet" href="<?= $assetsBase ?>/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="<?= $assetsBase ?>/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= $assetsBase ?>/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= $assetsBase ?>/css/aos.css">
  <link rel="stylesheet" href="<?= $assetsBase ?>/css/style.css">
  <link rel="stylesheet" href="<?= $assetsBase ?>/css/magnific-popup.css">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar site-navbar-target bg-secondary shadow" role="banner">
      <div class="container">
        <div class="row align-items-center position-relative">
          <div class="site-logo">
            <a href="<?= $publicBase ?>/index.php" class="text-white">Barangay 404</a>
          </div>
          <nav class="site-navigation text-left ml-auto" role="navigation">
            <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
              <li><a href="<?= $publicBase ?>/index.php" class="nav-link">Home</a></li>
              <li><a href="about.php" class="nav-link">About Us</a></li>
              <li><a href="projects.php" class="nav-link">Our Projects</a></li>
              <li class="active"><a href="contact.php" class="nav-link">Contact</a></li>
            </ul>
          </nav>
          <div class="ml-auto toggle-button d-inline-block d-lg-none">
            <a href="#" class="site-menu-toggle py-5 js-menu-toggle text-white">
              <span class="icon-menu h3 text-white"></span>
            </a>
          </div>
        </div>
      </div>
    </header>

    <div class="ftco-cover-1 overlay" style="background-image: url('<?= $assetsBase ?>/images/cover-3.jpg');">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center" style="min-height: 320px;">
          <div class="col-lg-8">
            <h1 class="text-white mb-3 text-cursive">Contact Us</h1>
            <p class="text-white lead">Reach out to Barangay 404 — we are here to listen and help.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5 align-items-start">
          <div class="col-md-4">
            <div class="heading-20219">
              <h2 class="title text-cursive">Get in Touch</h2>
            </div>
          </div>
          <div class="col-md-8">
            <p>Have a question about our programs, want to volunteer, or need barangay assistance? Send us a message and our team will respond as soon as possible.</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-5 mb-5 mb-md-0">
            <div class="bg-light p-4 shadow-sm h-100">
              <h3 class="text-cursive mb-4">Barangay Hall</h3>
              <p class="mb-2"><strong>Address:</strong><br>Barangay 404, Community Street<br>Metro City, Philippines</p>
              <p class="mb-2"><strong>Phone:</strong><br>(02) 1234-5678</p>
              <p class="mb-2"><strong>Email:</strong><br>info@barangay404.gov.ph</p>
              <p class="mb-0"><strong>Office Hours:</strong><br>Monday – Friday, 8:00 AM – 5:00 PM</p>
            </div>
          </div>
          <div class="col-md-7">
            <div class="bg-white p-4 shadow">
              <h3 class="mb-4 text-cursive">Send a Message</h3>
              <form action="#" method="post">
                <div class="form-group">
                  <label for="name">Full Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Your name" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                </div>
                <div class="form-group">
                  <label for="subject">Subject</label>
                  <input type="text" class="form-control" id="subject" name="subject" placeholder="How can we help?">
                </div>
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea class="form-control" id="message" name="message" rows="5" placeholder="Write your message here..." required></textarea>
                </div>
                <div class="form-group mb-0">
                  <button type="submit" class="btn btn-primary py-3 px-4 rounded-0">Send Message</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="site-footer bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-7">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p>Barangay 404 is committed to transparent governance and community-led development programs for a better future.</p>
              </div>
              <div class="col-md-4 ml-auto">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="<?= $publicBase ?>/index.php">Home</a></li>
                  <li><a href="about.php">About Us</a></li>
                  <li><a href="projects.php">Projects</a></li>
                  <li><a href="contact.php">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-4 ml-auto">
            <h2 class="footer-heading mb-4">Subscribe to Newsletter</h2>
            <div class="input-group mb-3">
              <input type="text" class="form-control rounded-0 border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email">
              <div class="input-group-append">
                <button class="btn btn-primary text-white" type="button">Subscribe</button>
              </div>
            </div>
            <h2 class="footer-heading mb-4">Follow Us</h2>
            <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="pt-5">
              <p>Copyright &copy; <?= date('Y') ?> All rights reserved | Barangay 404</p>
            </div>
          </div>
        </div>
      </div>
    </footer>

  </div>

  <script src="<?= $assetsBase ?>/js/jquery-3.3.1.min.js"></script>
  <script src="<?= $assetsBase ?>/js/popper.min.js"></script>
  <script src="<?= $assetsBase ?>/js/bootstrap.min.js"></script>
  <script src="<?= $assetsBase ?>/js/owl.carousel.min.js"></script>
  <script src="<?= $assetsBase ?>/js/jquery.sticky.js"></script>
  <script src="<?= $assetsBase ?>/js/jquery.waypoints.min.js"></script>
  <script src="<?= $assetsBase ?>/js/jquery.animateNumber.min.js"></script>
  <script src="<?= $assetsBase ?>/js/jquery.fancybox.min.js"></script>
  <script src="<?= $assetsBase ?>/js/jquery.easing.1.3.js"></script>
  <script src="<?= $assetsBase ?>/js/aos.js"></script>
  <script src="<?= $assetsBase ?>/js/main.js"></script>

</body>
</html>
