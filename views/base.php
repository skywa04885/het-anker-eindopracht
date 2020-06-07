<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once(__DIR__ . '/includes/head.php'); ?>
</head>
<body>
  <div class="wrapper">
    <div class="wrapper-nav">
      <!-- The quick toolbar -->
      <div class="wrapper-nav__topbar">
        <ul>
          <li><a href="/admin/login" rel="alternate">Admin panel</a></li>
        </ul>
      </div>
      <!-- The banner -->
      <div class="wrapper-nav__banner">
        <h1>Scholen gemeenschap Het Anker</h1>
      </div>
      <!-- The real navigation bar -->
      <div class="wrapper-nav__bar">
        <!-- The navigation itself -->
        <div class="wrapper-nav__bar__middle">
          <ul>
            <li><a href="/" rel="alternate">Home</a></li>
            <li><a href="/contact" rel="alternate">Contact</a></li>
          </ul>
        </div>
        <!-- The login things -->
        <div class="wrapper-nav__bar__right">
          <ul>
            <li>
              <a href="/login" class="btn btn-accent" rel="nofollow">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <?php include_once(constant('render_include_sub')); ?>
    <div class="wrapper__footer">
      <div class="wrapper__footer__left">
        <p>
          <strong>Over ons</strong>
        </p>
      </div>
      <div class="wrapper__footer__center">
        <p>
          <strong>Navigatie</strong>
        </p>
      </div>
      <div class="wrapper__footer__right">
        <p>
          <strong>contact</strong>
        </p>
      </div>
    </div>
    <div class="wrapper__footer__bottom">
      <p>
        <small>Copyright <a rel="nofollow" href="/">Het Anker</a> 2019 - 2019</small>
        <br />
        <small>Gemaakt door <a href="https://me.fannst.nl/" rel="external">Luke Rieff</a></small>
      </p>
    </div>
  </div>
  <div id="loader" class="loader" style="display:none;">
    <div class="loader__bar">
      <div class="loader__bar-item"></div>
    </div>
  </div>
  <script src="/public/dist/js/default.js"></script>
</body>
</html>