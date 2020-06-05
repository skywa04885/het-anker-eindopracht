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
          <li><a href="/admin/login">Admin</a></li>
        </ul>
      </div>
      <!-- The real navigation bar -->
      <div class="wrapper-nav__bar">

      </div>
    </div>
    <?php include_once(constant('render_filename')); ?>
  </div>
</body>
</html>