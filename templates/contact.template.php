<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Demystifying Email Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="wrapper">
      <div class="wrapper__title">
        <h1>Bedankt voor het opnemen van contact !</h1>
        <p>Wij zullen z.s.m. reageren.</p>
      </div>

      <div class="wrapper__message">
        <p>Hierbij een kopie van het ontvangen bericht: </p>
        <p>
          <strong>Naam*: </strong><?= $name ?>
          <br />
          <strong>Email*: </strong><?= $email ?>
          <br />
          <strong>Onderwerp*: </strong><?= $subject ?>
          <br />
          <strong>Bericht*: </strong>
          <hr />
          <?= $message ?>
        </p>
      </div>

      <div class="wrapper__footer">
        <p>Dit is een automatisch bericht van 
          <a href="84.30.192.217:8080">Scholengemeenschap Het Anker</a>
        </p>
      </div>
    </div>
  </body>
</html>