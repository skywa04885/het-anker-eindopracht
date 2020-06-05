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
          <li><a href="/admin/login" rel="alternate">Admin</a></li>
        </ul>
      </div>
      <!-- The real navigation bar -->
      <div class="wrapper-nav__bar">
        <!-- The brand -->
        <div class="wrapper-nav__bar__left">
          <p>
            <strong>Het Anker</strong>
          </p>
        </div>
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
              <a href="/login" rel="nofollow">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <?php include_once(constant('render_include_sub')); ?>
  </div>
</body>
</html>