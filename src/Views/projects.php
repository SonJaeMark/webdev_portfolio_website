<?php
require_once __DIR__ . '/../Models/Projects.php';
require_once __DIR__ . '/../Repository/ProjectsRepository.php';
require_once __DIR__ . '/../Service/ProjectService.php';

$pdo = require __DIR__ . '/../../config/database.php';
$repository     = new ProjectsRepository($pdo);
$projectService = new ProjectService($repository);
$visibleProjects = $projectService->getVisibleProjects();

$assetsBase = '../../public/assets';
$publicBase = '../../public';

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Our Projects | Barangay 404</title>
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
              <li class="active"><a href="projects.php" class="nav-link">Our Projects</a></li>
              <li><a href="contact.php" class="nav-link">Contact</a></li>
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

    <div class="ftco-cover-1 overlay" style="background-image: url('<?= $assetsBase ?>/images/cover-2.jpg');">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center" style="min-height: 320px;">
          <div class="col-lg-8">
            <h1 class="text-white mb-3 text-cursive">Our Community Projects</h1>
            <p class="text-white lead">Ongoing and completed initiatives for a stronger Barangay 404.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5 align-items-start">
          <div class="col-md-4">
            <div class="heading-20219">
              <h2 class="title text-cursive">All Projects</h2>
            </div>
          </div>
          <div class="col-md-8">
            <p>Browse every visible community project of Barangay 404 — covering health, education, environment, and livelihood programs funded and managed for the benefit of our residents.</p>
          </div>
        </div>

        <?php if (empty($visibleProjects)): ?>
        <div class="row">
          <div class="col-12 text-center py-5">
            <p class="text-muted">No projects are available at the moment. Please check back soon.</p>
          </div>
        </div>
        <?php else: ?>
        <div class="row">
          <?php foreach ($visibleProjects as $project):
            $type     = htmlspecialchars($project->getType());
            $badge    = $badgeColors[$type] ?? 'badge-secondary';
            $progress = $progressColors[$type] ?? 'bg-secondary';
            $isDone   = $project->getIsDone();
            $pct      = $isDone ? 100 : 60;
            $status   = $isDone ? 'Completed' : 'In Progress';
            $budget   = number_format($project->getBudget(), 2);
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
        <?php endif; ?>
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
