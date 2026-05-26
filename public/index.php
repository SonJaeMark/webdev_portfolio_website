<?php
require_once __DIR__ . '/../src/Models/Projects.php';
require_once __DIR__ . '/../src/Repository/ProjectsRepository.php';
require_once __DIR__ . '/../src/Service/ProjectService.php';

$pdo = require __DIR__ . '/../config/database.php';
$repository     = new ProjectsRepository($pdo);
$projectService = new ProjectService($repository);
$visibleProjects = $projectService->getVisibleProjects();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Barangay 404 | Community Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
  <link href="https://fonts.googleapis.com/css?family=Mansalva|Roboto&display=swap" rel="stylesheet">
  <link rel="icon" href="assets/images/dinoraur.jpg">
 
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/animate.min.css">
  <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/css/aos.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/magnific-popup.css">
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
            <a href="index.php" class="text-white">Barangay 404</a>
          </div>
          <nav class="site-navigation text-left ml-auto" role="navigation">
            <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
              <li class="active"><a href="index.php" class="nav-link">Home</a></li>
              <li><a href="../src/Views/about.php" class="nav-link">About Us</a></li>
              <li><a href="../src/Views/projects.php" class="nav-link">Our Projects</a></li>
              <li><a href="../src/Views/contact.php" class="nav-link">Contact</a></li>
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
 
    <div class="owl-carousel-wrapper">
      <div class="box-92819">
        <h1 class="text-white mb-3">Building a better Barangay 404 together.</h1>
        <p><a href="#" class="btn btn-primary py-3 px-4 rounded-0">View Projects</a></p>
      </div>
      <div class="owl-carousel owl-1">
        <div class="ftco-cover-1 overlay" style="background-image: url('assets/images/cover-1.jpg');"></div>
        <div class="ftco-cover-1 overlay" style="background-image: url('assets/images/cover-2.jpg');"></div>
        <div class="ftco-cover-1 overlay" style="background-image: url('assets/images/cover-3.jpg');"></div>
      </div>
    </div>
 
    <!-- ===== PROJECTS SECTION (dynamically rendered via ProjectService) ===== -->
    <div class="site-section">
      <div class="container">
        <div class="row mb-5 align-items-start">
          <div class="col-md-4">
            <div class="heading-20219">
              <h2 class="title text-cursive">Active Projects</h2>
            </div>
          </div>
          <div class="col-md-8">
            <p>These are the ongoing and completed community projects of Barangay 404, covering health, education, and environment initiatives.</p>
          </div>
        </div>
 
        <div class="row">
          <?php
          $badgeColors = [
            'Health'      => 'badge-danger',
            'Education'   => 'badge-primary',
            'Environment' => 'badge-success',
            'Livelihood'  => 'badge-warning',
          ];
          $progressColors = [
            'Health'      => 'bg-danger',
            'Education'   => 'bg-primary',
            'Environment' => 'bg-success',
            'Livelihood'  => 'bg-warning',
          ];
 
          $count = 0;
          foreach ($visibleProjects as $project):
            if ($count >= 3) break;
            $type        = htmlspecialchars($project->getType());
            $badge       = $badgeColors[$type]  ?? 'badge-secondary';
            $progress    = $progressColors[$type] ?? 'bg-secondary';
            $isDone      = $project->getIsDone();
            $pct         = $isDone ? 100 : 60;
            $status      = $isDone ? 'Completed' : 'In Progress';
            $budget      = number_format($project->getBudget(), 2);
            $count++;
          ?>
          <div class="col-md-4 mb-4">
            <div class="cause shadow-sm">
              <div class="cause-link d-block bg-light d-flex align-items-center justify-content-center" style="height:180px;">
                <span class="h5 text-muted px-3 text-center"><?= htmlspecialchars($project->getTitle()) ?></span>
              </div>
              <div class="custom-progress-wrap">
                <span class="caption"><?= $pct ?>% — <?= $status ?></span>
                <div class="custom-progress-inner">
                  <div class="custom-progress <?= $progress ?>" style="width: <?= $pct ?>%;"></div>
                </div>
              </div>
              <div class="px-3 pt-3 border-top-0 border shadow-sm">
                <span class="<?= $badge ?> py-1 small px-2 rounded mb-3 d-inline-block"><?= $type ?></span>
                <h3 class="mb-3"><?= htmlspecialchars($project->getTitle()) ?></h3>
                <p class="small text-muted"><?= htmlspecialchars($project->getDescription()) ?></p>
                <div class="border-top border-light border-bottom py-2 d-flex">
                  <div>Budget</div>
                  <div class="ml-auto"><strong class="text-primary">₱<?= $budget ?></strong></div>
                </div>
                <div class="py-3 small text-muted">
                  <?= htmlspecialchars($project->getStartDate()) ?> &mdash; <?= htmlspecialchars($project->getEndDate()) ?>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
 
        <div class="text-center mt-3">
          <a href="../src/Views/projects.php" class="btn btn-outline-primary">View All Projects</a>
        </div>
      </div>
    </div>
 
    <div class="bg-image overlay site-section" style="background-image: url('../public/assets/images/cover-1.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <div class="row mb-5">
              <div class="col-md-7">
                <div class="heading-20219">
                  <h2 class="title text-white mb-4 text-cursive">Why Choose Us</h2>
                  <p class="text-white">We are committed to transparent, community-driven projects that make a real impact on the lives of Barangay 404 residents.</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-5">
                <div class="feature-29012 d-flex">
                  <div class="number mr-4"><span>1</span></div>
                  <div>
                    <h3>Community-Driven</h3>
                    <p>Every project is planned and approved by the community to ensure it addresses the real needs of our barangay.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-5">
                <div class="feature-29012 d-flex">
                  <div class="number mr-4"><span>2</span></div>
                  <div>
                    <h3>Transparent Budget</h3>
                    <p>All project budgets are publicly disclosed so every resident knows where community funds are being spent.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-5">
                <div class="feature-29012 d-flex">
                  <div class="number mr-4"><span>3</span></div>
                  <div>
                    <h3>Inclusive Programs</h3>
                    <p>Our programs cover health, education, environment, and livelihood — ensuring no sector is left behind.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-5">
                <div class="feature-29012 d-flex">
                  <div class="number mr-4"><span>4</span></div>
                  <div>
                    <h3>Accountable Leadership</h3>
                    <p>Our barangay officials are dedicated public servants who are answerable to the community at every step.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-image overlay-primary" style="background-image: url('images/img_1.jpg');">
      <div class="container">
        <div class="row align-items-stretch">
          <div class="col-md-6">
            <img src="../public/assets/images/cover-2.jpg" alt="Donate" class="img-fluid shadow">
          </div>
          <div class="col-md-6">
            <div class="bg-white h-100 p-4 shadow">
              <h3 class="mb-4 text-cursive">Donate Now</h3>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Name">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Amount in PHP">
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-primary">Donate Now</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="d-md-flex cta-20101 align-self-center bg-light p-5">
          <div><h2 class="text-cursive">Helping the Homeless, Hungry, and Hurting Children</h2></div>
          <div class="ml-auto"><a href="#" class="btn btn-primary">Donate Now</a></div>
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
                  <li><a href="index.php">Home</a></li>
                  <li><a href="../src/Views/about.php">About Us</a></li>
                  <li><a href="../src/Views/projects.php">Projects</a></li>
                  <li><a href="../src/Views/contact.php">Contact Us</a></li>
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
 
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.sticky.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/jquery.animateNumber.min.js"></script>
  <script src="assets/js/jquery.fancybox.min.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/aos.js"></script>
  <script src="assets/js/main.js"></script>
 
</body>
</html>