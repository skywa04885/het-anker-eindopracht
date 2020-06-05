<?php

/*
  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, version 3 of the License.
  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/

include_once(__DIR__ . '/src/mvc/Router.php');
include_once(__DIR__ . '/src/mvc/Template.php');
include_once(__DIR__ . '/src/pdo.php');
include_once(__DIR__ . '/routes/main.route.php');

use Framework\Database;
// ==== Sets the default stuff ====

// Sets the default template dir
Framework\Template::$t_Dir = __DIR__ . '/views';
Framework\Template::$t_BaseFile = 'base.php';

// Sets the default variables
Framework\Template::$t_DefaultVariables = array(
  'stylesheets' => array('/public/dist/css/reset.css', '/public/dist/css/default.css'),
  'keywords' => 'test,page,school',
  'author' => 'Luke A.C.A. Rieff',
  'description' => 'This is an page of my website',
  'copyright' => 'Het Anker',
  'title' => 'Onbekende pagina'
);

// ==== Function definitions ====

/**
 * Parses the url to path only
 * ---
 * @Param raw
 */
function parseUrl($raw)
{
  $result = '';

  // Checks if we even have an get parameter / parameters
  if (strpos($raw, '?') == FALSE) $result = $raw;
  else $result = substr($raw, 0, strpos($raw, '?'));

  // Removes the not required '/'
  if (substr($result, -1) == '/') $result = substr($result, 0, -1);
  if ($result == '') $result = '/';

  // Returns the result
  return $result;
}

// ==== Connects to the database ====

$conn = null;

// Tries to connect to MySQL
try {
  // Connects
  $conn = Framework\Database\connect('anker');
} catch (Exception $e)
{
  // Creates the template
  $template = new Framework\Template(array(
    'errorCode' => '500',
    'errorMessage' => 'Database error !',
    'title' => 'Could not connect to MySQL',
    'errorDetails' => strval($e)
  ));

  // Renders the template
  $template->render('error.php');

  // Closes
  die();
}

// ==== Here starts the serving ====

// Parses the url, so we have the path only
$path = parseUrl($_SERVER['REQUEST_URI']);
// Creates the router
$router = new Router($path, $conn);

// ==== Executes the router and renderer ====

Framework\MainRouter\add($router);

// Executes the router
try {
  // Handles the routes
  if (!$router->handleRoutes())
  {
    // Creates the template
    $template = new Framework\Template(array(
      'errorCode' => '404',
      'errorMessage' => 'Pagina niet gevonden ! !',
      'title' => 'Pagina niet gevonden'
    ));

    // Renders the template
    $template->render('error.php');
  }
} catch (Exception $e)
{
  // Creates the template
  $template = new Framework\Template(array(
    'errorCode' => '500',
    'errorMessage' => 'Server error !',
    'title' => 'Server Error',
    'errorDetails' => strval($e)
  ));

  // Renders the template
  $template->render('error.php');
}