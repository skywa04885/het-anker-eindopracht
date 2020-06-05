<!-- Default site stuff -->
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?= constant('render_meta_title') ?> - Het anker</title>
<!-- SEO stuff -->
<meta name="keywords" content="<?= constant('render_meta_keywords') ?>" />
<meta name="author" content="<?= constant('render_meta_author') ?>" />
<meta name="copyright" content="<?= constant('render_meta_copyright') ?>" />
<meta name="description" content="<?= constant('render_meta_description') ?>" />
<!-- Styles -->
<?php foreach (constant('render_stylesheets') as $stylesheet): ?>
<link
  rel="stylesheet"
  type="text/css"
  href="<?= $stylesheet ?>" />
<?php endforeach; ?>
<!-- Google fonts -->
<link
  href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;1,400;1,600&display=swap"
  rel="stylesheet" /> 
<link
  href="https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600&display=swap"
  rel="stylesheet" /> 