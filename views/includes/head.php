<!-- Default site stuff -->
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?= $this->getValue('title') ?> - Het anker</title>
<!-- SEO stuff -->
<meta name="keywords" content="<?= $this->getValue('keywords') ?>" />
<meta name="author" content="<?= $this->getValue('author') ?>" />
<meta name="copyright" content="<?= $this->getValue('copyright') ?>" />
<meta name="description" content="<?= $this->getValue('description') ?>" />
<!-- Styles -->
<?php foreach ($this->getValue('stylesheets') as $stylesheet): ?>
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