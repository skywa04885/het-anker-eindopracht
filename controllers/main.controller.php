<?php

namespace Framework\MainController
{ 
  use \PHPMailer\PHPMailer\PHPMailer;
  use \PHPMailer\PHPMailer\SMTP;
  use \PHPMailer\PHPMailer\Exception;

  include_once(__DIR__ . '/../vendor/phpmailer/phpmailer/src/Exception.php');
  include_once(__DIR__ . '/../vendor/phpmailer/phpmailer/src/PHPMailer.php');
  include_once(__DIR__ . '/../vendor/phpmailer/phpmailer/src/SMTP.php');
  include_once(__DIR__ . '/../models/Activity.php');
  
  /**
   * The get index controller
   * ---
   * @Param conn
   */
  function getIndex($conn)
  {
    // ==== Gets the data ====

    $activities = \Framework\Models\Activity::getAll($conn);

    // ==== Renders the page ====

    // Creates the template
    $template = new \Framework\Template(array(
      'title' => 'Home',
      'activities' => $activities,
      'stylesheets' => array_merge(array('/public/dist/css/index.css'), \Framework\Template::$t_DefaultVariables['stylesheets'])
    ));

    // Renders the template
    $template->render('index.view.php');
  }

  /**
   * The get index controller
   * ---
   * @Param conn
   */
  function getContact($conn)
  {
    // ==== Renders the page ====

    // Creates the template
    $template = new \Framework\Template(array(
      'title' => 'Contact',
      'stylesheets' => array_merge(array('/public/dist/css/contact.css'), \Framework\Template::$t_DefaultVariables['stylesheets'])
    ));

    // Renders the template
    $template->render('contact.view.php');
  }

  /**
   * The post response for contact
   * ---
   * @Param conn
   */
  function postContact($conn)
  {
    // Sets the response type
    header('Content-Type: application/json');

    // ==== Gets the post data ====

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // ==== Validates the data ====

    // Checks the values
    if (
      !isset($name) || !isset($email) || 
      !isset($message) || !isset($subject)
    )
    { // -> Required data missing
      echo json_encode(array(
        'status' => FALSE,
        'message' => 'Required fields missing ...',
        'fields' => array(
          'name' => isset($name),
          'email' => isset($email),
          'subject' => isset($subject),
          'message' => isset($message)
        )
      ));
    }

    // ==== Renders the HTML email template ====
    ob_start();
    include(__DIR__ . '/../templates/contact.template.php');
    $html = ob_get_contents();
    ob_end_clean();
    
    // ==== Sends the email ====

    // Creates the mailer instance
    $mailer = new PHPMailer(TRUE);

    try {
      
      // Configures the mailer
      $mailer->Username = getenv('php_mail_main_user');
      $mailer->Password = getenv('php_mail_main_pass');
      $mailer->isSMTP();
      $mailer->SMTPAuth = TRUE;
      $mailer->Port = 25;
      $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mailer->Host = 'smtp.gmail.com';
      // Sets the targets
      $mailer->setFrom(getenv('php_mail_main_user'), 'Luke Rieff');
      $mailer->addAddress($email);
      // Sets the content
      $mailer->isHTML(TRUE);
      $mailer->Subject = 'Bedankt voor het opnemen van contact !';
      $mailer->Body = $html;
      $mailer->AltBody = 'Bedankt voor het opnemen van contact ! \n' .
        'Wij zullen z.s.m. reageren. \n' .
        '---\n' .
        'Hierbij het ontvangen bericht: \n' .
        '\n---\n\n' .
        'Onderwerp: ' . $subject . '\n' .
        'Email: ' . $email . '\n' .
        'Naam: ' . $name . '\n' .
        'Bericht: \n' . $message;
      // Sends the email
      $mailer->send();

      // Writes the response to the client
      echo json_encode(array(
        'status' => TRUE,
        'message' => 'Message sent successfully !'
      ));
    } catch (Exception $e)
    { // -> Could not send message
      echo json_encode(array(
        'status' => FALSE,
        'message' => 'Server error: ' . $e
      ));
    }
  }
}