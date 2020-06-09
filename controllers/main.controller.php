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
  include_once(__DIR__ . '/../models/Personal.php');
  include_once(__DIR__ . '/../src/Session.php');

  /**
   * Loads the simple session data
   * ---
   * @Param conn
   */
  function getSessionData($conn)
  {
    // ==== Loads the session data ====

    // Creates the session
    $session = new \Framework\Session(null, null);
    // Starts the session
    $session->start();
    // Loads the session data
    $session->read();
    // ==== Performs search for personal ====

    // Gets the personal
    $personal = \Framework\Models\Personal::findById($conn, intval($session->s_PersonalID));
    
    // Logs the user out if not defined
    if ($personal === null)
    {
      $session->s_LoggedInType = \Framework\SessionLoginType::Anonymous;
      $session->s_PersonalID = null;
    }

    // ==== Returns the data ====

    // Closes the session
    $session->close();

    // Returns the session
    return array(
      'session' => $session,
      'personal' => $personal
    );
  }

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
      'stylesheets' => array_merge(array('/public/dist/css/index.css'), \Framework\Template::$t_DefaultVariables['stylesheets']),
      'other' => getSessionData($conn)
    ));

    // Renders the template
    $template->render('index.view.php');
  }

  /**
   * The get index controller
   * ---
   * @Param conn
   */
  function getLogout($conn)
  {
    // ==== Resets the session ====

    // Creates the session
    $session = new \Framework\Session(\Framework\SessionLoginType::Anonymous, null);
    // Starts the session
    $session->start();
    // Loads the session data
    $session->write();
    // Closes the session
  
    // ==== Redirects ====

    // Goes to login
    header('Location: /login');
  }

  /**
   * The get register controller
   * ---
   * @Param conn
   */
  function getLogin($conn)
  {
    // ==== Renders the page ====

    // Creates the template
    $template = new \Framework\Template(array(
      'title' => 'Inloggen',
      'stylesheets' => array_merge(array('/public/dist/css/register.css'), \Framework\Template::$t_DefaultVariables['stylesheets']),
      'other' => getSessionData($conn)
    ));

    // Renders the template
    $template->render('login.view.php');
  }

  /**
   * The post login controller
   * ---
   * @Param conn
   */
  function postLoginPersonal($conn)
  {
    // ==== Checks if the data is set =====
    
    // Checks if the data is there
    if (!isset($_POST['voucher']) || !isset($_POST['number']))
    { // -> Data missing
      echo json_encode(array(
        'status' => FALSE,
        'message' => 'Parameters missing, see other field for details',
        'fields' => array(
          'voucher' => isset($_POST['voucher']),
          'number' => isset($_POST['number'])
        )
      ));
      die();
    }

    // ==== Parsed de request parameters ====

    $voucher = $_POST['voucher'];
    $personalNumber = $_POST['number'];

    // ==== Finds the personal ====

    // Gets the personal
    $personal = \Framework\Models\Personal::getByPersonalNumber($conn, intval($personalNumber));
    // Checks if it was found
    if ($personal === null)
    { // -> Not found
      echo json_encode(array(
        'status' => FALSE,
        'message' => 'Personeels nummer is niet geldig .'
      ));
      die();
    }

    // ==== Checks if the voucher matches ====

    // Checks if the voucher matches
    if (substr($voucher, 1) != $personal->p_Voucher)
    {
      // Writes the error
      echo json_encode(array(
        'status' => FALSE,
        'message' => 'Voucher code is niet geldig .'
      ));
      die();
    }

    // ==== Updates the session ====

    // Creates the session
    $session = new \Framework\Session(intval($personal->p_ID), \Framework\SessionLoginType::Personal);

    // Starts the session
    $session->start();
    // Writes the session
    $session->write();
    // Closes the session
    $session->close();

    // ==== Writes to the client ====
    echo json_encode(array(
      'status' => TRUE,
      'message' => 'Welcome !'
    ));
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
   * The get index controller
   * ---
   * @Param conn
   */
  function getActivity($conn)
  {
    // ==== Parsed de request parameters ====

    // Gets the id from the parameters
    $id = $_GET['id'];

    // Checks if the ID is there
    if (!isset($id))
    {
      // Redirects
      header('Location: /');
      // Dies
      die();
    }

    // ==== Gets the activity ====

    // Gets the activity
    $activity = \Framework\Models\Activity::getByID($conn, intval($id));

    // Checks if the activity exists
    if ($activity === null)
    {
      // Redirects
      header('Location: /');
      // Dies
      die();
    }

    // ==== Renders the page ====

    // Creates the template
    $template = new \Framework\Template(array(
      'title' => 'Activiteit',
      'stylesheets' => array_merge(array('/public/dist/css/activity.css'), \Framework\Template::$t_DefaultVariables['stylesheets']),
      'activity' => $activity,
      'take-part' => $_GET['take_part'] == 1
    ));

    // Renders the template
    $template->render('activity.view.php');
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
    // ==== Validates the data ====

    // Checks the values
    if (
      !isset($_POST['name']) || !isset($_POST['email']) || 
      !isset($_POST['subject']) || !isset($_POST['message'])
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
      die();
    }

    // ==== Gets the post data ====

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];    

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