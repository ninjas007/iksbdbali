<!DOCTYPE html>
<html lang="en">

<head>
  <title>IKSBD Bali</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url('assets/fe-template') ?>/css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/fe-template') ?>/css/animate.css">

  <link rel="stylesheet" href="<?= base_url('assets/fe-template') ?>/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/fe-template') ?>/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/fe-template') ?>/css/magnific-popup.css">

  <link rel="stylesheet" href="<?= base_url('assets/fe-template') ?>/css/aos.css">

  <link rel="stylesheet" href="<?= base_url('assets/fe-template') ?>/css/ionicons.min.css">

  <link rel="stylesheet" href="<?= base_url('assets/fe-template') ?>/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="<?= base_url('assets/fe-template') ?>/css/jquery.timepicker.css">


  <link rel="stylesheet" href="<?= base_url('assets/fe-template') ?>/css/flaticon.css">
  <link rel="stylesheet" href="<?= base_url('assets/fe-template') ?>/css/icomoon.css">
  <link rel="stylesheet" href="<?= base_url('assets/fe-template') ?>/css/style.css?v=<?= time() ?>">
</head>

<body>
  <div id="colorlib-page">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
    <aside id="colorlib-aside" role="complementary" class="js-fullheight">
      <nav id="colorlib-main-menu" role="navigation">
        <ul>
          <li class="colorlib-active"><a href="<?= base_url() ?>">Home</a></li>

          <?php if ($this->session->userdata('email')) : ?>
            <li><a href="<?= base_url('berita') ?>">Dashboard</a></li>
            <li><a href="<?= base_url('auth/logout'); ?>">Logout</a></li>
          <?php else : ?>
            <li><a href="<?= base_url('auth') ?>">Login</a></li>
          <?php endif; ?>

        </ul>
      </nav>

      <div class="colorlib-footer">
        <img src="<?= base_url('assets') ?>/img/logo.jpg" alt="" style="width: 100px; padding-bottom: 20px;">
        <h4 style="font-size: 25px;" class="mb-4">IKSBD Bali</h4>
        <p class="pfooter">Copyright &copy;<script>
            document.write(new Date().getFullYear());
          </script>
        </p>
      </div>
    </aside>